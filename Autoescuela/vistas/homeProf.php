<?php

    Sesion::iniciar_sesion();
    $user = Sesion::leer_sesion("usuario");
    $nombre = $user->getNombre();


?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/interfaces/estilos/estilosPrinProf.css">
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/css/nav.css">
</head>
<body>

    <div id="contenedor">
        <div id="encabezado">
            <img id="imagenUsuario" src="http://virtual.localfj.com/interfaces/imagenes/logo.PNG" alt="Imagen Izquierda">
            <h1 id="titulo">HOME</h1>
            <img id="imagenDerecha" src="http://virtual.localfj.com/interfaces/imagenes/user2.webp" alt="Imagen Derecha" onclick="mostrarMenu()">
        </div>
        <div id="menuDesplegable">
            <ul>  
            <li><a href="#">Bienvenido <?php echo $nombre; ?></a></li>
                <li><a href="index.php?menu=login">Cerrar Sesión</a></li>
            </ul>
        </div>
        <div id="enlaces">
            <a href="#">Ver Test</a>
            <a href="#">Crear Test para un alumno</a>
            <a href="#">Crear Test</a>
            <a href="#">Ver alumnos</a>
            <a href="#">Ver Calificaciones</a>
        </div>
    </div>
    <script src="http://virtual.localfj.com/interfaces/js/despegable.js"></script>
</body>
</html>