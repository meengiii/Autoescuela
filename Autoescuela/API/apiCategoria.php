<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $conn = db::abreconexion();
    $categoriaRepository=new CategoriaRepository($conn);
    $categorias = $categoriaRepository->getAllCat();

    $cat = [];
    foreach ($categorias as $categoria) {
        $cat = [
            "id" => $categoria['idCategoria'],
            "nombre" => $categoria['nombre']
        ];
        $cats[] = $cat;
    }

    header('Content-Type: application/json');
    echo json_encode($cats);
}


?>