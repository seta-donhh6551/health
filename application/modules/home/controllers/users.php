<?php
   class Users extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("model_user");
		   $this->load->library("form_validation");
	   }
	   public function index(){	   
		   $data['title'] = "Đăng ký thành viên";
		   $data['listcate'] = $this->listcate();
		   $data['template'] = "users/register";
		   $this->load->view("users/layout",$data);
	   }
	   public function verify(){
		   if($_POST == NULL){die();}
		   $name = $_POST['name'];
		   $pass = md5($_POST['pass']);
		   $captcha = $_POST['captcha'];
		   $code = $_SESSION['security_code'];
		   //echo $name." - ".$pass; die();
		   if($code != $captcha){
			   echo "Mã captcha chưa đúng";
		   }else{
			   $checklog = $this->model_user->login($name,$pass);
			   if($checklog == FALSE){
				   echo "Tài khoản đăng nhập sai";
			   }else{
				   $_SESSION['userid'] = $checklog['user_id'];
				   $_SESSION['username'] = $checklog['username'];
				   $_SESSION['userlevel'] = $checklog['level'];
				   $_SESSION['userimg'] = $checklog['image'];
				   echo "haanhdon";
			   }
		   }
	   }
	   public function manage(){
		   $data['title'] = "Quản lý tài khoản của bạn!";
		   $data['listcate'] = $this->listcate();
		   $data['template'] = "users/manage";
		   if(!isset($_SESSION['userid'])){
			   redirect(base_url());
		   }
		   $id = (int)$_SESSION['userid'];
		   $data['result'] = $this->model_user->getuser($id);
		   if(isset($_POST['ok'])){
			   $id = (int)$_SESSION['userid'];
			   $data['result'] = $this->model_user->getuser($id);
			   $name = $this->fillter($_POST['fullname']);
			   $gender = $this->fillter($_POST['gender']);
			   $phone = $this->fillter($_POST['userphone']);
			   $email = $this->fillter($_POST['useremail']);
			   $adress = $this->fillter($_POST['adress']);
			   $captcha = $this->fillter($_POST['captcha']);
			   $db = array("name"=>$name,"gender"=>$gender,"phone"=>$phone,"adress"=>$adress,"email"=>$email);
			   $checkemail = $this->model_user->getdata(array("email"=>$email,"user_id !="=>$id));
			   if($captcha != $_SESSION['security_code']){
				   $data['error'] = "Mã captcha chưa đúng!";
				   $data['template'] = "users/manage";
				   $this->load->view("users/layout",$data);
			   }else{
				   if($checkemail > 0){
					   $data['error'] = "Email này đã tồn tại";
					   $data['template'] = "users/manage";
					   $this->load->view("users/layout",$data);
				   }else{
					   if($_FILES['avatar']['name'] != NULL){
							$config['upload_path'] = './uploads/users';
							$config['allowed_types'] = 'jpg|jpeg|gif|png';
							$config['max_size']	= '2000';
							$config['max_width']  = '1024';
							$config['max_height']  = '1000';
							$config['encrypt_name'] = TRUE;
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("avatar")){
								$data = array('error' => $this->upload->display_errors());
								$id = (int)$_SESSION['userid'];
								$data['result'] = $this->model_user->getuser($id);
								$data['title'] = "Quản lý tài khoản của bạn!";
								$data['listcate'] = $this->listcate();
								$data['template'] = "users/manage";
								$this->load->view("users/layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['image'] = $data['file_name'];
								$this->createThumbnail($db['image'],"120","85");
								$id  = (int)$_SESSION['userid'];
		     					$data['result'] = $this->model_user->getuser($id);
								@unlink("uploads/users/".$data['result']['image']);
								@unlink("uploads/users/thumb/".$data['result']['image']);
							}
					   }
					   $this->model_user->update($id,$db);
		   			   $data['result'] = $this->model_user->getuser($id);
					   $data['error'] = "<span style='color:#060;font-weight:bold'>
					   <img style='float: left;margin:9px 5px 0px 0px;' src='".base_url()."public/images/4-0.gif' />Cập nhật thông tin thành công. Về trang chủ...</span>
					   <script type='text/javascript'>
					   $(document).ready(function(e) {
					   setTimeout(function(){
						   window.location = '".base_url()."';
						 },3000);
					   });
					   </script>";
					   $data['template'] = "users/manage";
					   $this->load->view("users/layout",$data);
				   }
			   }
		   }else{
		   	   $this->load->view("users/layout",$data);
		   }
	   }
	   public function ajax(){
		   if($_POST == NULL){die();}
		   $code = $_SESSION['security_code'];
		   $name = $_POST['name'];
		   $pass = $_POST['pass'];
		   $fullname = $_POST['fullname'];
		   $email = $_POST['email'];
		   $phone = $_POST['phone'];
		   $gender = $_POST['gender'];
		   $captcha = $_POST['captcha'];
		   $data = array("username"=>$name,"password"=>md5($pass),"name"=>$fullname,"gender"=>$gender,"phone"=>$phone,"email"=>$email,"image"=>"no-avatar.png","level"=>"2","status"=>"1");
		   if($code != $captcha){
			   echo "Mã captcha chưa đúng";
		   }else{
			   $rulem = "/^[a-zA-Z]{1}[a-zA-Z0-9._]{3,25}\@[a-zA-Z0-9]{3,}\.[a-zA-Z.]{2,8}$/";
			   $rulep =  "/^[0]{1}[0-9]{8,12}$/";
			   if(!preg_match($rulem,$email)){
				   echo  "Email không hợp lệ"; die();
			   }else{
				   $checkname = $this->model_user->getdata(array("username"=>$name));
				   $checkemail = $this->model_user->getdata(array("email"=>$email));
				   if($checkname > 0){
					   echo "Tên đăng nhập đã tồn tại";
				   }elseif($checkemail > 0){
					   echo "Email này đã tồn tại";
				   }else{
					   $this->model_user->add($data);
					   echo "haanhdon";
				   }
			   }
		   }
	   }
	   public function forgot(){
		   $data['title'] = "Quên mật khẩu";
		   $data['access'] = $this->access();
		   $data['online'] = $this->online();
		   if($this->input->post("ok")){
			   $this->form_validation->set_rules("email","Email","required|min_length[5]|valid_emails");
			   $this->form_validation->set_rules("captcha","Mã xác nhận","required|min_length[4]");
			   if($this->form_validation->run() == FALSE){
				  $this->load->view("user/forgot/layout",$data); 
			   }else{
				   $ses = $_SESSION['security_code'];
				   $code = $this->input->post("captcha");
				   $email = $this->input->post("email");
				   if($code != $ses){
					   $data['error'] = "Mã xác nhận không chính xác";
					   $this->load->view("user/forgot/layout",$data);
				   }else{
					   if($this->muser->check_email($email) == TRUE){
						  	$data['error'] = "Không tìm thấy email của bạn trong cơ sở dữ liệu";
					   		$this->load->view("user/forgot/layout",$data); 
					   }else{
						   	$rand = rand(0,999);
							$pass = md5($rand);
							$profile = $this->muser->get_forgot($email);
						    $message  = "Chúng tôi nhận được yêu cầu lấy lại mật khẩu của bạn từ http://vinhphucit.org/ <br />";
							$message .= "Tài khoản của bạn : ".$profile['username']. "<br />";
							$message .= "Mật khẩu mới của bạn : ".$rand;
							$mail = array(
	                            "to_receiver"   => $email,
	                            "message"       => $message,
	                        	);	
							$pa = array("password"=>"$pass");			                
							$this->muser->forgot($email,$pa);
							$this->load->library("my_email");
				            $this->my_email->config($mail);
				            $this->my_email->sendmail();
							$data['error'] = "Một tin nhắn đã gửi đến email của bạn,vui lòng check email để lấy lại mật khẩu !";
							$this->load->view("user/forgot/layout",$data);
						}
				   }
			   }
		   }else{
		   		$this->load->view("user/forgot/layout",$data);
		   }
	   }
	   public function login(){
		   $data['title'] = "Đăng nhập";
		   $data['listcate'] = $this->listcate();
		   if(isset($_SESSION['userid'])){
			   redirect(base_url());
		   }
		   $data['template'] = "users/login";
		   $this->load->view("users/layout",$data);
	   }
	   public function logout(){
		   session_destroy();
		   redirect(base_url());
	   }
	   public function sendmail($data){
	   }
	   public function createThumbnail($fileName,$width,$height){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/users/'.$fileName;
			$config['new_image'] = 'uploads/users/thumb/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
   }