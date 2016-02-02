<?php
   class Contact extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("model_home");
           $this->load->helper('mail_helper');
		   $this->load->library("email");
	   }
	   public function index(){
		   $data['listcate'] = $this->listcate();
		   $data['config'] = $this->config();
		   $data['newest'] = $this->new_posts(4);
		   $data['rancates'] = $this->model_home->getcates(4, 6);
		   $data['randompost'] = $this->randomquest(45);
		   $data['title'] = "Contact us";
		   $this->load->view("contact/layout",$data);
	   }
	   public function ajax(){
		   $name  = $this->utility->fillter($this->input->post("name"));
		   $email = $this->utility->fillter($this->input->post("email"));
		   $phone = $this->utility->fillter($this->input->post("phone"));
		   $info  =  $this->utility->fillter($this->input->post("info"));
		   $flag  = false;
			$null = "/^[a-zA-Z]{1}[a-zA-Z0-9._]{3,25}\@[a-zA-Z0-9]{3,}\.[a-zA-Z.]{2,8}$/";
			if(preg_match($null,$email)){
				$flag = true;
			}else{
				echo "Email is not valid <br />";
			}
			if($flag){
				$data = array(
						"con_name" => $name,
						"con_email" => $email,
						"con_phone" => $phone,
						"con_full" => $info,
						"con_date" => date("d/m/Y - h:i:s")
					);
				$this->sendmail($data);
				$this->model_home->insert_contact($data);
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
                    <h2 style="font-size: 16px;">CONTACT FROM LIFERESPECT.NET</h2>
                    <br/><br/>
                    <p>CONTACT INFORMATION</p>

            ';
			$mesnger .= "Full name : ".$data['con_name']." <br />Email : ".$data['con_email']." <br />Phone : ".$data['con_phone']." <br />Infomarintion : ".$data['con_full']."";
			$mesnger .= '</body></html> ';
			send_mail_helper('haanhdon@gmail.com', 'CONTACT FROM LIFERESPECT.NET', htmlspecialchars_decode($mesnger));
	   }
   }