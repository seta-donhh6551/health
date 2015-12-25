<?php
	require("libraries/student.php");
	class Content extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("model_content");
			$this->load->helper(array("form","date"));
			$this->load->library("form_validation");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] = base_url().'admin/content/index/';
			$config['total_rows'] = $this->model_content->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title'] = "Quản lý tin tức";
			$data['template'] = "content/list_con";
			$data['data']['info']= $this->model_content->listall($config['per_page'],$start);
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['error'] = "";
			$data['title'] = "Thêm mới tin tức";
			$data['template'] = "content/add_con";
			$data['data'] = "";
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("con_title","Tiêu đề nội dung","min_length[5]|required");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $title = trim($this->input->post('con_title'));
					  $url = str_replace(' ', '-',strtolower($this->string->replace($title)));
					  $db = array(
							"con_title" => $this->input->post("con_title"),
							"con_rewrite" => $url,
							"con_author" => $this->input->post("con_author"),
							"con_keys"  => $this->input->post("con_keys"),	
							"con_des"	=> $this->input->post("con_des"),	
							"con_info" => $this->input->post("con_info"),
							"con_full" => $this->input->post("con_full"),
							"con_status" => 1,
							"con_date"	=> date("d/m/Y H:i:s")				
						);
					if($_FILES['img']['name'] != NULL){
						$config['upload_path'] = './uploads/news';
						$config['allowed_types'] = '*';
						$config['max_size']	= '2000';
						$config['max_width']  = '1024';
						$config['max_height']  = '1024';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("img")){
							$data = array('error' => $this->upload->display_errors());
							$data['title'] = "Thêm mới tin tức";
							$data['template'] = "content/add_con";
							$data['data'] = "";
							$this->load->view("layout",$data);
						}else{
							$data = $this->upload->data();
							$db['con_image'] = $data['file_name'];
							$this->createThumbnail("uploads/news",$db['con_image'],170,160);
						}
					 }
					$this->model_content->add($db);
				    redirect(base_url()."admin/content");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['error'] = "";
			$data['title'] = "Sửa nội dung";
			$data['template'] = "content/edit_con";
			$data['data']['get'] = $this->model_content->getdata($id);
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("con_title","Tiêu đề nội dung","min_length[5]|required");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $title = trim($this->input->post('con_title'));
					  $url = str_replace(' ', '-',strtolower($this->string->replace($title)));
					  $db = array(
							"con_title" => $this->input->post("con_title"),
							"con_rewrite" => $url,
							"con_author" => $this->input->post("con_author"),
							"con_keys"  => $this->input->post("con_keys"),	
							"con_des"	=> $this->input->post("con_des"),	
							"con_info" => $this->input->post("con_info"),
							"con_full" => $this->input->post("con_full"),
							"con_status" => 1,
							"con_date"	=> date("d/m/Y H:i:s")				
						);
					if($_FILES['img']['name'] != NULL){
						$config['upload_path'] = './uploads/news';
						$config['allowed_types'] = '*';
						$config['max_size']	= '2000';
						$config['max_width']  = '1024';
						$config['max_height']  = '1024';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("img")){
							$data = array('error' => $this->upload->display_errors());
							$data['title'] = "Sửa tin tức";
							$data['template'] = "content/edit_con";
							$data['data']['get'] = $this->model_content->getdata($id);
							$this->load->view("layout",$data);
						}else{
							$data = $this->upload->data();
							$db['con_image'] = $data['file_name'];
							$this->createThumbnail("uploads/news",$db['con_image'],170,160);
						}
					}
					$this->model_content->update($db,$id);
					redirect(base_url()."admin/content");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$data = $this->model_content->getdata($id);
			@unlink("uploads/news/".$data['con_image']);
			@unlink("uploads/news/thumb/".$data['con_image']);
			$this->model_content->del($id);
			redirect(base_url()."admin/content");
		}
		public function createThumbnail($parth,$fileName,$width,$height){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $parth.'/'.$fileName;
			$config['new_image'] = $parth.'/thumb/'.$fileName;
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