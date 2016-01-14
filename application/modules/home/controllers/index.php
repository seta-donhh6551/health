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
		$data['menuone'] = $this->model_home->getcates(7, 4);
		$data['catetwo'] = $this->model_home->cateInfo(6);
		$data['listtwo'] = $this->model_home->getquest(6, 7);
		$data['menutwo'] = $this->model_home->getcates(6, 5);
		$data['typestwo'] = $this->model_home->gettypes(3, 12);
		$data['catethree'] = $this->model_home->cateInfo(3);
		$data['listthree'] = $this->model_home->getquest(3, 3);
		$data['menuthree'] = $this->model_home->getcates(3, 12);
		$data['catefour'] = $this->model_home->cateInfo(5);
		$data['listfour'] = $this->model_home->getquest(5, 4);
		$data['menufour'] = $this->model_home->getcates(5, 6);
		$data['catefive'] = $this->model_home->cateInfo(2);
		$data['listfive'] = $this->model_home->getquest(2, 4);
		$data['menufive'] = $this->model_home->getcates(2, 6);
		$data['randompost'] = $this->randomquest(45);

		$this->load->view("layout", $data);
	}

	public function view()
	{
		$this->debug($this->online_view());
	}
}