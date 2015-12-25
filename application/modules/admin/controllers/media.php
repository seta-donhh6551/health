<?php
	require("libraries/student.php");
	class Media extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("mindex");
		}
		public function index(){
			$config['base_url'] = base_url().'admin/media/index/';
			$config['total_rows'] = $this->mindex->count_all_media();
			$data['title']="Quản lý media";
			$data['template'] = "media/list_media";
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['data']['info']= $this->mindex->list_media($config['per_page'],$start);
			$this->load->view("layout",$data);
		}
		public function add(){
		  	$data['title']="Thêm mới video";
			$data['template'] = "media/add_media";
			$data['data'] = "";
			if($this->input->post("ok") != ""){
				$db = array(
					"m_name" => $this->input->post("name"),
					"m_link" => $this->input->post("video")
				);
				$this->mindex->add_media($db);
				redirect(base_url()."admin/media/index");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$this->mindex->del($id);
			redirect(base_url()."admin/media/index");
		}
	}