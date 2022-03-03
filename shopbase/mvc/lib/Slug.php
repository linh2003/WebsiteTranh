<?php
/**
 * 
 */
class Slug
{
	
	function __construct()
	{
		// code...
	}
	public function create($value='')
	{
		$str = '';
		$convert = array(
			'a' => 'a|á|à|ả|ã|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ầ|ấ|ẩ|ẫ|ậ|A|À|Á|Ả|Ã|Ạ|Ă|Ằ|Ắ|Ẳ|Ẵ|Ặ|Â|Ầ|Ấ|Ẩ|Ẫ|Ậ',
			'd' => 'd|đ|D|Đ',
			'e' => 'e|è|é|ẻ|ẽ|ẹ|ê|ề|ế|ể|ễ|ệ|E|È|É|Ẻ|Ẽ|Ẹ|Ê|Ề|Ế|Ể|Ễ|Ệ',
			'i' => 'i|ì|í|ỉ|ĩ|ị|I|Ì|Í|Ỉ|Ĩ|Ị',
			'o' => 'o|ò|ó|ỏ|õ|ọ|ô|ồ|ố|ổ|ỗ|ộ|ơ|ờ|ớ|ở|ỡ|ợ|O|Ò|Ó|Ỏ|Õ|Ọ|Ơ|Ờ|Ớ|Ở|Ỡ|Ợ|Ô|Ồ|Ố|Ổ|Ỗ|Ộ',
			'u' => 'u|ù|ú|ủ|ũ|ụ|ư|ừ|ứ|ử|ữ|ự|U|Ù|Ú|Ủ|Ũ|Ụ|Ư|Ừ|Ứ|Ử|Ữ|Ự',
			'y' => 'y|ỳ|ý|ỷ|ỹ|ỵ|Y|Ỳ|Ý|Ỷ|Ỹ|Ỵ'
		);
		$check = array();
		$d = 0;
		for($i='0';$i<='9';$i++){
			$check[$d++] = $i;
		}
		for($i=ord('a');$i<=ord('z');$i++){
			$check[$d++] = chr($i);
		}
		foreach ($convert as $key => $val) {
			$arr = explode('|', $val);
			$value = str_replace($arr,$key,$value);
		}
		$value = strtolower($value);
		$d = 0;
		for($i=0;$i<strlen($value);$i++){
			if(in_array($value[$i],$check)){
				$str[$d++] = $value[$i];
			}else{
				$str[$d++] = '-';
				for($j=$i+1;$j<strlen($value);$j++){
					if(!in_array($value[$j],$check)){
						continue;
					}else{
						$i = $j - 1;
						break;
					}
				}
			}
		}
		return $str;
	}
}