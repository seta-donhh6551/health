<?php
   require_once(APPPATH."modules/home/controllers/application.php");
   class Payment extends Application{
	   public function __construct(){
		   parent::__construct();
		   $this->load->helper("url");
		   $this->load->library('cart');
		   $this->load->model("morder");
		   $this->load->library('session');
	   }
	   public function index(){
		   $data = $this->news_ty(); 
		   $data['mn'] = $this->menu_top();
		   $data['title'] = "Thanh toán - Payment";
		   $this->load->view("pay/layout",$data);
	   }
	   public function ran(){
			$input = array("a","b","c","d","e","f","g","h","j","k","l","m","z","x","y","q");
			$rand_keys = array_rand($input, 3);
			echo $input[$rand_keys[0]].$input[$rand_keys[1]].$input[$rand_keys[2]];
	   }
	   public function ajax(){
		   $this->load->helper("form");
		   $this->load->helper('date');
		   $name = $this->input->post("name");
		   $email = $this->input->post("email");
		   $phone = $this->input->post("phone");
		   $adress = $this->input->post("ads");
		   $info = $this->input->post("noi");
		   $ok1 = $ok2 = "";
		   $input = array("a","b","c","d","e","f","g","h","j","k","l","m","z","x","y","q");
		   $rand_keys = array_rand($input, 3);
	 	   $ran = $input[$rand_keys[0]].$input[$rand_keys[1]].$input[$rand_keys[2]];
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
					$session = array(
									"order_ran" => $ran
					  			);
					$this->session->set_userdata($session);
					$data = array(
								"don_name" => $name,
								"don_email" => $email,
								"don_phone" => $phone,
								"don_info" => $info,
								"don_adress" => $adress,
								"order_ran" => $ran,
								"don_date" => now()
							);
					$this->morder->insert($data);
					echo "<script>location.href='".base_url()."home/payment/buoc2';</script>";
				}
			}else{
				echo 1;
			}
	   }
   }