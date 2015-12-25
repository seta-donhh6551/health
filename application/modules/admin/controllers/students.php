<?php
	require("libraries/student.php");
	class Students extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("model_student");
			$this->load->library("string");
			$this->load->helper("form");
			$this->load->library("form_validation");	
		}
		public function index(){
			$config['base_url'] = base_url().'admin/students/index/';
			$config['total_rows'] = $this->model_student->count_all();
			$data['title'] = "Ý kiến học viên";
			$data['template'] = "students/list_student";
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['data'] = "";
			$data['info']= $this->model_student->listall($config['per_page'],$start);
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['error'] = "";
			$data['data']  = "";
			$data['title'] = "Ý kiến học viên";
			$data['template'] = "students/add_student";
			if($this->input->post("ok") != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('student_name'))));
				$db = array(
					"student_name" => $this->input->post("student_name"),
					"student_phone" => $this->input->post("student_phone"),
					"student_email" => $this->input->post("student_email"),
					"student_add" => $this->input->post("student_add"),
					"student_face" => $this->input->post("student_face"),
					"student_info" => $this->input->post("student_info"),
				);
				if($_FILES['avatar']['name'] != NULL){
					$config['upload_path'] = './uploads/students';
					$config['allowed_types'] = 'jpg|jpeg|gif|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '1024';
					$config['max_height']  = '1000';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("avatar")){
						$data = array('error' => $this->upload->display_errors());
						$data['data']  = "";
						$data['title'] = "Ý kiến học viên";
			  			$data['template'] = "students/add_student";
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$data = $this->upload->data();
						$db['student_avatar'] = $data['file_name'];
						$this->createThumbnail($db['student_avatar'],"150","150");
					}
				}
				$this->model_student->add($db);
				redirect(base_url()."admin/students/index");	
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['error'] = "";
			$data['title'] = "Ý kiến học viên";
			$data['template'] = "students/edit_student";
			$data['info'] = $this->model_student->getdata($id);
			$data['data'] = "vl";
			if($this->input->post("ok") != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('student_name'))));
				$db = array(
					"student_name" => $this->input->post("student_name"),
					"student_phone" => $this->input->post("student_phone"),
					"student_email" => $this->input->post("student_email"),
					"student_add" => $this->input->post("student_add"),
					"student_face" => $this->input->post("student_face"),
					"student_info" => $this->input->post("student_info"),
					"student_status" => $this->input->post("student_status"),
				);
				if($_FILES['avatar']['name'] != NULL){
					$config['upload_path'] = './uploads/students';
					$config['allowed_types'] = 'jpg|jpeg|gif|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '1024';
					$config['max_height']  = '1000';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("avatar")){
						$data = array('error' => $this->upload->display_errors());
						$data['title'] = "Ý kiến học viên";
						$data['template'] = "students/edit_student";
						$data['data']['info'] = $this->model_student->getdata($id);
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$data = $this->upload->data();
						$db['student_avatar'] = $data['file_name'];
						$this->createThumbnail($db['student_avatar'],"150","150");
					}
				}
				$this->model_student->update($db,$id);
				redirect(base_url()."admin/students/index");	
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$data = $this->model_student->getdata($id);
			@unlink("uploads/students/".$data['student_avatar']);
			@unlink("uploads/students/thumb/".$data['student_avatar']);
			$this->model_student->del($id);
			redirect(base_url()."admin/students");
		}
		public function createThumbnail($fileName,$width,$height){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/students/'.$fileName;
			$config['new_image'] = 'uploads/students/thumb/'.$fileName;
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