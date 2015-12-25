<?php
	require("libraries/student.php");
  	class Articles extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->helper("form");
			$this->load->library("form_validation");
			$this->load->model("model_articles");
			$this->load->library("string");			
		}
		public function index(){
			$config['base_url'] = base_url().'admin/articles/index/';
			$config['total_rows'] = $this->model_articles->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$config['cur_tag_open'] = '<span class="curpage">';
			$config['cur_tag_close'] = '</span>';
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title'] = "Menu home";
			$data['act'] = 1;
			$data['data']['info']= $this->model_articles->listall($config['per_page'],$start);
			$data['template'] = "articles/list_articles";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['title'] = "Menu home";
			$data['template']  = "articles/add_articles";
			$data['data'] = "";
			$data['act'] = 1;
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("article_title","Tiêu đề","min_length[5]");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('article_title'))));
					  $db = array(
							"article_title"   	=> $this->input->post("article_title"),
							"article_title_rewrite"  => $url,							
							"article_info" 	=> $this->input->post("article_info"),
							"article_full"	=> $this->input->post("article_value"),		
							"article_date"    	=> date("d/m/Y - h:i:s"),
							"article_order"  => $this->input->post("article_order")		
						);
						if($_FILES['img']['name'] != NULL){
							$config['upload_path'] = './uploads/news';
							$config['allowed_types'] = 'gif|jpg|jpeg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1024';
							$config['max_height']  = '1000';
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("img")){
								$data = array('error' => $this->upload->display_errors());
								$data['title'] = "Thêm bài viết";
								$data['template']  = "articles/add_articles";
								$data['data'] = "";
								$data['act'] = 1;
								$this->load->view("layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['article_image'] = $data['file_name'];
								$this->createThumbnail($db['article_image']);
							}
					}
					$this->model_articles->add($db);
				    redirect(base_url()."admin/articles/index");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['title'] = "Sửa bài viết";
			$data['template']  = "articles/edit_articles";
			$data['data'] = "";
			$data['act'] = 1;
			$data['get'] = $this->model_articles->getdata($id);
			$data['listcate'] = $this->model_articles->listcate();
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("article_title","Tiêu đề","min_length[5]");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('article_title'))));
					  $db = array(
							"article_title"   	=> $this->input->post("article_title"),
							"article_title_rewrite"   	=> $url,					
							"article_info" 	=> $this->input->post("article_info"),
							"article_full"	=> $this->input->post("article_full"),		
							"article_date"    	=>  date("d/m/Y - h:i:s"),
							"article_order"  => $this->input->post("article_order")	
					  );
						if($_FILES['img']['name'] != NULL){
							$config['upload_path'] = './uploads/news';
							$config['allowed_types'] = 'gif|jpg|jpeg|png';
							$config['max_size']	= '1000';
							$config['max_width']  = '1024';
							$config['max_height']  = '1000';
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload("img")){
								$data = array('error' => $this->upload->display_errors());
								$data['title'] = "Sửa bài viết";
								$data['template']  = "articles/edit_articles";
								$data['data'] = "";
								$data['get'] = $this->model_articles->getdata($id);
								$data['listcate'] = $this->model_articles->listcate();	
								$data['act'] = 1;						
								$this->load->view("layout",$data);
								return FALSE;
							}else{
								$data = $this->upload->data();
								$db['article_image'] = $data['file_name'];
								$this->createThumbnail($db['article_image']);
							}
						 }
						 $this->model_articles->update($db,$id);
						 redirect(base_url()."admin/articles/index");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$data = $this->model_articles->getdata($id);
			@unlink("./uploads/news/".$data['article_image']);
			$this->model_articles->del($id);
			redirect(base_url()."admin/articles");
		}
		public function check_news($news){
			$id = $this->uri->segment(4);
			if($this->model_articles->check_news($news,$id) == FALSE){
				$this->form_validation->set_message("check_news","Tin tức này đã tồn tại!");
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function createThumbnail($fileName){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/news/'.$fileName;
			$config['new_image'] = 'uploads/news/thumb/'.$fileName;
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
