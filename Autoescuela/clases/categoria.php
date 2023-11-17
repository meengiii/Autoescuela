<?php
class Categoria{
    private $idCategoria;
    private $nombre;

    //constructor
    public function __construct($idCategoria,$nombre){
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
    }

    //getter y setter
 
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}

?>