<?php
	require("libraries/student.php");
	class Customer extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("model_customer");
			$this->load->library("string");
			$this->load->helper("form");
			$this->load->library("form_validation");	
		}
		public function index(){
			$config['base_url'] = base_url().'admin/customer/index/';
			$config['total_rows'] = $this->model_customer->count_all();
			$data['title']="Quản lý khách hàng";
			$data['template'] = "customer/list_customer";
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['data'] = "";
			$data['info']= $this->model_customer->listall($config['per_page'],$start);
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['error'] = "";
			$data['title'] = "Thêm mới khách hàng";
			$data['template'] = "customer/add_customer";
			$data['listcate'] = $this->model_customer->listcate();
			$data['data']['info'] = "";
			if($this->input->post("ok") != ""){
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('pro_name'))));
					  $db = array(
							"customer_name" => $this->input->post("customer_name"),
							"customer_user" => $this->input->post("customer_user"),
							"customer_address" => $this->input->post("customer_address"),
							"customer_url" => $this->input->post("customer_url"),
							"customer_info" => $this->input->post("customer_info"),
							"customer_order" => $this->input->post("customer_order"),
							"cate_id" => $this->input->post("cate_id")
						);
					if($_FILES['img']['name'] != NULL){
								$config['upload_path'] = './uploads/customer';
								$config['allowed_types'] = 'jpg|jpeg|gif|png';
								$config['max_size']	= '2000';
								$config['max_width']  = '1024';
								$config['max_height']  = '1000';
								$this->load->library('upload',$config);
								if(!$this->upload->do_upload("img")){
									$data = array('error' => $this->upload->display_errors());
									$data['title'] = "Thêm mới khách hàng";
									$data['template'] = "customer/add_customer";
									$data['listcate'] = $this->model_customer->listcate();
									$data['data']['info'] = "";
									$this->load->view("layout",$data);
									return FALSE;
								}else{
									$data = $this->upload->data();
									$db['customer_image'] = $data['file_name'];
									$this->createThumbnail($db['customer_image'],"120","85");
								}
					 }
					 if($_FILES['avatar']['name'] != NULL){
								$config['upload_path'] = './uploads/customer';
								$config['allowed_types'] = 'jpg|jpeg|gif|png';
								$config['max_size']	= '2000';
								$config['max_width']  = '1024';
								$config['max_height']  = '1000';
								$this->load->library('upload',$config);
								if(!$this->upload->do_upload("avatar")){
									$data = array('error' => $this->upload->display_errors());
									$data['title'] = "Thêm mới khách hàng";
									$data['template'] = "customer/add_customer";
									$data['data']['info'] = "";
									$this->load->view("layout",$data);
									return FALSE;
								}else{
									$data = $this->upload->data();
									$db['customer_avatar'] = $data['file_name'];
									$db['customer_status'] = "1";
									$this->createThumbnail($db['customer_avatar'],"150","150");
								}
					 }
					 if($_FILES['website']['name'] != NULL){
								$config['upload_path'] = './uploads/customer';
								$config['allowed_types'] = 'jpg|jpeg|gif|png';
								$config['max_size']	= '2000';
								$config['max_width']  = '1624';
								$config['max_height']  = '1400';
								$this->load->library('upload',$config);
								if(!$this->upload->do_upload("website")){
									$data = array('error' => $this->upload->display_errors());
									$data['title'] = "Thêm mới khách hàng";
									$data['template'] = "customer/add_customer";
									$data['data']['info'] = "";
									$this->load->view("layout",$data);
									return FALSE;
								}else{
									$data = $this->upload->data();
									$db['customer_website'] = $data['file_name'];
									$db['customer_active'] = "1";
									$this->createThumbnail($db['customer_website'],"230","180");
								}
					 }
					 $this->model_customer->add($db);
					 redirect(base_url()."admin/customer/index");	
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['error'] = "";
			$data['title'] = "Sửa thông tin khách hàng";
			$data['template'] = "customer/edit_customer";
			$data['listcate'] = $this->model_customer->listcate();
			$data['info'] = $this->model_customer->getdata($id);
			$data['data'] = "vl";
			$data['stt']  = $data['info']['cate_id'];
			if($this->input->post("ok") != ""){
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('pro_name'))));
					  $db = array(
							"customer_name" => $this->input->post("customer_name"),
							"customer_user" => $this->input->post("customer_user"),
							"customer_address" => $this->input->post("customer_address"),
							"customer_url" => $this->input->post("customer_url"),
							"customer_info" => $this->input->post("customer_info"),
							"customer_order" => $this->input->post("customer_order"),
							"cate_id" => $this->input->post("cate_id")
						);
					if($_FILES['img']['name'] != NULL){
								$config['upload_path'] = './uploads/customer';
								$config['allowed_types'] = 'jpg|jpeg|gif|png';
								$config['max_size']	= '2000';
								$config['max_width']  = '1024';
								$config['max_height']  = '1000';
								$this->load->library('upload',$config);
								if(!$this->upload->do_upload("img")){
									$data = array('error' => $this->upload->display_errors());
									$data['title'] = "Sửa thông tin khách hàng";
									$data['template'] = "customer/edit_customer";
									$data['listcate'] = $this->model_customer->listcate();
									$data['data']['info'] = $this->model_customer->getdata($id);
									$this->load->view("layout",$data);
									return FALSE;
								}else{
									$data = $this->upload->data();
									$db['customer_image'] = $data['file_name'];
									$this->createThumbnail($db['customer_image'],"120","85");
								}
					 }
					 if($_FILES['avatar']['name'] != NULL){
								$config['upload_path'] = './uploads/customer';
								$config['allowed_types'] = 'jpg|jpeg|gif|png';
								$config['max_size']	= '2000';
								$config['max_width']  = '1024';
								$config['max_height']  = '1000';
								$this->load->library('upload',$config);
								if(!$this->upload->do_upload("avatar")){
									$data = array('error' => $this->upload->display_errors());
									$data['title'] = "Thêm mới khách hàng";
									$data['template'] = "customer/add_customer";
									$data['listcate'] = $this->model_customer->listcate();
									$data['data']['info'] = "";
									$this->load->view("layout",$data);
									return FALSE;
								}else{
									$data = $this->upload->data();
									$db['customer_avatar'] = $data['file_name'];
									$db['customer_status'] = "1";
									$this->createThumbnail($db['customer_avatar'],"150","150");
								}
					 }
					 if($_FILES['website']['name'] != NULL){
								$config['upload_path'] = './uploads/customer';
								$config['allowed_types'] = 'jpg|jpeg|gif|png';
								$config['max_size']	= '2000';
								$config['max_width']  = '1624';
								$config['max_height']  = '1400';
								$this->load->library('upload',$config);
								if(!$this->upload->do_upload("website")){
									$data = array('error' => $this->upload->display_errors());
									$data['title'] = "Thêm mới khách hàng";
									$data['template'] = "customer/add_customer";
									$data['listcate'] = $this->model_customer->listcate();
									$data['data']['info'] = "";
									$this->load->view("layout",$data);
									return FALSE;
								}else{
									$data = $this->upload->data();
									$db['customer_website'] = $data['file_name'];
									$db['customer_active'] = "1";
									$this->createThumbnail($db['customer_website'],"230","180");
								}
					 }
					 $this->model_customer->update($db,$id);
					 redirect(base_url()."admin/customer/index");	
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$data = $this->model_customer->getdata($id);
			@unlink("uploads/customer/".$data['customer_image']);
			@unlink("uploads/customer/thumb/".$data['customer_image']);
			@unlink("uploads/customer/".$data['customer_avatar']);
			@unlink("uploads/customer/thumb/".$data['customer_avatar']);
			$this->model_customer->del($id);
			redirect(base_url()."admin/customer");
		}
		public function createThumbnail($fileName,$width,$height){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/customer/'.$fileName;
			$config['new_image'] = 'uploads/customer/thumb/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
		public function Thumbnail($fileName){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/customer/'.$fileName;
			$config['new_image'] = 'uploads/customer/thumb/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = 150;
			$config['height'] = 150;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}