<?php
//iniciamos la sesión
session_start();
//recogemos los datos
$mail = $_POST['mail'];
$password = $_POST['passwd'];

//esta será la consulta que hagamos
$consulta = "SELECT * FROM users WHERE mail='$mail'";
//llamamos al archivo de consulta
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";

//realizamos las comprobaciones
if ($reg) {
    //si existe el correo
    if (password_verify($password, $reg['passwd'])) {
        //si las contraseñas coinciden
        $_SESSION['correo'] = $mail;
        //redirección al dashboard
        header("location: /imapi/dashboard");
    } else {
        //si las contraseñas no coinciden
        echo "<script>alert('Error con la contraseña'); history.back();</script>";
    }
} else {
    //si el correo no exite en la base de datos
    echo "<script>alert('Correo equivocado'); history.back();</script>";
}
