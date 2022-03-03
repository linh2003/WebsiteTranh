<?php
/**
 * 
 */
class Categories extends Controller
{
	private $cat = '';
	private $url = 'categories';
	private $param = '';
	private $lib = '';
	private $slug = '';
	private $pagination = '';
	function __construct($param)
	{
		$this->lib = $this->library('UploadFiles');
		$this->pagination = $this->library('Pagination');
		$this->slug = $this->library('Slug');
		$this->cat = $this->model('CategoriesModel','admin/');
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
					case 'delete':
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
		$per_page = 5;
		//get current page on the url
		$current_page = 1;
		if(isset($this->param[1]) && $this->param[1] != 0){
			$current_page = intval($this->param[1]);			
		}
		//Get product
		$total = $this->cat->getTotal();
		$config = array(
			'total' 		=> $total,
			'per_page' 		=> $per_page,
			'current_page' 	=> $current_page,
		);
		$from = $this->pagination->init($config);
		$input['orderby']	= array('id'=>'DESC');
		$input['limit']		= $from .',' .$per_page;
		$cat = $this->cat->getListInput($input);
		$this->view(
			'admin/main',
			[
				'url'			=> $this->url,
				'content'		=> 'list',
				'sum'			=> $total,
				'cat'			=> $cat,
				'pagination'	=> $this->pagination,
			]
		);
	}
	public function add(){
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
					$error['img']='Image type must jpg|jpeg|png|gif';
				}
			}
			$parentCat = @$_POST['parent_cat'];
			$sort_order = (int)@$_POST['sort_order'];
			if(empty($sort_order) || is_int($sort_order) == false){
				$sort_order = 0;
			}
			if(empty($error)){
				$slug = $this->slug->create($name);
				$input = array(
					'name'		=> $name,
					'meta_key'	=> $slug,
					'picture'	=> $picture,
					'parent_id'	=> $parentCat,
					'sort_order'=> $sort_order
				);
				$flag = $this->cat->insertData($input);
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
				'parent_cat'	=> $parent_cat
			]
		);
	}
	public function edit(){
		$id = 0;
		if(isset($this->param[1])){
			$id = intval($this->param[1]);
			$parent_cat = $this->cat->getListInput(['where'=>array('parent_id'=>0)]);
			$cat = $this->cat->getListInput(['where'=>array('id'=>$id)]);
			$cat = $cat->fetch_assoc();
			if(count($cat) == 0){
				$_SESSION['message'] = 'Not exists category';
				header('location: ' . ADMIN_URL . '/' . $this->url);
				exit();
			}
		}else{
			header('location: ' . ADMIN_URL . '/' . $this->url);
			exit();
		}
		$error = array();
		if(isset($_POST['update'])){
			$name 		= @$_POST['name'];
			if(empty($name)){
				$error['name']='Field Name not empty';				
			}
			$slug = @$_POST['slug'];
			$parentCat = @$_POST['parent_cat'];
			$sort_order = (int)@$_POST['sort_order'];
			if(empty($sort_order) || is_int($sort_order) == false){
				$sort_order = 0;
			}
			$input = array();
			$picture = basename($_FILES['picture']['name']);
			if(!empty($picture)){
				$tmp_name = $_FILES['picture']['tmp_name'];
				$picture = $this->lib->UploadFile($picture,$tmp_name);
				if($picture == false){
					$error['img']='Image type must jpg|jpeg|png|gif';
				}
				$input['set']['picture'] = $picture;
			}
			if(empty($error)){
				if(empty($slug)){
					$slug = $this->slug->create($name);		
				}
				$input['set']['name'] 		= $name;
				$input['set']['meta_key'] 	= $slug;
				$input['set']['parent_id'] 	= $parentCat;
				$input['set']['sort_order'] = $sort_order;
				
				$input['where'] = array('id'=>$id);
				$flag = $this->cat->update($input);
				if($flag){
					echo '<br/>flag true';
					$_SESSION['message'] = 'Update data success';
					header('location: ' . ADMIN_URL . '/' . $this->url);
				}
			}
		}
		$this->view(
			'admin/main',
			[
				'url'			=> $this->url,
				'error'			=> $error,
				'content'		=> 'edit',
				'cat'			=> $cat,
				'parent_cat'	=> $parent_cat
			]
		);
	}
	public function del(){
		$id = 0;
		if(isset($this->param[1])){
			$id = intval($this->param[1]);
			$cat = $this->cat->getListInput(['where'=>array('id'=>$id)]);
			$cat = $cat->fetch_assoc();
			if(count($cat) == 0){
				$_SESSION['message'] = 'Not exists category';
				header('location: ' . ADMIN_URL . '/' . $this->url);
				exit();
			}else{
				$flag = $this->cat->del(['id'=>$id]);
				if($flag){
					$_SESSION['message'] = 'Delete data success';
					header('location: ' . ADMIN_URL . '/' . $this->url);
				}
			}
		}
	}
}