<?php
class DificultadRepository
{
    private $conexion;

    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    //CREAR
    public function createDificultad($idDificultad, $nombre)
    {
        $query = "INSERT INTO DIFICULTAD (idDificultad,nombre) VALUES (:idDificultad,:nombre)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idDificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->execute();

    }

    //BORRAR
    public function deleteDificultad($idDificultad)
    {
        $query = "DELETE FROM DIFICULTAD WHERE IDDIFICULTAD=:idDificultad";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idDificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->execute();
    }

    //UPDATE
    // public function updateDificultad($idDificultad){}

    //LEER
    public function readDificultad($idDificultad)
    {
        $query = "SELECT * FROM DIFICULTAD WHERE IDDIFICULTAD=:idDificultad";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idDificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->execute();
    }

    //obtener todas las dificultadas
    public function getAllDif()
    {
        $query = "SELECT * FROM DIFICULTAD";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
?>