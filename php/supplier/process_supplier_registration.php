<?php
include "../conexion.php";

$brand = $_POST['brand'];
$adress = $_POST['adress'];
$quality = $_POST['quality'];

$insert_sql = "INSERT INTO supplier (brand, adress, quality) VALUES ('$brand', '$adress', '$quality')";
$insert_sql_result = mysqli_query($conexion, $insert_sql);

if ($insert_sql_result) {
    echo "El proveedor se ha registrado con exito";
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}else{
    echo "ERROR." . mysqli_error($conexion);
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}
?>