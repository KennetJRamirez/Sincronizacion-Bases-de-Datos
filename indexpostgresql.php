<?php
include('connectionpostgresql.php');

try {
    $conn = Connection::getConnection();

    $sql = "SELECT * FROM empleado";
    $query = $conn->query($sql);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="users-form">
        <form action="insert_postgresql.php" method="POST">
            <h1>Registrar Empleado</h1>
            <input type="text" name="dpi" placeholder="DPI">
            <input type="text" name="primer_nombre" placeholder="Primer Nombre">
            <input type="text" name="segundo_nombre" placeholder="Segundo Nombre">
            <input type="text" name="primer_apellido" placeholder="Primer Apellido">
            <input type="text" name="segundo_apellido" placeholder="Segundo Apellido">
            <input type="text" name="direccion" placeholder="Direccion">
            <input type="text" name="telefono_casa" placeholder="Telefono Casa">
            <input type="text" name="telefono_movil" placeholder="Telefono Movil">
            <input type="text" name="salario_base" placeholder="Salario Base">
            <input type="text" name="bonificacion" placeholder="Bonificacion">

            <input type="submit" value="Agregar empleado">
        </form>
    </div>

    <div class="users-table">
        <h2>Empleados registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>DPI</th>
                    <th>PRIMER NOMBRE</th>
                    <th>SEGUNDO NOMBRE</th>
                    <th>PRIMER APELLIDO</th>
                    <th>SEGUNDO APELLIDO</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO CASA</th>
                    <th>TELEFONO MOVIL</th>
                    <th>SALARIO BASE</th>
                    <th>BONIFICACION</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <th>
                            <?= $row['dpi'] ?>
                        </th>
                        <th>
                            <?= $row['primer_nombre'] ?>
                        </th>
                        <th>
                            <?= $row['segundo_nombre'] ?>
                        </th>
                        <th>
                            <?= $row['primer_apellido'] ?>
                        </th>
                        <th>
                            <?= $row['segundo_apellido'] ?>
                        </th>
                        <th>
                            <?= $row['direccion'] ?>
                        </th>
                        <th>
                            <?= $row['telefono_casa'] ?>
                        </th>
                        <th>
                            <?= $row['telefono_movil'] ?>
                        </th>
                        <th>
                            <?= $row['salario_base'] ?>
                        </th>
                        <th>
                            <?= $row['bonificacion'] ?>
                        </th>

                        <th>
                            <a href="actualizarpostgresql.php?dpi=<?= $row['dpi'] ?>" class="users-table--edit">Editar</a>
                        </th>


                        <th><a href="borrarpostgresql.php?dpi=<?= $row['dpi'] ?>" class="users-table--delete">Eliminar</a>
                        </th>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>