<?php
	require("libraries/student.php");
	class User extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("muser");
		}
		public function index(){
			$config['base_url'] = base_url().'admin/user/index/';
			$config['total_rows'] = $this->muser->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Previous";
			$config['cur_tag_open'] = "<span class='curpage'>";
			$config['cur_tag_close'] = "</span>";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title']="Manage user";
			$data['act'] = 1;
			$data['data']['info']= $this->muser->listall($config['per_page'],$start);
			$data['template'] = "user/list_user";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['title'] = "Add new user";
			$data['template'] = "user/add_user";
			$data['data'] = "";
			$data['act'] = 1;
			if($this->input->post("ok") != ""){
				$name = $this->muser->check_user($this->input->post("username"));
				$email = $this->muser->check_email($this->input->post("email"));
				if($name == FALSE || $email == FALSE){
					$data['error'] = "This user has been exits!";
					$this->load->view("layout",$data);
				}else{
					$db = array(
								"username" => $this->input->post("username"),
								"password" => md5($this->input->post("password")),
								"name" => $this->input->post("name"),
								"gender" => $this->input->post("gender"),
								"phone" => $this->input->post("phone"),
								"adress" => $this->input->post("adress"),
								"email" => $this->input->post("email"),
								"level" => $this->input->post("level")	
								);
					$this->muser->add_user($db);
					redirect(base_url()."admin/user/");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$data['title'] = "Edit user info";
			$data['template'] = "user/edit_user";
			$data['act'] = 1;
			$data['data']['info'] = $this->muser->get_userdata($id);
			if($this->input->post("ok") != ""){
				$name = $this->muser->check_user($this->input->post("username"),$id);
				$email = $this->muser->check_email($this->input->post("email"),$id);
				if($name == FALSE || $email == FALSE){
					$data['error'] = "This user has been exits!";
					$this->load->view("layout",$data);
				}else{
					$db = array(
								"username" => $this->input->post("username"),
								"name" => $this->input->post("name"),
								"gender" => $this->input->post("gender"),
								"phone" => $this->input->post("phone"),
								"adress" => $this->input->post("adress"),
								"email" => $this->input->post("email"),
								"level" => $this->input->post("level")	
								);
					if($this->input->post("password") != ""){
						$db['password'] = md5($this->input->post("password"));
					}
					$this->muser->update($db,$id);
					redirect(base_url()."admin/user/");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function active(){
			$id   	= $this->uri->segment(4);
			$status	= $this->uri->segment(5);
			$db = array(
				"status" => $status 
			);
			$this->muser->update_status($db,$id);
			redirect(base_url()."admin/user/");
		}
		public function search(){
			$name = $this->input->post("val");
			$data = $this->muser->search_ajax($name);
			if($data == NULL){
				echo "Không tìm thấy tài khoản nào";
			}else{
				echo '<table cellpadding="0" cellspacing="0" width="905">';
				echo '<tbody><tr>';
				echo '<th width="185">Tên tài khoản</th>';
				echo'<th width="236">Họ tên</th>';
				echo '<th width="62">Gender</th>';
				echo '<th width="224">Email</th>';
				echo '<th width="60">Level</th>';
				echo '<th width="49">Status</th>';
				echo '<th width="64">Actions</th>';
				echo '</tr>';
				echo "<tr>";
				echo "<td>".$data['username']."</td>";
				echo "<td>".$data['name']."</td>";
				if($data['gender'] == 1){
					echo "<td>Nam</td>";
				}else{
					echo "<td>Nữ</td>";
				}
				echo "<td>".$data['email']."</td>";
				if($data['level'] == 1){
					echo "<td><font color='red'>Admin</font></td>";
				}else{
					echo "<td>Member</td>";
				}
				if($data['status'] == 1){
					echo "<td><a href='".base_url()."admin/user/active/$data[user_id]/0'>Active</a></td>";
				}else{
					echo "<td><a href='".base_url()."admin/user/active/$data[user_id]/1'>Not active</a></td>";
				}
				echo "<td>";
				echo "<div class='actions_menu'><ul>";
				echo "<li><a href='".base_url()."admin/user/update/$data[user_id]/' class='edit'>Edit</a></li>";
				echo "<li><a href='".base_url()."admin/user/del/$data[user_id]/' class='delete' onclick='return check()'>Del</a></li>";
				echo "</ul></div>";
				echo "</td>";
				echo '</tr>';
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$this->muser->del_user($id);
			redirect(base_url()."admin/user/");
		}
		public function contact(){
			$data['title'] = "Khánch hàng liên hệ"; 
			$data['template'] = "user/contact";
			$data['data'] = "";
			$data['contact'] = $this->muser->contact();	
			$this->load->view("layout",$data);		
		}
		public function contact_view(){
			$data['title'] = "Khánch hàng liên hệ"; 
			$data['template'] = "user/contact_view";
			$data['data'] = "";
			$data['all'] = $this->muser->contact_view($this->uri->segment(4));	
			$this->load->view("layout",$data);		
		}
		public function del_con(){
			$id = $this->uri->segment(4);
			$this->muser->del_con($id);
			redirect(base_url()."admin/user/contact");
		}
	}