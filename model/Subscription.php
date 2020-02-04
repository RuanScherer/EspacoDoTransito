<?php

include_once("Connection.php");

class Subscription extends Connection
{
	private $id;
	private $name;
	private $rg;
	private $cpf;
	private $birthday;
	private $address;
	private $number;
	private $aditional;
	private $district;
	private $city;
	private $uf;
	private $cep;
	private $phone;
	private $cellphone;
	private $email;
	private $cnh;
	private $categorie;
	private $renach;
	private $schooling;
	private $course;
		
	function __construct($post)
	{
		if(isset($post['id']))
		{
			$this->id = $post['id'];
		}
		if(isset($post['name']))
		{
			$this->name = $post['name'];
		}
		if(isset($post['rg']))
		{
			$this->rg = $post['rg'];
		}
		if(isset($post['cpf']))
		{
			$this->cpf = $post['cpf'];
		}
		if(isset($post['birthday']))
		{
			$this->birthday = $post['birthday'];
		}
		if(isset($post['address']))
		{
			$this->address = $post['address'];
		}
		if(isset($post['number']))
		{
			$this->number = $post['number'];
		}
		if(isset($post['aditional']))
		{
			$this->aditional = $post['aditional'];
		}
		if(isset($post['district']))
		{
			$this->district = $post['district'];
		}
		if(isset($post['city']))
		{
			$this->city = $post['city'];
		}
		if(isset($post['uf']))
		{
			$this->uf = $post['uf'];
		}
		if(isset($post['cep']))
		{
			$this->cep = $post['cep'];
		}
		if(isset($post['phone']))
		{
			$this->phone = $post['phone'];
		}
		if(isset($post['cellphone']))
		{
			$this->cellphone = $post['cellphone'];
		}
		if(isset($post['email']))
		{
			$this->email = $post['email'];
		}
		if(isset($post['cnh']))
		{
			$this->cnh = $post['cnh'];
		}
		if(isset($post['categorie']))
		{
			$this->categorie = $post['categorie'];
		}
		if(isset($post['renach']))
		{
			$this->renach = $post['renach'];
		}
		if(isset($post['schooling']))
		{
			$this->schooling = $post['schooling'];
		}
		if(isset($post['course']))
		{
			$this->course = $post['course'];
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