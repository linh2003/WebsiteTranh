<?php
/**
 * 
 */
class Support
{
	
	function __construct()
	{
		// code...
	}
	public function FilterPrice($min='',$max='')
	{
		$args = array();
		$value = 1000000;
		$str = strval($min);
		for ($i=$min; ; $i+=$value) {
			$str = strval($min) . '-';
			array_push($args,$i);
			if($i > $max)
				break;
		}
		return $args;
	}
}