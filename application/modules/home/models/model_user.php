<?php
	class Model_user extends CI_Model{
		protected $_table = "tbl_user";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getdata($where){
			$this->db->where($where);
			return $this->db->get($this->_table)->num_rows();
		}
		public function getuser($id){
			$this->db->where("user_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function update($id,$data){
			$this->db->where("user_id",$id);
			return $this->db->update($this->_table,$data);
		}
		public function login($name,$pass){
			$this->db->where("username",$name);
			$this->db->where("password",$pass);
			$this->db->where("status",1);
			return $this->db->get($this->_table)->row_array();	
		}
	}