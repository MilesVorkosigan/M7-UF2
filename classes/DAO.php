<?php
interface DAO
{
    public function __construct($table,Conexion $conexion);

    public function getById($id);
    public function update($id, $data);
    public function deleteById($id);
    public function listTable($table);


}
?>