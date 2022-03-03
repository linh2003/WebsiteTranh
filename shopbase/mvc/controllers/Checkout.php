<?php
/**
 * 
 */
class Checkout extends Frontend
{
	private $customer;
	private $transaction;
	private $order;
	function __construct()
	{
		parent::__construct();
		$this->customer 	= $this->model('CustomerModel');
		$this->transaction 	= $this->model('TransactionModel');
		$this->order 		= $this->model('OrderModel');
	}
	public function index()
	{
		if (empty($_SESSION['cart'])) {
			header('location: ' . SITE_URL .'cart');
		}else{
			// if(isset($_POST['checkout'])){
				// $error = array();
				// echo '<pre>';
				// print_r($_POST);
				// echo '</pre>';
				// //name
				// $name = $_POST['name'];
				// if(empty($name)){
					// $error['name'] = 'Tên đang trống';
				// }
				// //phone
				// $phone = $_POST['phone'];
				// if(empty($name)){
					// $error['name'] = 'SĐT đang trống';
				// }else if(count($phone) != 10){
					// $error['name'] = 'SĐT chưa đúng';
				// }
				// //address
				// $address = $_POST['address'];
				// if(empty($address)){
					// $error['address'] = 'Địa chỉ đang trống';
				// }
				// $this->data['error'] = $error;
				// $input = array(
					// 'name' 		=> $name,
					// 'email' 	=> $_POST['email'],
					// 'phone' 	=> $phone,
					// 'address' 	=> $address,
					// 'message' 	=> $_POST['message'],
				// );
				// die();
			// }
			$this->data['title'] = 'Checkout';
			// if(empty($this->data)){
				// $this->customer->insertData($input);
				// $this->views('page/checkout_success',$this->data);
			// }else{
				$this->views('page/checkout',$this->data);
			//}
			
		}
	}
}