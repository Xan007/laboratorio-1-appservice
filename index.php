<?php
session_start();

if (!$_SESSION["usuarios"]) {
    $_SESSION["usuarios"] = [
        [
            "usuario" => "admin",
            "password" => "123"
        ]
    ];
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = $_POST["usuario"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($usuario === "admin" && $password === "123") {

        $_SESSION["usuario"] = $usuario;

        header("Location: vault.php");
        exit();

    } else {
        
        $_SESSION["usuarios"][] = [
            "usuario" => $usuario,
            "password" => $password
        ];

        $mensaje = "Usuario o contraseña incorrectos.";
        
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Login Page</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="content">
        <div class="flex-div">

            <div class="name-content">
                <h1 class="logo">Facebook</h1>
                <p>Connect with friends and the world around you on Facebook.</p>
            </div>

            <form method="POST">

                <input
                    type="text"
                    name="usuario"
                    placeholder="Username"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                >

                <button type="submit" class="login">
                    Log In
                </button>

                <a href="#">Forgot Password ?</a>
                <hr>
                <button class="create-account">Create New Account</button>

                <?php if ($mensaje !== ""): ?>
                    <p><?php echo $mensaje; ?></p>
                <?php endif; ?>

            </form>

        </div>
    </div>

</body>

</html>