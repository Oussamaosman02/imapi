<?php
session_start();
$correo = $_SESSION['correo'];
$newname = $_POST['cambio'];
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/conn.php";
$actualizar = "UPDATE users SET nombre='$newname' WHERE mail='$correo'";
mysqli_query($conection, $actualizar) or die("Problemas:" . mysqli_error($conection));
header("location: /imapi/dashboard/profile");
