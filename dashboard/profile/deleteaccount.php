<?php
session_start();
$user = $_POST['cambio'];

require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/conn.php";

$del = "DELETE FROM `users` WHERE mail='$user';";
mysqli_query($conection, $del);
session_destroy();
header("location: /imapi");
