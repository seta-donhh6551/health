<?php
	class Model_articles extends CI_Model{
		protected $_table = "tbl_articles";
		protected $_cate = "tbl_category";
		protected $_cago = "tbl_categorie";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function count_all(){
			return $this->db->count_all();
		}
		public function listall($off,$start){
			$this->db->order_by("article_order","ASC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_table)->result_array();
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function update($data,$id){
			$this->db->where("article_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function getdata($id){
			$this->db->where("article_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function del($id){
			$this->db->where("article_id",$id);
			$this->db->delete($this->_table);
		}
		public function listcate(){
			return $this->db->get($this->_cate)->result_array();
		}
		public function checkpost($data,$id=""){
			if($id != ""){
				$this->db->where("article_id !=",$id);
			}
			$this->db->where("article_title",$data);
			$query=$this->db->get($this->_table);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}