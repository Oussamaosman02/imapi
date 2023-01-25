<?php
session_start();
$correo = $_SESSION['correo'];
$pass = $_POST['contra'];
$newpass = $_POST['cambio'];
$cif = password_hash($newpass, PASSWORD_DEFAULT);
$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");
$consulta = "SELECT * FROM users WHERE mail='$correo'";
$registros = mysqli_query($conection, $consulta)
    or die("Problemas" . mysqli_error($conection));
$reg = mysqli_fetch_array($registros);
if (password_verify($pass, $reg['passwd'])) {
    $actualizar = "UPDATE users SET passwd='$cif' WHERE mail='$correo'";
    mysqli_query($conection, $actualizar) or die("Problemas:" . mysqli_error($conection));
    header("location: /imapi/dashboard/profile");
} else {
    echo "<script>alert('Error con la contraseña'); history.back();</script>";
}
