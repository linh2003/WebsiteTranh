<?php
/**
 * Controller Home
 */
class Home extends Frontend
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		//get product featured
		$input = array(
			'orderby' => array('id'=>'DESC'),
			'limit' => 8
		);
		$featured_product = $this->product->getListInput($input);	
		$this->data['featured_product'] = $featured_product;
		$this->data['title'] = 'Tranh Canvas Trang Trí, Tranh Treo Tường';
		
		//get view
		$this->views('page/home',$this->data);
	}
}
?>