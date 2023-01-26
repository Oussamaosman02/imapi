<?php
$width = $_POST['width'];
$height = $_POST['height'];
$imagen = $_POST['imagen'];
$ext = $_POST['extension'];
$tipo = $_POST['tipo'];
$consulta = "SELECT * FROM imgs WHERE imagen='$imagen'";
require $_SERVER['DOCUMENT_ROOT'] . "/imapi/src/models/consulta.php";

if ($reg) {
    echo "<script>alert('El correo ya existe'); history.back();</script>";
} else {
    $insertar = "INSERT INTO imgs (width, height, imagen, ext, tipo) VALUES ('$width','$height','$imagen','$ext','$tipo')";
    mysqli_query($conection, $insertar) or die("Problemas:" . mysqli_error($conection));
    header("location: /imapi/admin");
}
