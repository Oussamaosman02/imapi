<?php

$name = $_POST['name'];
$mail = $_POST['mail'];
$password = $_POST['contra'];

$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");

$cif_pass = password_hash($password, PASSWORD_DEFAULT);

$consulta = "SELECT * FROM admins WHERE mail='$mail'";

$registros = mysqli_query($conection, $consulta)
    or die("Problemas" . mysqli_error($conection));

if ($reg = mysqli_fetch_array($registros)) {
    echo "<script>alert('El correo ya existe'); history.back();</script>";
} else {
    $insertar = "INSERT INTO admins ( nombre, mail, passwd) VALUES ('$name','$mail','$cif_pass')";
    mysqli_query($conection, $insertar) or die("Problemas:" . mysqli_error($conection));
    header("location: /imapi/admin/login");
}
