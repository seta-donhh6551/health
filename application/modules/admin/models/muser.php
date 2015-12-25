<?php
	class Muser extends CI_Model{
		protected $_table="tbl_user";
		protected $_sup = "tbl_support";
		protected $_contact = "tbl_contact";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function check_login($user,$pass){
			$this->db->where("username",$user);
			$this->db->where("password",md5($pass));
			$result = $this->db->get($this->_table);
			if($result->num_rows() == 0){
				return FALSE;
			}else{
				return $result->row_array();
			}
		}
		public function check_user($user,$id=""){
			if($id != ""){
				$this->db->where("user_id !=",$id);
			}
			$this->db->where("username",$user);
			$query=$this->db->get($this->_table);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		public function update_status($data,$id){
			$this->db->where("user_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function check_sup($yhoo,$id=""){
			$this->db->where("sup_yahoo",$yhoo);
			if($id != ""){
				$this->db->where("sup_id !=",$id);
			}
			$query=$this->db->get($this->_sup);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		public function check_email($email,$id=""){
			if($id != ""){
				$this->db->where("user_id !=",$id);
			}
			$this->db->where("email",$email);
			$query=$this->db->get($this->_table);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		public function search_ajax($name){
			$this->db->where("username",$name);
			return $this->db->get($this->_table)->row_array();
		}
		public function listall($off,$start){
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_table);
		}
		public function add_user($data){
			$this->db->insert($this->_table,$data);
		}
		public function add_sup($data){
			$this->db->insert($this->_sup,$data);
		}
		public function del_user($id){
			$this->db->where("user_id",$id);
			$this->db->where("user_id !=","1");
			$this->db->delete($this->_table);
		}
		public function get_userdata($id){
			$this->db->where("user_id",$id);
			$query = $this->db->get($this->_table);
			return $query->row_array();
		}
		public function update($data,$id){
			$this->db->where("user_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function update_sup($data,$id){
			$this->db->where("sup_id",$id);
			$this->db->update($this->_sup,$data);
		}
		public function contact(){
			return $this->db->get($this->_contact)->result_array();
		}
		public function contact_view($id){
			$this->db->where("con_id",$id);
			return $this->db->get($this->_contact)->row_array();
		}
		public function del_con($id){
			$this->db->where("con_id",$id);
			$this->db->delete($this->_contact);
		}
		public function del_sup($id){
			$this->db->where("sup_id",$id);
			$this->db->delete($this->_sup);
		}
		public function count_sup(){
			return $this->db->count_all($this->_sup);
		}
		public function listsup($off,$start){
			$this->db->limit($off,$start);
			return $this->db->get($this->_sup)->result_array();
		}
		public function get_supdata($id){
			$this->db->where("sup_id",$id);
			return $this->db->get($this->_sup)->row_array();
		}
	}