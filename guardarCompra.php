<?php

include("conexion.php");

$idCliente = $_POST["cliente"];
$idProducto = $_POST["producto"];
$cantidad = $_POST["cantidad"];

// Obtener precio y stock del producto
$sql = "SELECT precio, stock
        FROM producto
        WHERE id_producto = $1";

$resultado = pg_query_params($conexion, $sql, array($idProducto));

$producto = pg_fetch_assoc($resultado);

if(!$producto){
    die("Producto no encontrado.");
}

$precio = $producto["precio"];
$stock = $producto["stock"];

// Validar stock
if($cantidad > $stock){
    die("No existe stock suficiente.");
}

$total = $precio * $cantidad;

// Registrar la compra
$sqlCompra = "INSERT INTO compra
(cantidad,total,fecha,id_producto,id_cliente)
VALUES($1,$2,CURRENT_DATE,$3,$4)";

pg_query_params(
    $conexion,
    $sqlCompra,
    array($cantidad,$total,$idProducto,$idCliente)
);

// Actualizar stock
$sqlStock = "UPDATE producto
SET stock = stock - $1
WHERE id_producto = $2";

pg_query_params(
    $conexion,
    $sqlStock,
    array($cantidad,$idProducto)
);

echo "<h2>Compra registrada correctamente.</h2>";

pg_close($conexion);

?>