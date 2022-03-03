<?php
/**
 * 
 */
class AdsModel extends Database
{
	public function getAll()
	{
		$query = "SELECT * FROM ADS";
		return mysqli_query($this->con,$query);
	}
}
?>