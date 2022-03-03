<?php  
/**
 * Model
 */
class Model extends Database
{
	protected $table = '';
	public function getAll(){
		$query = 'SELECT * FROM ' . $this->table;
		return mysqli_query($this->con,$query);
	}
	public function getTotal(){
		$total = $this->getAll();
		return mysqli_num_rows($total);
	}
	public function getInfoRule($where=[],$field=''){
		$query = 'SELECT ';
		if(!empty($field)){
			$query .= $field;
		}
		$query .= ' FROM '. $this->table;
		if(!empty($where)){
			$query .= ' WHERE ';
			$i = 1;
			foreach($where as $key => $val){
				$query .= $key . '="' . $val . '"';
				if($i < count($where)){
					$query .= ' AND ';
				}
				$i++;
			}
		}
		return mysqli_query($this->con,$query);
	}
	public function getListInput($input=[]){
		$query = 'SELECT * FROM ' . $this->table;
		if(isset($input['where'])){
			$query .= ' WHERE ';
			$i = 1;
			foreach($input['where'] as $key => $val){
				if(is_array($input['where'][$key])){
					$arr = implode(',',$input['where'][$key]);
					$query .= $key . ' IN (' .$arr . ')';
				}else{
					$query .= $key . '="' . $val . '"';
					if($i < count($input['where'])){
						$query .= ' AND ';
					}
					$i++;
				}
			}
			if(isset($input['like'])){
				foreach($input['like'] as $key => $val){
					$query .= ' AND '. $key .' LIKE "%' .$val .'%"';
				}	
			}
		}
		if(!isset($input['where']) && isset($input['like'])){
			foreach($input['like'] as $key => $val){
				$query .= ' WHERE '. $key .' LIKE "%' .$val .'%"';
			}	
		}
		if(isset($input['filter'])){
			if(!isset($input['where'])){
				$query .= ' WHERE ';
			}else{
				$query .= ' AND ';
			}
			if($input['filter']['max'] == 0){
				$query .= $input['filter']['filed'].'>= ' .$input['filter']['min'];
			}else if($input['filter']['min'] == 0){
				$query .= $input['filter']['filed'].'<= ' .$input['filter']['max'];
			}else{
				$query .= $input['filter']['filed'].'>= '.$input['filter']['min'].' AND '.$input['filter']['filed'].'<='.$input['filter']['max'];
			}
		}
		if(isset($input['orderby'])){
			$query .= ' ORDER BY ';
			$i = 1;
			foreach($input['orderby'] as $key => $val){
				$query .= $key . ' ' . $val;
				if($i < count($input['orderby'])){
					$query .= ', ';
				}
				$i++;
			}
		}
		if(isset($input['limit'])){
			$query .= ' LIMIT ' .$input['limit'];
		}
		//echo '<br/>' .$query;
		return mysqli_query($this->con,$query);
	}
	public function insertData($input=[]){
		$query = 'INSERT INTO ' .$this->table . ' (';
		if(!empty($input)){
			$i = 1;
			foreach($input as $key => $val){
				$query .= $key;
				if($i < count($input)){
					$query .= ', ';
				}
				$i++;
			}
			$query .= ') VALUES (';
			$i = 1;
			foreach($input as $val){
				$query .= '"'.$val.'"';
				if($i < count($input)){
					$query .= ', ';
				}
				$i++;
			}
			$query .= ')';
		}
		return mysqli_query($this->con,$query);
	}
	public function update($input=[]){
		$query = 'UPDATE ' .$this->table . ' SET ';
		if(isset($input['set'])){
			$i = 1;
			foreach($input['set'] as $key => $val){
				$query .= $key .'="' . $val . '"';
				if($i < count($input['set'])){
					$query .= ', ';
				}
				$i++;
			}
		}
		if(isset($input['where'])){
			$query .= ' WHERE ';
			foreach($input['where'] as $key => $val){
				$query .= $key .'="' . $val . '"';
			}
		}
		echo '<br/>' .$query;
		return mysqli_query($this->con,$query);
	}
	public function del($where=[]){
		$query = 'DELETE FROM ' . $this->table;
		if(isset($where)){
			$query .= ' WHERE ';
			foreach($where as $key => $val){
				$query .= $key .'="' . $val . '"';
			}
		}
		return mysqli_query($this->con,$query);
	}
	public function getSumInput($input=[]){
		$sum = $this->getListInput($input);
		return mysqli_num_rows($sum);
	}
}
?>