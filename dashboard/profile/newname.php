<?php
session_start();
$correo = $_SESSION['correo'];
$newname = $_POST['cambio'];
$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");
$actualizar = "UPDATE users SET nombre='$newname' WHERE mail='$correo'";
mysqli_query($conection, $actualizar) or die("Problemas:" . mysqli_error($conection));
header("location: /imapi/dashboard/profile");
