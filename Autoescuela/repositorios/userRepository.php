<?php
class UserRepository
{
    private $conexion;

    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    //CREAR
    public function createUser($nombre, $password)
    {
        $query = "INSERT INTO USER (nombre,password) values (:nombre,:password)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        // $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
        $stmt->execute();
        header("Location:?menu=login");

    }
    //BORRAR
    public function deleteUser($id)
    {
        $query = "DELETE FROM USER WHERE IDUSER=:idUser";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idUser", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    //UPDATE
    public function updateUser($id, $nombre, $password)
    {
        $query = "UPDATE USER SET NOMBRE=:nombre,PASSWORD=:password WHERE IDUSER=:idUser";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        // $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //update roles
    public function updateUserRol($id,$rol)
    {
        $query = "UPDATE USER SET ROL=:rol WHERE IDUSER=:idUser";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //LEER
    public function readUser($id)
    {
        $query = "SELECT * FROM USER WHERE IDUSER=:idUser";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":idUser", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Obtener todos los usuarios
    public function getAllUser()
    {
        $query = "SELECT * FROM USER WHERE ROL='alumno'";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    

    public function getAllUserNoRol()
    {
        $query = "SELECT * FROM USER WHERE ROL IS NULL";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //login
    public function encuentra($nombre, $pass)
    {
        $query = "SELECT * FROM USER WHERE nombre = :nombre and password=:pass";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>