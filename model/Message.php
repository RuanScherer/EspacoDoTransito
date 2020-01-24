<?php 

include_once("Connection.php");

class Message extends Connection
{
	
	private $email;
	private $name;
	private $topic;
	private $message;

	public function __construct($post)
	{
		$this->email = $post['email'];
		$this->name = $post['name'];
		$this->topic = $post['topic'];
		$this->message = $post['message'];
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