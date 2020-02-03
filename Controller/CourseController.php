<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/EspacoDoTransito/model/Course.php");

class CourseController extends Course
{

	public function __construct($post)
	{
		parent::__construct($post);
	}

	// Create a new course
	public function new()
	{
		$query = "insert into tb_course(name, description, start, courseload, prerequisites, documents) values('".$this->name."', '".$this->description."', '".$this->start."', '".$this->courseload."', '".$this->prerequisites."', '".$this->documents."')";
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

	// Search for all courses
	public function getAll()
	{
		$query = "select * from tb_course";
		return mysqli_query($this->connect(), $query);
	}

	// Delete course
	public function delete()
	{
		$query = "delete from tb_course where idtb_course = ".$this->id;
		return mysqli_query($this->connect(), $query);
	}

}

?>