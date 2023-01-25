<?php
session_start();
$mail = $_SESSION['correo'];
$consulta = "SELECT * FROM imgs where tipo='gratis'";
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";
$archivo = fopen("index.json", "w");
while ($fila = $registros->fetch_assoc()) {
    $data[] = $fila;
}
$json = json_encode($data);
fwrite($archivo, $json);
fclose($archivo);
header("location: /imapi/dashboard/api/index.json");
