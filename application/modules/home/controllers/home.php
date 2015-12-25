<?php
   class Home extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->model("model_home");
	   }
	   public function index(){	
	   		redirect(base_url());
	   }
	   public function design(){
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['customer'] 	= $this->customer();
		   $data['eq'] 			= "10";
		   $data['topeq'] 			= "0";
		   $data['link'] 			= $this->uri->segment(1);
		   $data['title'] 		= "Các gói thiết kế website";
		   $this->load->view("layouts/design/layout",$data);
	   }
	   public function cheap(){
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['customer'] 	= $this->customer();
		   $data['website'] 	= $this->model_home->cheap();
		   $data['eq'] 			= "10";
		   $data['topeq'] 			= "1";
		   $data['link'] 			= $this->uri->segment(1);
		   $data['title'] 		= "Có nên làm website giá rẻ?";
		   $this->load->view("layouts/cheap/layout",$data);
	   }
	   public function designed(){
		   $segment = $this->fillter($this->uri->segment(1));
		   $start = $this->fillter($this->uri->segment(2));
		   $config['base_url'] = base_url().$segment."/";
		   $config['total_rows'] = $this->model_home->count_all_designed();
		   $config['per_page'] = 6;
		   $config['uri_segment'] = 2;
		   $config['next_link'] = "Next";
		   $config['prev_link'] = "Prev";
		   $config['cur_tag_open'] = '<span class="curpage">';
		   $config['cur_tag_close'] = '</span>';
		   $this->load->library("pagination",$config);
		   $start = (int)$this->uri->segment(2);
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['customer'] 	= $this->customer();
		   $data['list'] 		= $this->model_home->listall_designed($config['per_page'],$start);
		   $data['eq'] 			= "10";
		   $data['topeq'] 			= "2";
		   $data['link'] 			= $this->uri->segment(1);
		   $data['title'] 		= "Các website đã thiết kế";
		   $this->load->view("layouts/designed/layout",$data);		   
	   }
	   public function price(){
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['customer'] 	= $this->customer();
		   $data['eq'] 			= "10";
		   $data['topeq'] 			= "3";
		   $data['link'] 			= $this->uri->segment(1);
		   $data['title'] 		= "Bảng báo giá";
		   $this->load->view("layouts/price/layout",$data);
	   }
	   public function reviews(){
		   $segment = $this->fillter($this->uri->segment(1));
		   $start = $this->fillter($this->uri->segment(2));
		   $config['base_url'] = base_url().$segment."/";
		   $config['total_rows'] = $this->model_home->count_all_customer();
		   $config['per_page'] = 2;
		   $config['uri_segment'] = 2;
		   $config['next_link'] = "Next";
		   $config['prev_link'] = "Prev";
		   $config['cur_tag_open'] = '<span class="curpage">';
		   $config['cur_tag_close'] = '</span>';
		   $this->load->library("pagination",$config);
		   $start = (int)$this->uri->segment(2);
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['customer'] 	= $this->customer();
		   $data['list'] 		= $this->model_home->listall_customer($config['per_page'],$start);
		   $data['eq'] 			= "10";
		   $data['topeq'] 			= "4";
		   $data['link'] 			= $this->uri->segment(1);
		   $data['title'] 		= "Ý kiến khách hàng về North Star";
		   $this->load->view("layouts/reviews/layout",$data);
	   }
	   public function hocphp(){
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['customer'] 	= $this->customer();
		   $data['website'] 	= $this->model_home->learn();
		   $data['eq'] 			= "10";
		   $data['topeq'] 			= "5";
		   $data['link'] 			= $this->uri->segment(1);
		   $data['title'] 		= "Học thiết kế website ở đâu?";
		   $this->load->view("layouts/learning/layout",$data);
	   }
   }