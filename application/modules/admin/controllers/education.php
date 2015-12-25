<?php
require("libraries/student.php");
class Education extends Student{
	public function __construct(){
		parent::__construct();
		$this->load->model("model_education");
		$this->load->helper("form");
		$this->load->library("form_validation");
		$this->load->library("string");
	}
	public function index(){
		$config['base_url'] = base_url().'admin/education/index/';
		$config['total_rows'] = $this->model_education->count_all();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['next_link'] = "Next";
		$config['prev_link'] = "Prev";
		$this->load->library("pagination");
		$this->pagination->initialize($config); 
		$start = $this->uri->segment(4);
		$data['data'] = "";
		$data['act'] = 3;
		$data['title'] = "Lịch các môn học";
		$data['template'] = "education/list_edu";
		$data['listall']= $this->model_education->listall($config['per_page'],$start);
		$this->load->view("layout",$data);
	}
	public function active(){
		$id   	= $this->uri->segment(4);
		$status	= $this->uri->segment(5);
		$db = array(
			"education_status" => $status 
		);
		$this->model_education->update_status($db,$id);
		redirect(base_url()."admin/education/");
	}
	public function add(){
		$data['title'] = "Lịch các môn học";
		$data['template'] = "education/add_edu";
		$data['data'] = "";
		$data['act'] = 3;
		if($this->input->post("ok") != ""){
			$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('education_title'))));
			$value = array(
						"education_title" => $this->input->post("education_title"),
						"education_rewrite" => $url,
						"education_info" => $this->input->post("education_info"),
						"education_full" => $this->input->post("education_full"),
						"education_order" => $this->input->post("education_order")
					);
			if($_FILES['image']['name'] != NULL){
				$config['upload_path'] = './uploads/cate';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size']	= '1000';
				$config['max_width']  = '750';
				$config['max_height']  = '750';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload("image")){
					$data = array('error' => $this->upload->display_errors());
					$data['title'] = "Lịch các môn học";
					$data['template'] = "education/add_edu";
					$data['data'] = "";
					$data['act'] = 3;
					$this->load->view("layout",$data);
					return FALSE;
				}else{
					$data = $this->upload->data();
					$value['education_image'] = $data['file_name'];
					//$this->createThumbnail($value['education_image']);
				}
			}
			$this->model_education->add($value);
			redirect(base_url()."admin/education");
		}else{
			$this->load->view("layout",$data);
		}
	}
	public function update(){
		$id = $this->uri->segment(4);
		$data['title']= "Lịch các môn học";
		$data['template'] = "education/edit_edu";
		$data['data'] = "";
		$data['act'] = 3;
		$data['list'] = $this->model_education->getdata($id);
		if($this->input->post("ok") != ""){
			$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('education_title'))));
			$value = array(
						"education_title" => $this->input->post("education_title"),
						"education_rewrite" => $url,
						"education_info" => $this->input->post("education_info"),
						"education_full" => $this->input->post("education_full"),
						"education_order" => $this->input->post("education_order")
			);
			$this->model_education->update($value,$id);
			redirect(base_url()."admin/education");
		}else{
			$this->load->view("layout",$data);
		}
	}
	public function del(){
		$id = $this->uri->segment(4);
		$data = $this->model_education->getdata($id);
		@unlink("uploads/education/".$data['education_image']);
		@unlink("uploads/education/thumb/".$data['education_image']);
		$this->model_education->del($id);
		redirect(base_url()."admin/education");
	}
	public function createThumbnail($fileName){
		$this->load->library('image_lib');
		//$this->load->helper('thumbnail_helper');
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'uploads/cate/'.$fileName;
		$config['new_image'] = 'uploads/cate/thumb/'.$fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['thumb_marker'] = FALSE;
		$config['width'] = 130;
		$config['height'] = 130;
		$this->image_lib->initialize($config); 
		$this->image_lib->resize();
		$this->image_lib->clear();
	}
}