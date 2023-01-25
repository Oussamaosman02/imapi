<?php
session_start();

if (empty($_SESSION['correo'])) {
  header("location: /imapi/login");
}
?>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link rel="stylesheet" href="../src/styles/admin.module.css" />
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
  ?>
  <nav>
    <div>
      <img src="../public/android-chrome-192x192.png" alt="imagen" />
      <h2>IMAPI x <?php echo ($reg['nombre']); ?></h2>
    </div>
    <ul>
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
    <input type="number" name="width" id="width" placeholder="width" />
    <input type="number" name="height" id="height" placeholder="height" />
    <input type="text" name="imagen" id="imagen" placeholder="imagen" />
    <input type="text" name="extension" id="extension" placeholder="extension" />
    <select name="tipo" id="tipo">
      <option value="gratis">gratis</option>
      <option value="pago">pago</option>
    </select>
    <input type="submit" value="Enviar" />
  </form>
  <script>
    const $ = (sel) => document.querySelector(sel);
    const $v = (sel) => document.querySelector(sel).value;

    function handleSubmit() {
      if ($v("#imagen").length < 1) {
        alert("Hace falta imagen");
        return false;
      }
    }
  </script>
</body>

</html>