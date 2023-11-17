<?php
class User
{

    private $idUser;
    private $nombre;
    private $password;
    private $rol;

    //constructor
    public function __construct($idUser, $nombre, $password,$rol){
        $this->idUser = $idUser;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->rol = $rol;
    }


    //getter y setter
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;


    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
    }


}
?>