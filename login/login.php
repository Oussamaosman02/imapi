<?php

session_start();
$mail = $_POST['mail'];
$password = $_POST['passwd'];

$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");

$consulta = "SELECT * FROM users WHERE mail='$mail'";

$registros = mysqli_query($conection, $consulta)
    or die("Problemas" . mysqli_error($conection));

if ($reg = mysqli_fetch_array($registros)) {
    if (password_verify($password, $reg['passwd'])) {
        $_SESSION['correo'] = $mail;
        header("location: /imapi/dashboard");
    } else {
        echo "<script>alert('Error con la contraseña'); history.back();</script>";
    }
} else {
    echo "<script>alert('Correo equivocado'); history.back();</script>";
}
