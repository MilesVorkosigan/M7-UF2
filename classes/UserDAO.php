<?php 
require_once "./conexions/autoload.php";
class UserDAO extends GenericDAO
{
private $user;
private $USUARI='usuari';
public function __construct($USUARI, $conexion)
    {
        parent::__construct($USUARI, $conexion); // nom de la taula, crida al pare
    }
    

	/**
	 * @return mixed
	 */
	public function getUser() {
		return $this->user;
	}
	
	/**
	 * @param mixed $user 
	 * @return self
	 */
	public function setUser($user): self {
		$this->user = $user;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUSUARI() {
		return $this->USUARI;
	}
	
	/**
	 * @param mixed $USUARI 
	 * @return self
	 */
	public function setUSUARI($USUARI): self {
		$this->USUARI = $USUARI;
		return $this;
	}
}
?>