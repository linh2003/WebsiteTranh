<?php 
/**
 * Admin Controller
 */
class Admin extends Controller
{
	private $transaction;
	private $customer;
	private $product;
	function __construct()
	{
		session_start();
	}
	public function index()
	{
		if(!isset($_SESSION['admin'])){
			$error = (isset($_POST['submit']))?'Username or Password invalid':'';
			$this->view('admin/login',['error'=>$error]);
			if(isset($_POST['submit'])){
				$admin = $this->model('AdminModel','admin/');
				$username = isset($_POST['username'])?$_POST['username']:'';
				$password = isset($_POST['password'])?$_POST['password']:'';
				$admin = $admin->getAll();
				while($row = mysqli_fetch_assoc($admin)){
					if($row['username'] == $username && $row['password'] == $password){
						$_SESSION['admin']['name'] = $row['fullname'];
						header('location: ' . ADMIN_URL);
						break;
					}
				}
			}
		}else{
			$this->product = $this->model('ProductsModel');
			$this->customer = $this->model('CustomerModel');
			$this->transaction = $this->model('TransactionModel');
			$data = array();
			//get list transaction pending
			$where = array(
				'where' => array('status'=>0),
				'orderby' => array('id'=>'DESC')
			);
			$transaction = $this->transaction->getListInput($where);
			$transactions = array();
			foreach($transaction as $item){
				$id = $item['id'];
				$transactions[$id]['item'] = $item;
				$phone = $item['customer_id'];
				$transactions[$id]['customer'] = $this->customer->getListInput(['where'=>array('phone'=>$phone)]);
				$product_info = json_decode($item['product_info']);
				$product_info = (array)$product_info;
				$products = array();
				foreach($product_info as $key => $val){
					$products[$key]['info'] = $this->product->getListInput(['where'=>array('id'=>$key)]);
					$products[$key]['qty'] = $val;
					$transactions[$id]['product'] = $products;
				}
			}
			$data['transactions'] = $transactions;
			//get list transaction success
			$where = array(
				'where' => array('status'=>1),
				'orderby' => array('id'=>'DESC')
			);
			$tran_success = $this->transaction->getListInput($where);
			$transactions = array();
			foreach($tran_success as $item){
				$id = $item['id'];
				$transactions[$id]['item'] = $item;
				$phone = $item['customer_id'];
				$transactions[$id]['customer'] = $this->customer->getListInput(['where'=>array('phone'=>$phone)]);
				$product_info = json_decode($item['product_info']);
				$product_info = (array)$product_info;
				$products = array();
				foreach($product_info as $key => $val){
					$products[$key]['info'] = $this->product->getListInput(['where'=>array('id'=>$key)]);
					$products[$key]['qty'] = $val;
					$transactions[$id]['product'] = $products;
				}
			}
			$data['tran_success'] = $transactions;
			$data['content'] = 'index';
			$this->view('admin/main',$data);
		}
		
	}
	public function edit($param=[])
	{
		if(!empty($param)){
			$id = intval($param[0]);
			$this->transaction = $this->model('TransactionModel');
			$transaction = $this->transaction->getListInput(['where'=>array('id'=>$id)]);
			if($transaction->num_rows == 0){
				$_SESSION['message'] = 'Not exists transaction';
			}else{
				$input = array(
					'set' 	=> array('status'=>1),
					'where' => array('id'=>$id)
				);
				$action = $this->transaction->update($input);
				if($action){
					$_SESSION['message'] = 'Update status complete';
				}else{
					$_SESSION['message'] = 'Update status fail';
				}
			}
		}
		header('location: ' . ADMIN_URL);
	}
	public function del($param=[])
	{
		if(!empty($param)){
			$id = intval($param[0]);
			$this->transaction = $this->model('TransactionModel');
			$transaction = $this->transaction->getListInput(['where'=>array('id'=>$id)]);
			if($transaction->num_rows == 0){
				$_SESSION['message'] = 'Not exists transaction';
			}else{
				$where = array(
					'id' => $id
				);
				$action = $this->transaction->del($where);
				if($action){
					$_SESSION['message'] = 'Delete transaction complete';
				}else{
					$_SESSION['message'] = 'Delete transaction fail';
				}
			}
		}
		header('location: ' . ADMIN_URL);
	}
	public function categories($param=[]){
		$this->checkLogin();
		$file = 'Categories';
		require_once 'admin/'.$file.'.php';
		new $file($param);
	}
	public function products($param=[]){
		$this->checkLogin();
		$file = 'Products';
		require_once 'admin/'.$file.'.php';
		new $file($param);
	}
	public function logout(){
		session_start();
		session_unset();
		header('location: ' . ADMIN_URL);
	}
	private function checkLogin(){
		if(!isset($_SESSION['admin'])){
			echo '<br/>SESSION Admin empty';
			$this->index();
			exit();
		}
	}
}
?>