<?php
include('connectionmysql.php');
include('bitacora.php');

$con = connection();

$dpi = $_GET['dpi'];

$sql = "SELECT * from empleado WHERE dpi='$dpi'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar</title>
</head>

<body>
    <div class="users-form">
        <form action="edit_user_mysql.php" method="POST">
            <h1>Editar Empleado</h1>
            <input type="text" name="dpi" placeholder="DPI" value="<?= $row['dpi'] ?>">
            <input type="text" name="primer_nombre" placeholder="Primer Nombre" value="<?= $row['primer_nombre'] ?>">
            <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" value="<?= $row['segundo_nombre'] ?>">
            <input type="text" name="primer_apellido" placeholder="Primer Apellido"
                value="<?= $row['primer_apellido'] ?>">
            <input type="text" name="segundo_apellido" placeholder="Segundo Apellido"
                value="<?= $row['segundo_apellido'] ?>">
            <input type="text" name="direccion" placeholder="Direccion" value="<?= $row['direccion'] ?>">
            <input type="text" name="telefono_casa" placeholder="Telefono Casa" value="<?= $row['telefono_casa'] ?>">
            <input type="text" name="telefono_movil" placeholder="Telefono Movil" value="<?= $row['telefono_movil'] ?>">
            <input type="text" name="salario_base" placeholder="Salario Base" value="<?= $row['salario_base'] ?>">
            <input type="text" name="bonificacion" placeholder="Bonificacion" value="<?= $row['bonificacion'] ?>">

            <input type="submit" value="Actualizar informacion">
        </form>
    </div>
</body>

</html>