<?php
include "../conexion.php";

$product_name = $_POST['product_name'];
$price = $_POST['price'];
$category = $_POST['category'];
$stock = $_POST['stock'];
$supplier_id = $_POST['supplier_id'];

$insert_sql = "INSERT INTO product (product_name, price, category, stock, supplier_id) VALUES ('$product_name', '$price', '$category', '$stock', '$supplier_id')";
$insert_sql_result = mysqli_query($conexion, $insert_sql);

if ($insert_sql_result) {
    echo "El producto se ha registrado con exito";
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}else{
    echo "ERROR.". mysqli_error($conexion);
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}


?>