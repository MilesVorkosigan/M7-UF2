<?php

class Conexion
{
    private $pdo;
    private $servidor = "mysql:host=127.0.0.1;dbname=supermercat";
    private $usuari = "root";
    private $pass = "rootpass";
    public function __construct()
    {
        try {
            $this->pdo = new PDO("" . $this->servidor, $this->usuari, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connectat..";
        } catch (PDOException $e) {
            die ("Connexió fallida: " . $e->getMessage());
        }
    }
    public function closeConnection()
    {
        $this->pdo = null;
        echo "Connexió conclosa." . PHP_EOL;
    }


	/**
	 * @return mixed
	 */
	public function getPdo() {
		return $this->pdo;
	}
	
	/**
	 * @param mixed $pdo 
	 * @return self
	 */
	public function setPdo($pdo): self {
		$this->pdo = $pdo;
		return $this;
	}
}
?>