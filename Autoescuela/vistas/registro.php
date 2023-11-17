<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/estilosRegistro.css">
    <title>Registro de Usuario</title>
</head>

<body>
    <?php
    if (isset($_POST['registro'])) {
        $conn = db::abreConexion();
        $userRepository = new UserRepository($conn);
        if (!empty($_POST['newUser']) && !empty($_POST['newPw'])) {
            $userRepository->createUser($_POST['newUser'], md5($_POST['newPw']));
        }
    }
    ?>

    <form enctype="multipart/form-data" method="post">
        <h2>Registro de usuario:</h2>
        <p><input type="text" name="newUser" placeholder="Nombre"></p>
        <p><input type="password" name="newPw" placeholder="Contraseña"></p>
        <p><input type="submit" name="registro" value="Registrar"></p>
        <p><a href="index.php?menu=login">¿Ya tienes cuenta?</a></p>

    </form>

</body>

</html>