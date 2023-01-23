<?php
session_start();

if (empty($_SESSION['correo'])) {
    header("location: /imapi/login");
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
</head>

<body>
    <?php


    $mail = $_SESSION['correo'];
    $conection = new mysqli("localhost", "root", "", "api");
    $conection->set_charset("utf8");

    $consulta = "SELECT * FROM users WHERE mail='$mail'";

    $registros = mysqli_query($conection, $consulta)
        or die("Problemas" . mysqli_error($conection));
    $reg = mysqli_fetch_array($registros);
    echo "Nombre: " . ($reg['nombre']);
    echo "Apellidos: " . ($reg['apellidos']);
    echo "Mail: " . ($reg['mail']);
    ?>
    <a href="/imapi/logout">

        <button>Cerrar Sesión</button>
    </a>
</body>

</html>