<?php


class User
{
	private $id;
	private $name;
	private $pass;
	private $email;
	private $surname;	
	private $adm;
	
	public function __construct($name, $surname, $email, $adm, $password)
	{
		$this->name = $name;
		$this->surname = $surname;
		$this->email = $email;
		$this->adm = $adm;
		$this->pass = $password;
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

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	//Aquest metode esn prepara estament per la base de dades tal com la tenim configurada
	public function getData()
    {
        return [
            'name' => $this->name,
            'contrasenya' => $this->pass,
            'email' => $this->email,
            'surname' => $this->surname,
            'admin' => $this->adm
        ];
    }
}
