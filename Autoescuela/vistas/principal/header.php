<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "home") 
    {
        echo '<div class="navbar">
                <div class="navbar-item">
                    <a href="http://virtual.localfj.com/index.php?menu=homeadmin&rol=admin">
                    <img src="/css/imagenes/logo.png" alt="Foto Izquierda">
            </a>
            
                </div>
                <div class="navbar-item">
                    <h1>HOME</h1>
                </div>

                <div id="menuDesplegable" style="display: none;">
                    <ul>
                        <li>Bienvenido <?php echo $nombre; ?></li>
                        <li><a href="?menu=login">Cerrar Sesión</a></li>
                    </ul>
                </div>

                <div class="navbar-item">
                    <img src="/css/imagenes/user.png" alt="Foto Derecha" id="imagenDerecha" onclick="mostrarMenu()">
                    
                </div>
            </div>';
    }
    if ($_GET['menu'] == "homeadmin") 
    {
        echo '<div class="navbar">
        <div class="navbar-item">
            <img src="/css/imagenes/logo.png" alt="Foto Izquierda">
        </div>
        <div class="navbar-item">
            <h1>HOME ADMIN</h1>
        </div>

        <div id="menuDesplegable" style="display: none;">
            <ul>
                <li>Bienvenido <?php echo $nombre; ?></li>
                <li><a href="?menu=login">Cerrar Sesión</a></li>
            </ul>
        </div>

        <div class="navbar-item">
            <img src="/css/imagenes/user.png" alt="Foto Derecha" id="imagenDerecha" onclick="mostrarMenu()">
            
        </div>
    </div>';

    }

    if ($_GET['menu'] == "homeprof") 
    {
        echo '<div class="navbar">
        <div class="navbar-item">
            <img src="/css/imagenes/logo.png" alt="Foto Izquierda">
        </div>
        <div class="navbar-item">
            <h1>HOME PROFESOR</h1>
        </div>

        <div id="menuDesplegable" style="display: none;">
            <ul>
                <li>Bienvenido <?php echo $nombre; ?></li>
                <li><a href="?menu=login">Cerrar Sesión</a></li>
            </ul>
        </div>

        <div class="navbar-item">
            <img src="/css/imagenes/user.png" alt="Foto Derecha" id="imagenDerecha" onclick="mostrarMenu()">
            
        </div>
    </div>';
    }
    if ($_GET['menu'] == "crea") {
        echo '<div class="navbar">
        <div class="navbar-item">
            <img src="/css/imagenes/logo.png" alt="Foto Izquierda">
        </div>
        <div class="navbar-item">
            <h1>CREA PREGUNTAS</h1>
        </div>

        <div id="menuDesplegable" style="display: none;">
            <ul>
                <li>Bienvenido <?php echo $nombre; ?></li>
                <li><a href="?menu=login">Cerrar Sesión</a></li>
            </ul>
        </div>

        <div class="navbar-item">
            <img src="/css/imagenes/user.png" alt="Foto Derecha" id="imagenDerecha" onclick="mostrarMenu()">
        </div>
    </div>';

    }
    if ($_GET['menu'] == "listalu") {
        echo '<div class="navbar">
        <div class="navbar-item">
            <img src="/css/imagenes/logo.png" alt="Foto Izquierda">
        </div>
        <div class="navbar-item">
            <h1>LISTADO ALUMNOS</h1>
        </div>

        <div id="menuDesplegable" style="display: none;">
            <ul>
                <li>Bienvenido <?php echo $nombre; ?></li>
                <li><a href="?menu=login">Cerrar Sesión</a></li>
            </ul>
        </div>

        <div class="navbar-item">
            <img src="/css/imagenes/user.png" alt="Foto Derecha" id="imagenDerecha" onclick="mostrarMenu()">
        </div>
    </div>';
    }
    if ($_GET['menu'] == "alta") {
        echo '<div class="navbar">
        <div class="navbar-item">
            <img src="/css/imagenes/logo.png" alt="Foto Izquierda">
        </div>
        <div class="navbar-item">
            <h1>DAR DE ALTA</h1>
        </div>

        <div id="menuDesplegable" style="display: none;">
            <ul>
                <li>Bienvenido <?php echo $nombre; ?></li>
                <li><a href="?menu=login">Cerrar Sesión</a></li>
            </ul>
        </div>

        <div class="navbar-item">
            <img src="/css/imagenes/user.png" alt="Foto Derecha" id="imagenDerecha" onclick="mostrarMenu()">
            
        </div>
    </div>';

    }
    if ($_GET['menu'] == "test") {
        echo '<div class="navbar">
        <div class="navbar-item">
            <img src="/css/imagenes/logo.png" alt="Foto Izquierda">
        </div>
        <div class="navbar-item">
            <h1>LISTADO TEST</h1>
        </div>
        <div class="navbar-item">
            <img src="/css/imagenes/user.png" alt="Foto Derecha" id="imagenDerecha" onclick="mostrarMenu()">
            
        </div>
    </div>';
    }
    if ($_GET['menu'] == "examen") {
        echo '<div class="navbar">
        <div class="navbar-item">
            <img src="/css/imagenes/logo.png" alt="Foto Izquierda">
        </div>
        <div class="navbar-item">
            <h1>EXAMEN</h1>
        </div>
        <div class="navbar-item">
            <img src="/css/imagenes/user.png" alt="Foto Derecha" id="imagenDerecha" onclick="mostrarMenu()">
            
        </div>
    </div>';
    }
}


?>

<script>
    function mostrarMenu() 
    {
        var menu = document.getElementById('menuDesplegable');
        if (menu.style.display === 'block') 
        {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }

    document.addEventListener('click', function (event) 
    {
        var menu = document.getElementById('menuDesplegable');
        if (event.target !== document.getElementById('imagenDerecha')) 
        {
            menu.style.display = 'none';
        }
    });
</script>