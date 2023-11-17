<?php
class Examen_has_pregunta
{
    private $idExamen;
    private $idPregunta;

    //constructor
    public function __construct($idExamen, $idPregunta){
        $this->idExamen = $idExamen;
        $this->idPregunta = $idPregunta;
    }

    //getter y setter

    public function getIdExamen()
    {
        return $this->idExamen;
    }
    public function setIdExamen($idExamen)
    {
        $this->idExamen = $idExamen;
    }
    public function getIdPregunta()
    {
        return $this->idPregunta;
    }
    public function setIdPregunta($idPregunta)
    {
        $this->idPregunta = $idPregunta;
    }
}
?>