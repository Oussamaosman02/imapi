<?php

require("/src/models/conn.php");
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$mail = $_POST['mail'];
$password = $_POST['password'];

$cif_pass = password_hash($password,PASSWORD_DEFAULT);

//$consulta = "SELECT * FROM "