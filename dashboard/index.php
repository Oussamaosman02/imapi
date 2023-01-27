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
    <link rel="stylesheet" href="../src/styles/dashboard.module.css" />
    <link rel="shortcut icon" href="/imapi/public/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/imapi/public/apple-touch-icon.png" />
    <link rel="manifest" href="/imapi/public/manifest.json" />
</head>

<body>
    <?php
    $mail = $_SESSION['correo'];
    $consulta = "SELECT * FROM users WHERE mail='$mail'";
    require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";

    ?>
    <nav>
        <div>
            <img src="../public/android-chrome-192x192.png" alt="imagen" />
            <h2>IMAPI x <?php echo ($reg['nombre']); ?></h2>
        </div>
        <ul>
            <?php
            $admconsulta = "SELECT * FROM admins WHERE mail='$mail'";
            $admregistros = mysqli_query($conection, $admconsulta)
                or die("Problemas" . mysqli_error($conection));
            $admreg = mysqli_fetch_array($admregistros);
            if ($admreg) {
                echo "<li>";
                echo "<a href='/imapi/admin/'>Admin</a>";
                echo "</li>";
            }
            ?>
            <li>
                <a href="/imapi/logout">Cerrar Sesión</a>
            </li>
            <li>
                <a href="/imapi/dashboard/profile">Perfil</a>
            </li>
        </ul>
        <div class="avatar"><?php echo "<img src='https://api.dicebear.com/5.x/avataaars/svg?seed=" . $reg['nombre'] . "' width='200' alt=''>";
                            ?> </div>
    </nav>
    <h1>Imágenes disponibles</h1>
    <div class="img">
        <?php
        $conection = new mysqli("localhost", "root", "", "api");
        $conection->set_charset("utf8");
        $consulta = "SELECT * FROM imgs where tipo='gratis'";
        $registros = mysqli_query($conection, $consulta)
            or die("Problemas" . mysqli_error($conection));
        while ($fila = $registros->fetch_assoc()) {
            $imagen = $fila['imagen'];
            $width = $fila['width'];
            $height = $fila['height'];
            echo "<img src='$imagen'  style='--w:$width ;--h: $height;' alt='imagen de $imagen' />";
        }
        ?>
    </div>
</body>

</html>