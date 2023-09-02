<?php
include('connectionpostgresql.php');
include('bitacora.php');

try {
    $conn = Connection::getConnection();

    $dpi = $_POST['dpi'];
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $direccion = $_POST['direccion'];
    $telefono_casa = $_POST['telefono_casa'];
    $telefono_movil = $_POST['telefono_movil'];
    $salario_base = $_POST['salario_base'];
    $bonificacion = $_POST['bonificacion'];

    $sql = "INSERT INTO empleado (dpi, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, direccion, telefono_casa, telefono_movil, salario_base, bonificacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$dpi, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $direccion, $telefono_casa, $telefono_movil, $salario_base, $bonificacion]);

    header("Location: indexpostgresql.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$tareaBitacora = "Registro Nuevo DPI: " . $dpi;
registroBitacora($tareaBitacora);
?>