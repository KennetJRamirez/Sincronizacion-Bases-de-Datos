<?php
include('connectionpostgresql.php');

if (isset($_GET['dpi'])) {
    $dpi = $_GET['dpi'];

    try {
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM empleado WHERE dpi = :dpi";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dpi', $dpi);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No se proporcionó el DPI del empleado a editar.";
    exit;
}
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
        <form action="edit_user_postgresql.php" method="POST">
            <h1>Editar Empleado</h1>
            <input type="hidden" name="dpi" value="<?= $row['dpi'] ?>">
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

            <input type="submit" value="Actualizar información">
        </form>
    </div>
</body>

</html>