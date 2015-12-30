<?php
   class Posts extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("model_posts");
		   $this->load->model("model_home");
		   $this->load->model("model_category");
	   }
	   public function view(){
		   $item = $this->uri->segment(1);
		   $id1 = $this->utility->fillter($this->uri->segment(2));
		   $category = $this->model_category->getdata($item);
		   if($category == NULL){ redirect(base_url());}
		   $data['listcago'] = $this->model_category->getcago($category['cate_id'],0);
		   $id = array_pop(explode('-', $id1));
		   $data['config'] 		= $this->config();
		   $data['newest'] 		= $this->new_posts(4);
		   $data['listcate'] = $this->listcate();
		   $data['randompost'] = $this->randomquest(35);
		   $data['falink']       = base_url().uri_string().".html";
		   $data['result'] = $this->model_posts->getdata($id);
		   if($data['result'] == NULL){ redirect(base_url()); exit();}
		   $data['menuone'] = $this->model_home->getcates(7,4);
		   $data['menutwo'] = $this->model_home->getcates(3,5);
		   $data['menuthree'] = $this->model_home->getcates(9,10);
		   $data['menufour'] = $this->model_home->getcates(8,6);
		   $data['title']  = $data['result']['post_title'];
		   $this->load->view("posts/layout",$data);
	   }
   }