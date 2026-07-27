<?php

include("conexion.php");

// Consulta SQL
$sql = "SELECT id_producto,
               nombre,
               descripcion,
               precio,
               stock
        FROM producto
        ORDER BY id_producto";

$resultado = pg_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Listado de Productos</title>

<link rel="stylesheet" href="./style/verProductos.css">
    <link rel="stylesheet" href="./style/principal.css">

</head>

<body>

<header>

        <h1>Tienda de Comercio Electrónico</h1>

        <p>Sistema de Gestión de Productos, Clientes y Compras</p>

    </header>

    <nav>

        <ul>

            <li><a href="productos.html">Registrar Producto</a></li>

            <li><a href="listarProductos.php">Ver Productos</a></li>

            <li><a href="clientes.html">Registrar Cliente</a></li>

            <li><a href="listarClientes.php">Ver Clientes</a></li>

            <li><a href="compra.html">Registrar Compra</a></li>

            <li><a href="listarCompras.php">Ver Compras</a></li>

            <li><a href="productosDisponibles.php">Disponibilidad de Productos</a></li>

            <li><a href="consultaAvanzada.html">Consulta Avanzada</a></li>

        </ul>

    </nav>

<main>

<h2>Listado de Productos</h2>

<table>

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Descripción</th>

<th>Precio</th>

<th>Stock</th>

<th>Estado</th>

</tr>

<?php

while($fila = pg_fetch_assoc($resultado))
{

    $estado = ($fila["stock"] > 0) ? "Disponible" : "Agotado";

    echo "<tr>";

    echo "<td>".$fila["id_producto"]."</td>";

    echo "<td>".$fila["nombre"]."</td>";

    echo "<td>".$fila["descripcion"]."</td>";

    echo "<td>$ ".number_format($fila["precio"],0,",",".")."</td>";

    echo "<td>".$fila["stock"]."</td>";

    echo "<td>".$estado."</td>";

    echo "</tr>";

}

?>

</table>

<br>

<a class="boton" href="verProductos.html">

Volver

</a>

</main>

</body>

</html>

<?php

pg_close($conexion);

?>