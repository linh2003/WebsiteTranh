<?php 
/**
 * Admin Controller
 */
class Admin extends Controller
{
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
			
			$this->view('admin/main',['content'=>'index']);
		}
		
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