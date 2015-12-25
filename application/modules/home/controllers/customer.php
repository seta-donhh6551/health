<?php
   class Customer extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->model("model_technology");
		   $this->load->model("model_home");
		   $this->load->helper("form");
		   $this->load->library("form_validation");
		   $this->load->library("session");
	   }
	   public function index(){
		   $segment = $this->fillter($this->uri->segment(1));
		   $config['base_url'] = base_url().$segment."/";
		   $config['total_rows'] = $this->model_home->count_all_student();
		   $config['per_page'] = 5;
		   $config['uri_segment'] = 2;
		   $config['next_link'] = "Next";
		   $config['prev_link'] = "Prev";
		   $config['cur_tag_open'] = '<span class="curpage">';
		   $config['cur_tag_close'] = '</span>';
		   $this->load->library("pagination",$config);
		   $start = (int)$this->uri->segment(2);
		   $data['newest'] 		= $this->new_posts();
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['listcate']    = $this->listcate();
		   $data['students']    = $this->model_home->random_student();
		   $data['category'] 	= $this->model_technology->listcago();
		   $data['listall'] 	= $this->model_home->listall_student($config['per_page'],$start);
		   $data['eq'] 			= "10";
		   $data['topeq'] 		= "4";
		   $data['title'] 		= "Đánh giá của học viên";
		   $this->load->view("customer/layout",$data);
	   }
	   public function add(){
		   $data['newest'] 		= $this->new_posts();
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['listcate']    = $this->listcate();
		   $data['students']    = $this->model_home->random_student();
		   $data['category'] 	= $this->model_technology->listcago();
		   $data['eq'] 			= "10";
		   $data['topeq'] 		= "4";
		   $data['title'] 		= "Viết đánh giá về PHPANDMYSQL.NET";
		   if($this->input->post("ok") != ""){
			   	$name  = $this->fillter($this->input->post("name"));
				$phone = $this->fillter($this->input->post("phone"));
				$email = $this->fillter($this->input->post("email"));
				$info  = $this->fillter($this->input->post("info"));
				$captc = $this->fillter($this->input->post("captcha"));
				if($name == NULL || $phone == NULL || $email == NULL || $info == NULL || $captc == NULL){
					$data['errors'] = "Vui lòng nhập đầy đủ thông tin";
					$this->load->view("customer/add/layout",$data);
				}else{
					$security_code = $this->session->userdata("security_code");
					if($captc != $security_code){
						$data['errors'] = "Mã captcha không đúng";
						$this->load->view("customer/add/layout",$data);
					}else{
						$this->form_validation->set_rules("name","Họ tên","trim|required");
			   			$this->form_validation->set_rules("email","Địa chỉ email","trim|required|valid_email");
						$this->form_validation->set_rules("phone","Số điện thoại","trim|required|numeric");
						$this->form_validation->set_rules("info","Đánh giá của bạn","trim|required");
						if($this->form_validation->run() == FALSE){
							$this->load->view("customer/add/layout",$data);
						}else{
							$db = array(
								"student_name" => $name,
								"student_phone" => $phone,
								"student_email" => $email,
								"student_info"  => $info
							);
							if($_FILES['avatar']['name'] != NULL){
								$config['upload_path'] = './uploads/students';
								$config['allowed_types'] = 'gif|jpg|jpeg|png';
								$config['max_size']	= '2000';
								$config['max_width']  = '1024';
								$config['max_height']  = '1000';
								$this->load->library('upload',$config);
								if(!$this->upload->do_upload("avatar")){
									$data = array('error' => $this->upload->display_errors());
									$data['newest'] 		= $this->new_posts();
								    $data['support'] 	= $this->support();
								    $data['access'] 		= $this->access();
								    $data['online'] 		= $this->online();
								    $data['config'] 		= $this->config();
								    $data['listcate']    = $this->listcate();
								    $data['students']    = $this->model_home->random_student();
								    $data['category'] 	= $this->model_technology->listcago();
								    $data['eq'] 			= "10";
								    $data['topeq'] 		= "4";
								    $data['title'] 		= "Viết đánh giá về PHPANDMYSQL.NET";
									$this->load->view("customer/add/layout",$data);
									return FALSE;
								}else{
									$data = $this->upload->data();
									$db['student_avatar'] = $data['file_name'];
									$this->createThumbnail("uploads/students",$db['student_avatar'],"110","140");
								}
							 }
							$data['newest'] 	= $this->new_posts();
						    $data['support'] 	= $this->support();
						    $data['access'] 	= $this->access();
						    $data['online'] 	= $this->online();
						    $data['config'] 	= $this->config();
						    $data['listcate']   = $this->listcate();
						    $data['students']   = $this->model_home->random_student();
						    $data['category'] 	= $this->model_technology->listcago();
						    $data['eq'] 		= "10";
						    $data['topeq'] 		= "4";
						    $data['title'] 		= "Viết đánh giá về PHPANDMYSQL.NET";
							$this->model_home->add($db);
							redirect(base_url()."home/customer/thanks"); 
						}
					}
				}
			}else{
		   		$this->load->view("customer/add/layout",$data);
			}
	   }
	   public function thanks(){
		   echo "<div style='width:700px;margin:20px auto;'>";
		   echo "<p style='color:green;font-weight:bold;text-align:center'>Cám ơn những đánh giá của bạn, chúc bạn luôn thành công!</p>";
		   echo "<p><a href='".base_url()."'>Về trang chủ</a></p>";
		   echo "</div>";
	   }
	   public function createThumbnail($path,$fileName,$width,$height){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $path.'/'.$fileName;
			$config['new_image'] = $path.'/thumb/'.$fileName;
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