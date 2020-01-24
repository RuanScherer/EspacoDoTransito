<?php

class Connection
{
	
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "db_espaco_do_transito";

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