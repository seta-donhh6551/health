<?php
	require("libraries/student.php");
  	class Intro extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->library("form_validation");
			$this->load->library("string");
			$this->load->model("mindex");			
		}
		public function index(){
			$data['title']="Introduction about Worldgadget";
			$data['template'] = "introduction/intro";
			$data['act'] = 6;
			$data['data']['intro']= $this->mindex->intro();
			$this->load->view("layout",$data);
		}
		public function add(){
		  	$data['title']="Thêm mới";
			$data['template'] = "introduction/add_intro";
			$data['data'] = "";
			if($this->input->post("ok") != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('in_name'))));
				$value = array(
							"in_name" => $this->input->post("in_name"),
							"in_name_rewrite" => $url,
							"in_value" =>$this->input->post("in_name"),
							"in_order" => $this->input->post("in_order")
						);
					if($_FILES['images']['name'] != NULL){
						$config['upload_path'] = './uploads/news';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['max_size']	= '1000';
						$config['max_width']  = '750';
						$config['max_height']  = '750';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("images")){
							$data = array('error' => $this->upload->display_errors());
							$data['title']="Thêm mới";
							$data['template'] = "introduction/add_intro";
							$data['data'] = "";
							$this->load->view("layout",$data);
							return FALSE;
						}else{
							$data = $this->upload->data();
							$value['in_images'] = $data['file_name'];
						}
					}
					$this->mindex->add_intro($value);
					redirect(base_url()."admin/gt");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['title'] = "Sửa bài viết";
			$data['template'] = "introduction/edit_intro";
			$data['data'] = "";
			$data['list'] = $this->mindex->intro($id);
			if($this->input->post("ok") != ""){
				//$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('in_name'))));
				$value = array(
							"intro_full" => $this->input->post("intro_full")
						);
					$this->mindex->update_intro($value,$id);
					redirect(base_url()."admin/index");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del($id){
			$id = $this->uri->segment(4);
			$data = $this->mindex->intro($id);
			@unlink("uploads/news/".$data['in_images']);
			$this->mindex->del($id);
			redirect(base_url()."admin/gt");
			exit();
		}
	}