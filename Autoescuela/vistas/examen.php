<?php
if (!isset($_GET['menu'])) {
    $_GET['menu'] = "login";
}
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/index.php';

    }
    if ($_GET['menu'] == "login") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/identificacion.php';

    }
    if ($_GET['menu'] == "registro") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/registro.php';

    }
    if ($_GET['menu'] == "home") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/homeAlu.php';

    }
    if ($_GET['menu'] == "homeadmin") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/homeAdmin.php';

    }
    if ($_GET['menu'] == "crea") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/creaPreguntas.php';

    }
    if ($_GET['menu'] == "listalu") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/listadoAlu.php';

    }
    if ($_GET['menu'] == "alta") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/darAlta.php';

    }
    if ($_GET['menu'] == "test") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/listadoTest.php';

    }
    if ($_GET['menu'] == "examen") {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/examen.php';

    }
}
?>