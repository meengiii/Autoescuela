<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido su Contraseña</title>
    <link rel="stylesheet" href="http://virtual.localfj.com/css/olvido.css">
</head>
<body>
    <div class="contenedor">
        <h2>Olvidó su Contraseña</h2>
        <p>Por favor, ingrese su dirección de correo electrónico para restablecer su contraseña.</p>
        <form action="procesar_formulario.php" method="POST">
            <div class="grupo">
                <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
            </div>
            <button class="reset" type="submit">Restablecer Contraseña</button><br>
            <a href="index.php" id="volver">Volver</a>
        </form>
    </div>
</body>
</html>