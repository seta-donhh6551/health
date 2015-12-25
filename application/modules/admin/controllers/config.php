<?php
	require("libraries/student.php");
  	class Config extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->library("form_validation");
			$this->load->model("mindex");
		}
		public function index(){
			$data['title'] = "System config";
			$data['template'] = "config/config";
			$data['act'] = 8;
			$data['data']['get'] = $this->mindex->config();
			$this->load->view("layout",$data);
		}
		public function update(){
			$id = $this->uri->segment(4);
			$val = array(
				"config_title" => $this->input->post("config_title"),
				"config_key"	=> $this->input->post("config_key"),
				"config_des"	=> $this->input->post("config_des"),
				"config_footer" => $this->input->post("config_footer")
			);
			if($_FILES['img']['name'] != NULL){
				  	$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size']	= '1200';
					$config['max_width']  = '400';
					$config['max_height']  = '400';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("img")){
						$data = array('error' => $this->upload->display_errors());
						$data['title'] = "System config";
						$data['template'] = "config/config";
						$data['data']['get'] = $this->mindex->config();
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$da = $this->upload->data();
						$val['config_logo'] = $da['file_name'];
					}			  
			  }
			//$this->debug($val);
			$this->mindex->update_config($val,$id);
			redirect(base_url()."admin/index");
		}
	}