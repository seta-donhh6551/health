<?php
	require("libraries/student.php");
  	class Index extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
		}
		public function index(){
			$data['title'] = "Life Respect";
			$data['template'] = "home";
			$data['data'] = "";
			$data['act'] = 0;
			$this->load->view("layout",$data);
		}
	}