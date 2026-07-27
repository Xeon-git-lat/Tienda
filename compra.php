<?php

include("conexion.php");

/* Obtener clientes registrados */

$sqlClientes = "SELECT id_cliente, nombre
                FROM cliente
                ORDER BY nombre";

$clientes = pg_query($conexion, $sqlClientes);

/* Obtener productos con stock disponible */

$sqlProductos = "SELECT id_producto,
                        nombre,
                        precio,
                        stock
                 FROM producto
                 WHERE stock > 0
                 ORDER BY nombre";

$productos = pg_query($conexion, $sqlProductos);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Registrar Compra</title>

    <link rel="stylesheet" href="./style/estilo.css">
    <link rel="stylesheet" href="./style/principal.css">

    <script src="js/validarCompra.js"></script>

</head>

<body>

<header>

        <h1>Tienda de Comercio Electrónico</h1>

        <p>Sistema de Gestión de Productos, Clientes y Compras</p>

    </header>

    <nav>

        <ul>
            <li><a href="tienda.html">Home</a></li>

            <li><a href="productos.html">Registrar Producto</a></li>

            <li><a href="listarProductos.php">Ver Productos</a></li>

            <li><a href="clientes.html">Registrar Cliente</a></li>

            <li><a href="listarClientes.php">Ver Clientes</a></li>

            <li><a href="compra.php">Registrar Compra</a></li>

            <li><a href="listarCompras.php">Ver Compras</a></li>

            <li><a href="productosDisponibles.php">Disponibilidad de Productos</a></li>

            <li><a href="consultaAvanzada.html">Consulta Avanzada</a></li>

        </ul>

    </nav>

<main>

<h2>Registrar Compra</h2>

<form action="guardarCompra.php"
      method="POST"
      onsubmit="return validarCompra();">

<label>Cliente</label>

<select name="cliente" id="cliente" required>

<option value="">Seleccione un cliente</option>

<?php

while($cliente = pg_fetch_assoc($clientes))
{

    echo "<option value='".$cliente["id_cliente"]."'>";

    echo $cliente["nombre"];

    echo "</option>";

}

?>

</select>

<br><br>

<label>Producto</label>

<select name="producto" id="producto" required>

<option value="">Seleccione un producto</option>

<?php

while($producto = pg_fetch_assoc($productos))
{

    echo "<option value='".$producto["id_producto"]."'>";

    echo $producto["nombre"];

    echo " ($".number_format($producto["precio"],0,",",".").")";

    echo "</option>";

}

?>

</select>

<br><br>

<label>Cantidad</label>

<input
type="number"
name="cantidad"
id="cantidad"
min="1"
required>

<br><br>

<input
type="submit"
value="Registrar Compra">

</form>

<br>

<a class="boton" href="index.html">

Volver al menú principal

</a>

</main>

</body>

</html>

<?php

pg_close($conexion);

?>
