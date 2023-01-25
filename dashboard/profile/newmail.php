<?php
session_start();
$correo = $_SESSION['correo'];
$newmail = $_POST['cambio'];
$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");
$consulta = "SELECT * FROM users WHERE mail='$newmail'";
$registros = mysqli_query($conection, $consulta)
    or die("Problemas" . mysqli_error($conection));
if ($reg = mysqli_fetch_array($registros)) {
    echo "<script>alert('El correo ya existe'); history.back();</script>";
} else {
    $actualizar = "UPDATE users SET mail='$newmail' WHERE mail='$correo'";
    mysqli_query($conection, $actualizar) or die("Problemas:" . mysqli_error($conection));
    $_SESSION['correo']=$newmail;
    header("location: /imapi/dashboard/profile");
}
