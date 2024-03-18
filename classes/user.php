<?php

// include ('./password.php');
class User
{
	private $name;
	private $surname;
	private $email;
	private $adm;
	private $pass;
	public function __construct($name, $surname, $email, $adm, $password)
	{
		$this->name = $name;
		$this->surname = $surname;
		$this->email = $email;
		$this->adm = $adm;
		$this->pass = password_hash($password, PASSWORD_DEFAULT, ['COST' => 10]);
	}


	public function getName()
	{
		return $this->name;
	}

	public function setName($value)
	{
		$this->name = $value;
	}

	public function getPass()
	{

		return $this->pass;
	}

	public function setPass($value)
	{

		$this->pass = $value;
	}

	public function getSurname()
	{
		return $this->surname;
	}

	public function setSurname($value)
	{
		$this->surname = $value;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($value)
	{
		$this->email = $value;
	}

	public function getAdm()
	{
		return $this->adm;
	}

	public function setAdm($value)
	{
		$this->adm = $value;
	}
	public function verificarPassword($contrasenyaEntrada)
	{
		return password_verify($contrasenyaEntrada, $this->pass);
	}
}
