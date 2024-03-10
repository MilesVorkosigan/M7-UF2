<?php
include conexion.php;
class UserManager{
    private $conectar;

    public function getConectar() {
		return $this->conectar;
	}

	public function setConectar($value) {
		$this->conectar = $value;
	}
}

	
