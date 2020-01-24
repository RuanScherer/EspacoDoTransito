<?php 

include_once("./model/Message.php");

class MessageController extends Message
{

	public function __construct($post)
	{
		parent::__construct($post);
	}

	// Create a new message
	public function new()
	{
		$query = "insert into tb_message(email, name, topic, message, date) values('".$this->email."', '".$this->name."', '".$this->topic."', '".$this->message."', date(now()))";
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

	// Search for all messages
	public function getAll()
	{
		$query = "select * from tb_message";
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

}

?>