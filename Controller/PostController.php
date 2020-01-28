<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/EspacoDoTransito/model/Post.php");

class PostController extends Post
{

	public function __construct($post)
	{
		parent::__construct($post);
	}

	// Create a new post
	public function new()
	{
		$query = "insert into tb_post(title, body, postDate) values('".$this->title."', '".$this->body."', date(now()))";
		$response = mysqli_query($this->connect(), $query);

		if($response)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Search for all posts
	public function getAll()
	{
		$query = "select * from tb_post";
		return mysqli_query($this->connect(), $query);
	}

	// Search for one post
	public function getPost()
	{
		$query = "select * from tb_post where idtb_post = ".$this->id;
		return mysqli_query($this->connect(), $query);
	}

	//Autodestruct messages with more than 15 days
	public function autodestruct()
	{
		$query = "delete from tb_message where (datediff(date(now()), date)) >= 15";
		mysqli_query($this->connect(), $query);
	}

}

?>