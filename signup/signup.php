<?php

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$mail = $_POST['mail'];
$password = $_POST['password'];

$consulta = "SELECT * FROM users WHERE mail='$mail'";
$cif_pass = password_hash($password, PASSWORD_DEFAULT);
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";

if ($reg) {
    echo "<script>alert('El correo ya existe'); history.back();</script>";
} else {
    $insertar = "INSERT INTO users (nombre, apellidos, mail, passwd) VALUES ('$nombre','$apellidos','$mail','$cif_pass')";
    mysqli_query($conection, $insertar) or die("Problemas:" . mysqli_error($conection));
    header("location: /imapi/login");
}
