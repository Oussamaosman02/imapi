<?php
session_start();
$user = $_POST['cambio'];

$consulta = "DELETE FROM `users` WHERE mail='$user';";
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/conn.php";

session_destroy();
header("location: /imapi");
