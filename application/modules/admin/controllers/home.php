<?php
	require("libraries/student.php");
  	class Home extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->library("form_validation");
			$this->load->model("mhome");
		}
		public function index(){
			$data['title'] = "Cơ cấu tổ chức";
			$data['template'] = "cocau/cocau";
			$data['data'] = "";
			$data['get'] = $this->mhome->cocau();
			$this->load->view("layout",$data);
		}
		public function update_cc(){
			$id = $this->uri->segment(4);
			$data['get'] = $this->mhome->cocau();
			$data['error'] = "";
			$data['data'] = "";
			$data['template'] = "cocau/cocau";
			$data['title'] = "Cơ cấu tổ chức";
			$data['get'] = $this->mhome->cocau();
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("co_value","Nội dung chi tiết","required");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					$arr = array("co_value" =>$this->input->post("co_value"));
					$this->mhome->update_cc($arr,$id);
					redirect(base_url()."admin/index/");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function service(){
			$data['title'] = "Dịch vụ";
			$data['template'] = "service/sv";
			$data['data'] = "";
			$data['get'] = $this->mhome->service();
			$this->load->view("layout",$data);
		}
		public function update_sv(){
			$id = $this->uri->segment(4);
			$data['get'] = $this->mhome->service();
			$data['error'] = "";
			$data['data'] = "";
			$data['template'] = "service/sv";
			$data['title'] = "Dịch vụ";
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("sv_value","Nội dung chi tiết","required");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					$arr = array(
						"sv_value" => $this->input->post("sv_value"),
						"sv_value_en" => $this->input->post("sv_value_en")
					);
					$this->mhome->update_sv($arr,$id);
					redirect(base_url()."admin/index/");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function project(){
			$data['title'] = "Dự án";
			$data['template'] = "project/pro";
			$data['data'] = "";
			$data['get'] = $this->mhome->project();
			$this->load->view("layout",$data);
		}
		public function update_pro(){
			$id = $this->uri->segment(4);
			$data['get'] = $this->mhome->project();
			$data['error'] = "";
			$data['data'] = "";
			$data['template'] = "project/pro";
			$data['title'] = "Dự án";
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("pro_value","Nội dung chi tiết","required");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					$arr = array("pro_value" =>$this->input->post("pro_value"));
					$this->mhome->update_pro($arr,$id);
					redirect(base_url()."admin/index/");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
	}