<?php 
/**
 * 
 */
class ProductsModel extends Model
{
	protected $table = 'products';
	
	// public function filterPrice($input=[])
    // {
        // $query = 'SELECT * FROM ' . $this->table;
		// if(isset($input['where'])){
			// $query .= ' WHERE ';
			// foreach($input['where'] as $key => $val){
				// $query .= $key . '="' .$val. '" AND ';
			// }
		// }
		// if(isset($input['orderby'])){
			// $query .= ' ORDER BY ';
			// foreach($input['orderby'] as $key => $val){
				// $query .= $key . ' ' . $val;
			// }
		// }
		// if(isset($input['orderby'])){
			
		// }
		// foreach($input as $key => $val){
			// if(strcmp($key,'price') != 0){
				
				
			// }else{
				// if(array_key_exists('min',$input['price']) && array_key_exists('max',$input['price'])){
					// $query .= 'price >= ' .$input['price']['min']. ' AND price <=' .$input['price']['max'];
				// }else if(array_key_exists('min',$input['price']) && !array_key_exists('max',$input['price'])){
					// $query .= 'price >= ' .$input['price']['min'];
				// }else{
					// $query .= 'price <= ' .$input['price']['max'];
				// }
			// }
		// }
		// echo '<br/>query filter price:' .$query;
		// return mysqli_query($this->con,$query);
    // }
}
?>