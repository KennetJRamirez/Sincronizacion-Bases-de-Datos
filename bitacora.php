<?php

function registroBitacora($operacion)
{
    $nombreTxt = 'C:/xampp/htdocs/Projecto01-DB/bitacora.txt';
    $tarea = fopen($nombreTxt, 'a');
    fwrite($tarea, "[" . date('Y-m-d H:i:s') . ']' . $operacion . "\n");
    fclose($tarea);

}

?>