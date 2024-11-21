<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css.css">
    <title>Editar Datos de Cliente</title>
</head>
<body>

<?php
$con = mysqli_connect("localhost", "root", "", "enterprise");

if (!$con) {
    die('No se pudo conectar: ' . mysqli_connect_error());
}

$SMATRICULA = mysqli_real_escape_string($con, $_POST['id']);
$resultado = mysqli_query($con, "SELECT * FROM clientes WHERE idcliente = '$SMATRICULA'");

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
    echo "<td>ID Cliente:</td>";
    echo "<td><input type='text' name='id' value='" . htmlspecialchars($row['idcliente']) . "' readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Nombre:</td>";
    echo "<td><input type='text' name='nombre' value='" . htmlspecialchars($row['nombre']) . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Ciudad:</td>";
    echo "<td><input type='text' name='ciudad' value='" . htmlspecialchars($row['ciudad']) . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Pedido:</td>";
    echo "<td><input type='text' name='pedido' value='" . htmlspecialchars($row['pedido']) . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Costo:</td>";
    echo "<td><input type='text' name='costo' value='" . htmlspecialchars($row['costo']) . "'></td>";
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
