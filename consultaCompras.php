<?php

include("conexion.php");

/* Consulta avanzada:
   Muestra los clientes con más de dos compras registradas.
*/

$sql = "SELECT
            c.id_cliente,
            c.nombre,
            COUNT(co.id_compra) AS cantidad_compras
        FROM cliente c
        INNER JOIN compra co
            ON c.id_cliente = co.id_cliente
        GROUP BY
            c.id_cliente,
            c.nombre
        HAVING COUNT(co.id_compra) > 2
        ORDER BY cantidad_compras DESC";

$resultado = pg_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Consulta Avanzada</title>

<link rel="stylesheet" href="./style/principal.css">

</head>

<body>

<header>

<h1>Tienda de Comercio Electrónico</h1>

</header>

<main>

<h2>Clientes con más de dos compras</h2>

<table>

<tr>

<th>ID Cliente</th>

<th>Nombre</th>

<th>Cantidad de Compras</th>

</tr>

<?php

while($fila = pg_fetch_assoc($resultado))
{

    echo "<tr>";

    echo "<td>".$fila["id_cliente"]."</td>";

    echo "<td>".$fila["nombre"]."</td>";

    echo "<td>".$fila["cantidad_compras"]."</td>";

    echo "</tr>";

}

?>

</table>

<br>

<a class="boton" href="consultaAvanzada.html">
    Volver
</a>

</main>

</body>

</html>

<?php

pg_close($conexion);

?>