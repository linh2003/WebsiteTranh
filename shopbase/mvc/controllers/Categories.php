<?php
/**
 * Controller Categories
 */
class Categories extends Frontend
{
	private $slug;
	private $filter;
	private $pagination;
	
	function __construct()
	{
		parent::__construct();
		$this->pagination = $this->library('Pagination');
	}
	public function index($slug=[])
	{
		$view = '';
		$url = $_GET;
		if(isset($url['min_price']) && isset($url['max_price'])){
			$args['filter']['filed'] 	= 'price';
			$args['filter']['min'] 		= intval($url['min_price']);
			$args['filter']['max'] 		= intval($url['max_price']);
		}
		$args['orderby']['id'] = 'DESC';
		foreach($this->data['cat'] as $item){
			$sum = $this->product->getListInput(['where'=>array('cat_id'=>$item['id'])]);
			$this->data['count_product'][$item['id']] = $sum->num_rows;
		}
		//so luong phan tu tren 1 page
		$per_page = 4;
		//get current page on the url
		$current_page = 1;
		if(isset($url['page']) && intval($url['page']) != 0){
			$current_page = intval($url['page']);			
		}
		//handle array url GET
		$current_url = SITE_URL;
		$i = 0;
		foreach($url as $key => $u){
			if($key == 'url'){
				//echo '<br/>' .$key. ':is url';
				$current_url .= $u;
			}else if($key == 'page'){
				//echo '<br/>' .$key. ':is page';
				unset($url['page']);
			}else{
				$current_url .= ($i==1)?'?':'&';
				$current_url .= $key . '=' .$u;
			}
			$i++;
		}
		$this->data['url'] = $url;
		//echo '<br/>current page:' .$current_url;
		$this->data['current_url'] = $current_url;
		if(!empty($slug[0])){
			$this->slug = $slug[0];
			$this->data['slug'] = $this->slug;
			$input['where']['meta_key'] = $this->slug;
			$cat_info = $this->cat->getListInput($input);//info cua Loai Hoa
			if($cat_info->num_rows > 0){
				$view = 'page/category';
				$id = '';
				foreach($cat_info as $info){
					$this->data['title'] = $info['name'];
					$id = $info['id'];
				}
				$cat_child = $this->cat->getListInput(['where'=>array('parent_id'=>$id)]);
				$args['where']['cat_id'] = array($id);
				foreach($cat_child as $val){
					array_push($args['where']['cat_id'],$val['id']);
				}
				$args['orderby']['id'] 		= 'DESC';
				$total = $this->product->getSumInput($args);
				$config = array(
					'total' 		=> $total,
					'per_page' 		=> $per_page,
					'current_page' 	=> $current_page,
				);
				$from = $this->pagination->init($config);
				$args['limit'] = $from .',' .$per_page;				
				$product = $this->product->getListInput($args);
				$this->data['product'] = $product;
			}
		}else{
			$total = $this->product->getSumInput($args);
			$config = array(
				'total' 		=> $total,
				'per_page' 		=> $per_page,
				'current_page' 	=> $current_page,
			);
			$from = $this->pagination->init($config);
			$args['limit'] = $from .',' .$per_page;
			// echo '<pre>';
			// print_r($args);
			// echo '</pre>';
			$allproduct = $this->product->getListInput($args);
			//die();
			$this->data['product'] = $allproduct;
			$this->data['title'] = 'Tất Cả Sản Phẩm';
			$view = 'page/category';
		}
		$this->data['pagination'] = $this->pagination;
		//get view
		$this->views($view,$this->data);
	}
}
?>