<?php
session_start();
$correo = $_SESSION['correo'];
$newmail = $_POST['cambio'];
$consulta = "SELECT * FROM users WHERE mail='$newmail'";
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";

if ($reg) {
    echo "<script>alert('El correo ya existe'); history.back();</script>";
} else {
    $actualizar = "UPDATE users SET mail='$newmail' WHERE mail='$correo'";
    mysqli_query($conection, $actualizar) or die("Problemas:" . mysqli_error($conection));
    $_SESSION['correo'] = $newmail;
    header("location: /imapi/dashboard/profile");
}
