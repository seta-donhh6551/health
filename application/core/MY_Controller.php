<?php
  	class MY_Controller extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model("monline");
			$this->load->model("model_index");
			$this->load->model("model_home");
		}
		public function listcate(){
			return $this->model_index->listcate();
		}
		public function online(){
			$tg = time();
		  	$tgout = 900;
		  	$tgnew = $tg - $tgout;
		  	$REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
		  	$PHP_SELF = $_SERVER["PHP_SELF"];
			$data = array(
					"time" => $tg,
					"user_ip" => $REMOTE_ADDR,
					"local" => $PHP_SELF,
					//"date" => date('d')
				);
		  	$this->monline->online($data);
		  	$this->monline->online_del($tgnew);
		  	return $this->monline->online_total($PHP_SELF);
		}
		public function online_view(){
			return $this->monline->online_view();
		}
		public function config(){
			return $this->model_index->config();
		}
		public function randomquest($length){
			return $this->model_home->randomquest($length);
		}
		public function new_posts($limit){
			return $this->model_home->newest($limit);
		}
	}