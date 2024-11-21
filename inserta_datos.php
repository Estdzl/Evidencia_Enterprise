<?php

$con = mysqli_connect("localhost", "root", "", "enterprise");

if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_connect_error());
}

$clienteID = mysqli_real_escape_string($con, $_POST['ClienteID']);
$nombre = mysqli_real_escape_string($con, $_POST['Nombre']);
$ciudad = mysqli_real_escape_string($con, $_POST['Ciudad']); 
$pedido = mysqli_real_escape_string($con, $_POST['Pedido']); 
$costo = mysqli_real_escape_string($con, $_POST['Costo']);

$sql = "INSERT INTO Clientes (idcliente, nombre, ciudad, pedido, costo) VALUES ('$clienteID', '$nombre', '$ciudad', '$pedido', '$costo')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

echo "<center>";
echo "1 registro agregado<br>";
echo "<a href='consulta_clientes.php'>Ver registros</a>";
echo "</center>";

mysqli_close($con);

?>
