<?php
	require("libraries/student.php");
	class Order extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("morder");
		}
		public function index(){
			$config['base_url'] = base_url().'admin/order/index/';
			$config['total_rows'] = $this->morder->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title']="Quản lý đơn đặt hàng";
			$data['data']['info']= $this->morder->listorder($config['per_page'],$start);
			$data['template'] = "order/list_order";
			$this->load->view("layout",$data);
		}
		public function order_view(){
			$data['title'] = "Đơn đặt hàng của khách hàng"; 
			$data['template'] = "order/order_view";
			$data['data'] = "";
			$data['all'] = $this->morder->order_view($this->uri->segment(4));	
			$this->load->view("layout",$data);		
		}
		public function del(){
			$id = $this->uri->segment(4);
			$this->morder->del($id);
			redirect(base_url()."admin/order");
		}
	}