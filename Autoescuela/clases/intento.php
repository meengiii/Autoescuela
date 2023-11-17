<?php
class Intento
{
    private $idIntento;
    private $json;
    private $idUser;
    private $idExamen;
    
    //constructor

    public function __construct($idIntento, $json, $idUser, $idExamen){
        $this->idIntento = $idIntento;
        $this->json = $json;
        $this->idUser = $idUser;
        $this->idExamen = $idExamen;
    }

    //getter y setter

    public function getIdIntento()
    {
        return $this->idIntento;
    }

    public function getJson()
    {
        return $this->json;
    }


    public function setJson($json)
    {
        $this->json = $json;

    }

    public function getIdUser()
    {
        return $this->idUser;
    }


    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


    public function getIdExamen()
    {
        return $this->idExamen;
    }

    public function setIdExamen($idExamen)
    {
        $this->idExamen = $idExamen;

    }
}

?>