<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['modo'] == "actualizar") {

        // Obtén los datos enviados en la solicitud POST
        $datos = json_decode(file_get_contents("php://input"), true);
        if ($datos) {
            $conn = db::abreConexion();
            $preguntaRepository = new preguntaRepository($conn);
            $preguntaRepository->updatePregunta($datos['id'], $datos['op1'], $datos['op2'], $datos['op3'], $datos['cor'], $datos['enun'], $datos['dif'], $datos['cat']);
            // Devuelve una respuesta
            echo '{"respuesta":"OK"}';
        }


    } else {

        // Obtén los datos enviados en la solicitud POST
        $datos = json_decode(file_get_contents("php://input"), true);
        if ($datos) {
            // Llama a la función createPregunta con los datos
            $conn = db::abreConexion();
            $preguntaRepository = new preguntaRepository($conn);
            $preguntaRepository->createPregunta($datos['op1'], $datos['op2'], $datos['op3'], $datos['cor'], $datos['enun'], $datos['dif'], $datos['cat']);
            // Devuelve una respuesta
            echo '{"respuesta":"OK"}';
        }
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["modo"])) {
        $cat = $_GET["cat"];

        $conn = db::abreconexion();
        $preguntaRepository = new preguntaRepository($conn);
        $max = $preguntaRepository->getMaxPregCat($cat);

        echo json_encode($max);

    } else if (isset($_GET["cor"])) {
        $id = $_GET["id"];
        $conn = db::abreconexion();
        $preguntaRepository = new preguntaRepository($conn);
        $preguntas = $preguntaRepository->getAllCor($id);
        $respuestas = [];

        foreach ($preguntas as $index => $pregunta) {
            $respuestas["r" . ($index + 1)] = strval($pregunta['correcta']);
        }

        header('Content-Type: application/json');
        echo json_encode($respuestas);


    } else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $conn = db::abreconexion();
        $preguntaRepository = new preguntaRepository($conn);
        $preguntas = $preguntaRepository->readPregunta($id);

        $preg = [];
        foreach ($preguntas as $pregunta) {
            $preg = [
                "id" => $pregunta['idPregunta'],
                "enunciado" => $pregunta['enunciado'],
                "op1" => $pregunta['rep1'],
                "op2" => $pregunta['rep2'],
                "op3" => $pregunta['rep3'],
                "idCategoria" => $pregunta['Categorias_idCategoria'],
                "idDificultad" => $pregunta['Dificultad_idDificultad'],
                "correcta" => $pregunta['correcta']
            ];
            $pregs[] = $preg;
        }

        header('Content-Type: application/json');
        echo json_encode($pregs);
    } else {
        $conn = db::abreconexion();
        $preguntaRepository = new preguntaRepository($conn);
        $preguntas = $preguntaRepository->getAllPreg();

        $preg = [];
        foreach ($preguntas as $pregunta) {
            $preg = [
                "id" => $pregunta['idPregunta'],
                "enunciado" => $pregunta['enunciado']
            ];
            $pregs[] = $preg;
        }

        header('Content-Type: application/json');
        echo json_encode($pregs);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $id = $_GET["id"];
    $conn = db::abreConexion();
    $preguntaRepository = new preguntaRepository($conn);
    $preguntaRepository->deletePregunta($id);
    // Devuelve una respuesta
    echo '{"respuesta":"OK"}';

}
?>