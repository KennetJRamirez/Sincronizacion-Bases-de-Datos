<?php
include('connectionpostgresql.php');
include('bitacora.php');

if (isset($_GET['dpi'])) {
    $dpi = $_GET['dpi'];

    try {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM empleado WHERE dpi = :dpi";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dpi', $dpi);
        $stmt->execute();

        header("Location: indexpostgresql.php");
        exit;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No se proporcionó el DPI del empleado a eliminar.";
    exit;
}
$tareaBitacora = "Registro Borrad DPI: " . $dpi;
registroBitacora($tareaBitacora);
?>