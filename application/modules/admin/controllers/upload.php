<?php
  require("libraries/student.php");
	class Upload extends Student{
	  public function __construct(){
		  parent::__construct();
		  $this->load->helper("url");
		  $this->load->helper("form");
		  $this->load->library("form_validation");
		  $this->load->model("mfile");
	  }
	  public function index(){
		  $data['title'] = "Upload file";
		  $data['template'] = "file/upload_view";
		  $data['data']['info'] = "";
		  if($this->input->post("ok") != ""){
			  if($_FILES['filename']['name'] != NULL){
				  	$config['upload_path'] = './uploads/data/';
					$config['allowed_types'] = '*';
					$config['max_size']	= '4000';
					$config['max_width']  = '1024';
					$config['max_height']  = '1000';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload("filename")){
						$data = array('error' => $this->upload->display_errors());
						$data['title'] = "Upload file";
						$data['template'] = "file/upload_view";
						$data['data'] = "";
						$this->load->view("layout",$data);
					}else{
						$da = $this->upload->data();
						$insert = array(
										"file_name" => $da['file_name'],
										"file_link" => base_url()."uploads/data/".$da['file_name']
									);
						$this->mfile->add($insert);
						redirect(base_url()."admin/upload/listup");
					}			  
			  }else{
				  $data['error'] = "Bạn chưa chọn file";
				  $this->load->view("layout",$data);
		  	  }
		  }else{
			  $this->load->view("layout",$data);
		  }
	  }
	  public function listup(){
		   $config['base_url'] = base_url().'admin/upload/listup/';
			$config['total_rows'] = $this->mfile->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['data']['info'] = "";
			$data['title']="Quản lý file upload";
			$data['data']['info']= $this->mfile->listall($config['per_page'],$start);
			$data['template'] = "file/list_up";
			$this->load->view("layout",$data);
	  }
	  public function del(){
		  $id = $this->uri->segment(4);
		  $data = $this->mfile->getdata($id);
		  $this->mfile->del($id,$data);
		  redirect(base_url()."admin/upload/listup");
	  }
  }