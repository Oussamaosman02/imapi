<?php

session_start();
$mail = $_POST['mail'];
$password = $_POST['contra'];

$consulta = "SELECT * FROM admins WHERE mail='$mail'";
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";

if ($reg) {
    if (password_verify($password, $reg['passwd'])) {
        $_SESSION['correo'] = $mail;
        header("location: /imapi/admin");
    } else {
        echo "<script>alert('Error con la contraseña'); history.back();</script>";
    }
} else {
    echo "<script>alert('Correo equivocado'); history.back();</script>";
}
