<?php

class Index extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_home");
	}

	public function index()
	{
		$data['listcate'] = $this->listcate();
		$data['config'] = $this->config();
		$data['newest'] = $this->new_posts(4);
		$data['rancates'] = $this->model_home->getcates(4, 6);
		$data['cateone'] = $this->model_home->cateInfo(4);
		$data['listone'] = $this->model_home->getquest(4, 4);
		//otorhinolaryngology
		$data['pregnancy'] = $this->model_home->getPostsBySubid(78, 5);
		$data['childrenheath'] = $this->model_home->getPostsBySubid(81, 5);
		$data['menuone'] = $this->model_home->getcates(7, 4);
		$data['catetwo'] = $this->model_home->cateInfo(3);
		$data['listtwo'] = $this->model_home->getquest(3, 7);
		$data['menutwo'] = $this->model_home->getcates(3, 5);
		$data['typestwo'] = $this->model_home->gettypes(6, 12);
		$data['catethree'] = $this->model_home->cateInfo(6);
		$data['listthree'] = $this->model_home->getquest(6, 9);
		$data['menuthree'] = $this->model_home->getcates(6, 12);
		$data['catefive'] = $this->model_home->cateInfo(2);
		$data['listfive'] = $this->model_home->getquest(2, 4);
		$data['menufive'] = $this->model_home->getcates(4, 6);
		$data['randompost'] = $this->randomquest(45);

		$this->load->view("layout", $data);
	}

	public function view()
	{
		$this->debug($this->online_view());
	}
}