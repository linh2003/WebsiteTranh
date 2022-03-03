<?php
/**
 * 
 */
class Search extends Frontend
{
	private $pagination;
	function __construct()
	{
		parent::__construct();
		$this->pagination = $this->library('Pagination');
	}
	public function index($value='')
	{
		$view = '';
		$url = $_GET;
		$this->data['search'] = $url['search'];
		$args['like']['name'] = $url['search'];
		$args['orderby']['id'] = 'DESC';
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
				echo '<br/>' .$key. ':is url';
				$current_url .= $u;
			}else if($key == 'page'){
				echo '<br/>' .$key. ':is page';
				unset($url['page']);
			}else{
				$current_url .= ($i==1)?'?':'&';
				$current_url .= $key . '=' .$u;
			}
			$i++;
		}
		$this->data['url'] = $url;
		echo '<br/>current page:' .$current_url;
		$this->data['current_url'] = $current_url;
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
		$this->data['total'] = $total;
		$this->data['title'] = 'Kết quả tìm kiếm '.$this->data['search'];
		$view = 'page/search';
		$this->data['pagination'] = $this->pagination;
		//get view
		$this->views($view,$this->data);
	}
}