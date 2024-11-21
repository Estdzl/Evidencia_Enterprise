<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css.css">
    <title>Editar Datos de Pedido</title>
</head>
<body>

<?php
$con = mysqli_connect("localhost", "root", "", "enterprise_cvse");

if (!$con) {
    die('No se pudo conectar: ' . mysqli_connect_error());
}

$PEDIDO = mysqli_real_escape_string($con, $_POST['id']);
$resultado = mysqli_query($con, "SELECT * FROM pedidos WHERE PedidoID = '$PEDIDO'");

if ($resultado === FALSE) {
    echo "Fallo al consultar la tabla: " . mysqli_error($con);
    die();
}

echo "<center>";
echo "<form action='Actualizar3_datos.php' method='POST'>";
echo "<h1>Editar Datos</h1>";
echo "<table border='0'>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>PedidoID:</td>";
    echo "<td><input type='text' name='id' value='" . htmlspecialchars($row['PedidoID']) . "' readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>ClienteID:</td>";
    echo "<td><input type='text' name='cliente' value='" . htmlspecialchars($row['ClienteID']) . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>ProveedorID:</td>";
    echo "<td><input type='text' name='proveedor' value='" . htmlspecialchars($row['ProveedorID']) . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Fecha:</td>";
    echo "<td><input type='text' name='pedido' value='" . htmlspecialchars($row['Fecha']) . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Total:</td>";
    echo "<td><input type='text' name='costo' value='" . htmlspecialchars($row['Total']) . "'></td>";
    echo "</tr>";
}

echo "</table>";
mysqli_close($con);
echo "<input type='submit' value='Actualizar Datos' />";
echo "</form>";
echo "</center>";
?>

</body>
</html>
