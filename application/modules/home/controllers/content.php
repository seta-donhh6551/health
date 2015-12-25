<?php
   class Content extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("model_content");
		   $this->load->model("model_home");
		   $this->load->model("model_technology");		   
	   }
	   public function index(){
		   $config['base_url'] = base_url()."hoc-php";
		   $config['total_rows'] = $this->model_content->count_all();
		   $config['per_page'] = 10;
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
		   $data['link']       = base_url().uri_string().".html";
		   $data['category'] = $this->model_technology->listcago();
		   $data['students']    = $this->model_home->random_student();
		   $data['listall'] = $this->model_content->listall($config['per_page'],$start);
		   $data['title'] = "Học PHP ở đâu tốt nhất - Học PHP ở đâu Hà Nội?";
		   $this->load->view("content/layout",$data);
	   }
	   public function view(){
		   $id1 = $this->fillter($this->uri->segment(2));
		   $id = array_pop(explode('-', $id1));
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['newest'] 		= $this->new_posts();
		   $data['listcate'] = $this->listcate();
		   $data['category'] = $this->model_technology->listcago();
		   $data['link']       = base_url().uri_string().".html";
		   $data['read'] = $this->model_content->getdata($id);
		   $data['students']    = $this->model_home->random_student();
		   if($data['read'] == NULL){
		   		redirect(base_url());
				exit();
		   }
		   $data['relate'] = $this->model_content->relate($id);
		   $data['title']  = $data['read']['con_title'];
		   $this->load->view("content/detail/layout",$data);
	   }
   }