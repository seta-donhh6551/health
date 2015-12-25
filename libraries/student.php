<?php
	class Student extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->library("session");
			if(!$this->session->userdata("ses_user") || $this->session->userdata("ses_level") != 1){
				redirect(base_urL()."admin/verify");
			}
		}
		public function debug($val){
			echo "<pre>";
			print_r($val);
			echo "</pre>";
			die();
		}
	}