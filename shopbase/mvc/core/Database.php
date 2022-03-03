<?php 
/**
 * class Database
 */
class Database
{
	protected $con;
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $databasename = "shopbase";
	function __construct()
	{
		$this->con = mysqli_connect($this->servername,$this->username,$this->password);
		mysqli_select_db($this->con,$this->databasename);
		mysqli_query($this->con,"SET NAMES 'utf8'");		
	}
};
?>