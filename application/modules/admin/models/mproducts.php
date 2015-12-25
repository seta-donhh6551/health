<?php
	class Mproducts extends CI_Model{
		protected $_table="tbl_products";
		protected $_cate = "tbl_category";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function check_products($pro,$id=""){
			if($id != ""){
				$this->db->where("pro_id !=",$id);
			}
			$this->db->where("pro_name",$pro);
			$query=$this->db->get($this->_table);
			if($query->num_rows() == 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		public function listall($off,$start){
			$this->db->select("pro_id,pro_name,pro_price,cate_name");
			$this->db->from($this->_table);
			$this->db->join('tbl_category', 'tbl_category.cate_id = tbl_products.cate_id');
			$this->db->order_by("pro_id","DESC");
			$this->db->limit($off,$start);
			return $this->db->get()->result_array();
		}
		public function count_all(){
			$this->db->select("pro_id,pro_name,pro_price,cate_name");
			$this->db->from($this->_table);
			$this->db->join('tbl_category', 'tbl_category.cate_id = tbl_products.cate_id');
			return $this->db->count_all_results();
		}
		public function getcate(){
			return $this->db->get($this->_cate)->result_array();
		}
		public function add_pro($data){
			$this->db->insert($this->_table,$data);
		}
		public function del_pro($id,$data){
			$this->db->where("pro_id",$id);
			$this->db->delete($this->_table);
		}
		public function get_prodata($id){
			$this->db->where("pro_id",$id);
			$query = $this->db->get($this->_table);
			return $query->row_array();
		}
		public function show_prodata($id){
			$this->db->where("cate_id",$id);
			return $this->db->get($this->_table)->result_array();
		}
		public function update($data,$id){
			$this->db->where("pro_id",$id);
			$this->db->update($this->_table,$data);
		}
		public function delcate($id){
			$this->db->where("cate_id",$id);
			$this->db->delete($this->_table);
		}
		public function delcago($id){
			$this->db->where("cago_id",$id);
			$this->db->delete($this->_table);
		}
	}