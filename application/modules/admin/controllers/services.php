<?php
	class Services extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->model("mindex");
			$this->load->helper("form");
			$this->load->library("form_validation");	
		}
		public function index(){
			$data['title']="Dịch vụ";
			$data['template'] = "services/service";
			$data['data']['getdata']= $this->mindex->services();
			$this->load->view("layout",$data);
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['title'] = "Sửa bài viết";
			$data['template'] = "services/service";
			$data['data'] = "";
			$data['list'] = $this->mindex->services();
			if($this->input->post("ok") != ""){
				//$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('in_name'))));
				$value = array(
							"service_info" => $this->input->post("service_info"),
							"service_full" => $this->input->post("service_full")
						);
					$this->mindex->update_service($value,$id);
					redirect(base_url()."admin/index");
			}else{
				$this->load->view("layout",$data);
			}
		}
	}