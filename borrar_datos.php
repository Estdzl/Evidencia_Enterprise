<?php
$con = mysqli_connect("localhost", "root", "", "enterprise_cvse");

if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_connect_error());
}

$idcliente = mysqli_real_escape_string($con, $_POST["clienteid"]);
$sql = "DELETE FROM clientes WHERE ClienteID = '$idcliente'";

if (!mysqli_query($con, $sql)) {
    die("Error al borrar el registro: " . mysqli_error($con));
}

echo "Registro borrado<br><br>";
echo "<a href='borrar_datos.html'>Regresar</a>";

mysqli_close($con);
?>
