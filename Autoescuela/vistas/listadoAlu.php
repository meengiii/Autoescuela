<!DOCTYPE html>
<html>

<head>
    <title>Listado Alumnos</title>

    <link rel="stylesheet" href="/css/estilosCreaPreg.css">
    <script src="/js/nav.js"></script>
    <script src="/js/user.js"></script>
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/css/nav.css">
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/css/estilosListadoAlu.css">
</head>
</head>

<body>
    <div id="miModal" class="modal">
        <div class="modal-contenido">
            <span class="cerrar" id="cerrarModal">&times;</span>
            <h2>Configuración</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre">
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena">
            <button id="guardarCambios">Guardar Cambios</button>
        </div>
    </div>


    <div id="botonAlta-list">
        <button id="irAlta">Dar de alta</button>
    </div>

    <div id="contenedor">
        <div id="alumnos-container">
            <h2>ALUMNOS</h2>

        </div>


        <div id="info-container">
            <div id="cuadrado-exterior">
                <div id="cuadrado-interior"></div>
            </div>
            <div id="info-text">
                <p>Nombre: <span class="nombreperfil"></span></p>
                <p>Apellidos:<span></span></p>
                <p>Nº de exámenes resueltos:<span></span></p>
                <p>Promedio de aprobar:<span></span></p>
                <p>Promedio de errores:<span></span></p>
            </div>
        </div>
    </div>

</body>

</html>