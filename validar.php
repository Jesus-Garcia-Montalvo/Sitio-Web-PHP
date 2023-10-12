<?php
$user = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass);

$nombre = $_POST["nombre"];
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];

if (!$connection) {
    echo "No se ha podido conectar con el servidor" . mysqli_error();
} else {
    echo "<b><h3>Hemos conectado al servidor</h3></b>";

    $datab = "form";
    $db = mysqli_select_db($connection, $datab);

    if (!$db) {
        echo "No se ha podido encontrar la Tabla";
    } else {
        echo "<h3>Tabla seleccionada:</h3>";
    }

    $consulta = "SELECT * FROM tabla_form WHERE nombre='$nombre' AND usuario='$usuario' AND contraseña='$contraseña'";
    $resultado = mysqli_query($connection, $consulta);
    $filas = mysqli_num_rows($resultado);

    if ($filas) {
        header("location: index.html");
    } else {
        header("location:pag3.html");
    }
}

mysqli_close($connection);
?>
