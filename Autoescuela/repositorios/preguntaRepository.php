<?php
class preguntaRepository
{
    private $conexion;
    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    //CREAR
    public function createPregunta($rep1, $rep2, $rep3, $correcta, $enunciado, $idDificultad, $idCategoria)
    {
        $query = "INSERT INTO PREGUNTA (rep1,rep2,rep3,correcta,enunciado,Dificultad_idDificultad,Categorias_idCategoria) values (:rep1,:rep2,:rep3,:correcta,:enunciado,:dificultad,:categoria)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":rep1", $rep1, PDO::PARAM_STR);
        $stmt->bindParam(":rep2", $rep2, PDO::PARAM_STR);
        $stmt->bindParam(":rep3", $rep3, PDO::PARAM_STR);
        $stmt->bindParam(":correcta", $correcta, PDO::PARAM_INT);
        $stmt->bindParam(":enunciado", $enunciado, PDO::PARAM_STR);
        // $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->bindParam(":dificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->bindParam(":categoria", $idCategoria, PDO::PARAM_INT);
        $stmt->execute();

    }

    //BORRAR
    public function deletePregunta($idPregunta)
    {
        $query = "DELETE FROM PREGUNTA WHERE IDPREGUNTA=:idpregunta";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idpregunta", $idPregunta, PDO::PARAM_INT);
        $stmt->execute();
    }

    //UPDATE
    public function updatePregunta($idPregunta, $rep1, $rep2, $rep3, $correcta, $enunciado, $idDificultad, $idCategoria)
    {
        $query = "UPDATE PREGUNTA SET rep1 = :rep1, rep2 = :rep2, rep3 = :rep3, correcta = :correcta, enunciado = :enunciado, Dificultad_idDificultad = :idDificultad, Categorias_idCategoria = :idCategoria WHERE idPregunta = :idPregunta";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":rep1", $rep1, PDO::PARAM_STR);
        $stmt->bindParam(":rep2", $rep2, PDO::PARAM_STR);
        $stmt->bindParam(":rep3", $rep3, PDO::PARAM_STR);
        $stmt->bindParam(":correcta", $correcta, PDO::PARAM_INT);
        $stmt->bindParam(":enunciado", $enunciado, PDO::PARAM_STR);
        $stmt->bindParam(":idDificultad", $idDificultad, PDO::PARAM_INT);
        $stmt->bindParam(":idCategoria", $idCategoria, PDO::PARAM_INT);
        $stmt->bindParam(":idPregunta", $idPregunta, PDO::PARAM_INT);
        $stmt->execute();

    }


    //LEER
    public function readPregunta($idPregunta)
    {
        $query = "SELECT * FROM PREGUNTA WHERE IDPREGUNTA=:idpregunta";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idpregunta", $idPregunta, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    //obtener todas las preguntas
    public function getAllPreg()
    {
        $query = "SELECT * FROM PREGUNTA";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //obtener las respusetas de un examen
    public function getAllCor($idExamen)
    {
        $query = "select correcta from pregunta where idPregunta in (SELECT pregunta_idpregunta from examen_has_pregunta where examen_idExamen=:idexamen)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idexamen", $idExamen, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //obtener el numero maximo de preguntas a generar de una categoria
    public function getMaxPregCat($idCategoria)
    {
        $query = "SELECT count(*) FROM pregunta WHERE Categorias_idCategoria=:idCat";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idCat", $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }


}
?>