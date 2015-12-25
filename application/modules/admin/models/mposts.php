<?php
	class Mposts extends CI_Model{
		protected $_table = "tbl_posts";
		protected $_cate = "tbl_category";
		protected $_cago = "tbl_categorie";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function count_all(){
			$this->db->select("post_id,post_title,post_date,cate_name");
			$this->db->from($this->_table);
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			return $this->db->count_all_results();
		}
		public function listall($off,$start){
			$this->db->select("post_id,post_title,post_date,cate_name");
			$this->db->from($this->_table);
			$this->db->join("tbl_category","tbl_category.cate_id = tbl_posts.cate_id");
			$this->db->order_by("tbl_posts.cate_id","ASC");
			$this->db->order_by("post_id","desc");
			$this->db->limit($off,$start);
			return $this->db->get()->result_array();
		}
		public function listcago($cateid){
			$this->db->order_by("order","ASC");
			$this->db->where("cate_id",$cateid);
			return $this->db->get($this->_cago)->result_array();
		}
		public function listtypes(){
			$this->db->where("type !=",1);
			$this->db->order_by("name","ASC");
			return $this->db->get($this->_cago)->result_array();
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function update($data,$id){
			$this->db->where("post_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function getdata($id){
			$this->db->where("post_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function del($id){
			$this->db->where("post_id",$id);
			$this->db->delete($this->_table);
		}
		public function listcate(){
			return $this->db->get($this->_cate)->result_array();
		}
		public function checkpost($data,$id=""){
			if($id != ""){
				$this->db->where("post_id !=",$id);
			}
			$this->db->where("post_title",$data);
			$query=$this->db->get($this->_table);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}