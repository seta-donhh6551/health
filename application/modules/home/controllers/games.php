<?php
   class Games extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("model_games");
		   $this->load->model("model_tags");
	   }
	   public function index(){
	   	  $items = $this->uri->segment(1);
		  $category = $this->model_games->getcate($items);
		  if($category == NULL){ redirect(base_url());}
		  $cateid = $category['cate_id'];
		  $data['config'] 	= $this->config();
		  $data['listcate'] = $this->listcate();
		  $data['listtags'] = $this->listtags();
		  $config['base_url'] = base_url().$items;
		  $config['total_rows'] = $this->model_games->count_all($cateid);
		  $config['per_page'] = 10;
		  $config['uri_segment'] = 2;
		  $config['next_link'] = "Next";
		  $config['prev_link'] = "Prev";
		  $config['cur_tag_open'] = '<span class="curpage">';
		  $config['cur_tag_close'] = '</span>';
		  $this->load->library("pagination",$config);
		  $start = (int)$this->uri->segment(2);
		  $data['result'] = $category;
		  $data['listgames'] = $this->model_games->listall($cateid,$config['per_page'],$start);
		  //$this->debug($data['listgames']);
		  $data['title'] = $category['cate_name']." games";
		  $this->load->view("category/layout",$data);
	   }
	   public function tags(){
	   	  $items = $this->uri->segment(2);
		  $tags = $this->model_tags->getdata($items);
		  if($tags == NULL){ redirect(base_url());}
		  $tagid = $tags['id'];
		  $data['listtags'] = $this->listtags();
		  $data['config'] 	= $this->config();
		  $data['listcate'] = $this->listcate();
		  $config['base_url'] = base_url().$items;
		  $config['total_rows'] = $this->model_tags->count_all($tagid);
		  $config['per_page'] = 10;
		  $config['uri_segment'] = 2;
		  $config['next_link'] = "Next";
		  $config['prev_link'] = "Prev";
		  $config['cur_tag_open'] = '<span class="curpage">';
		  $config['cur_tag_close'] = '</span>';
		  $this->load->library("pagination",$config);
		  $start = (int)$this->uri->segment(3);
		  $data['result'] = $tags;
		  $data['listgames'] = $this->model_tags->listall($tagid,$config['per_page'],$start);
		  //$this->debug($data['listgames']);
		  $data['title'] = $tags['name']." games";
		  $this->load->view("tags/layout",$data);
	   }
	   public function view(){
	   		$id = $this->uri->segment(2);
	   		$data['result'] = $this->model_games->getdata($id);
	   		if($data['result'] == NULL){
	   			redirect(base_url());
	   			exit();
	   		}
			$data['listtags'] = $this->listtags();
			$data['config'] = $this->config();
			$data['links'] = base_url().uri_string().".html";
			//$this->debug($data['links']);
	   		$data['title'] = $data['result']['name'];
	   		$this->load->view("games/layout",$data);
	   }
   }