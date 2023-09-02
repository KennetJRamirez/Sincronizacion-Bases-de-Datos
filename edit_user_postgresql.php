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

    $sql = "UPDATE empleado SET primer_nombre = :primer_nombre, segundo_nombre = :segundo_nombre, primer_apellido = :primer_apellido, segundo_apellido = :segundo_apellido, direccion = :direccion, telefono_casa = :telefono_casa, telefono_movil = :telefono_movil, salario_base = :salario_base, bonificacion = :bonificacion WHERE dpi = :dpi";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':dpi', $dpi);
    $stmt->bindParam(':primer_nombre', $primer_nombre);
    $stmt->bindParam(':segundo_nombre', $segundo_nombre);
    $stmt->bindParam(':primer_apellido', $primer_apellido);
    $stmt->bindParam(':segundo_apellido', $segundo_apellido);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono_casa', $telefono_casa);
    $stmt->bindParam(':telefono_movil', $telefono_movil);
    $stmt->bindParam(':salario_base', $salario_base);
    $stmt->bindParam(':bonificacion', $bonificacion);

    $stmt->execute();

    header("Location: indexpostgresql.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$tareaBitacora = "Actualizacion del Registro DPI: " . $dpi;
registroBitacora($tareaBitacora);
?>