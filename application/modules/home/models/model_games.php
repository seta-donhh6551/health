<?php
	class Model_games extends CI_Model{
		protected $_table = "tbl_games";
		protected $_category = "tbl_category";
		public function __construct(){
			parent::__construct();
		}
		public function getdata($id){
			$this->db->where("rewrite",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getcate($id){
			$this->db->where("cate_rewrite",$id);
			return $this->db->get($this->_category)->row_array();
		}
		public function count_all($cateid){
			$this->db->where("cateid",$cateid);
			return $this->db->count_all_results($this->_table);
		}
		public function listall($id,$off,$start){
			$this->db->where("cateid",$id);
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
	}