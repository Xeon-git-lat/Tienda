<?php

include("conexion.php");

$sql = "INSERT INTO cliente
(nombre,email,direccion)
VALUES($1,$2,$3)";

$resultado = pg_query_params(
    $conexion,
    $sql,
    array(
        $_POST["nombre"],
        $_POST["email"],
        $_POST["direccion"]
    )
);

if($resultado)
{
    echo "<h2>Cliente registrado correctamente.</h2>";
}
else
{
    echo "<h2>Error al registrar el cliente.</h2>";
}

pg_close($conexion);

?>