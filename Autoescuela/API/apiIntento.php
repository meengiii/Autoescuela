<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_GET["id"];
    // Obtén los datos enviados en la solicitud POST
    $datos = json_decode(file_get_contents("php://input"), true);

    $conn = db::abreconexion();
    $intentoRepository = new IntentoRepository($conn);
    $intentoRepository->createIntento($id,$datos['json'],$datos['idUser']);

    echo '{"respuesta":"OK"}';

}


?>