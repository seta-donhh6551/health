<?php
   require_once(APPPATH."modules/home/controllers/application.php");
   class Cart extends Application{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->library('cart');
		   $this->load->helper('form');
		   $this->load->model("mcart");
	   }
	   public function index(){
		   $this->load->model("mcate");
		   $data = $this->menu();
		   $data['menu'] = $this->menu_top();
		   $data['spbc'] = $this->spbc();
		   $data['spm'] = $this->spm();
		   $data['catenews'] =  $this->mcart->get_menu_cate();
		   $data['title'] = "Giỏ hàng của bạn";
		   $this->load->view("cart/layout",$data);
	   }
	   public function add(){
		   	$data =  $this->mcart->getpro($this->uri->segment(4));
		   	$getshop=$this->cart->contents();
			$data['pro_qty'] = 1;
			foreach($getshop as $item)
			{
				if($item['id'] == $data['pro_id'])
				{
					$data['pro_qty'] = $item['qty']+1;
				}
			}
			$shop = array(
               'id'      => $data['pro_id'],
               'qty'     => $data['pro_qty'],
               'price'   => $data['pro_price'],
               'name'    => url_title($data['pro_name']),
               'options' => array('images' => $data['pro_images'])
            );
			$this->cart->insert($shop);
			redirect(base_url().'home/cart/view','refresh');

	   }
	   public function view(){
		  $data = $this->news_ty(); 
		  $data['menu'] = $this->menu();
		  $data['mn'] = $this->menu_top();
		  $data['cart'] = $this->cart->contents();
		  $data['title'] = "Giỏ hàng của bạn";
		  $this->load->view("cart/layout",$data);
	   }
	   public function updatecart(){
			for ($i = 1; $i <= $this->cart->total_items(); $i++){
	        $item = $this->input->post($i);
	        $data = array(
	                'rowid'    => $item['rowid'],
	                'qty'    => $item['qty']
				        );
	        $this->cart->update($data);
			}
			redirect(base_url().'home/cart/view','refresh');		
		
		}
	   public function del(){
		  	$getshop=$this->cart->contents();
			foreach($getshop as $item){
				if($item['id'] == $this->uri->segment(4)){
					$data['rowid']=$item['rowid'];
					$data['qty'] = 0;
			        $this->cart->update($data);
					break;
				}
			}
			redirect(base_url().'home/cart/view','refresh');	
	   }
	   public function emptycart(){
		   $this->cart->destroy();
			redirect(base_url().'home/cart/view','refresh');	
	   }
	   public function ajax(){
		   $this->load->helper("date");
		   $name = $this->input->post("name");
		   $email = $this->input->post("email");
		   $phone = $this->input->post("phone");
		   $adress = $this->input->post("adress");
		   $time = $this->input->post("time");
		   $date = $this->input->post("date");
		   $info  = $this->input->post("info");
		   $ok1 = $ok2 = "";
		   if($name != NULL && $email != NULL && $adress != NULL && $phone != NULL){
				$null = "/^[a-zA-Z]{1}[a-zA-Z0-9._]{3,25}\@[a-zA-Z0-9]{3,}\.[a-zA-Z.]{2,8}$/";
				$pho =  "/^[0]{1}[0-9]{8,10}$/";
				if(preg_match($null,$email)){
					$ok1 = TRUE;
				}else{
					echo "Email không hợp lệ <br />";
				}
				if(preg_match($pho,$phone)){
					$ok2 = TRUE;
				}else{
					echo "Số điện thoại không hợp lệ<br />";
				}
				if($ok1 == TRUE && $ok2 == TRUE){
					$data = array(
								"con_name" => $name,
								"con_email" => $email,
								"con_phone" => $phone,
								"con_full" => $info,
								"con_date" => now()
							);
					
					echo "<span style='color:#F90;font-weight:bold;'>Cảm ơn bạn đã đặt hàng,chúng tôi sẽ sớm liên lạc với bạn.</span>";
				}
			}else{
				echo 1;
			}
	   }
   }