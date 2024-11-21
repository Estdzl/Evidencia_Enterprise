<?php
$con = mysqli_connect("localhost", "root", "", "enterprise_cvse");

if (!$con) {
    echo "Fallo en la conexión: ";
    die(mysqli_error($con));
}

$ID = mysqli_real_escape_string($con, $_POST['PedidoID']);
$CLIENTE = mysqli_real_escape_string($con, $_POST['ClienteID']);
$PROVEEDOR = mysqli_real_escape_string($con, $_POST['ProveedorID']);
$FECHA = mysqli_real_escape_string($con, $_POST['Fecha']);
$TOTAL = mysqli_real_escape_string($con, $_POST['Total']);

$sql = "UPDATE pedidos SET 
            ClienteID='$CLIENTE', 
            ProveedorID='$PROVEEDOR', 
            Fecha='$FECHA', 
            Total='$TOTAL' 
        WHERE PedidoID='$ID'";

if (mysqli_query($con, $sql)) {
    header("Location: actualizar_datos.php");
    exit();
} else {
    echo "Error al actualizar: " . mysqli_error($con);
}

mysqli_close($con);
?>
