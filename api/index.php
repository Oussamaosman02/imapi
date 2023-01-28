<?php
session_start();
$mail = $_SESSION['correo'];

function archivo(array $data)
{
    $archivo = fopen("index.json", "w");
    $json = json_encode($data);
    fwrite($archivo, $json);
    fclose($archivo);
}

$consulta = "SELECT * FROM imgs where tipo='gratis'";
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";
$data[] = $reg;
while ($fila = $registros->fetch_assoc()) {
    $data[] = $fila;
}

archivo($data);

header("location: /imapi/api/index.json");
