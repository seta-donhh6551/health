<?php
	class Mproject extends CI_Model{
		protected $_table = "project";
		protected $_cate = "cate_news";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function listcate($off,$start){
			$this->db->select("pro_id,pro_title,pro_image,cate_name");
			$this->db->from($this->_table);
			$this->db->join('cate_news','cate_news.cate_id = project.cate_id');
			return $this->db->get()->result_array();
		}
		public function count_all(){
			$this->db->select("pro_id,pro_title,pro_image,cate_name");
			$this->db->from($this->_table);
			$this->db->join('cate_news','cate_news.cate_id = project.cate_id');
			return $this->db->count_all_results();
		}
		public function count_al(){
			return $this->db->count_all($this->_cago);
		}
		public function listcago($off,$start){
			$this->db->select("cago_id,cago_name,cate_name");
			$this->db->from($this->_cago);
			$this->db->join('cate_news', 'cate_news.cate_id = categorie.cate_id');
			$this->db->limit($off,$start);
			return $this->db->get()->result_array();
		}
		public function count_all_cago(){
			return $this->db->count_all($this->_cago);
		}
		public function get_cate(){
			return $this->db->get($this->_cate)->result_array();
		}
		public function getdata($id){
			$this->db->where("pro_id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getcago($id){
			$this->db->where("cago_id",$id);
			return $this->db->get($this->_cago)->row_array();
		}
		public function add($value){
			$this->db->insert($this->_table,$value);
		}
		public function check_cate($name,$id=""){
			if($id != ""){
				$this->db->where("pro_id !=",$id);
			}
			$this->db->where("pro_title",$name);
			if($this->db->count_all_results($this->_table) != 0){
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
			$this->db->where("pro_title",$name);
			if($this->db->count_all_results($this->_table) == 1){
				return FALSE;				
			}else{
				return TRUE;
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
			$this->db->where("pro_id",$id);
			$this->db->update($this->_table,$val);
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
			$this->db->where("pro_id",$id);
			$this->db->delete($this->_table);
		}
		public function delmn_cago($id){
			$this->db->where("cate_id",$id);
			$this->db->delete($this->_cago);
		}
		public function check_cate_pro($id){
			$this->db->where("cate_id",$id);
			$query = $this->db->count_all_results("products");
			if($query != 0){
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function check_cago_pro($id){
			$this->db->where("cago_id",$id);
			$query = $this->db->count_all_results("products");
			if($query != 0){
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function check_cate_del($id){
			$this->db->where("cate_id",$id);
			$query = $this->db->count_all_results("categorie");
			if($query != 0){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}