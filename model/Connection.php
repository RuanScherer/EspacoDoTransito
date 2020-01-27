<?php

class Connection
{
	
	private $host = "mysql.ruanscherer.kinghost.net";
	private $user = "ruanscherer01";
	private $password = "F9PHaph4";
	private $database = "ruanscherer01";

	public function __get($prop)
	{
		return $this->$prop;
	}

	public function getConnection()
	{
		return mysqli_connect($this->host, $this->user, $this->password, $this->database);
	}

}

?>