<?php
   class Question extends MY_Controller{
	   public function __construct(){
		   parent::__construct();
		   $this->load->model("model_question");
		   $this->load->model("model_category");
		   $this->load->library("string");
	   }
	   public function index(){	
	       echo "Quiz question";
	   }
	   public function views(){
		   $items = $this->uri->segment(1);
		   $id = array_pop(explode("-",$items));
		   $data['listcate'] = $this->listcate();
		   $data['access'] 	= $this->access();
		   $data['online'] 	= $this->online();
		   $data['config'] 	= $this->config();
		   $data['listtags'] = $this->listtags();
		   $data['result'] = $this->model_question->getdata($id);
		   //$this->debug($data['result']);
		   if($data['result'] == NULL){redirect(base_url());}
		   $data['listanswer'] = $this->model_question->getanswers($data['result']['id']);
		   $data['title'] = $data['result']['title'];
		   $data['links']  = base_url().uri_string().".html";
		   $data['category'] = $this->model_question->getcate($data['result']['cateid']);
		   $data['listcago'] = $this->model_category->getcago($data['category']['cid']);
		   //$this->debug($data['category']);
		   $this->load->view("questions/detail/layout",$data);
	   }
	   public function asnwers(){
		   if($_POST == NULL){die();}
		   $userid = $_POST['userid'];
		   $fusername = $_POST['fusername'];
		   $quesid = $_POST['quesid'];
		   $cateid = $_POST['cateid'];
		   $value  = $this->string->removexxx($_POST['value']);
		   $value  = $this->fillter($value);
		   $value  = ucfirst($value);
		   $title = $this->string->cutstr($_POST['value'],0,70);
		   if($userid == NULL || $userid == 0){
			   redirect(base_url()."dang-nhap.html");
		   }else{
			   $db = array("atitle"=>$title,"ainfo"=>$value,"alike"=>0,"adislike"=>0,"userid"=>$userid,"username"=>$fusername,"quesid"=>$quesid,"cateid"=>$cateid);
			   $this->model_question->addasn($db);
			   $listans = $this->model_question->getanswers($quesid);
			   if($listans != NULL){
				   foreach($listans as $items){
					   echo '<div class="answers">';
		              	echo '<div class="lanswerl">';
						if($items['image'] != NULL){
		  	            	echo "<img src='".base_url()."uploads/users/thumb/$items[image]' width='50' alt='".$items['username']."' title='".$items['username']."' />";
						}else{
							echo "<img src='".base_url()."public/images/no-avatar.png' width='50' alt='".$items['username']."' title='".$items['username']."' />";
						}
		                      echo "<p style='padding:3px 0px'><a href='#'>".$items['username']."</a></p>";
		  	            echo "</div>";
		  	            echo '<div class="lanswerr">';
		  	            	echo '<div class="answercon">';
		  	                	echo $items['ainfo'];
		  	                echo "</div>";
		  	            	echo '<div class="answertool">';
		                      	echo '<div class="ansup">';
		                          	echo '<a href="#" class="voteup">'.$items['alike'].'</a>';
		                          echo '</div>';
		                          echo '<div class="ansdown">';
		                          	echo '<a href="#" class="votedown">'.$items['adislike'].'</a>';
		                          echo '</div>';
		                          echo '<div class="ansnow">';
		                              echo '<a href="#" class="commnow">Trả lời</a>';
		                          echo '</div>';
		  	                echo '</div>';
		  	            echo '</div>';
		  	            echo '<div class="cls"></div>';
		              echo "</div>";
				   }
			   }
		   }
		   //echo $userid." - ".$quesid." - ".$cateid." - ".$value;
	   }
	   public function verify(){
		   if($_POST == NULL){die();}
		   $val = $_POST['value'];
		   $cate = $_POST['category'];
		   $title = $_POST['title'];
		   $captcha = $_POST['captcha'];
		   $user = $this->session->userdata['userid'];
		   $username = $this->session->userdata['username'];
		   $code = $this->session->userdata['security_code'];
		   $url = str_replace(' ','-',strtolower($this->string->replace($title)));
		   //echo $name." - ".$pass; die();
		   if($code != $captcha){
			   echo "Mã captcha chưa đúng";
		   }else{
			   $keywords = $this->cut_str($val,0,70);
			   $description = $this->cut_str($val,0,170);
			   $value = $this->string->removexxx($val);
			   $first = ucfirst($value);
			   $data = array("title"=>$title,"rewrite"=>$url,"keywords"=>$keywords,"description"=>$description,"info"=>$first,"status"=>0,"datetime"=>date("d/m/Y - H:i:s"),"username"=>$username,"userid"=>$user,"cateid"=>$cate);
			   $this->model_question->add($data);
			   echo "haanhdon";
		   }
	   }
	   public function cut_str($val,$start,$end){
			$total 	= strlen($val);
			$cutted = mb_substr($val,$start,$end,'UTF-8');
			$cutted_leng = strlen($cutted);
			if($cutted_leng < $total){
				$seccess = $cutted."...";
			}else{
				$seccess = $cutted;
			}
			return $seccess;
		}
   }