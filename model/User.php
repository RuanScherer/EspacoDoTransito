<?php 

include_once("Connection.php");

class User extends Connection
{
	private $login;
	private $password;
	
	function __construct($post)
	{
		$this->login = $post['login'];
		$this->password = $post['password'];
	}

	public function __get($prop)
	{
		return $this->$prop;
	}

	public function __set($prop, $value)
	{
		$this->prop = $value;
	}

	public function connect()
	{
		return $this->getConnection();
	}
}

?>