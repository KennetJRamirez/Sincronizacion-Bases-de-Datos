<?php
include('bitacora.php');
class Sincronizar
{
    private $origen;
    private $destino;

    public function __construct($origen, $destino)
    {
        $this->origen = $origen;
        $this->destino = $destino;
    }

    public function sincronizarTablas($table)
    {
        $query = "SELECT * FROM  $table";
        $resultadoOrigen = $this->origen->query($query);

        while ($row = $resultadoOrigen->fetch(PDO::FETCH_ASSOC)) {
            $values = array_values($row);


            $consulta = "SELECT COUNT(*) AS count FROM $table WHERE dpi=?";
            $stmtConsulta = $this->destino->prepare($consulta);
            $stmtConsulta->execute([$values[0]]);
            $cantidad = $stmtConsulta->fetchColumn();


            if ($cantidad == 0) {
                $insertar = "INSERT INTO $table VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmtInsertar = $this->destino->prepare($insertar);
                $stmtInsertar->execute($values);

            }
        }
    }
}

// Propiedades POSTGRESQL
$postgresql_host = "localhost";
$postgresql_db = "proyecto";
$postgresql_user = "postgres";
$postgresql_password = "root";

// Propiedades MYSQL
$mysql_host = "localhost";
$mysql_db = "proyecto";
$mysql_user = "root";
$mysql_password = "";

// Conectando a Postgresql
$postgresql_conn = new PDO("pgsql:host=$postgresql_host;dbname=$postgresql_db", $postgresql_user, $postgresql_password);

// Conectando a MySQL
$mysql_conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_db", $mysql_user, $mysql_password);

// Mandando de postgresql a mysql
$sync = new Sincronizar($postgresql_conn, $mysql_conn);
$sync->sincronizarTablas("empleado");

// Mandando de mysql a postgresql
$sync = new Sincronizar($mysql_conn, $postgresql_conn);
$sync->sincronizarTablas("empleado");

echo "Sincronizacion completa";

$tareaBitacora = "Sincronizacion de las BD";
registroBitacora($tareaBitacora);

?>