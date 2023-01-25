<?php
session_start();
require "" . $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/conn.php";
$mail = $_SESSION['correo'];
$consulta = "SELECT * FROM imgs";
$registros = mysqli_query($conection, $consulta)
  or die("Problemas" . mysqli_error($conection));
$reg = mysqli_fetch_array($registros);
$nombre = $reg['nombre'];
$apellidos = $reg['apellidos'];
$myfile = fopen("index.json", "w");
$txt = json_encode($reg);
fwrite($myfile, $txt);
fclose($myfile);
header("location: /imapi/dashboard/api/index.json");
