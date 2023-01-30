<?php
session_start();
if (empty($_SESSION['correo'])) {
  header("location: /imapi/login");
}
$mail = $_SESSION['correo'];
$consulta = "SELECT * FROM admins WHERE mail='$mail'";
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";

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
  <link rel="shortcut icon" href="/imapi/public/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="/imapi/public/apple-touch-icon.png" />
  <link rel="manifest" href="/imapi/public/manifest.json" />
</head>

<body>
  <nav>
    <div>
      <img src="../../public/android-chrome-192x192.png" alt="imagen" />
      <h2>IMAPI</h2>
    </div>
    <ul>
      <li>
        <a href="/imapi/logout">Cerrar Sesión</a>
      </li>
      <li>
        <a href="/imapi/admin/">Admin</a>
      </li>
      <li>
        <a href="/imapi/dashboard">Dashboard</a>
      </li>
    </ul>
  </nav>
  <h1>Nuevo admin</h1>
  <form action="nuevoadmin.php" method="post">
    <input type="text" pattern="[A-Za-z0-9_-]{1,30}" placeholder="Nombre" name="name" />
    <input type="mail" placeholder="Mail" name="mail" />
    <input type="password" pattern="[A-Za-z0-9_-]{1,30}" placeholder="contraseña" name="contra" />
    <input type="submit" value="Crear" />
  </form>
</body>

</html>