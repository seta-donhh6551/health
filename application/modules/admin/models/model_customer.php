<?php
  	class Model_customer extends CI_Model{
		protected $_table = "tbl_customer";
		protected $_category = "tbl_category";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function count_all(){
			$this->db->from($this->_table);
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_customer.cate_id");
			return $this->db->count_all_results();
		}
		public function listall($off,$start){
			$this->db->from($this->_table);
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_customer.cate_id");
			$this->db->order_by("customer_order","ASC");
			$this->db->limit($off,$start);
			return $this->db->get()->result_array();
		}
		public function listcate(){
			return $this->db->get($this->_category)->result_array();
		}
		public function getdata($id){
			$this->db->where("customer_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function update($data,$id){
			$this->db->where("customer_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function del($id){
			$this->db->where("customer_id",$id);
			$this->db->delete($this->_table);
		}
	}
