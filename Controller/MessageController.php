<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/EspacoDoTransito/model/Message.php");

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
		$query = "select * from tb_message order by date desc";
		return mysqli_query($this->connect(), $query);
	}

	// Search for one message
	public function getMessage()
	{
		$query = "select * from tb_message where idtb_message = ".$this->id;
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