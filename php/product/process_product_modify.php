<?php
include "../conexion.php";

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$category = $_POST['category'];
$stock = $_POST['stock'];
$supplier_id = $_POST['supplier_id'];

$update_sql = "UPDATE product SET supplier_id = '$supplier_id',
            product_name = '$product_name',
            price = '$price',
            category = '$category',
            stock = '$stock'
            WHERE product_id = '$product_id'";
$update_sql_result = mysqli_query($conexion, $update_sql);

if ($update_sql_result) {
    echo "El producto se ha modificado con exito";
    echo "<br>";
    echo "<a href='../product/list_products.php'>Volver al listado</a>";
}else{
    echo "ERROR.". mysqli_error($conexion);
    echo "<br>";
    echo "<a href='../product/list_products.php'>Volver al listado</a>";
}

?>