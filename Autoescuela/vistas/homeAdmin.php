<?php

    Sesion::iniciar_sesion();
    $user = Sesion::leer_sesion("usuario");
    $nombre = $user->getNombre();

    if (isset($_POST['menu']) && $_POST['menu'] === 'login') 
    {
        // Cerrar la sesión y redirigir al usuario a la página de inicio
        Sesion::cerrar_session();
        header('Location: inicio.php');
        exit();
    }

    if (!Sesion::leer_sesion("usuario"))
    {
        Sesion::cerrar_session();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>HOME ADMIN</title>
    <link rel="stylesheet" href="/css/estilosCreaPreg.css">
    <!-- <script src="/js/nav.js"></script> -->
    <script src="/js/home.js"></script>
    <script src="/js/categoria.js"></script>
    <script src="/js/test.js"></script>
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/css/nav.css">
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/css/homeAdmin.css">
</head>

<body>
    <div id="miModal" class="modal">
        <div class="modal-contenido">
            <span class="cerrar" id="cerrarModal">&times;</span>
            <h2>Generar Examen</h2>
            <div id="cat-container">
                <select id="botonCat" name="categoria">
                    <option value="" disabled selected>Seleccione categoría</option>
                </select>
            </div>
            <div class="input-group">
                <label for="cantidad">Nº Preguntas:</label>
                <div class="quantity-input">
                    <input type="number" id="cantidad" name="cantidad" value="1" min="1">
                </div>
            </div>
            <div class="button-container">
                <button id="genExamen">Generar Examen</button>
            </div>
        </div>
    </div>
    

    <div class="contenedor">
        <div class="button-container">
            <button id="irCTest">Crear Test</button>
            <button id="irLTest">Listado Test</button>
            <button id="irLAlu">Listado Alumnos</button>
            <button id="irGenT">Generar Test</button>
        </div>
    </div>
</body>

</html>