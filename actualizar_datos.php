<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css.css"> 
    <title>Actualizar Datos de Pedidos</title>
</head>
<body>

<?php

$con = mysqli_connect("localhost", "root", "", "enterprise_cvse");

if (!$con) {
    die('No se pudo conectar: ' . mysqli_connect_error());
}

$resultado = mysqli_query($con, "SELECT pedidoid, clienteid, proveedorid, fecha, total FROM pedidos");

if ($resultado === FALSE) {
    echo "Error al consultar la tabla: " . mysqli_error($con);
    die();
}

echo "<center>";
echo "<h1>Actualizar Datos de Pedidos</h1>";
echo "<table border='1'>
<tr>
    <th>PedidoID</th>
    <th>ClienteID</th>
    <th>ProveedorID</th>
    <th>Fecha</th>
    <th>Total</th>
</tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['pedidoid']) . "</td>";
    echo "<td>" . htmlspecialchars($row['clienteid']) . "</td>";
    echo "<td>" . htmlspecialchars($row['proveedorid']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fecha']) . "</td>";
    echo "<td>" . htmlspecialchars($row['total']) . "</td>";
    echo "</tr>";
}

echo "</table>";

$registros = mysqli_num_rows($resultado);
echo "<br>El número de registros son: " . $registros;

mysqli_close($con);
?>

<h3>Escribe la ID del Pedido a editar</h3>
<form action="Actualizar2_datos.php" method="post">
    ID Pedido: <input type="text" name="id" required />
    <input type="submit" value="Editar" />
</form>

</body>
</html>
