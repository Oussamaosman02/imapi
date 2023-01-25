<?php
$conection = new mysqli("localhost", "root", "", "api");
$conection->set_charset("utf8");
$registros = mysqli_query($conection, $consulta)
or die("Problemas" . mysqli_error($conection));
$reg = mysqli_fetch_array($registros);