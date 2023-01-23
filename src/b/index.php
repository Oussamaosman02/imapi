<?php
$user = $_GET['user'];

$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");

$del = "DELETE FROM `users` WHERE nombre='$user';";
mysqli_query($conection, $del);
echo "usuario borrado:" . $user;
