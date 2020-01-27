<?php 

include_once("Connection.php");

class Message extends Connection
{
	
	private $id;
	private $email;
	private $name;
	private $topic;
	private $message;

	public function __construct($post)
	{
		if(isset($post['id']))
		{
			$this->id = $post['id'];
		}
		if(isset($post['email']))
		{
			$this->email = $post['email'];
		}
		if(isset($post['name']))
		{
			$this->name = $post['name'];
		}
		if(isset($post['topic']))
		{
			$this->topic = $post['topic'];
		}
		if(isset($post['message']))
		{
			$this->message = $post['message'];
		}
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