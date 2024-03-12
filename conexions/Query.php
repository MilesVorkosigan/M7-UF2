<?php
class Query
{

    // <?php
    // $pdo = new PDO("mysql:host=localhost;dbname=world", 'my_user', 'my_password');
    // $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

    // $unbufferedResult = $pdo->query("SELECT Name FROM City");
    // foreach ($unbufferedResult as $row) {
    //     echo $row['Name'] . PHP_EOL;
    // }
    //


    protected $conexion;
    protected $taula;
    public function __construct($conexio, $taula)
    {
        $this->conexion = $conexio;
        $this->taula = $taula;
    }
    public function crear($dades)
    {
        //prepació de la consulta
        $sql = "INSERT INTO $this->taula (" . implode(", ", array_keys($dades)) . ") VALUES (:" . implode(", :", array_keys($dades)) . ")";
        $stmt = $this->conexion->prepare($sql);

        //vincular les dades
        foreach ($dades as $camp => $valor) {
            $stmt->bindValue(":$camp", $valor);
        }

        //executar consulta
        $stmt->execute();

        // Retornar el ID del nou registre
        return $this->conexion->lastInsertId();
    }
    public function modificar($id, $dades)
    {
        try {
            // Preparar la consulta
            $sql = "UPDATE $this->taula SET " . implode(", ", array_map(function ($camp) {
                return "$camp = :$camp";
            }, array_keys($dades))) . " WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);

            // Vincular los datos
            $stmt->bindValue(":id", $id);
            foreach ($dades as $camp => $valor) {
                $stmt->bindValue(":$camp", $valor);
            }

            // Ejecutar la consulta
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al modificar" . $e->getMessage();
        }
    }

    public function eliminar($id)
    {
        // Preparar la consulta
        $sql = "DELETE FROM $this->taula WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);

        // Vincular los datos
        $stmt->bindValue(":id", $id);

        // Ejecutar la consulta
        $stmt->execute();
    }
    public function mostrar($id)
    {
        // Preparar la consulta
        $sql = "SELECT * FROM $this->taula WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);

        // Vincular los datos
        $stmt->bindValue(":id", $id);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado como un objeto
        $resultado = $stmt->fetchObject();

        // Si no se encuentra el registro, devolver null
        if (!$resultado) {
            return null;
        }

        // Convertir el objeto en un array asociativo
        $entidad = (array) $resultado;

        // Devolver la entidad
        return $entidad;
    }

    public function llistar($pdo,$taula)
    {
        // Consulta SQL para obtener todos los registros
        $sql = "SELECT * FROM $this->taula";

        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todos los resultados como objetos
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Convertir los objetos en arrays asociativos
        $entidades = array_map(function ($resultado) {
            return (array) $resultado;
        }, $resultados);

        // Devolver la lista de entidades
        return $entidades;
    }
    public function getConexion()
    {
        return $this->conexion;
    }

    public function getTabla()
    {
        return $this->taula;
    }
}
