<?php
session_start();
if (empty($_SESSION['correo'])) {
  header("location: /imapi/login");
}
$mail = $_SESSION['correo'];
$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");
$consulta = "SELECT * FROM admins WHERE mail='$mail'";
$registros = mysqli_query($conection, $consulta)
  or die("Problemas" . mysqli_error($conection));
$reg = mysqli_fetch_array($registros);
if (!$reg) {
  header("location: /imapi/admin/login");
}
?>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Añadir Admin</title>
  <link rel="stylesheet" href="../../src/styles/addadmin.module.css" />
</head>

<body>
  <nav>
    <div>
      <img src="../../public/android-chrome-192x192.png" alt="imagen" />
      <h2>IMAPI</h2>
    </div>
    <ul>
      <li>
        <a href="#">Nosotros</a>
      </li>
      <li>
        <a href="#">Precios</a>
      </li>
      <li>
        <a href="#">Soporte</a>
      </li>
      <li>
        <a href="#">Ejemplos</a>
      </li>
    </ul>
    <a href="/imapi/dashboard">Entrar</a>
  </nav>
  <h1>Nuevo admin</h1>
  <form action="nuevoadmin.php" method="post">
    <input type="text" placeholder="Nombre" name="name" />
    <input type="mail" placeholder="Mail" name="mail" />
    <input type="password" placeholder="contraseña" name="contra" />
    <input type="submit" value="Crear" />
  </form>
</body>

</html>