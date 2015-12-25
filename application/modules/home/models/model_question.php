<?php
	class Model_question extends CI_Model{
		protected $_table = "tbl_questions";
		protected $_category = "tbl_category";
		protected $_answer = "tbl_answers";
		public function __construct(){
			parent::__construct();
		}
		public function add($data){
			$this->db->insert($this->_table,$data);
		}
		public function addasn($data){
			$this->db->insert($this->_answer,$data);
		}
		public function getdata($id){
			$this->db->join("tbl_user","tbl_user.user_id = tbl_questions.userid");
			$this->db->where("id",$id);
			return $this->db->get($this->_table)->row_array();
		}
		public function getcate($id){
			$this->db->where("cid",$id);
			return $this->db->get($this->_category)->row_array();
		}
		public function getanswers($id){
			$this->db->join("tbl_user","tbl_user.user_id = tbl_answers.userid");
			$this->db->where("tbl_answers.quesid",$id);
			$this->db->where("tbl_answers.astatus",1);
			return $this->db->get($this->_answer)->result_array();
		}
		public function getans($id){
			$this->db->where("tbl_answers.aid",$id);
			return $this->db->get($this->_answer)->row_array();
		}
		public function delasw($id){
			$this->db->where("aid",$id);
			$this->db->delete($this->_answer);
		}
		public function updatevote($id,$field){
			$this->db->set($field, $field+ 1, FALSE);
			$this->db->where("aid",$id);
			$this->db->update($this->_answer);
		}
		public function randomquest(){
			$query = $this->db->query("select * from $this->_table where LENGTH (title) < 60 order by rand() limit 4");
			return $query->result_array();
		}
		public function updateasw($id,$data){
			$this->db->where("aid",$id);
			$this->db->update($this->_answer,$data);
		}
	}