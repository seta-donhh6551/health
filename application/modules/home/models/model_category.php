<?php
	class Model_category extends CI_Model{
		protected $_table = "tbl_posts";
		protected $_category = "tbl_category";
		protected $_categori = "tbl_categorie";
		protected $_answers = "tbl_answers";
		public function __construct(){
			parent::__construct();
		}
		public function getdata($id){
			$this->db->where("cate_rewrite",$id);
			return $this->db->get($this->_category)->row_array();
		}
		public function getmenu($id){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_categorie.cate_id");
			$this->db->where("rewrite",$id);
			return $this->db->get($this->_categori)->row_array();
		}
		public function searchs($keyword){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			$this->db->like('post_title',$keyword);
			$this->db->limit(6);
			return $this->db->get($this->_table)->result_array();
		}
		public function relatedtypes($cateid,$id){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_categorie.cate_id");
			$this->db->where("tbl_categorie.id !=",$id);
			$this->db->where("tbl_categorie.type",0);
			$this->db->where("tbl_categorie.cate_id",$cateid);
			$this->db->order_by("order","asc");
			return $this->db->get($this->_categori)->result_array();
		}
		public function getcoments($quesid){
			$this->db->where("quesid",$quesid);
			return $this->db->count_all_results($this->_answers);
		}
		public function getcago($cateid,$type){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_categorie.cate_id");
			$this->db->where("tbl_categorie.cate_id",$cateid);
			$this->db->where("tbl_categorie.type !=",$type);
			$this->db->order_by("order","asc");
			$this->db->limit(4);
			return $this->db->get($this->_categori)->result_array();
		}
		public function randomcago($limit){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_categorie.cate_id");
			$this->db->limit($limit);
			return $this->db->get($this->_categori)->result_array();
		}
		public function count_all($id){
			$this->db->where("cate_id",$id);
			return $this->db->count_all_results($this->_table);
		}
		public function list_all($id,$off,$start){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			$this->db->where("tbl_posts.cate_id",$id);
			$this->db->order_by("post_id","desc");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all_cago($id){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			$this->db->where("tbl_posts.cago_id",$id);
			return $this->db->count_all_results($this->_table);
		}
		public function list_all_cago($id,$off,$start){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			$this->db->where("tbl_posts.cago_id",$id);
            $this->db->order_by("post_id","desc");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function count_all_type($type){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			$this->db->where("tbl_posts.type_id",$type);
			return $this->db->count_all_results($this->_table);
		}
		public function list_types($type,$off,$start){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			$this->db->where("tbl_posts.type_id",$type);
            $this->db->order_by("post_id","desc");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function listcago($id, $cate_id){
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_categorie.cate_id", 'left');
			$this->db->where('tbl_categorie.cate_id', $cate_id);
			$this->db->where("tbl_categorie.id !=",$id);
			$this->db->limit(4);
			return $this->db->get($this->_categori)->result_array();
		}
	}