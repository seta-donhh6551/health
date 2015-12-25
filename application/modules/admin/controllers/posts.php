<?php
	require("libraries/student.php");
  	class Posts extends Student{
		protected $_userid = 0;
		public function __construct(){
			parent::__construct();
			$this->_userid = $this->session->userdata("ses_userid");
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->library("form_validation");
			$this->load->model("mposts");
			$this->load->library("string");			
		}
		public function index(){
			$config['base_url'] = base_url().'admin/posts/index/';
			$config['total_rows'] = $this->mposts->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$config['cur_tag_open'] = '<span class="curpage">';
			$config['cur_tag_close'] = '</span>';
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title']="Manage articles";
			$data['act'] = 5;
			$data['data']['info']= $this->mposts->listall($config['per_page'],$start);
			$data['template'] = "posts/list_post";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['title'] = "Add new articles";
			$data['template']  = "posts/add_posts";
			$data['data'] = "";
			$data['act'] = 5;
			$data['listtypes'] = $this->mposts->listtypes();
			$data['listcate'] = $this->mposts->listcate();			
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("post_title","Tiêu đề","min_length[5]");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('post_title'))));
					  $db = array(
							"post_title"   	=> $this->input->post("post_title"),
							"post_title_rewrite"  => $url,							
							"post_author" 	=> $this->input->post("post_author"),
							"post_source" 	=> $this->input->post("post_source"),
							"post_shotinfo" => $this->input->post("post_shotinfo"),						
							"post_info" 	=> $this->input->post("post_info"),
							"post_value"	=> $this->input->post("post_value"),		
							"post_date"    	=> date("Y-m-d H:i:s"),
							"post_keys"     => $this->input->post("post_keys"),		
							"post_des"		=> $this->input->post("post_des"),
							"type_id"		=> $this->input->post("type_id"),
							"cate_id"		=> $this->input->post("cate_id"),
							"cago_id"		=> $this->input->post("cago_id"),
							"user_id" => $this->_userid
						);
					if($this->mposts->checkpost($db['post_title']) == FALSE){
						$data['error'] = "This articles has been exits!";
						$this->load->view("layout",$data);
					}else{
						if($_FILES['img']['name'] != NULL){
							$config['upload_path'] = './uploads/hanews';
							$config['allowed_types'] = 'gif|jpg|jpeg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1624';
							$config['max_height']  = '1600';
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("img")){
								$data = array('error' => $this->upload->display_errors());
								$data['title'] = "Add new articles";
								$data['template']  = "posts/add_posts";
								$data['data'] = "";
								$data['listtypes'] = $this->mposts->listtypes();
								$data['act'] = 5;
								$data['listcate'] = $this->mposts->listcate();
								$this->load->view("layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['post_image'] = $data['file_name'];
								$this->createThumbnail($db['post_image']);
							}
						 }
						 if($_FILES['imgact']['name'] != NULL){
							$config['upload_path'] = './uploads/hanews';
							$config['allowed_types'] = 'gif|jpg|jpeg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1624';
							$config['max_height']  = '1600';
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("imgact")){
								$data = array('error' => $this->upload->display_errors());
								$data['title'] = "Edit articles";
								$data['template']  = "posts/edit_posts";
								$data['data'] = "";
								$data['act'] = 5;
								$data['listtypes'] = $this->mposts->listtypes();
								$data['get'] = $this->mposts->getdata($id);
								$data['stt'] = $data['get']['post_id'];
								$data['listcate'] = $this->mposts->listcate();							
								$this->load->view("layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['post_picture'] = $data['file_name'];
								//$this->createThumbnail($db['post_image']);
							}
						 }
						 $this->mposts->add($db);
						 redirect(base_url()."admin/posts/index");
					}
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['title'] = "Edti articles";
			$data['template']  = "posts/edit_posts";
			$data['data'] = "";
			$data['act'] = 5;
			$data['get'] = $this->mposts->getdata($id);
			$data['stt'] = $data['get']['cate_id'];
			$data['listcate'] = $this->mposts->listcate();
			$data['listtypes'] = $this->mposts->listtypes();
			//$this->debug($data['listtypes']);
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("post_title","Tiêu đề","min_length[5]");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('post_title'))));
					  $db = array(
							"post_title"   	=> $this->input->post("post_title"),
							"post_title_rewrite"   	=> $url,
							"post_author" 	=> $this->input->post("post_author"),
							"post_source" 	=> $this->input->post("post_source"),						
							"post_info" 	=> $this->input->post("post_info"),
							"post_shotinfo" => $this->input->post("post_shotinfo"),
							"post_value"	=> $this->input->post("post_value"),		
							"post_date"    	=> date("Y-m-d H:i:s"),
							"post_keys"     => $this->input->post("post_keys"),		
							"post_des"		=> $this->input->post("post_des"),
							"type_id"		=> $this->input->post("type_id"),
							"cate_id"		=> $this->input->post("cate_id"),
							"cago_id"		=> $this->input->post("cago_id"),
							"user_id" => $this->_userid
					  );
					if($this->mposts->checkpost($db['post_title'],$id) == FALSE){
						$data['error'] = "This articles has been exits!";
						$this->load->view("layout",$data);
					}else{
						if($_FILES['img']['name'] != NULL){
							$config['upload_path'] = './uploads/hanews';
							$config['allowed_types'] = 'gif|jpg|jpeg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1624';
							$config['max_height']  = '1600';
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("img")){
								$data = array('error' => $this->upload->display_errors());
								$data['title'] = "Edit articles";
								$data['template']  = "posts/edit_posts";
								$data['data'] = "";
								$data['act'] = 5;
								$data['listtypes'] = $this->mposts->listtypes();
								$data['get'] = $this->mposts->getdata($id);
								$data['stt'] = $data['get']['post_id'];
								$data['listcate'] = $this->mposts->listcate();							
								$this->load->view("layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['post_image'] = $data['file_name'];
								$this->createThumbnail($db['post_image']);
							}
						 }
						 if($_FILES['imgact']['name'] != NULL){
							$config['upload_path'] = './uploads/hanews';
							$config['allowed_types'] = 'gif|jpg|jpeg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1624';
							$config['max_height']  = '1600';
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("imgact")){
								$data = array('error' => $this->upload->display_errors());
								$data['title'] = "Edit articles";
								$data['template']  = "posts/edit_posts";
								$data['data'] = "";
								$data['act'] = 5;
								$data['listtypes'] = $this->mposts->listtypes();
								$data['get'] = $this->mposts->getdata($id);
								$data['stt'] = $data['get']['post_id'];
								$data['listcate'] = $this->mposts->listcate();							
								$this->load->view("layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['post_picture'] = $data['file_name'];
								//$this->createThumbnail($db['post_image']);
							}
						 }
						 $this->mposts->update($db,$id);
						 redirect(base_url()."admin/posts/index");
						
					}
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$data = $this->mposts->getdata($id);
			@unlink("./uploads/news/".$data['post_image']);
			$this->mposts->del($id);
			redirect(base_url()."admin/posts");
		}
		public function check_news($news){
			$id = $this->uri->segment(4);
			if($this->mposts->check_news($news,$id) == FALSE){
				$this->form_validation->set_message("check_news","This articles has been exits!");
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function getcago(){
			$id = $_POST['cateid'];
			$listcago = $this->mposts->listcago($id);
			if($listcago != NULL){
				echo "<option value='0'>- Select -</option>";
				foreach($listcago as $items){
					echo "<option value='$items[id]'>$items[name]</option>";
				}
			}else{
				echo "<option value='0'>- Select -</option>";
			}
		}
		public function cagorther(){
			$id = $_POST['cateid'];
			$cagoid = $_POST['cagoid'];
			$listcago = $this->mposts->listcago($id);
			echo "<option value='0'>- Select -</option>";
			foreach($listcago as $items){
				echo "<option value='$items[id]'";
				if($cagoid == $items['id']){ echo "selected='selected'" ;}
				echo ">$items[name]</option>";
			}
		}
		public function createThumbnail($fileName){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/hanews/'.$fileName;
			$config['new_image'] = 'uploads/hanews/thumb/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = 160;
			$config['height'] = 120;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}