<?php
include('bitacora.php');
include('connectionmysql.php');
$con = connection();

$dpi = $_GET['dpi'];

$sql = "DELETE FROM empleado WHERE dpi='$dpi'";

$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: index.php");
}
;

$tareaBitacora = "Registro Eliminado DPI: " . $dpi;
registroBitacora($tareaBitacora);
?>