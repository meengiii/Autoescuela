<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        $conn = db::abreconexion();
        $examenRepository = new ExamenRepository($conn);
        $examenes = $examenRepository->getAllTest($id);

        $exam = [];
        foreach ($examenes as $examen) {
            $exam = [
                "id" => $examen['idPregunta'],
                "enunciado" => $examen['enunciado'],
                "op1" => $examen['rep1'],
                "op2" => $examen['rep2'],
                "op3" => $examen['rep3'],
                "idCategoria" => $examen['Categorias_idCategoria'],
                "idDificultad" => $examen['Dificultad_idDificultad'],
                "correcta" => $examen['correcta']
            ];
            $exams[] = $exam;
        }

        header('Content-Type: application/json');
        echo json_encode($exams);

    } else {
        $conn = db::abreconexion();
        $examenRepository = new ExamenRepository($conn);
        $examenes = $examenRepository->getAllExam();

        $exam = [];
        foreach ($examenes as $examen) {
            $exam = [
                "idExamen" => $examen['Examen_idExamen']
            ];
            $exams[] = $exam;
        }

        header('Content-Type: application/json');
        echo json_encode($exams);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    sesion::iniciar_sesion();
    $user=sesion::leer_sesion("usuario");

    // Obtén los datos enviados en la solicitud POST
    $datos = json_decode(file_get_contents("php://input"), true);
    $fechaActual = date("Y-m-d H:i:s");


    $conn = db::abreconexion();
    $examenRepository = new ExamenRepository($conn);
    $examenRepository->createExamen($fechaActual,$user->getIdUser());

    //ahora hay que ingeniarselas para coger las x preguntas al azar de la categoria seleccionada
    //hay que meterlas en examen has preguntas


}

?>