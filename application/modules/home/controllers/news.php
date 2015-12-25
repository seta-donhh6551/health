<?php
   class News extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->library('session');
		   $this->load->library('cart');
		   $this->load->model("mcate");
		   $this->load->model("mnews");
	   }
	   public function index(){
		   $id = (int)$this->uri->segment(4);
		   echo $id;
		   die();
		   $data['menu'] = $this->menu();
		   $data['menuintro'] = $this->menu_intro();
		   $data['menustreng'] = $this->menu_streng();
		   $data['menukt'] = $this->menu_kt();
		   $data['support'] = $this->support();			   
		   $data['read'] = $ok = $this->mnews->detail($id);
		   if($data['read'] == NULL){
		   		redirect(base_url());
				exit();
		   }
		   $lq = $ok['cate_id'];
		   $data['liqu'] = $this->mnews->lienquan($lq,$id);
		   $data['title'] = $ok['news_title']."- Tin tức";
		   $this->load->view("news/detail/layout",$data);
	   }
	   public function all(){
		   $config['base_url'] = base_url().'vn/news/all/';
		   $config['total_rows'] = $this->mnews->count_all_news();
		   $config['per_page'] = 5;
		   $config['uri_segment'] = 4;
		   $config['next_link'] = "Next";
		   $config['prev_link'] = "Prev";
		   $this->load->library("pagination",$config);
		   $start = (int)$this->uri->segment(4);
		   $data['menu'] = $this->menu();
		   $data['menuintro'] = $this->menu_intro();
		   $data['menustreng'] = $this->menu_streng();
		   $data['menukt'] = $this->menu_kt();
		   $data['support'] = $this->support();			   
		   $data['listnews'] = $this->mnews->list_all($config['per_page'],$start);
		   $data['title'] = "Tin tức";
		   $this->load->view("news/all/layout",$data); 
	   }
   }