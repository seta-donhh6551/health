<?php
	class Model_category extends CI_Model{
		protected $_cate = "tbl_category";
		protected $_cago = "tbl_categorie";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function listcate($off,$start){
			$this->db->order_by("cate_order","ASC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_cate)->result_array();
		}
		public function count_all(){
			return $this->db->count_all($this->_cate);
		}
		public function count_al(){
			return $this->db->count_all($this->_cago);
		}
		public function listcago($off,$start){
			$this->db->order_by("cago_order","ASC");
			$this->db->limit($off,$start);
			return $this->db->get($this->_cago)->result_array();
		}
		public function count_all_cago(){
			return $this->db->count_all($this->_cago);
		}
		public function get_cate(){
			return $this->db->get($this->_cate)->result_array();
		}
		public function getcate($id){
			$this->db->where("cate_id",$id);
			return $this->db->get($this->_cate)->row_array();
		}
		public function getcago($id){
			$this->db->where("cago_id",$id);
			return $this->db->get($this->_cago)->row_array();
		}
		public function add($value){
			$this->db->insert($this->_cate,$value);
		}
		public function addsub($value){
			$this->db->insert($this->_cago,$value);
		}
		public function update_status($data,$id){
			$this->db->where("cate_id",$id);
			$this->db->update($this->_cate,$data);
		}
		public function update_cago_status($data,$id){
			$this->db->where("cago_id",$id);
			$this->db->update($this->_cago,$data);
		}
		public function check_cate($name,$id=""){
			if($id != ""){
				$this->db->where("cate_id !=",$id);
			}
			$this->db->where("cate_name",$name);
			if($this->db->count_all_results($this->_cate) != 0){
				return TRUE;	
			}else{
				return FALSE;
			}
		}
		public function check_cago($name,$id=""){
			if($id != ""){
				$this->db->where("cago_id !=",$id);
			}
			$this->db->where("cago_name",$name);
			if($this->db->count_all_results($this->_cago) != 0){
				return TRUE;	
			}else{
				return FALSE;
			}
		}
		public function checkcate($name){
			$this->db->where("cate_name",$name);
			if($this->db->count_all_results($this->_cate) != 0){
				return TRUE;	
			}else{
				return FALSE;
			}
		}
		public function checkcago($name){
			$this->db->where("cago_name",$name);
			if($this->db->count_all_results($this->_cago) != 0){
				return TRUE;	
			}else{
				return FALSE;
			}
		}
		public function updatemn($val,$id){
			$this->db->where("cate_id",$id);
			$this->db->update($this->_cate,$val);
		}
		public function updatesub($val,$id){
			$this->db->where("cago_id",$id);
			$this->db->update($this->_cago,$val);
		}
		public function delsub($id){
			$this->db->where("cago_id",$id);
			$this->db->delete($this->_cago);
		}
		public function delmn($id){
			$this->db->where("cate_id",$id);
			$this->db->delete($this->_cate);
		}
		public function delmn_cago($id){
			$this->db->where("cate_id",$id);
			$this->db->delete($this->_cago);
		}
		public function check_cate_pro($id){
			$this->db->where("cate_id",$id);
			$query = $this->db->count_all_results("tbl_products");
			if($query != 0){
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function check_cago_pro($id){
			$this->db->where("cago_id",$id);
			$query = $this->db->count_all_results("tbl_products");
			if($query != 0){
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function check_cate_del($id){
			$this->db->where("cate_id",$id);
			$query = $this->db->count_all_results("tbl_categorie");
			if($query != 0){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}