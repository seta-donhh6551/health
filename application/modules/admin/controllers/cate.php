<?php
	require("libraries/student.php");
	class Cate extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("model_category");
			$this->load->model("mproducts");
			$this->load->library("string");
		}
		public function index(){
			$config['base_url'] = base_url().'admin/cate/index/';
			$config['total_rows'] = $this->model_category->count_all();
			$data['title']="Manage parent menu";
			$data['template'] = "cate/list_cate";
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['data'] = "";
			$data['act'] = 2;
			$data['listcate']= $this->model_category->listcate($config['per_page'],$start);
			$this->load->view("layout",$data);
		}
		public function active(){
			$id   	= $this->uri->segment(4);
			$status	= $this->uri->segment(5);
			$db = array(
				"cate_status" => $status 
			);
			$this->model_category->update_status($db,$id);
			redirect(base_url()."admin/cate/");
		}
		public function add(){
			$this->load->helper("form");
			$this->load->library("form_validation");
		  	$data['title']="Add new category";
			$data['template'] = "cate/add_cate";
			$data['data'] = "";
			$data['act'] = 2;
			if($this->input->post("ok") != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('cate_name'))));
				$value = array(
							"cate_name" => $this->input->post("cate_name"),
							"cate_rewrite" => $url,
							"cate_info" => $this->input->post("cate_info"),
							"cate_ext" => $this->input->post("cate_ext"),
							"cate_keys" => $this->input->post("cate_keys"),
							"cate_description" => $this->input->post("cate_description"),
							"cate_order" => $this->input->post("cate_order")
						);
				$check_cate = $this->model_category->checkcate($value['cate_name']);
				if($check_cate == TRUE){
					$data['error'] = "This category has been exits!";
					$this->load->view("layout",$data);
				}else{
					if($_FILES['images']['name'] != NULL){
						$config['upload_path'] = './uploads/cate';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['max_size']	= '1000';
						$config['max_width']  = '1050';
						$config['max_height']  = '1050';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("images")){
							$data = array('error' => $this->upload->display_errors());
							$data['title']="Add new category";
							$data['template'] = "cate/add_cate";
							$data['data'] = "";
							$data['act'] = 2;
							$this->load->view("layout",$data);
							return FALSE;
						}else{
							$data = $this->upload->data();
							$value['cate_images'] = $data['file_name'];
							$this->createThumbnail($value['cate_images']);
						}
					}
					$this->model_category->add($value);
					redirect(base_url()."admin/cate");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function updatemn(){
			$id = $this->uri->segment(4);
			$data['title']="Edit category";
			$data['template'] = "cate/edit_cate";
			$data['data'] = "";
			$data['act'] = 2;
			$data['list'] = $this->model_category->getcate($id);
			if($this->input->post("ok") != ""){
				$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('cate_name'))));
				$value = array(
							"cate_name" => $this->input->post("cate_name"),
							"cate_rewrite" => $url,
							"cate_info" => $this->input->post("cate_info"),
							"cate_keys" => $this->input->post("cate_keys"),
							"cate_description" => $this->input->post("cate_description"),
							"cate_ext" => $this->input->post("cate_ext"),
							"cate_order" => $this->input->post("cate_order")
						);
				$check_cate = $this->model_category->check_cate($value['cate_name'],$id);
				if($check_cate == TRUE){
					$data['error'] = "This category has been exits!";
					$this->load->view("layout",$data);
				}else{
					if($_FILES['images']['name'] != NULL){
						$config['upload_path'] = './uploads/cate';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['max_size']	= '1000';
						$config['max_width']  = '1050';
						$config['max_height']  = '1050';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("images")){
							$data = array('error' => $this->upload->display_errors());
							$data['title']="Edit category";
							$data['template'] = "cate/edit_cate";
							$data['data'] = "";
							$data['act'] = 2;
							$data['list'] = $this->model_category->getcate($id);
							$this->load->view("layout",$data);
							return FALSE;
						}else{
							$data = $this->upload->data();
							$value['cate_images'] = $data['file_name'];
							$this->createThumbnail($value['cate_images']);
						}
					}
					$this->model_category->updatemn($value,$id);
					redirect(base_url()."admin/cate/index");}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function delmn(){
			$id = $this->uri->segment(4);
			$data = $this->model_category->getcate($id);
			@unlink("uploads/cate/".$data['cate_images']);
			@unlink("uploads/cate/thumb/".$data['cate_images']);
			$this->model_category->delmn($id);
			redirect(base_url()."admin/cate/index");
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
			$config['width'] = 300;
			$config['height'] = 200;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}