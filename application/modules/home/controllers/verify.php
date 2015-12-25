<?php
  	class Verify extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper("url");
			$this->load->model("muser");
			$this->load->library("session");
			$this->load->library("cart");
		}
		public function index(){
			echo "Verifly";
		}
		public function login(){
			$u = $this->input->post("user");
			$p = $this->input->post("pass");
			$check = $this->muser->check_login($u,$p);
			if($check == FALSE){
				echo 1;
			}else{
				$session = array(
						"ses_user" => $check['username'],
						"ses_level" => $check['level'],
						"ses_userid" => $check['user_id'],
						"ses_status" => $check['status']
						);
				$this->session->set_userdata($session);
				echo 2;
			}
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}