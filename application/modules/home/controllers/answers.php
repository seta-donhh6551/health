<?php
   class Answers extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->model("model_question");
	   }
	   public function editasw(){
		   if(!isset($this->session->userdata['userlevel']) 
		   || $this->session->userdata['userlevel'] != 1){
			   redirect(base_url());
		   }else{
			   $id = $_GET['quesid'];
			   $url = $_GET['url'];
			   $data['title'] = "Sửa câu trả lời của thành viên";
			   $data['result'] = $this->model_question->getans($id);
			   $data['listcate'] = $this->listcate();
			   $data['access'] 	= $this->access();
			   $data['online'] 	= $this->online();
			   $data['config'] 		= $this->config();
			   $data['listtags'] = $this->listtags();
			   if(isset($_POST['ok'])){
				   $db = array("alike"=>$_POST['alike'],"adislike"=>$_POST['adislike'],"ainfo"=>$_POST['ainfo']);
				   $this->model_question->updateasw($id,$db);
				   redirect($url);
			   }else{
			   	   $this->load->view("answers/layout",$data);
			   }
		   }
	   }
	   public function manaasw(){
		   if($_POST == NULL){die();}
		   $id = $_POST['id'];
		   $type = $_POST['type'];
		   if($type == "del"){
		   	  $this->model_question->delasw($id);
		   }elseif($type == "hide"){
			   $db = array("astatus"=>0);
			   $this->model_question->updateasw($id,$db);
		   }else{
			   echo "edit";
		   }
	   }
	   public function votenow(){
		   if($_POST == NULL){die();}
		   $val = (int)$_POST['val'];
		   $aswid = $_POST['aswid'];
		   $type = $_POST['type'];
		   if(!$this->session->userdata("userid")){
			   echo 1;
		   }else{
			   if($type == "voteup"){
				  $this->model_question->updatevote($aswid,"alike");
			   }else{
				   $this->model_question->updatevote($aswid,"adislike");
			   }
		   }
	   }
   }