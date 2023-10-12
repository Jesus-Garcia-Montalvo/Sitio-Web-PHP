
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
     
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
        text-align:center;
                     
      }
     
      th, h1 {
        background-color: #edf797;
      }

      td,
      th {
        border: solid 1px #7e7c7c;
        padding: 2px;
        text-align: center;
      }


    </style>
</head>
<body>
    
</body>
</html>


<?php

$user = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass);

$nombre = $_POST["nombre"];
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$verificar = $_POST["ver-contraseña"];

if (!$connection) {
    echo "No se ha podido conectar con el servidor" . mysqli_error();
} else {
    $datab = "form";
    $db = mysqli_select_db($connection, $datab);

    if (!$db) {
        echo "No se ha podido encontrar la Tabla";
    } else {
        if ($contraseña == $verificar) {
            echo "Guardado correctamente";
        } else {
            echo "No coinciden";
        }

        $instruccion_SQL = "INSERT INTO tabla_form (nombre, usuario, contraseña)
                             VALUES ('$nombre','$usuario','$contraseña')";
        $resultado = mysqli_query($connection, $instruccion_SQL);

        if (!$resultado) {
            echo "No se ha podido realizar la consulta";
        }

        header("location: pag3.html");

        $consulta = "SELECT * FROM tabla_form";
        $result = mysqli_query($connection, $consulta);

        while ($colum = mysqli_fetch_array($result)) {
            // Hacer algo con los datos recuperados
        }
    }
}

mysqli_close($connection);
?>



