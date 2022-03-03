<?php
/**
 * 
 */
class Cart extends Frontend
{
	private $url = SITE_URL .'product/index/';
	
	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION)){
			session_start();
		}
	}
	public function index()
	{
		$this->data['title'] = 'Giỏ Hàng Của Tôi';
		if(isset($_SESSION['cart'])){
			$this->data['info'] = $_SESSION['cart'];
		}
		$this->views('page/cart',$this->data);
	}
	public function add()
	{
		echo 'SESSION before<pre>';
		print_r($_SESSION);
		echo '</pre>';
		
		echo 'POST<pre>';
		print_r($_POST);
		echo '</pre>';
		$qty = isset($_POST['pro_qty'])?intval($_POST['pro_qty']):'';
		echo '<br/>qty:';
		var_dump($qty);
		$id = isset($_POST['id'])?$_POST['id']:'';
		echo '<br/>id:' .$id;
		$slug = '';
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}
		if(!array_key_exists($id,$_SESSION['cart'])){
			echo '<br/>key not exists:';
			$item = $this->product->getListInput(['where'=>array('id'=>$_POST['id'])]);
			foreach($item as $val){
				$_SESSION['cart'][$id] = array(
					'name' 		=> $val['name'],
					'slug' 		=> $val['slug'],
					'image' 	=> $val['image'],
					'price' 	=> $val['price'],
					'discount' 	=> $val['discount'],
					'qty' 		=> $qty,
				);
			}
			$_SESSION['cart_notify'] = $_SESSION['cart'][$id];
		}else{
			echo '<br/>key exists:';
			foreach($_SESSION['cart'][$id] as $key => &$v){
				if($key == 'qty'){
					$v = $v + $qty;
				}
			}
		}
		$slug = $_SESSION['cart_notify']['slug'];
		$_SESSION['cart_on'] = true;
		// echo 'This Data<pre>';
		// print_r($this->data);
		// echo '</pre>';
		//session_destroy();
		echo 'SESSION last<pre>';
		print_r($_SESSION);
		echo '</pre>';
		$this->url .= $slug;
		header('location: ' . $this->url);
	}
	public function update()
	{
		// echo 'POST<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// echo 'SESSION before<pre>';
		// print_r($_SESSION);
		// echo '</pre>';
		foreach ($_POST['updates'] as $key => $val) {
			if ($_SESSION['cart'][$key]['qty'] != $val) {
				if($val == 0){
					if(count($_SESSION['cart']) == 1){
						session_destroy();
						break;
					}else{
						unset($_SESSION['cart'][$key]);
						continue;
					}
				}
				$_SESSION['cart'][$key]['qty'] = $val;
			}
		}
		// echo 'SESSION after<pre>';
		// print_r($_SESSION);
		// echo '</pre>';
		header('location: ' . SITE_URL .'cart');
	}
	public function del($id='')
	{
		// echo 'SESSION<pre>';
		// print_r($_SESSION['cart']);
		// echo '</pre>';
		// echo '<br/>id_0;' .$id[0];
		if(empty($id)){
			session_destroy();
		}else if(isset($_SESSION['cart'])){
			if(array_key_exists($id[0],$_SESSION['cart'])){
				if(count($_SESSION['cart']) == 1){
					session_destroy();
				}else{
					unset($_SESSION['cart'][$id[0]]);
				}
			}
		}
		header('location: ' . SITE_URL .'cart');
	}
}