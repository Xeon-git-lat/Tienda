<?php

include("conexion.php");

$nombre = trim($_POST["nombre"]);
$descripcion = trim($_POST["descripcion"]);
$precio = $_POST["precio"];
$stock = $_POST["stock"];

if(empty($nombre) || empty($descripcion))
{
    die("Debe completar todos los datos.");
}

$sql = "INSERT INTO producto
(nombre, descripcion, precio, stock)
VALUES($1,$2,$3,$4)";

$resultado = pg_query_params(
    $conexion,
    $sql,
    array(
        $nombre,
        $descripcion,
        $precio,
        $stock
    )
);

if($resultado)
{
    echo "<h2>Producto registrado correctamente.</h2>";
}
else
{
    echo "<h2>Error al registrar el producto.</h2>";
}

pg_close($conexion);

?>