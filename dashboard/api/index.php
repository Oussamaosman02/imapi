<?php
session_start();
$mail = $_SESSION['correo'];
$consulta = "SELECT * FROM imgs";
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";
$archivo = fopen("index.json", "w");
$json = json_encode($reg);
fwrite($archivo, $json);
fclose($archivo);
header("location: /imapi/dashboard/api/index.json");
