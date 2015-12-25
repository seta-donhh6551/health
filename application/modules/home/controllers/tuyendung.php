<?php
   class Tuyendung extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("mtd");
	   }
	   public function index(){
		   $config['base_url'] = base_url().'vn/tuyendung/index/';
		   $config['total_rows'] = $this->mtd->count_all();
		   $config['per_page'] = 4;
		   $config['uri_segment'] = 4;
		   $config['next_link'] = "Next";
		   $config['prev_link'] = "Prev";
		   $this->load->library("pagination",$config);
		   $start = (int)$this->uri->segment(4);
		   $data['menu'] = $this->menu();	
		   $data['doc'] = $this->documents();
		   $data['project'] = $this->projectabc();	
		   $data['listnews'] = $this->listnews();	
		   $data['listnew'] = $this->mtd->listall($config['per_page'],$start);
		   $data['title'] = "Tuyển dụng";
		   $this->load->view("news/td/layout",$data); 
	   }
	   public function view(){
		   $id = (int)$this->uri->segment(4);
		   $data['menu'] = $this->menu();	
		   $data['doc'] = $this->documents();
		   $data['listnews'] = $this->listnews();
		   $data['project'] = $this->projectabc();	
		   $data['readnews'] = $ok = $this->mtd->detail($id);
		   $data['liqu'] = $this->mtd->liqu($id);
		   $data['title'] = $ok['td_title'];
		   $this->load->view("news/td/detail/layout",$data);
	   }
   }
