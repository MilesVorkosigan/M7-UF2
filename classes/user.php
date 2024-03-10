<?php
class User
{
    private  $name;
    private $cognom;
    private $adm;
    private $pass;



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

	public function getCognom() {
		return $this->cognom;
	}

	public function setCognom($value) {
		$this->cognom = $value;
	}

	public function getAdm() {
		return $this->adm;
	}

	public function setAdm($value) {
		$this->adm = $value;
	}
    

}


