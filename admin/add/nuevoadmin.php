<?php

$name = $_POST['name'];
$mail = $_POST['mail'];
$password = $_POST['contra'];

$cif_pass = password_hash($password, PASSWORD_DEFAULT);

$consulta = "SELECT * FROM admins WHERE mail='$mail'";

require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";

if ($reg) {
    echo "<script>alert('El correo ya existe'); history.back();</script>";
} else {
    $insertar = "INSERT INTO admins ( nombre, mail, passwd) VALUES ('$name','$mail','$cif_pass')";
    mysqli_query($conection, $insertar) or die("Problemas:" . mysqli_error($conection));
    header("location: /imapi/admin/login");
}
