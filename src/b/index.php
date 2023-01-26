<?php
$user = $_GET['u'];

require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/conn.php";

$del = "DELETE FROM `users` WHERE mail='$user';";
mysqli_query($conection, $del);
echo "usuario borrado:" . $user;
