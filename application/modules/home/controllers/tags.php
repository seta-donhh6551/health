<?php
	class Tags extends MY_Controller{
		public function __construct(){
			parent::__construct();			
			$this->load->model("model_tags");
			$this->load->model("model_technology");
			$this->load->model("model_home");
		}
		public function index(){
			//redirect(base_url());
			$key = $this->fillter($this->uri->segment(2));
			$news_tags = $this->model_tags->get_news($key);
			$data['newest'] 		= $this->new_posts();
			$data['listcate']    = $this->listcate();
			$data['students']    = $this->model_home->random_student();
			$data['news'] = $news_tags;
			$data['support'] 	= $this->support();
		    $data['access'] 		= $this->access();
		    $data['online'] 		= $this->online();
		    $data['config'] 		= $this->config();
		    $data['eq'] 			= "3";
		    $data['topeq'] 			= "10";
		    $data['category'] = $this->model_technology->listcago();
		    $data['link']       = base_url().uri_string().".html";
			$data['title']      = $key;
			$this->load->view("tags/layout",$data);
		}
	}