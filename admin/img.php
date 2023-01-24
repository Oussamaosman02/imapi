<?php


$width = $_POST['width'];
$height = $_POST['height'];
$imagen = $_POST['imagen'];
$ext = $_POST['extension'];
$tipo = $_POST['tipo'];

$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");

$consulta = "SELECT * FROM imgs WHERE imagen='$imagen'";

$registros = mysqli_query($conection, $consulta)
    or die("Problemas" . mysqli_error($conection));

if ($reg = mysqli_fetch_array($registros)) {
    echo "<script>alert('El correo ya existe'); history.back();</script>";
} else {
    $insertar = "INSERT INTO imgs (width, height, imagen, ext, tipo) VALUES ('$width','$height','$imagen','$ext','$tipo')";
    mysqli_query($conection, $insertar) or die("Problemas:" . mysqli_error($conection));
    header("location: /imapi/admin");
}
