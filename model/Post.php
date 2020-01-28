<?php

include_once("Connection.php");

class Post extends Connection
{
	private $id;
	private $title;
	private $body;
	
	function __construct($post)
	{
		if(isset($post['id']))
		{
			$this->id = $post['id'];
		}
		if(isset($post['title']))
		{
			$this->title = $post['title'];
		}
		if(isset($post['body']))
		{
			$this->body = $post['body'];
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