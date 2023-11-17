<?php
class Pregunta
{
    private $idPregunta;
    private $rep1;
    private $rep2;
    private $rep3;
    private $correcta;
    private $enunciado;
    private $url;
    private $idDificultad;
    private $idCategoria;

    //constructor
    public function __construct($idPregunta, $rep1, $rep2, $rep3, $correcta, $enunciado, $url, $idDificultad, $idCategoria){
        $this->idPregunta = $idPregunta;
        $this->rep1 = $rep1;
        $this->rep2 = $rep2;
        $this->rep3 = $rep3;
        $this->correcta = $correcta;
        $this->enunciado = $enunciado;
        $this->url = $url;
    }

    //getter y setter

    public function getIdPregunta()
    {
        return $this->idPregunta;
    }


    public function getRep1()
    {
        return $this->rep1;
    }


    public function setRep1($rep1)
    {
       return $this->rep1 = $rep1;   
    }


    public function getRep2()
    {
        return $this->rep2;
    }


    public function setRep2($rep2)
    {
        $this->rep2 = $rep2;

    }


    public function getRep3()
    {
        return $this->rep3;
    }


    public function setRep3($rep3)
    {
        $this->rep3 = $rep3;

    }


    public function getCorrecta()
    {
        return $this->correcta;
    }


    public function setCorrecta($correcta)
    {
        $this->correcta = $correcta;

    }

    public function getEnunciado()
    {
        return $this->enunciado;
    }

    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;

    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;

    }

    public function getIdDificultad()
    {
        return $this->idDificultad;
    }

    public function setIdDificultad($idDificultad)
    {
        $this->idDificultad = $idDificultad;

    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        return $this->idCategoria = $idCategoria;
    }
}
?>