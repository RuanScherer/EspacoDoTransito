<?php

include_once("Connection.php");

class Post extends Connection
{
	private $title;
	private $subtitle;
	private $body;
	
	function __construct($post)
	{
		$this->title = $post['title'];
		$this->subtitle = $post['subtitle'];
		$this->body = $post['body'];
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