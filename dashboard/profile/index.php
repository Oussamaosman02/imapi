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
  <title>Perfil</title>
  <link rel="stylesheet" href="../../src/styles/profile.module.css" />
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
      <img src="../../public/android-chrome-192x192.png" alt="imagen" />
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

  <h1>Perfil</h1>
  <div class="root">
    <section>
      <h2>Tus datos</h2>
      <h3>Nombre: <b><?php echo $reg['nombre']; ?></b> </h3>
      <h3>Apellidos: <b><?php echo $reg['apellidos']; ?></b> </h3>
      <h3>Crreo: <b><?php echo $reg['mail']; ?> </h3></b>
    </section>
    <section>
      <article>
        <h4>Mail</h4>
        <form action="newmail.php" method="post">
          <input type="text" name="cambio" placeholder="Nuevo Mail" />
          <input type="submit" />
        </form>
      </article>
      <article>
        <h4>Nombre</h4>
        <form action="newname.php" method="post">
          <input type="text" name="cambio" placeholder="Nuevo Nombre" />
          <input type="submit" />
        </form>
      </article>
      <article>
        <h4>Contraseña</h4>
        <form action="newpasswd.php" method="post">
          <input type="text" name="contra" placeholder="Contraseña Actual" />
          <input type="text" name="cambio" placeholder="Contraseña nueva" />
          <input type="submit" />
        </form>
      </article>
    </section>
  </div>
</body>

</html>