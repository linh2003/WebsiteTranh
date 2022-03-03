<?php 
/**
 * Class Controller Base
 */
class Controller
{
	
	public function __construct()
	{
		
	}
	public function model($model='',$dir='')
	{
		if(file_exists("./mvc/models/".$dir.$model.".php")){
			require_once "./mvc/models/".$dir.$model.".php";
			return new $model;
		}
	}
	public function view($view, $data=[])
	{
		require_once "./mvc/views/" .$view. ".php";
	}
	public function library($file='',$dir= ''){
		$dir = LIB_PATH . $dir;
		if(file_exists($dir.$file.".php")){
			require_once $dir.$file.".php";
			return new $file;
		}
	}
}
?>