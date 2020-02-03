<?php 

include_once("Connection.php");

class Course extends Connection
{
	
	private $id;
	private $name;
	private $description;
	private $start;
	private $courseload;
	private $intensive;
	private $prerequisites;
	private $documents;

	public function __construct($post)
	{
		if(isset($post['id']))
		{
			$this->id = $post['id'];
		}
		if(isset($post['name']))
		{
			$this->name = $post['name'];
		}
		if(isset($post['description']))
		{
			$this->description = $post['description'];
		}
		if(isset($post['start']))
		{
			$this->start = $post['start'];
		}
		if(isset($post['courseload']))
		{
			$this->courseload = $post['courseload'];
		}
		if(isset($post['intensive']))
		{
			$this->intensive = $post['intensive'];
		}
		if(isset($post['prerequisites']))
		{
			$this->prerequisites = $post['prerequisites'];
		}
		if(isset($post['documents']))
		{
			$this->documents = $post['documents'];
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