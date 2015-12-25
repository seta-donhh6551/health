<?php
   class Question_new extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->model("model_category");
		   $this->load->model("model_home");
	   }
	   public function index(){	
	   	  $item = $this->uri->segment(1);
		  $data['category'] = $this->model_category->getdata($item);
		  $data['links'] = base_url().uri_string().".html";
		  $data['config'] 	= $this->config();
		  //if($data['category'] == NULL){ redirect(base_url()."trang-khong-ton-tai.html");}
		  $data['listcago'] = $this->model_category->getcago($data['category']['cid']);
		  //$this->debug($data['listcago']);
		  $id = $data['category']['cid'];
		  $config['base_url'] = base_url().$item;
		  $config['total_rows'] = $this->model_category->count_all_new();
		  $config['per_page'] = 6;
		  $config['uri_segment'] = 2;
		  $config['next_link'] = "Next";
		  $config['prev_link'] = "Prev";
		  $config['cur_tag_open'] = '<span class="curpage">';
		  $config['cur_tag_close'] = '</span>';
		  $this->load->library("pagination",$config);
		  $start = (int)$this->uri->segment(2);
		  $data['listcate'] = $this->listcate();
		  $results = $this->model_category->list_all_new($id,$config['per_page'],$start);
		  foreach($results as $k => $total){
			  $results[$k]['total'] = $this->model_category->getcoments($total['id']);
		  }
		  $data['results'] = $results;
		  $data['link']     = $item;
		  $data['eq'] 		= "10";
		  $data['topeq'] 	= "0";
		  $data['title'] 	= $data['category']['names']."! Chuyên mục hỏi đáp ".strtolower($data['category']['names']);
		  $data['rewrite']  = $data['category']['rewrite'];
		  $this->load->view("question_new/layout",$data);
	   }
   }