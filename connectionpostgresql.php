<?php
class connection
{
    public $host = 'localhost';
    public $dbname = 'proyecto';
    public $port = '5432';
    public $user = 'postgres';
    public $password = 'root';
    public $connect;
    public $driver = 'pgsql';

    public static function getConnection()
    {
        try {
            $connection = new Connection();
            $dsn = "{$connection->driver}:host={$connection->host};port={$connection->port};dbname={$connection->dbname}";
            $connection->connect = new PDO($dsn, $connection->user, $connection->password);
            $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection->connect;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

Connection::getConnection();