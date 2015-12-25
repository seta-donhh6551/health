<?php
	require("libraries/student.php");
	class Support extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("muser");
		}
		public function index(){
			$config['base_url'] = base_url().'admin/support/index/';
			$config['total_rows'] = $this->muser->count_sup();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title']="Hỗ trợ trực tuyến";
			$data['data']['info']= $this->muser->listsup($config['per_page'],$start);
			$data['template'] = "sup/list_sup";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['title'] = "Hỗ trợ trực tuyến";
			$data['template'] = "sup/add_sup";
			$data['data']['info'] = "";
			if($this->input->post("ok") != ""){
					$db = array(
							"sup_name" => $this->input->post("sup_name"),	
					  		"sup_yahoo" => $this->input->post('sup_yahoo'),
							"sup_phone" => $this->input->post('sup_phone'),
							"sup_sky" => $this->input->post('sup_sky'),
							"sup_email" => $this->input->post('sup_email')
						);
					$this->muser->add_sup($db);
					redirect(base_url()."admin/support/index");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['title'] = "Hỗ trợ trực tuyến";
			$data['template'] = "sup/edit_sup";
			$data['data']['info'] = $this->muser->get_supdata($id);
			if($this->input->post("ok") != ""){
				$db = array(
						"sup_name" => $this->input->post("sup_name"),	
					  	"sup_yahoo" => $this->input->post("sup_yahoo"),
						"sup_phone" => $this->input->post('sup_phone'),
						"sup_sky" => $this->input->post('sup_sky'),
						"sup_email" => $this->input->post('sup_email')
					);
				$this->muser->update_sup($db,$id);
				redirect(base_url()."admin/support/index");
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$this->muser->del_sup($id);
			redirect(base_url()."admin/support");
		}
	}