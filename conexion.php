<?php

$host = "localhost";
$port = "5432";
$dbname = "TIENDA";
$user = "postgres";
$password = "Amidamaru_1";   // Reemplazar por la contraseña de PostgreSQL

$conexion = pg_connect(
    "host=$host
    port=$port
    dbname=$dbname
    user=$user
    password=$password"
);

if (!$conexion) {

    die("Error: No fue posible conectarse a PostgreSQL.");

}

echo "<h3>Conexión realizada correctamente con PostgreSQL.</h3>";

?>