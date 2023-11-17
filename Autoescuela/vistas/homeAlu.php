<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <link rel="stylesheet" href="/css/estilosCreaPreg.css">
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/css/nav.css">

</head>

<body>
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

    <div class="content">
        <div class="button-container">
            <button id="irTest">Test</button>
            <button id="irTestERR">Test de Errores</button>
            <button id="irGenT">Generar Test</button>
        </div>
    </div>
    <div id="menuDesplegable">
        <ul>
            <li><a href="#">Bienvenido <?php echo $nombre; ?></a></li>
            <li><a href="?menu=login">Cerrar Sesión</a></li>
        </ul>
    </div>

</body>

</html>