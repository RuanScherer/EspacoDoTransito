<?php 

include_once("../Model/User.php");

class UserController extends User
{
	
	function __construct($post)
	{
		parent::__construct($post);
	}

	public function get()
	{
		$query = "select * from tb_user where login = '".$this->login."' and password = ".$this->password;
		$response = mysqli_query($this->connect(), $query);

		if(@mysqli_num_rows($response) >= 1)
		{
			session_start();
			while($row = mysqli_fetch_assoc($response))
			{
				$_SESSION['id'] = $row['idtb_user'];
			}
			return true;
		}
		else
		{
			return false;
		}
	}

}

?>