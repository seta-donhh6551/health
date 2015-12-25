<?php
	class Technology extends MY_Controller{
		public function __construct(){
			parent::__construct();			
			$this->load->model("model_technology");
			$this->load->model("model_home");
		}
		public function index(){
		   $segment = $this->uri->segment(1);
		   $config['base_url'] = base_url().$segment;
		   $config['total_rows'] = $this->model_technology->count_all();
		   $config['per_page'] = 7;
		   $config['uri_segment'] = 2;
		   $config['next_link'] = "Next";
		   $config['prev_link'] = "Prev";
		   $config['cur_tag_open'] = '<span class="curpage">';
		   $config['cur_tag_close'] = '</span>';
		   $this->load->library("pagination",$config);
		   $start = (int)$this->uri->segment(2);
		   $data['listcate'] = $this->listcate();
		   $data['newest'] 		= $this->new_posts();
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['eq'] 			= "3";
		   $data['topeq'] 			= "10";
		   $data['students']    = $this->model_home->random_student();
		   $data['listnews'] = $this->model_technology->listall($config['per_page'],$start);
		   $data['category'] = $this->model_technology->listcago();
		   $data['title'] = "Công nghệ";
		   $this->load->view("technology/layout",$data);
		}
		public function category(){
		   $segment = $this->fillter($this->uri->segment(2));
		   $id = array_pop(explode("-",$segment));
		   $action = array("trang");	
		   $getVar = $this->uri->uri_to_assoc(1, $action);
		   $config['base_url'] = base_url()."cong-nghe/".$getVar['cong-nghe'];
		   $config['total_rows'] = $this->model_technology->count_all_cate($id);
		   $config['per_page'] = 7;
		   $config['uri_segment'] = 3;
		   $config['next_link'] = "Next";
		   $config['prev_link'] = "Prev";
		   $config['cur_tag_open'] = '<span class="curpage">';
		   $config['cur_tag_close'] = '</span>';
		   $this->load->library("pagination",$config);
		   $start = (int)$this->uri->segment(3);
		    $data['newest'] 		= $this->new_posts();
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   //$data['customer'] 	= $this->customer();
		   $data['eq'] 			= "3";
		   $data['topeq'] 			= "10";
		   $data['listcate']    = $this->listcate();
		   $data['students']    = $this->model_home->random_student();
		   $data['listnews'] = $this->model_technology->listall_cate($id,$config['per_page'],$start);
		   $data['category'] = $this->model_technology->listcago();
		   $cago =  $this->model_technology->getcago($id);
		   if($cago == NULL){
			   redirect(base_url());
		   }
		   $data['tech'] = $id;
		   $data['title'] = $cago['cago_name'];
		   $this->load->view("technology/category/layout",$data);
		}
		public function view(){
		   //die("true");
		   $id1 = $this->fillter($this->uri->segment(3));
		   $id = array_pop(explode('-', $id1));
		   $data['newest'] 		= $this->new_posts();
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['listcate']    = $this->listcate();
		   $data['students']    = $this->model_home->random_student();
		   //$data['customer'] 	= $this->customer();
		   $data['eq'] 			= "3";
		   $data['topeq'] 			= "10";
		   $data['category'] = $this->model_technology->listcago();
		   $data['link']       = base_url().uri_string().".html";
		   $data['read'] = $this->model_technology->getdata($id);
		   //$this->debug($data['read']);
		   if($data['read'] == NULL){
		   		redirect(base_url());
				exit();
		   }
		   $data['relate'] = $this->model_technology->relate($id,"","8");
		   //$this->debug($data['relate']);
		   $data['title'] = $data['read']['news_title'];
		   $this->load->view("technology/detail/layout",$data);
		}
	}