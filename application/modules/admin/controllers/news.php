<?php
	require("libraries/student.php");
	class News extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->Model("mnews");
			$this->load->library("string");	
		}
		public function index(){
			$config['base_url'] = base_url().'admin/news/index/';
			$config['total_rows'] = $this->mnews->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$config['first_link'] = "First";
			$config['last_link'] = "Last";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title']="Quản lý tin tức";
			$data['act'] = 5;
			$data['data']['info']= $this->mnews->listall($config['per_page'],$start);
			$data['template'] = "news/list_news";
			$this->load->view("layout",$data);
		}
		public function add(){
			$this->load->helper(array("form","date"));
			$this->load->library("form_validation");
			$data['error'] = "";
			$data['data'] = "";
			$data['act'] = 5;
			$data['title'] = "Thêm mới tin tức";
			$data['template'] = "news/add_news";
			$data['listcago'] = $this->mnews->listcago();
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("news_title","Tiêu đề tin","min_length[5]|callback_check_news");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $title = trim($this->input->post('news_title'));
					  $url = str_replace(' ', '-',strtolower($this->string->replace($title)));
					  $tags = explode(',',$this->input->post("news_tags"));
					  
					  foreach($tags as $k => $v){
						  $tags_new[$k] = str_replace(' ', '-',strtolower($this->string->replace($v)));
					  }
					  $oke = array(
					  		"tags" => $tags,
							"tags_rewrite" => $tags_new
					  );
					  $tags_code = json_encode($oke);
					  $db = array(
							"news_title" => $this->input->post("news_title"),
							"news_rewrite" => $url,
							"news_author" => $this->input->post("news_author"),		
							"news_info" => $this->input->post("news_info"),
							"news_full" => $this->input->post("news_full"),
							"news_keys" => $this->input->post("news_keys"),
							"news_des" => $this->input->post("news_des"),
							"news_tags" => $tags_code,
							"cate_id" => $this->input->post("cate_id")
						);
					if($_FILES['img']['name'] != NULL){
						$config['upload_path'] = './uploads/news';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '2000';
						$config['max_width']  = '1400';
						$config['max_height']  = '1400';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("img")){
							$data = array('error' => $this->upload->display_errors());
							$data['data'] = "";
							$data['title'] = "Thêm mới tin tức";
							$data['act'] = 5;
							$data['template'] = "news/add_news";
							$data['listcago'] = $this->mnews->listcago();
							$this->load->view("layout",$data);
							return FALSE;
						}else{
							$data = $this->upload->data();
							$db['news_images'] = $data['file_name'];
							$this->createThumbnail("uploads/news",$db['news_images'],170,160);
						}
					 }
					 $this->mnews->add_news($db);
					 redirect(base_url()."admin/news/index");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function check_news($news){
			$id = $this->uri->segment(4);
			if($this->mnews->check_news($news,$id) == FALSE){
				$this->form_validation->set_message("check_news","Tin tức này đã tồn tại!");
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function update(){
			$id = $this->uri->segment(4);
			$this->load->helper(array("form","date"));
			$this->load->library("form_validation");
			$data['error'] = "";
			$data['title'] = "Sửa tin tức";
			$data['template'] = "news/edit_news";
			$data['data'] = "";
			$data['act'] = 5;
			$data['get'] = $this->mnews->get_newsdata($id);
			$data['listcago'] = $this->mnews->listcago();
			$data['stt'] = $data['get']['cate_id'];
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("news_title","Tiêu đề tin","min_length[5]|callback_check_news");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $title = trim($this->input->post('news_title'));
					  $url = str_replace(' ', '-',strtolower($this->string->replace($title)));
					  $tags = explode(',',$this->input->post("news_tags"));
					  
					  foreach($tags as $k => $v){
						  $tags_new[$k] = str_replace(' ', '-',strtolower($this->string->replace($v)));
					  }
					  $oke = array(
					  		"tags" => $tags,
							"tags_rewrite" => $tags_new
					  );
					  $tags_code = json_encode($oke);
					  $db = array(
							"news_title" => $this->input->post("news_title"),
							"news_rewrite" => $url,
							"news_author" => $this->input->post("news_author"),		
							"news_info" => $this->input->post("news_info"),
							"news_full" => $this->input->post("news_full"),
							"news_keys" => $this->input->post("news_keys"),
							"news_des" => $this->input->post("news_des"),
							"news_tags" => $tags_code,
							"cate_id" => $this->input->post("cate_id")
						);
					if($_FILES['img']['name'] != NULL){
						$config['upload_path'] = './uploads/news';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '2000';
						$config['max_width']  = '1400';
						$config['max_height']  = '1400';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("img")){
							$data = array('error' => $this->upload->display_errors());
							$data['title'] = "Sửa tin tức";
							$data['template'] = "news/edit_news";
							$data['data'] = "";
							$data['act'] = 5;
							$data['get'] = $this->mnews->get_newsdata($id);
							$data['listcago'] = $this->mnews->listcago();
							$data['stt'] = $data['get']['cate_id'];
							$this->load->view("layout",$data);
							return FALSE;
						}else{
							$data = $this->upload->data();
							$db['news_images'] = $data['file_name'];
							$this->createThumbnail("uploads/news",$db['news_images'],170,160);
						}
					 }
					 $this->mnews->update($db,$id);
					 redirect(base_url()."admin/news/index");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function search(){
			$title = $this->input->post("val");
			if($title == NULL){
				echo "Bạn phải nhập tiêu đề tin!";
			}else{
				$data  = $this->mnews->search_ajax($title);
				if($data == NULL){
					echo "Không tìm thấy tin tức nào!";
				}else{
					echo '<table cellpadding="0" cellspacing="0" width="905">
									<tbody><tr>
									  <th width="23">Stt.</th>
									  <th width="300">Tiêu đề tin</th>
									  <th width="136">Tác giả</th>
									  <th width="132">Ngày đăng</th>
									  <th width="64">Actions</th>
									</tr>';
					$stt = 0;
					foreach($data as $items){
						$stt++;
						echo "<tr>";	
						echo "<td>$stt</td>";
						echo "<td>".$items['news_title']."</td>";
						echo "<td>".$items['news_author']."</td>";
						echo "<td>".$items['news_date']."</td>";
						echo "<td>";
							echo "<div class='actions_menu'><ul>";
								echo "<li><a href='".base_url()."admin/news/update/$items[news_id]/' class='edit'>Edit</a></li>";
								echo "<li><a href='".base_url()."admin/news/del/$items[news_id]/' class='delete' onclick='return check()'>Del</a></li>";
							echo "</ul></div>";
						echo "</td>";

						echo "</tr>";
					}
					echo "</tbody></table>";
				}
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$data = $this->mnews->get_newsdata($id);
			@unlink("uploads/news/".$data['news_images']);
			$this->mnews->del_news($id);
			redirect(base_url()."admin/news");
		}
		public function createThumbnail($parth,$fileName,$width,$height){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $parth.'/'.$fileName;
			$config['new_image'] = $parth.'/thumb/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}