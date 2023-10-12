<?php

$user = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass);

$pro = $_POST["pro"];
$pre = $_POST["pre"];

if (!$connection) {
    echo "No se ha podido conectar con el servidor" . mysqli_error();
} else {
    $datab = "form";
    $db = mysqli_select_db($connection, $datab);

    if (!$db) {
        echo "No se ha podido encontrar la Tabla";
    }

    $instruccion_SQL = "INSERT INTO productos (nombre_p,precio) VALUES ('$pro','$pre')";
    $resultado = mysqli_query($connection, $instruccion_SQL);

    if (!$resultado) {
        echo "No se ha podido realizar la consulta";
    }

    header("location:index.html");

    $consulta = "SELECT * FROM productos";
    $result = mysqli_query($connection, $consulta);

    while ($colum = mysqli_fetch_array($result)) {
        // Hacer algo con los datos recuperados
    }
}

mysqli_close($connection);
?>


