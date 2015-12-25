<?php
require("libraries/student.php");
class Categorie extends Student{
	public function __construct(){
		parent::__construct();
		$this->load->model("model_categorie");
		$this->load->model("model_category");
		$this->load->library("string");
	}
	public function index(){
	  	$config['base_url'] = base_url().'admin/categorie/index/';
	  	$config['total_rows'] = $this->model_categorie->count_all();
	  	$data['title']= "Categories - sub menu";
	  	$data['template'] = "categories/list";
	  	$config['per_page'] = 10;
	  	$config['uri_segment'] = 4;
	  	$config['next_link'] = "Next";
	  	$config['prev_link'] = "Prev";
	  	$this->load->library("pagination");
	  	$this->pagination->initialize($config); 
	  	$start = $this->uri->segment(4);
	  	$data['data'] = "";
	  	$data['act'] = 3;
	  	$data['listall']= $this->model_categorie->listall($config['per_page'],$start);
	  	//$this->debug($data['listall']);
	  	$this->load->view("layout",$data);
	}
	public function active(){
		$id  = $this->uri->segment(4);
		$status	= $this->uri->segment(5);
		$db = array("status" => $status );
		$this->model_categorie->update($db,$id);
		redirect(base_url()."admin/categorie");
	}
	public function add(){
		$data['title'] = "Add new menu";
		$data['template'] = "categories/add";
		$data['data'] = "";
		$data['act'] = 3;
		$data['listcate'] = $this->model_category->listcate(30,0);
		if($this->input->post("ok") != ""){
			$url = str_replace(' ','-',strtolower($this->string->replace($this->input->post('name'))));
			$value = array(
				"name" => trim($_POST['name']),
				"title" => $this->input->post("title"),
				"rewrite" => $url,
				"shortinfo" => $this->input->post("shortinfo"),
				"keywords" => $this->input->post("keywords"),
				"description" => $this->input->post("description"),
				"datetime" => date("d/m/Y-H:i:s"),
				"order" => $this->input->post("order"),
				"type" => $this->input->post("type"),
				"cate_id" => $_POST['cate_id']
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
					$data['title'] = "Add new menu";
					$data['template'] = "categories/add";
					$data['data'] = "";
					$data['act'] = 3;
					$data['listcate'] = $this->model_category->listcate(30,0);
					$this->load->view("layout",$data);
					return FALSE;
				}else{
					$data = $this->upload->data();
					$value['image'] = $data['file_name'];
					$this->createThumbnail($value['image']);
				}
			}
			$this->model_categorie->add($value);
			redirect(base_url()."admin/categorie");
		}else{
			$this->load->view("layout",$data);
		}
	}
	public function update(){
		$id = $this->uri->segment(4);
		$data['title']= "Edit menu";
		$data['template'] = "categories/edit";
		$data['data'] = "";
		$data['act'] = 3;
		$data['result'] = $this->model_categorie->getdata($id);
		if($data['result'] == NULL){die();}
		$data['stt'] = $data['result']['cate_id'];
		$data['listcate'] = $this->model_category->listcate(30,0);
		//$this->debug($data['listcate']);
		if($this->input->post("ok") != ""){
			$url = str_replace(' ','-',strtolower($this->string->replace($this->input->post('name'))));
			$value = array(
				"name" => trim($_POST['name']),
				"title" => $this->input->post("title"),
				"rewrite" => $url,
				"shortinfo" => $this->input->post("shortinfo"),
				"keywords" => $this->input->post("keywords"),
				"description" => $this->input->post("description"),
				"datetime" => date("d/m/Y-H:i:s"),
				"order" => $this->input->post("order"),
				"type" => $this->input->post("type"),
				"cate_id" => $_POST['cate_id']
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
					$data['title']= "Edit menu";
					$data['template'] = "categories/edit";
					$data['data'] = "";
					$data['act'] = 3;
					$data['listcate'] = $this->model_category->listcate(30,0);
					$data['result'] = $this->model_categorie->getdata($id);
					$data['stt'] = $data['result']['cate_id'];
					$this->load->view("layout",$data);
					return FALSE;
				}else{
					$data = $this->upload->data();
					$value['image'] = $data['file_name'];
					$this->createThumbnail($value['image']);
				}
			}
			$this->model_categorie->update($value,$id);
			redirect(base_url()."admin/categorie");
		}else{
			$this->load->view("layout",$data);
		}
	}
	public function del(){
		$id = $this->uri->segment(4);
		$this->model_categorie->del($id);
		redirect(base_url()."admin/categorie");
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
		$config['width'] = 90;
		$config['height'] = 70;
		$this->image_lib->initialize($config); 
		$this->image_lib->resize();
		$this->image_lib->clear();
	}
}