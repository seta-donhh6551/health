<?php
	require("libraries/student.php");
  	class Slideshow extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->library("form_validation");
			$this->load->model("model_slide");
		}
		public function index(){
			$config['base_url'] = base_url().'admin/slideshow/index/';
			$config['total_rows'] = $this->model_slide->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Previous";
			$config['cur_tag_open'] = "<span class='curpage'>";
			$config['cur_tag_close'] = "</span>";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title']="Quản lý slideshow";
			$data['data']['info']= $this->model_slide->listall($config['per_page'],$start);
			$data['template'] = "slideshow/list_slide";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['error'] = "";
			$data['title'] = "Thêm mới slideshow";
			$data['template'] = "slideshow/add_slide";
			if($this->input->post("ok") != ""){
				  $db = array(
						"slide_title" => $this->input->post("slide_title"),
						"slide_" => $this->input->post("pro_info"),
						"pro_full" => $this->input->post("pro_full"),
						"pro_price" => $this->input->post("pro_price"),
						"pro_location" => $this->input->post("pro_location"),
						"pro_war" => $this->input->post("pro_war"),
						"pro_ship" => $this->input->post("pro_ship"),
						"cate_id" => $this->input->post("pro_cate")
					);
				if($_FILES['img']['name'] != NULL){
					$config['upload_path'] = './uploads/products';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '1024';
					$config['max_height']  = '1000';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("img")){
						$data = array('error' => $this->upload->display_errors());
						$data['title'] = "Thêm mới sản phẩm";
						$data['template'] = "products/add_products";
						$data['data']['info'] = $this->mproducts->getcate();
						$this->load->view("layout",$data);
						return FALSE;
					}else{
						$data = $this->upload->data();
						$db['pro_images'] = $data['file_name'];
						$this->createThumbnail($db['pro_images']);
					}
				 $this->mproducts->add_pro($db);
				 redirect(base_url()."admin/products/index");				}
			}else{
				$this->load->view("layout",$data);
			}
		}
	}