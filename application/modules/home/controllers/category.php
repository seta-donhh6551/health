<?php
   class Category extends MY_Controller{
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
		  $data['newest'] = $this->new_posts(4);
		  if($data['category'] == NULL){ redirect(base_url());}
		  //$this->debug($this->new_posts());
		  $data['listcago'] = $this->model_category->getcago($data['category']['cate_id'],0);
		  $data['listtypes'] = $this->model_category->getcago($data['category']['cate_id'],1);
		  //$this->debug($data['listtypes']);
		  $id = $data['category']['cate_id'];
		  $config['base_url'] = base_url().$item;
		  $config['total_rows'] = $this->model_category->count_all($id);
		  $config['per_page'] = 6;
		  $config['uri_segment'] = 2;
		  $config['next_link'] = "Next";
		  $config['prev_link'] = "Prev";
		  $config['cur_tag_open'] = '<span class="curpage">';
		  $config['cur_tag_close'] = '</span>';
		  $this->load->library("pagination",$config);
		  $start = (int)$this->uri->segment(2);
		  $data['listcate'] = $this->listcate();
		  $data['results'] = $this->model_category->list_all($id,$config['per_page'],$start);
		  /*foreach($results as $k => $total){
			  $results[$k]['total'] = $this->model_category->getcoments($total['id']);
		  }
		  $data['results'] = $results;*/
		  //$this->debug($data['results']);
		  $data['link']     = $item;
		  $data['eq'] 		= "10";
		  $data['topeq'] 	= "0";
		  $data['menuone'] = $this->model_home->getcates(7,4);
		  $data['menutwo'] = $this->model_home->getcates(3,5);
		  $data['menuthree'] = $this->model_home->getcates(9,10);
		  $data['menufour'] = $this->model_home->getcates(8,6);
		  $data['randompost'] = $this->randomquest(35);
		  $data['related'] = $this->randomquest(65);
		  $data['title'] 	= $data['category']['cate_info'];
		  $data['rewrite']  = $data['category']['cate_rewrite'];
		  $this->load->view("category/layout",$data);
	   }
	   public function categorie(){
		  $item = $this->uri->segment(1); 
		  $url = $this->uri->segment(2);
		  $data['newest'] = $this->new_posts(4);
		  $data['config'] 	= $this->config();
		  $data['categorie'] = $this->model_category->getmenu($url);
		  //$this->debug($data['categorie']);
		  if($data['categorie'] == NULL){ redirect(base_url());}
		  $id = $data['categorie']['id'];
		  $config['base_url'] = base_url().$item."/".$url;
		  $config['total_rows'] = $this->model_category->count_all_cago($id);
		  $config['per_page'] = 6;
		  $config['uri_segment'] = 3;
		  $config['next_link'] = "Next";
		  $config['prev_link'] = "Prev";
		  $config['cur_tag_open'] = '<span class="curpage">';
		  $config['cur_tag_close'] = '</span>';
		  $this->load->library("pagination",$config);
		  $start = (int)$this->uri->segment(3);
		  $data['listcate'] = $this->listcate();
		  $data['listcago'] = $this->model_category->listcago($id);
		  $data['results'] = $this->model_category->list_all_cago($id,$config['per_page'],$start);
		  //$this->debug($data['results']);
		  $data['menuone'] = $this->model_home->getcates(7,4);
		  $data['menutwo'] = $this->model_home->getcates(3,5);
		  $data['menuthree'] = $this->model_home->getcates(9,10);
		  $data['menufour'] = $this->model_home->getcates(8,6);
		  $data['randompost'] = $this->randomquest(35);
		  $data['title'] = $data['categorie']['title'];
		  $this->load->view("categories/layout",$data);
	   }
	   public function types(){	
	   	  $item = $this->uri->segment(1); 
		  $url = $this->uri->segment(2);
		  $data['newest'] = $this->new_posts(4);
		  $data['config'] 	= $this->config();
		  $data['categorie'] = $this->model_category->getmenu($url);
		  //$this->debug($data['categorie']);
		  if($data['categorie'] == NULL){ redirect(base_url());}
		  $id = $data['categorie']['id'];
		  $cateid = $data['categorie']['cate_id'];
		  $data['category'] = $this->model_category->getdata($data['categorie']['cate_rewrite']);
		  $config['base_url'] = base_url().$item."/".$url;
		  $config['total_rows'] = $this->model_category->count_all_type($id);
		  //echo $config['total_rows']; die();
		  $config['per_page'] = 6;
		  $config['uri_segment'] = 3;
		  $config['next_link'] = "Next";
		  $config['prev_link'] = "Prev";
		  $config['cur_tag_open'] = '<span class="curpage">';
		  $config['cur_tag_close'] = '</span>';
		  $this->load->library("pagination",$config);
		  $start = (int)$this->uri->segment(3);
		  $data['listcate'] = $this->listcate();
		  $data['relatedtypes'] = $this->model_category->relatedtypes($cateid,$id);
		  $data['listcago'] = $this->model_category->listcago($id);
		  $data['results'] = $this->model_category->list_types($id,$config['per_page'],$start);
		  //$this->debug($data['relatedtypes']);
		  $data['menuone'] = $this->model_home->getcates(7,4);
		  $data['menutwo'] = $this->model_home->getcates(3,5);
		  $data['menuthree'] = $this->model_home->getcates(9,10);
		  $data['menufour'] = $this->model_home->getcates(8,6);
		  $data['randompost'] = $this->randomquest(35);
		  $data['title'] = $data['categorie']['title'];
		  $this->load->view("types/layout",$data);
	   }
   }