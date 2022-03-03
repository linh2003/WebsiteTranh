<?php
class App{
	private $controller = "home";
	private $action = "index";
	private $param = [];
	
	public function __construct(){
		$url = $this->ProcessUrl();
		// Controller
		if(isset($url[0])){
			$this->controller = $url[0];
			if(!file_exists("./mvc/controllers/".$this->controller.".php")){
				$this->controller = 'home';
			}
			unset($url[0]);
		}
		//echo '<br/>controller:' .$this->controller;
		$this->controller[0] = strtoupper($this->controller[0]);
		require_once "./mvc/controllers/".$this->controller.".php";
		$this->controller = new $this->controller;
		// echo '<pre>';
		// print_r($this->controller);
		// echo '</pre>';
		
		// Method
		if(isset($url[1])){
			$this->action = $url[1];
			if(!method_exists($this->controller,$this->action)){
				$this->action = 'index';
			}
			unset($url[1]);
		}
		//echo '<br/>action:' . $this->action;
		$this->param = $url ? array_values($url) : [];
		// echo '<pre>';
		// print_r($this->param);
		// echo '</pre>';
		// die();
		call_user_func_array([$this->controller,$this->action],[$this->param]);
	}
	public function ProcessUrl(){
		$d = 0;
		for($i='0';$i<='9';$i++){
			$check[$d++] = $i;
		}
		for($i=ord('A');$i<=ord('Z');$i++){
			$check[$d++] = chr($i);
		}
		for($i=ord('a');$i<=ord('z');$i++){
			$check[$d++] = chr($i);
		}
		$check[$d++] = '-';
		$check[$d] = '/';
		$str = "";
		if(isset($_GET["url"])){
			$url = $_GET["url"];
			for ($i=0; $i < strlen($url); $i++) { 
				$tmp = $url[$i];
				if (in_array($tmp,$check)) 
				{
					$str .= $tmp;
				}
			}
			return explode('/',$str);
		}
		return $str;
	}
}
?>