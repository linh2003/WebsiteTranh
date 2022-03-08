<?php
/**
 * 
 */
class Checkout extends Frontend
{
	private $customer;
	private $transaction;
	private $order;
	private $times;
	function __construct()
	{
		parent::__construct();
		$this->customer 	= $this->model('CustomerModel');
		$this->transaction 	= $this->model('TransactionModel');
		$this->times 		= $this->library('Support');
	}
	public function index()
	{
		if (!isset($_SESSION['cart'])) {
			header('location: ' . SITE_URL .'cart');
		}else{
			$this->data['title'] = 'Checkout';
			if(isset($_POST['checkout'])){
				$error = array();
				// echo 'POST<pre>';
				// print_r($_POST);
				// echo '</pre>';
				//name
				$name = $_POST['name'];
				if(empty($name)){
					$error['name'] = 'Tên đang trống';
				}
				//phone
				$phone = $_POST['phone'];
				if(empty($phone)){
					$error['phone'] = 'SĐT đang trống';
				}else if(strlen($phone) != 10){
					$error['phone'] = 'SĐT chưa đúng';
				}
				//address
				$address = $_POST['address'];
				if(empty($address)){
					$error['address'] = 'Địa chỉ đang trống';
				}
				$this->data['error'] = $error;
				//save customer
				$input = array(
					'name' 		=> $name,
					'email' 	=> $_POST['email'],
					'phone' 	=> $phone,
					'address' 	=> $address
				);
				// echo 'data error<pre>';
				// print_r($this->data['error']);
				// echo '</pre>';
				// echo 'Customer<pre>';
				// print_r($input);
				// echo '</pre>';
				if(empty($this->data['error'])){
					$customer = $this->customer->getSumInput(['where'=>array('phone'=>$phone)]);
					if($customer == 0){
						$customer = $this->customer->insertData($input);
					}else{
						$args = array(
							'set' 	=> $input,
							'where' => array('phone'=>$phone),
						);
						$customer = $this->customer->update($args);
					}
					/*
					* save transaction
					* product_info save format json:{"key1":qty1,"key2":qty2}
					*/
					$amount = 0;
					$product_info = array();
					foreach($_SESSION['cart'] as $key => $item){
						$amount = $amount + ($item['qty'] * ($item['price'] - $item['discount']));
						$product_info[$key] = $item['qty'];
					}
					$times = $this->times->createTime();
					$input = array(
						'product_info' 	=> json_encode($product_info),
						'payment' 		=> $_POST['payment'],
						'amount' 		=> $amount,
						'time' 			=> $times,
						'status' 		=> 0,
						'customer_id' 	=> $phone,
					);
					// echo 'Transaction<pre>';
					// print_r($input);
					// echo '</pre>';
					$transaction = $this->transaction->insertData($input);
					// echo '<br/>customer query:' .$customer;
					// echo '<br/>transaction query:' .$transaction;
					if($customer && $transaction){
						unset($_SESSION['cart']);
						$this->data['title'] = 'Checkout success';
						require_once CONTROLLER_PATH .'Email.php';
						$email = new Email($input);
						$sendmail = $email->sendMail();
						$this->data['sendmail'] = $sendmail;
						echo '<pre>Data';
						print_r($this->data);
						echo '</pre>';
						$this->views('page/checkout_success',$this->data);
					}
				}else{
					$this->data['post'] = $input;
					$this->views('page/checkout',$this->data);
				}
			}
			$this->views('page/checkout',$this->data);
		}
	}
	public function filterPhone($phone='')
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		$phone = isset($_POST['phone'])?$_POST['phone']:'';
		$customer = $this->customer->getListInput(['where'=>array('phone'=>$phone)]);
		$info = array();
		foreach($customer as $item){
			$info['name'] 		= $item['name'];
			$info['email'] 		= $item['email'];
			$info['address'] 	= $item['address'];
		}
		$info = json_encode($info);
		print_r($info);
	}
}