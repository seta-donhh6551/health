<?php
  	class Model_index extends CI_Model{
		protected $_cate = "tbl_category";
		protected $_tags = "tbl_categorie";			
		protected $_config ="tbl_config";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function config(){
			$this->db->where("config_id","1");
			return $this->db->get($this->_config)->row_array();
		}
		public function listcate(){
			$this->db->where("cate_status","1");
			$this->db->order_by("cate_order","ASC");
			return $this->db->get($this->_cate)->result_array();
		}
		public function listtags(){
			$this->db->where("status","1");
			$this->db->order_by("order","ASC");
			return $this->db->get($this->_tags)->result_array();
		}
	}