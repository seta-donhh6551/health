<?php
	class Model_education extends CI_Model{
		protected $_table = "tbl_education";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function listall($off,$start){
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_table);
		}
		public function getdata($id){
			$this->db->where("education_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function add($value){
			$this->db->insert($this->_table,$value);
		}
		public function update($val,$id){
			$this->db->where("education_id",$id);
			$this->db->update($this->_table,$val);
		}
		public function del($id){
			$this->db->where("education_id",$id);
			$this->db->delete($this->_table);
		}
	}