<?php
$con = mysqli_connect("localhost", "root", "", "enterprise_cvse");

if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$resultado = mysqli_query($con, "SELECT * FROM clientes"); 

if ($resultado === FALSE) {
    echo "Fallo: ";
    die(mysqli_error($con));
}

echo "<font face='Arial'>";
echo "<a href='consulta_clientes.php'>Actualizar tabla</a>"; 
echo "<h1>Consulta de la tabla Clientes</h1>";

echo "<table border='1'>";
echo "<tr>
        <th>ClienteID</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
      </tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr>
            <td>{$row['ClienteID']}</td>
            <td>{$row['Nombre']}</td>
            <td>{$row['Direccion']}</td>
            <td>{$row['Telefono']}</td>
            <td>{$row['Email']}</td>
          </tr>";
}

echo "</table>";
echo "</font>";
mysqli_close($con);
?>
