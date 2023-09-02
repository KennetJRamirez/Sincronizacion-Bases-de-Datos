<?php
include('connectionmysql.php');
include('bitacora.php');

$con = connection();

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

$sql = "UPDATE empleado SET dpi='$dpi', primer_nombre='$primer_nombre',segundo_nombre='$segundo_nombre',primer_apellido='$primer_apellido',segundo_apellido='$segundo_apellido',direccion='$direccion',telefono_casa='$telefono_casa',telefono_movil='$telefono_movil',salario_base='$salario_base',bonificacion='$bonificacion' WHERE dpi='$dpi'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location:index.php");
}
;

$tareaBitacora = "Actualizacion del Registro DPI: ".$dpi;
registroBitacora($tareaBitacora);

?>