<?php 

include_once("Connection.php");

class Course extends Connection
{
	
	private $id;
	private $name;
	private $description;
	private $start;
	private $courseload;
	private $prerequisites;
	private $documents;
	private $price;

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
		if(isset($post['prerequisites']))
		{
			$prerequisites = explode(",", $post['prerequisites']);
			foreach ($prerequisites as $key) {
				$key = trim($key);
			}
			$this->prerequisites = serialize($prerequisites);
		}
		if(isset($post['documents']))
		{
			$documents = explode(",", $post['documents']);
			foreach ($documents as $key) {
				$key = trim($key);
			}
			$this->documents = serialize($documents);
		}
		if(isset($post['price']))
		{
			$this->price = $post['price'];
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