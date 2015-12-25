<?php
	class Search extends MY_Controller{
	    public function __construct(){
		   parent::__construct();
		   $this->load->model("model_category");
	    }
		public function index(){
			if(isset($_GET['key'])){
				$key = $_GET['key'];
				$data['config'] 	= $this->config();
			    $data['newest'] = $this->new_posts(4);
				$data['listcate'] = $this->listcate();
				$data['randompost'] = $this->model_home->randomquest(35);
				$data['listcago'] = $this->model_category->randomcago(6);
				$data['title'] = "Search results for $key";
				$data['results'] = array();	
				$data['keywords'] = "";
				if($key != NULL){
					$data['keywords'] = $key;
					$data['results'] = $this->model_category->searchs($key);
				}
				//$this->debug($data['results']);
				$this->load->view("search/layout",$data);
			}else{
				redirect(base_url());
			}
		}		
	}