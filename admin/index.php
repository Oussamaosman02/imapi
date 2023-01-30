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
  <title>Admin</title>
  <link rel="stylesheet" href="../src/styles/admin.module.css" />
  <link rel="shortcut icon" href="/imapi/public/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="/imapi/public/apple-touch-icon.png" />
  <link rel="manifest" href="/imapi/public/manifest.json" />
</head>

<body>
  <nav>
    <div>
      <img src="../public/android-chrome-192x192.png" alt="imagen" />
      <h2>IMAPI x <?php echo ($reg['nombre']); ?></h2>
    </div>
    <ul>
      <li>
        <a href="/imapi/admin/add">Añadir Admin</a>
      </li>
      <li>
        <a href="/imapi/dashboard">Dashboard</a>
      </li>
      <li>
        <a href="/imapi/logout">Cerrar Sesión</a>
      </li>
    </ul>
    <div class="avatar"><?php echo "<img src='https://api.dicebear.com/5.x/avataaars/svg?seed=" . $reg['nombre'] . "' width='200' alt=''>";
                        ?> </div>
  </nav>
  <h1>Añadir a la bd:</h1>
  <form action="img.php" method="post" onsubmit="return handleSubmit()">
    <input type="number" name="width" required id="width" placeholder="width" />
    <input type="number" name="height" required id="height" placeholder="height" />
    <input type="text" pattern="[A-Za-z0-9_-]{1,30}" name="imagen" id="imagen" placeholder="imagen" />
    <input type="text" pattern="[A-Za-z0-9_-]{1,30}" name="extension" id="extension" placeholder="extension" />
    <select name="tipo" id="tipo">
      <option value="gratis">gratis</option>
      <option value="pago">pago</option>
    </select>
    <input type="submit" value="Enviar" />
  </form>
  <script>
    const imagen = document.getElementById("imagen");

    function handleSubmit() {
      if (!imagen.value) {
        alert("Hace falta imagen");
        return false;
      }
    }
  </script>
</body>

</html>