<?php
	class Model_home extends CI_Model{
		protected $_table = "tbl_posts";
		protected $_category = "tbl_category";
		protected $_categorie = "tbl_categorie";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function newest($limit){
		  	$this->db->join($this->_category,"tbl_posts.cate_id = tbl_category.cate_id");
			$this->db->order_by("post_id","desc");
			$this->db->limit($limit);
			return $this->db->get($this->_table)->result_array();
		}
		public function cateInfo($cateid){
			$this->db->where("cate_id",$cateid);
			return $this->db->get($this->_category)->row_array();
		}
		public function getcates($cateid,$limit){
			$this->db->join($this->_category,"tbl_category.cate_id = tbl_categorie.cate_id");
			$this->db->where("tbl_categorie.cate_id",$cateid);
			$this->db->where("tbl_categorie.type",1);
			$this->db->limit($limit);
			return $this->db->get($this->_categorie)->result_array();
		}
		public function gettypes($cateid,$limit){
			$this->db->join($this->_category,"tbl_category.cate_id = tbl_categorie.cate_id");
			$this->db->where("tbl_categorie.cate_id",$cateid);
			$this->db->where("tbl_categorie.type",0);
			$this->db->limit($limit);
			return $this->db->get($this->_categorie)->result_array();
		}
		public function rancates($limit){
			$db = $this->db->query(
				"select * from $this->_categorie
				inner join $this->_category on tbl_category.cate_id = tbl_categorie.cate_id
				where tbl_categorie.type != 0
				order by rand() limit $limit
			");
			return $db->result_array();
		}
		public function getquest($cateid, $limit){
			$this->db->join($this->_category,"tbl_posts.cate_id = tbl_category.cate_id");
			$this->db->where("tbl_posts.cate_id",$cateid);
			$this->db->order_by("tbl_posts.post_id","desc");
			$this->db->limit($limit);
			return $this->db->get($this->_table)->result_array();
		}
		public function randomquest($length){
			$query = $this->db->query("select * from $this->_table inner join tbl_category on tbl_category.cate_id = tbl_posts.cate_id where LENGTH (post_title) < $length order by rand() limit 4");
			return $query->result_array();
		}
	}