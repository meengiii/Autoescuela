<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/helpers/autocargador.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $conn = db::abreconexion();
        $userRepository = new UserRepository($conn);
        $usuarios = $userRepository->readUser($id);

        $user = [];
        foreach ($usuarios as $usuario) {
            $user = [
                "id" => $usuario['idUser'],
                "nombre" => $usuario['nombre'],
                "pass" => $usuario['password'],
                "rol" => $usuario['rol']
            ];
            $users[] = $user;
        }

        header('Content-Type: application/json');
        echo json_encode($users);
    } else if ($_GET['menu'] == "alta") {

        $conn = db::abreconexion();
        $userRepository = new UserRepository($conn);
        $usuarios = $userRepository->getAllUserNoRol();

        $user = [];
        foreach ($usuarios as $usuario) {
            $user = [
                "id" => $usuario['idUser'],
                "nombre" => $usuario['nombre'],
                "pass" => $usuario['password'],
                "rol" => $usuario['rol']
            ];
            $users[] = $user;
        }

        header('Content-Type: application/json');
        echo json_encode($users);
    } else {
        $conn = db::abreconexion();
        $userRepository = new UserRepository($conn);
        $usuarios = $userRepository->getAllUser();

        $user = [];
        foreach ($usuarios as $usuario) {
            $user = [
                "id" => $usuario['idUser'],
                "nombre" => $usuario['nombre']
            ];
            $users[] = $user;
        }

        header('Content-Type: application/json');
        echo json_encode($users);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    if ($_GET["modo"] == "actualizar") {
        $id = $_GET["id"];
        // Obtén los datos enviados en la solicitud POST
        $datos = json_decode(file_get_contents("php://input"), true);
        if ($datos) {
            $conn = db::abreConexion();
            $userRepository = new UserRepository($conn);
            $userRepository->updateUser($id, $datos["nombre"], md5($datos["pass"]));
            // Devuelve una respuesta
            echo '{"respuesta":"OK"}';
        }

    } else {
        $id = $_GET["id"];
        $rol = $_GET["rol"];
        $conn = db::abreconexion();
        $userRepository = new UserRepository($conn);
        $userRepository->updateUserRol($id, $rol);
    }

} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $id = $_GET["id"];
    $conn = db::abreconexion();
    $userRepository = new UserRepository($conn);
    $userRepository->deleteUser($id);
}

?>