<?php
include "../conexion.php";

$supplier_id = $_POST['supplier_id'];
$brand = $_POST['brand'];
$adress = $_POST['adress'];
$quality = $_POST['quality'];

$update_sql = "UPDATE supplier SET brand = '$brand', adress = '$adress', quality = '$quality' WHERE supplier_id = '$supplier_id'";
$update_sql_result = mysqli_query($conexion, $update_sql);

if ($update_sql_result) {
    echo "El proveedor se ha modificado con exito";
    echo "<br></br>";
    echo "<a href='../supplier/list_suppliers.php'>Volver al listado</a>";
}else{
    echo "ERROR." . mysqli_error($conexion);
    echo "<br></br>";
    echo "<a href='../supplier/list_suppliers.php'>Volver al listado</a>";
}

?>