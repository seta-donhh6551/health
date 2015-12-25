<?php
   require("libraries/student.php");
   class Contact extends Student{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("mindex");
		   $this->load->helper("form");
		   $this->load->library("form_validation");
	   }
	   public function index(){
		   	$data['title'] = "Sửa thông tin liên hệ";
			$data['template'] = "contact/cont";
			$data['getdata'] = $this->mindex->contact();
			$data['data']['info'] = "";
			$data['act'] = 7;
			$this->load->view("layout",$data);
	   }
	   public function update(){
			$id = $this->uri->segment(4);
			$data['error'] = "";
			$data['data'] = "";
			$data['template'] = "contact/cont";
			$data['title'] = "Sửa thông tin liên hệ";
			$data['act'] = 7;
			$data['getdata'] = $this->mindex->contact();
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("contact_value","Nội dung chi tiết","required");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					$arr = array("contact_value"=>$this->input->post("contact_value"));
					$this->mindex->update_contact($arr,$id);
					redirect(base_url()."admin/index/");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
   }