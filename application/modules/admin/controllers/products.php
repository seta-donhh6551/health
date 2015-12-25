<?php
	require("libraries/student.php");
	class Products extends Student{
		public function __construct(){
			parent::__construct();
			$this->load->model("mproducts");
			$this->load->helper("form");
			$this->load->library("form_validation");	
			$this->load->library("string");					
		}
		public function index(){
			$config['base_url'] = base_url().'admin/products/index/';
			$config['total_rows'] = $this->mproducts->count_all();
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['next_link'] = "Next";
			$config['prev_link'] = "Prev";
			$this->load->library("pagination");
			$this->pagination->initialize($config); 
			$start = $this->uri->segment(4);
			$data['title']="Quản lý sản phẩm";
			$data['act'] = 6;
			$data['listcate'] = $this->mproducts->getcate();
			$data['data']['info']= $this->mproducts->listall($config['per_page'],$start);
			$data['template'] = "products/list_products";
			$this->load->view("layout",$data);
		}
		public function add(){
			$data['error'] = "";
			$data['title'] = "Thêm mới sản phẩm";
			$data['template'] = "products/add_products";
			$data['act'] = 6;
			$data['data']['info'] = $this->mproducts->getcate();
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("pro_name","Tên sản phẩm","min_length[5]|callback_check_pro");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					  $url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('pro_name'))));
					  $db = array(
							"pro_name" => $this->input->post("pro_name"),
							"pro_name_rewrite" => $url,
							"pro_info" => $this->input->post("pro_info"),
							"pro_full" => $this->input->post("pro_full"),
							"pro_price" => $this->input->post("pro_price"),
							"pro_location" => $this->input->post("pro_location"),
							"pro_war" => $this->input->post("pro_war"),
							"pro_ship" => $this->input->post("pro_ship"),
							"cate_id" => $this->input->post("pro_cate")
						);
					if($_FILES['img']['name'] != NULL){
						$config['upload_path'] = './uploads/products';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '2000';
						$config['max_width']  = '1024';
						$config['max_height']  = '1000';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("img")){
							$data = array('error' => $this->upload->display_errors());
							$data['title'] = "Thêm mới sản phẩm";
							$data['template'] = "products/add_products";
							$data['act'] = 6;
							$data['data']['info'] = $this->mproducts->getcate();
							$this->load->view("layout",$data);
							return FALSE;
						}else{
							$data = $this->upload->data();
							$db['pro_images'] = $data['file_name'];
							$this->createThumbnail($db['pro_images']);
						}
					 }
					 $this->mproducts->add_pro($db);
					 redirect(base_url()."admin/products/index");				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function check_pro($pro){
			$id = $this->uri->segment(4);
			if($this->mproducts->check_products($pro,$id) == FALSE){
				$this->form_validation->set_message("check_pro","Sản phẩm này đã tồn tại!");
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function ajax(){
			$id = $this->uri->segment(4);
			$data = $this->mproducts->get_cago($id);
			echo "<select name='pro_cago'>";
			echo "<option value='0'>-- Chọn mục --</option>";
			foreach($data as $item){
				echo "<option value='".$item['cago_id']."'>".$item['cago_name']."</option>";
			}
			echo "</select>";
		}
		public function show_pro(){
			$id = $this->uri->segment(4);
			$data = $this->mproducts->show_prodata($id);
			echo '<table  width="700" align="center">
				  <tr>
				    <td width="25" class="title" align="center"><input type="checkbox" name="checkall" onclick="chkallClick(this)"/></td>
				    <td width="295" class="title" align="center">Tên sản phẩm</td>
				    <td width="96" class="title" align="center">Giá tiền</td>
				    <td width="36" class="title" align="center">Sửa</td>
				    <td width="30" class="title " align="center">Xóa</td>
				  </tr>';
			if($data != NULL){
				foreach($data as $item){
					echo "<tr>";
					echo "<td class='td'><input type='checkbox' name='check[]' value='".$item['pro_id']."'/></td>";
					echo "<td class='td'>".$item['pro_name']."</td>";
					echo "<td class='td'>".number_format($item['pro_price'])." VND</td>";
					echo "<td class='td'><a href='".base_url()."admin/products/update/".$item['pro_id']."'>Sửa</a></td>";
					echo "<td class='td'><a href='".base_url()."admin/products/del/".$item['pro_id']."'>Xóa</a></td>";
					echo "</tr>";
					}
			}else{
				echo "<tr>";
				echo "<td colspan='6' class='td'>Không có sản phẩm nào</td>";
				echo "</tr>";
			}
			echo '</table>';
		}
		public function update(){
			$id = $this->uri->segment(4);
			$this->load->helper("form");
			$this->load->library("form_validation");
			$data['error'] = "";
			$data['act'] = 6;
			$data['title'] = "Sủa thông tin sản phẩm";
			$data['template'] = "products/edit_products";
			$data['data']['info'] = $this->mproducts->getcate();
			$data['data']['get'] = $this->mproducts->get_prodata($id);
			if($this->input->post("ok") != ""){
				$this->form_validation->set_rules("pro_name","Tên sản phẩm","min_length[5]|callback_check_pro");
				if($this->form_validation->run() == FALSE){
					$this->load->view("layout",$data);
				}else{
					$url = str_replace(' ', '-',strtolower($this->string->replace($this->input->post('pro_name'))));
					  $db = array(
							"pro_name" => $this->input->post("pro_name"),
							"pro_name_rewrite" => $url,
							"pro_info" => $this->input->post("pro_info"),
							"pro_full" => $this->input->post("pro_full"),
							"pro_price" => $this->input->post("pro_price"),
							"pro_location" => $this->input->post("pro_location"),
							"pro_war" => $this->input->post("pro_war"),
							"pro_ship" => $this->input->post("pro_ship"),
							"cate_id" => $this->input->post("pro_cate")
						);
					if($_FILES['img']['name'] != NULL){
						$config['upload_path'] = './uploads/products';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '1000';
						$config['max_width']  = '1024';
						$config['max_height']  = '1000';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload("img")){
							$data = array('error' => $this->upload->display_errors());
							$data['title'] = "Sủa thông tin sản phẩm";
							$data['template'] = "products/edit_products";
							$data['act'] = 6;
							$data['data']['info'] = $this->mproducts->getcate();
							$data['data']['get'] = $this->mproducts->get_prodata($id);
							$this->load->view("layout",$data);
							return FALSE;
						}else{
							$data = $this->upload->data();
							$db['pro_images'] = $data['file_name'];
							$this->createThumbnail($db['pro_images']);							
						}
					 }
					 $this->mproducts->update($db,$id);
					 redirect(base_url()."admin/products/index");
				}
			}else{
				$this->load->view("layout",$data);
			}
		}
		public function del(){
			$id = $this->uri->segment(4);
			$data = $this->mproducts->get_prodata($id);
			$ok = $data['pro_images'];
			@unlink("uploads/products/".$ok);
			@unlink("uploads/products/thumb/".$ok);
			$this->mproducts->del_pro($id);
			redirect(base_url()."admin/products");
		}
		public function delall(){
			$id = $this->input->post("check");
			if($id != NULL){
				foreach($id as $item){
					$data = $this->mproducts->get_prodata($item);
			  		$ok = $data['pro_images'];
					$this->mproducts->del_pro($item,$ok);
				}
				redirect(base_url()."admin/products");
			}else{
				redirect(base_url()."admin/products");
			}
		}
		public function createThumbnail($fileName){
			$this->load->library('image_lib');
			//$this->load->helper('thumbnail_helper');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/products/'.$fileName;
			$config['new_image'] = 'uploads/products/thumb/'.$fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['width'] = 155;
			$config['height'] = 155;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}