<?php
	class Model_student extends CI_Model{
		protected $_table = "tbl_students";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function listall($off,$start){
			$this->db->order_by("student_id","RANDOM");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_table);
		}
		public function getdata($id){
			$this->db->where("student_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function update($data,$id){
			$this->db->where("student_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function del($id){
			$this->db->where("student_id",$id);
			$this->db->delete($this->_table);
		}
	}