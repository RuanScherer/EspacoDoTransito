<?php 

include_once($_SERVER['DOCUMENT_ROOT']."/EspacoDoTransito/model/Subscription.php");

class SubscriptionController extends Subscription
{

	public function __construct($post)
	{
		parent::__construct($post);
	}

	// Create a new subscription
	public function new()
	{
		$query = "
		insert into tb_subscription
		(name, rg, cpf, birthday, address, number, aditional, district, city, uf, cep, phone, cellphone, email, cnh, categorie, renach, schooling, course, subDate)
		values('".$this->name."', '".$this->rg."', '".$this->cpf."', '".$this->birthday."', '".$this->address."', '".$this->number."', '".$this->aditional."', '".$this->district."', '".$this->city."', '".$this->uf."', '".$this->cep."', '".$this->phone."', '".$this->cellphone."', '".$this->email."', '".$this->cnh."', '".$this->categorie."', '".$this->renach."', '".$this->schooling."', '".$this->course."', date(now()))";
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

	// Search for all subscriptions
	public function getAll()
	{
		$query = "select * from tb_subscription order by subDate desc";
		return mysqli_query($this->connect(), $query);
	}

	// Search for one subscription
	public function getSubscription()
	{
		$query = "select * from tb_subscription where idtb_subscription = ".$this->id;
		return mysqli_query($this->connect(), $query);
	}

	// Search by name
	public function getByName()
	{
		$query = "select * from tb_subscription where name like '%".$this->name."%' order by subDate desc";
		if (strlen($this->name) == 0)
		{
			return $this->getAll();
		}
		else
		{
			return mysqli_query($this->connect(), $query);
		}
	}

}

?>