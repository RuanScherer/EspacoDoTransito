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

	// Delete a post
	public function delete()
	{
		echo "<script>alert('".$this->id."')</script>";
		$query = "delete from tb_post where idtb_post = ".$this->id;
		mysqli_query($this->connect(), $query);
	}

	// Edit a post
	public function edit()
	{
		$query = "update tb_post set title = '".$this->title."', body = '".$this->body."' where idtb_post = ".$this->id;
		return mysqli_query($this->connect(), $query);
	}

}

?>