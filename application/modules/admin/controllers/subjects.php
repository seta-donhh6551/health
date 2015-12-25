<?php
	require("libraries/student.php");
  	class Subjects extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->library("form_validation");
			$this->load->model("model_subject");
			$this->load->library("string");			
		}
		public function index(){
			$config['base_url'] = base_url().'admin/subjects/index/';
			$config['total_rows'] = $this->model_subject->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$config['cur_tag_open'] = '<span class="curpage">';
			$config['cur_tag_close'] = '</span>';
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title'] = "Khoá học PHP MYSQL";
			$data['act'] = 0;
			$data['data']['info']= $this->model_subject->listall($config['per_page'],$start);
			$data['template'] = "subjects/list_subject";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['title'] = "Khoá học PHP MYSQL";
			$data['template']  = "subjects/add_subject";
			$data['data'] = "";
			$data['act'] = 0;
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("subject_title","Tiêu đề","min_length[5]");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('subject_title'))));
					  $db = array(
							"subject_title"   	=> $this->input->post("subject_title"),
							"subject_rewrite"  => $url,					
							"subject_keys"	 => $this->input->post("subject_keys"),
							"subject_des"	 => $this->input->post("subject_des"), 
							"subject_info" 	=> $this->input->post("subject_info"),
							"subject_full"	=> $this->input->post("subject_full"),	
							"subject_order"	=> $this->input->post("subject_order")		
						);
						if($_FILES['img']['name'] != NULL){
							$config['upload_path'] = './uploads/news';
							$config['allowed_types'] = 'gif|jpg|jpeg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1024';
							$config['max_height']  = '1000';
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("img")){
								$data = array('error' => $this->upload->display_errors());
								$data['title'] = "Khoá học PHP MYSQL";
								$data['template']  = "subjects/add_subject";
								$data['data'] = "";
								$data['act'] = 0;
								$this->load->view("layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['subject_image'] = $data['file_name'];
								$this->createThumbnail($db['subject_image']);
							}
					}
					$this->model_subject->add($db);
				    redirect(base_url()."admin/subjects");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['title'] = "Khoá học PHP MYSQL";
			$data['template']  = "subjects/edit_subject";
			$data['data'] = "";
			$data['act'] = 0;
			$data['getdata'] = $this->model_subject->getdata($id);
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("subject_title","Tiêu đề","min_length[5]");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('subject_title'))));
					  $db = array(
							"subject_title"   	=> $this->input->post("subject_title"),
							"subject_rewrite"  => $url,		
							"subject_keys"	 => $this->input->post("subject_keys"),
							"subject_des"	 => $this->input->post("subject_des"), 					
							"subject_info" 	=> $this->input->post("subject_info"),
							"subject_full"	=> $this->input->post("subject_full"),	
							"subject_order"	=> $this->input->post("subject_order")
					  );
						if($_FILES['img']['name'] != NULL){
							$config['upload_path'] = './uploads/news';
							$config['allowed_types'] = 'gif|jpg|jpeg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1024';
							$config['max_height']  = '1000';
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("img")){
								$data = array('error' => $this->upload->display_errors());
								$data['title'] = "Khoá học PHP MYSQL";
								$data['template']  = "subjects/edit_subject";
								$data['data'] = "";
								$data['act'] = 0;
								$data['getdata'] = $this->model_subject->getdata($id);					
								$this->load->view("layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['subject_image'] = $data['file_name'];
								$this->createThumbnail($db['subject_image']);
							}
						 }
						 $this->model_subject->update($db,$id);
						 redirect(base_url()."admin/subjects");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$data = $this->model_subject->getdata($id);
			@unlink("./uploads/news/".$data['subject_image']);
			$this->model_subject->del($id);
			redirect(base_url()."admin/articles");
		}
		public function createThumbnail($fileName){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/news/'.$fileName;
			$config['new_image'] = 'uploads/news/thumb/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = 160;
			$config['height'] = 160;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}
