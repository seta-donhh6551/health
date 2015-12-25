<?php
	class Model_posts extends CI_Model{
		protected $_table = "tbl_posts";
		protected $_category = "tbl_category";
		public function __construct(){
			parent::__construct();
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function getdata($id){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			$this->db->where("tbl_posts.post_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getcate($id){
			$this->db->where("cate_id",$id);
			return $this->db->get($this->_category)->row_array();
		}
	}