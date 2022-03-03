<?php
/**
 * 
 */
class UploadFiles
{
	
	function __construct()
	{
		// code...
	}
	private function randomName($len=10){
		$arr = array('a','A','b','B','c','d','g','h','n',0,1,2,3,4,5,6,7,8,9);
		$str = '';
		for($i=1;$i<$len;$i++){
			$r = rand(0,count($arr) - 1);
			$str .= $arr[$r];
		}
		return $str;
	}
	public function UploadFile($file='',$tmp_name){
		//check file type
		$upload = '';
		$check = false;
		$type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
		$dir = UPLOAD_DIR;
		$target = '';
		if($type=='jpg' || $type=='png' || $type=='gif' || $type=='jpeg'){
			$check = true;
		}
		if($check == false) return $check;
		// Random Name
		$file = $this->randomName() .'_'. $file;
		
		//create path year/month/day/file
		if($check){
			$year 	= date('Y');
			$month 	= date('m');
			$day 	= date('d');
			$target = "$year/$month/$day/";
			$dir .= $target;
			if(!is_dir($dir)){
				mkdir($dir, 0777, true);
			}
		}
		//upload image 
		if($check){
			$dir .= $file;
			if(move_uploaded_file($tmp_name,$dir)){
				$upload = $target . $file;
			}
		}
		return $upload;
	}
	public function UploadMultiFiles($images=[]){
		echo '<pre>';
		print_r($images);
		echo '</pre>';
		$json = '';
		$len = count($images['name']);
		for($i=0;$i<$len;$i++){
			$ret = $this->UploadFile($images['name'][$i],$images['tmp_name'][$i]);
			if($ret == false){
				return $ret;
			}
			$json .= $ret;
			if($i < $len - 1){
				$json .= ',';
			}
		}
		return $json;
	}
}