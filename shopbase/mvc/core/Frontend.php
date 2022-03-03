<?php 
/**
 * Class Frontend
 */
class Frontend extends Controller
{
	protected $cat;
	protected $product;
	protected $data=[];
	
	public function __construct()
	{
		session_start();
		$this->cat 		= $this->model("CategoriesModel");
		$this->product 	= $this->model("ProductsModel");
		$parent_cat 	= $this->cat->getListInput(['where'=>array('parent_id'=>0)]);
		$cat 			= $this->cat->getAll();
		$sum_child = array();
		foreach($parent_cat as $item){
			$d = 0;
			foreach($cat as $val){
				if($val['parent_id']==$item['id']){
					$d++;
				}
			}
			$sum_child[$item['id']] = $d;
		}
		
		$this->data['cat'] 			= $cat;
		$this->data['parent_cat'] 	= $parent_cat;
		$this->data['sum_child'] 	= $sum_child;
	}
	public function views($view='', $data=[])
	{
		//echo '<br/>view:' .$view;
		$data = $this->data;
		$data['page'] = empty($view)?'page/404':$view;
		if(empty($view)){
			$data['title'] = '404 Not Found';
		}
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		$this->view('main/main',$data);
	}
}
?>