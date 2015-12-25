<?php
	class Model_subject extends CI_Model{
		protected $_table = "tbl_subjects";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function count_all(){
			return $this->db->count_all();
		}
		public function listall($off,$start){
			$this->db->order_by("subject_order","ASC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function update($data,$id){
			$this->db->where("subject_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function getdata($id){
			$this->db->where("subject_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function del($id){
			$this->db->where("subject_id",$id);
			$this->db->delete($this->_table);
		}
	}