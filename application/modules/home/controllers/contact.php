<?php
   class Contact extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("model_home");
		   $this->load->model("mindex");
		   $this->load->helper('main_helper');
           $this->load->helper('mail_helper');
		   $this->load->model("model_technology");
		   $this->load->library("email");
	   }
	   public function index(){
		   $data['listcate'] = $this->listcate();
		   $data['newest'] 		= $this->new_posts();
	   	   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['category']   	= $this->model_technology->listcago();
		   $data['contact'] 	= $this->model_home->contact();
		   $data['students']    = $this->model_home->random_student();
		   $data['subjects']    = $this->model_home->subjects();
		   $data['eq'] 			= "4";
		   $data['title'] = "Liên hệ với chúng tôi";
		   $this->load->view("contact/layout",$data);
	   }
	   public function ajax(){
		   $name  = $this->fillter($this->input->post("name"));
		   $email = $this->fillter($this->input->post("email"));
		   $phone = $this->fillter($this->input->post("phone"));
		   $info  =  $this->fillter($this->input->post("noi"));
		   $ok1   = $ok2 = "";
		   if($name != NULL && $email != NULL && $info != NULL && $phone != NULL){
				$null = "/^[a-zA-Z]{1}[a-zA-Z0-9._]{3,25}\@[a-zA-Z0-9]{3,}\.[a-zA-Z.]{2,8}$/";
				$pho =  "/^[0]{1}[0-9]{8,10}$/";
				if(preg_match($null,$email)){
					$ok1 = TRUE;
				}else{
					echo "Email không hợp lệ <br />";
				}
				if(preg_match($pho,$phone)){
					$ok2 = TRUE;
				}else{
					echo "Số điện thoại không hợp lệ<br />";
				}
				if($ok1 == TRUE && $ok2 == TRUE){
					$data = array(
							"con_name" => $name,
							"con_email" => $email,
							"con_phone" => $phone,
							"con_full" => $info,
							"con_date" => date("d/m/Y - h:i:s")
						);
					$this->sendmail($data);
					$this->model_home->insert_contact($data);
					echo "<span style='color:#0F0;font-weight:bold;'>Ý kiến của bạn đã được gửi,chúng tôi sẽ sớm liên hệ với bạn.</span>";
				}
			}else{
				echo 1;
			}
	   }
	   public function sendmail($data){
		   $mesnger = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html>
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    </head>
                    <body>
                    <h2 style="font-size: 16px;">Contact from phpandmysql.net</h2>
                    <br/><br/>
                    <p>CONTACT INFORMATION</p>

            ';
			$mesnger .= "Họ tên : ".$data['con_name']." <br />Email : ".$data['con_email']." <br />Phone : ".$data['con_phone']." <br />Nội dung : ".$data['con_full']."";
			$mesnger .= '</body></html> ';
			send_mail_helper('haanhdon@gmail.com', 'CONTACT FROM PHPANDMYSQL.NET', htmlspecialchars_decode($mesnger));
	   }
   }