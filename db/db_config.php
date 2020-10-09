<?php
class db_config
{
	private $con;
	public function config()
	{
		$this->con=mysqli_connect("localhost","root","","asiaurdu_umer");
		//$this->con=mysqli_connect("localhost","mirza638_umer","+v5wHds3B2h#","mirza638_umer");
		return $this->con;
	}

}
?>