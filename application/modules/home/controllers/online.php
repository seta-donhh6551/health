<?php
  	class Online extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model("muser");
		}
		public function index(){
			$this->load->model("muser");
			$tg = time();
		  	$tgout = 900;
		  	$tgnew = $tg - $tgout;
		  	$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
		  	$PHP_SELF = $_SERVER["PHP_SELF"];
			$data = array(
					"time" => $tg,
					"user_ip" => $REMOTE_ADDR,
					"local" => $PHP_SELF
				);
		  	$this->muser->online($data);
		  	$this->muser->online_del($tgnew);
		  	echo $this->muser->online_total($PHP_SELF);
		}
	}