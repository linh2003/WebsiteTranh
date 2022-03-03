<?php
/**
 * 
 */
class Products extends Controller
{
	private $product = '';
	private $cat = '';
	private $url = 'products';
	private $slug = '';
	private $param = '';
	private $pagination = '';
	function __construct($param)
	{
		$this->lib = $this->library('UploadFiles');
		$this->pagination = $this->library('Pagination');
		$this->slug = $this->library('Slug');
		$this->cat = $this->model('CategoriesModel','admin/');
		$this->product = $this->model('ProductsModel','admin/');
		$this->param = $param;
		if (!empty($param)) {
			if (isset($param[0])) {
				switch ($param[0]) {
					case 'add':
						$this->add();
						break;
					case 'edit':
						$this->edit();
						break;
					case 'del':
						$this->del();
						break;
					default:
						$this->index();
						break;
				}
			}
		}else{
			$this->index();
		}
	}
	public function index(){
		$input = array();
		//so luong phan tu tren 1 page
		$per_page = 2;
		//get current page on the url
		$current_page = 1;
		if(isset($this->param[1]) && $this->param[1] != 0){
			$current_page = intval($this->param[1]);			
		}
		//Filter
		if(isset($_GET)){
			$id = isset($_GET['id'])?$_GET['id']:'';
			if(!empty($id)){
				$input['where']['id'] = $id;
			}
			$name = isset($_GET['name'])?$_GET['name']:'';
			if(!empty($name)){
				$input['like']['name'] = $name;
			}
			$cat_id = isset($_GET['cat_id'])?$_GET['cat_id']:'';
			if(!empty($cat_id)){
				$input['where']['cat_id'] = $cat_id;
			}
		}	
		//Get product
		$total = $this->product->getSumInput($input);
		$config = array(
			'total' 		=> $total,
			'per_page' 		=> $per_page,
			'current_page' 	=> $current_page,
		);
		$from = $this->pagination->init($config);
		$input['orderby']	= array('id'=>'DESC');
		$input['limit']		= $from .',' .$per_page;
		$product = $this->product->getListInput($input);
		$cat = $this->cat->getAll();
		$parent_cat = $this->cat->getListInput(['where'=>array('parent_id'=>0)]);
		//get all product
		$sumproduct = $this->product->getTotal();
		//get view
		$this->view(
			'admin/main',
			[
				'url'			=> $this->url,
				'content'		=> 'list',
				'cat'			=> $cat,
				'parent_cat'	=> $parent_cat,
				'product'		=> $product,
				'sumproduct'	=> $sumproduct,
				'pagination'	=> $this->pagination,
			]
		);
	}
	public function add(){
		$cat 		= $this->cat->getAll();
		$parent_cat = $this->cat->getListInput(['where'=>array('parent_id'=>0)]);
		$error = array();
		if(isset($_POST['add'])){
			$name 		= @$_POST['name'];
			if(empty($name)){
				$error['name']='Field Name not empty';				
			}
			$img_base = 'picturebase.jpg';
			$picture = basename($_FILES['picture']['name']);
			if(empty($picture)){
				$picture = $img_base;
			}else{
				$tmp_name = $_FILES['picture']['tmp_name'];
				$picture = $this->lib->UploadFile($picture,$tmp_name);
				if($picture == false){
					$error['picture']='Image type must jpg|jpeg|png|gif';
				}
			}
			$imglist = $_FILES['imglist'];
			$multiImg = '';
			if(empty($imglist['name'][0])){
				$imglist = $img_base;
			}else{
				$multiImg = $this->lib->UploadMultiFiles($imglist);
				if($multiImg == false){
					$error['img']='Image type must jpg|jpeg|png|gif';
				}
			}
			$catalog 	= @$_POST['catalog'];
			$price 		= str_replace(',','',@$_POST['price']);
			if(empty($price)){
				$error['price'] = 'Field Price not empty';
			}
			$discount 	= str_replace(',','',@$_POST['discount']);
			$created 	= @$_POST['created'];
			$content 	= @$_POST['content'];
			if(empty($error)){
				$slug = $this->slug->create($name);
				$input = array(
					'name'		=> $name,
					'slug'		=> $slug,
					'image'		=> $picture,
					'image_list'=> $multiImg,
					'cat_id'	=> $catalog,
					'price'		=> $price,
					'discount'	=> $discount,
					'created'	=> $created,
					'content'	=> $content,
				);
				$flag = $this->product->insertData($input);
				if($flag){
					$_SESSION['message'] = 'Insert data success';
					header('location: ' . ADMIN_URL . '/' . $this->url);
				}
			}
		}
		$this->view(
			'admin/main',
			[
				'url'			=> $this->url,
				'error'			=> $error,
				'content'		=> 'add',
				'cat'			=> $cat,
				'parent_cat'	=> $parent_cat
			]
		);
	}
	public function edit(){
		$cat 		= $this->cat->getAll();
		$parent_cat = $this->cat->getListInput(['where'=>array('parent_id'=>0)]);
		$error = array();
		$id = '';
		if(isset($this->param[1])){
			$id = $this->param[1];
		}
		$info = $this->product->getListInput(['where'=>array('id'=>$id)]);
		$info = $info->fetch_assoc();
		if(count($info)==0){
			$_SESSION['message'] = 'Not exists product';
			header('location: ' . ADMIN_URL . '/' . $this->url);
			exit();
		}
		$input = array();
		if(isset($_POST['update'])){
			$name 		= @$_POST['name'];
			if(empty($name)){
				$error['name']='Field Name not empty';				
			}
			$slug = @$_POST['slug'];
			$picture = basename($_FILES['picture']['name']);
			if(!empty($picture)){
				$tmp_name = $_FILES['picture']['tmp_name'];
				$picture = $this->lib->UploadFile($picture,$tmp_name);
				if($picture == false){
					$error['picture']='Image type must jpg|jpeg|png|gif';
				}
				$input['set']['image'] = $picture;
			}
			$imglist = $_FILES['imglist'];
			$multiImg = '';
			if(!empty($imglist['name'][0])){
				$multiImg = $this->lib->UploadMultiFiles($imglist);
				if($multiImg == false){
					$error['img']='Image type must jpg|jpeg|png|gif';
				}
				$input['set']['image_list'] = $multiImg;
			}
			$catalog 	= @$_POST['catalog'];
			$price 		= str_replace(',','',@$_POST['price']);
			if(empty($price)){
				$error['price'] = 'Field Price not empty';
			}
			$discount 	= str_replace(',','',@$_POST['discount']);
			$created 	= @$_POST['created'];
			$content 	= @$_POST['content'];
			if(empty($error)){
				if(empty($slug)){
					$slug = $this->slug->create($name);		
				}
				$input['set']['name'] 		= $name;
				$input['set']['slug'] 		= $slug;
				$input['set']['cat_id'] 	= $catalog;
				$input['set']['price'] 		= $price;
				$input['set']['discount'] 	= $discount;
				$input['set']['created'] 	= $created;
				$input['set']['content'] 	= $content;
				$input['where']['id'] 		= $id;
				$flag = $this->product->update($input);
				if($flag){
					$_SESSION['message'] = 'Update data success';
					header('location: ' . ADMIN_URL . '/' . $this->url);
				}
			}
		}
		// get view
		$this->view(
			'admin/main',
			[
				'url'			=> $this->url,
				'error'			=> $error,
				'content'		=> 'edit',
				'cat'			=> $cat,
				'parent_cat'	=> $parent_cat,
				'info'			=> $info,
			]
		);
	}
	public function del(){
		$id = '';
		if(isset($this->param[1])){
			$id = $this->param[1];
		}
		$info = $this->product->getListInput(['where'=>array('id'=>$id)]);
		$info = $info->fetch_assoc();
		// echo '<pre>';
		// print_r($info);
		// echo '</pre>';
		// die();
		if(count($info)==0){
			$_SESSION['message'] = 'Not exists product';
			header('location: ' . ADMIN_URL . '/' . $this->url);
			exit();
		}
		$flag = $this->product->del(['id'=>$id]);
		if($flag){
			$image = UPLOAD_DIR . $info['image'];
			unlink($image);
			$imglist = explode(',',$info['image_list']);
			foreach($imglist as $img){
				$path = UPLOAD_DIR . $img;
				unlink($path);
			}
			$_SESSION['message'] = 'Delete data success';
			header('location: ' . ADMIN_URL . '/' . $this->url);
		}
	}
}