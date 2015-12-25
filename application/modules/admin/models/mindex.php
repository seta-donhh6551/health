<?php
  	class Mindex extends CI_Model{
		protected $_table = "tbl_intro_one";
		protected $_contact = "tbl_contact_info";
		protected $_config = "tbl_config";
		protected $_service = "tbl_services";
		protected $_edu = "tbl_education";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function config(){
			$this->db->where("config_id","1");
			return $this->db->get($this->_config)->row_array();
		}
		public function intro($id=1){
			$this->db->where("intro_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function contact(){
			$this->db->where("contact_id","1");
			return $this->db->get($this->_contact)->row_array();
		}
		public function update_intro($body,$id){
			$this->db->where("intro_id",$id);
			$this->db->update($this->_table,$body);
		}
		public function update_contact($body,$id){
			$this->db->where("contact_id",$id);
			$this->db->update($this->_contact,$body);
		}
		public function update_config($data,$id){
			$this->db->where("config_id",$id);
			$this->db->update($this->_config,$data);
		}
		public function count_all_intro(){
			return $this->db->count_all($this->_table);
		}
		public function listintro($off,$start){
			$this->db->order_by("in_order","ASC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function add_intro($data){
			$this->db->insert($this->_table,$data);
		}
		public function services(){
			$this->db->where("service_id","1");
			return $this->db->get($this->_service)->row_array();
		}
		public function update_service($body,$id){
			$this->db->where("service_id",$id);
			$this->db->update($this->_service,$body);
		}
		public function education(){
			$this->db->where("edu_id","1");
			return $this->db->get($this->_edu)->row_array();
		}
		public function update_edu($data){
			$this->db->where("edu_id","1");
			$this->db->update($this->_edu,$data);
		}
		public function del($id){
			$this->db->where("in_id",$id);
			$this->db->delete($this->_table);
		}
	}