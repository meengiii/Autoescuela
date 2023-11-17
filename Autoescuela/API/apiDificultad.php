<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $conn = db::abreconexion();
    $dificultadRepository=new DificultadRepository($conn);
    $dificultades = $dificultadRepository->getAllDif();

    $dif = [];
    foreach ($dificultades as $dificultad) 
    {
        $dif = [
            "id" => $dificultad['idDificultad'],
            "nombre" => $dificultad['nombre']
        ];
        $difs[] = $dif;
    }

    header('Content-Type: application/json');
    echo json_encode($difs);
}


?>