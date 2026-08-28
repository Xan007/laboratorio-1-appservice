<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vault</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <h1>Vault</h1>

    <p>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></p>

    <h2>Usuarios y contraseñas almacenados</h2>

    <?php foreach ($_SESSION["usuarios"] as $usuario): ?>

        <p>
            Usuario:
            <?php echo htmlspecialchars($usuario["usuario"]); ?>
        </p>

        <p>
            Password:
            <?php echo htmlspecialchars($usuario["password"]); ?>
        </p>

        <hr>

    <?php endforeach; ?>

    <a href="logout.php">Cerrar sesión</a>

</body>

</html> 