<?php
class Examen{
    private $idExamen;
    private $fechaHora;
    private $idUser;

    //constructor
    public function __construct($idExamen,$fechaHora,$idUser){
        $this->idExamen=$idExamen;
        $this->fechaHora=$fechaHora;
        $this->idUser=$idUser;
    }
    //getter y setter

    public function getIdExamen()
    {
        return $this->idExamen;
    }
 
    public function getFechaHora()
    {
        return $this->fechaHora;
    }
 
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
}
?>