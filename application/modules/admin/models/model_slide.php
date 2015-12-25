<?php
  	class Model_slide extends CI_Model{
		protected $_table = "tbl_slideshow";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function count_all(){
			return $this->db->count_all($this->_table);
		}
		public function listall($off,$start){
			$this->db->order_by("slide_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
	}
