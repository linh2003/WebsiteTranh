<?php
/**
 * Controller Product
 */
class Product extends Frontend
{
	private $slug;
	
	function __construct()
	{
		parent::__construct();
	}
	public function index($slug=[])
	{
		$view = '';
		$related = '';
		if(!empty($slug)){
			$this->slug = $slug[0];
			$product = $this->product->getListInput(['where'=>array('slug'=>$this->slug)]);
			if($product->num_rows > 0){
				$this->data['product'] = $product;	
				$view = 'page/product';
				foreach($product as $item){
					$this->data['title'] = $item['name'];
					$related = $item['cat_id'];
				}
			}
			$related = $this->product->getListInput(['where'=>array('cat_id'=>$related)]);
			if($related->num_rows > 0){
				$this->data['related'] = $related;
			}
		}
		//get view
		$this->views($view,$this->data);
	}
}
?>