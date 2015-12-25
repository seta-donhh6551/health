<?php
	class Morder extends CI_Model{
		private $_table = "donhang";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function count_all(){
			return $this->db->count_all($this->_table);
		}
		public function listorder($off,$start){
			$this->db->limit($off,$start);
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}
		public function order_view($id){
			$this->db->where("don_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function del($id){
			$this->db->where("don_id",$id);
			$this->db->delete($this->_table);
		}
	}