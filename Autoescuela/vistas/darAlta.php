<!DOCTYPE html>
<html>

<head>
    <title>Dar Alta Alumnos</title>

    <link rel="stylesheet" href="/css/estilosCreaPreg.css">
    <script src="/js/user.js"></script>
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/css/nav.css">
    <link rel="stylesheet" type="text/css" href="http://virtual.localfj.com/css/estilosDarAlta.css">
</head>

<body>
    <div id="botonAlta-list">
        <button id="irList">Listado Alumnos</button>
    </div>

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
                <p>Apellidos:</p>
                <div class="botones-roles">
                    <button id="rolAlu">Alumno</button>
                    <button id="rolProf">Profesor</button>
                    <button id="rolAdmin">Admin</button>
                </div>
            </div>
        </div>


    </div>
</body>

</html>