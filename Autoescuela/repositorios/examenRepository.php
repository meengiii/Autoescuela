<?php
class ExamenRepository
{

    private $conexion;
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    //CREAR
    public function createExamen($fechaHora, $idUser)
    {
        $query = "INSERT INTO EXAMEN (fechaHora,User_idUser) VALUES (:fechaHora,:idUser)";
        $stmt = $this->conexion->prepare($query);
        // $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->bindParam(":fechaHora", $fechaHora, PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $stmt->execute();
    }
    //BORRAR
    public function deleteExamen($idExamen)
    {
        $query = "DELETE FROM EXAMEN WHERE IDEXAMEN=:idExamen";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->execute();
    }
    //UPDATE
    // public function updateExamen($idExamen){}

    //LEER
    public function readExamen($idExamen)
    {
        $query = "SELECT * FROM EXAMEN WHERE IDEXAMEN=:idExamen";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getAllExam()
    {
        $query = "SELECT DISTINCT Examen_idExamen FROM EXAMEN_HAS_PREGUNTA";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    //obtener todas los examenes
    public function getAllTest($idExamen)
    {
        $query = "SELECT * FROM PREGUNTA WHERE IDPREGUNTA IN (SELECT Pregunta_idPregunta FROM examen_has_pregunta WHERE Examen_idExamen=:idExamen);";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idExamen", $idExamen, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>