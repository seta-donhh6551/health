<?php
   class Intro extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("mindex");
		   $this->load->model("model_home");
		   $this->load->model("model_technology");
	   }
	   public function index(){	
	       $data['newest'] 		= $this->new_posts();
		   $data['support'] 	= $this->support();
		   $data['access'] 		= $this->access();
		   $data['online'] 		= $this->online();
		   $data['config'] 		= $this->config();
		   $data['listcate'] 	= $this->listcate();
		   $data['category'] = $this->model_technology->listcago();
		   $data['students']    = $this->model_home->random_student();
		   $data['subjects']    = $this->model_home->subjects();
		   $data['eq'] 			= "1";
		   $data['topeq'] 			= "10";
		   $data['intro'] 		= $this->mindex->intro();
		   $data['title'] 		= "Giới thiệu";
		   $this->load->view("introduction/layout",$data);
	   }
   }