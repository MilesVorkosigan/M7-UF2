<?php
require_once ("./conexions/autoload.php");
class GenericDAO implements DAO
{
    private $conexion;
    private $table;
    /**
     *
     * @param mixed $id
     */
    function deleteById($id)
    {
        try {
            $con = $this->conexion->getPdo();
            $stmt = $con->prepare("DELETE FROM " . $this->table . " WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            //podem fer que pugui tornar a fer retornant un false
            echo "Error al eliminar: " . $e->getMessage();
            return false;
        }

    }

    /**
     *
     * @param mixed $id
     */
    public function getById($id)
    {
        try {
            $con = $this->conexion->getPdo();
            $stmt = $con->prepare("SELECT * FROM " . $this->table . " WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error en buscar". $e->getMessage();
        }

    }

    /**
     *
     * @param mixed $table
     */
    function listTable($table)
    {
        try {
            $pdo = $this->conexion->getPdo();
            $stmt = $pdo->query("SELECT * FROM " . $this->table);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar la excepción
            echo "Error al llistar: " . $e->getMessage();
            return [];
        }
    }

    /**
     *
     * @param mixed $id
     * @param mixed $data
     */
    function update($id, $data)
    {
        try {
            $pdo = $this->conexion->getPdo();
            $setColumns = [];
            foreach ($data as $key => $value) {
                $setColumns[] = "$key = ?";
            }
            $setString = implode(', ', $setColumns);
            $stmt = $pdo->prepare("UPDATE " . $this->table . " SET " . $setString . " WHERE id = ?");
            $values = array_values($data);
            $values[] = $id;
            return $stmt->execute($values);
        } catch (PDOException $e) {
            // Manejar la excepción
            echo "Error al actualizar: " . $e->getMessage();
            return false;
        }
    }

    /**
     *
     * @param Conexion $conexion
     * @param mixed $table
     */
    function __construct($table, Conexion $conexion)
    {

        $this->table = $table;
        $this->conexion = $conexion;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table 
     * @return self
     */
    public function setTable($table): self
    {
        $this->table = $table;
        return $this;
    }





    /**
     * @return mixed
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param mixed $conexion 
     * @return self
     */
    public function setConexion($conexion): self
    {
        $this->conexion = $conexion;
        return $this;
    }
}


?>