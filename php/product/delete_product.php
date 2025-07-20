<?php
include "../conexion.php";

$product_id = $_GET['product_id'];

$get_buy_detail_sql = "SELECT * FROM buy_detail WHERE product_id = '$product_id'";
$get_buy_detail_sql_result = mysqli_query($conexion, $get_buy_detail_sql);

if (mysqli_num_rows($get_buy_detail_sql_result) >= 1) {
    echo "No se puede eliminar un producto asociado a un detalle de compra";
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}else{

    $delete_sql = "DELETE FROM product WHERE product_id = '$product_id'";
    $delete_sql_result = mysqli_query($conexion, $delete_sql);

    if ($delete_sql) {
        echo "El producto se ha eliminado econ exito";
        echo "<br></br>";
        echo "<a href='../product/list_products.php'>Volver al listado</a>";
    }else{
        echo "ERROR.". mysqli_error($conexion);
        echo "<br></br>";
        echo "<a href='../product/list_products.php'>Volver al listado</a>";
    }
}
?>