<?php
include "../conexion.php";

$buy_detail_id = $_GET['buy_detail_id'];

$join_sql = "SELECT bd.*, b.total, p.price
            FROM buy_detail bd
            INNER JOIN product p ON bd.product_id = p.product_id
            INNER JOIN buys b ON bd.buy_id = b.buy_id";
$join_sql_result = mysqli_query($conexion, $join_sql);
$buy_detail = mysqli_fetch_assoc($join_sql_result);

// update total buy
$total_price = $buy_detail['amount'] * $buy_detail['price'];
$buy_id = $buy_detail['buy_id'];
$update_buy_total = "UPDATE buys SET total = total - '$total_price' WHERE buy_id = '$buy_id'";
$update_buy_total_result = mysqli_query($conexion, $update_buy_total);

// update product stock
$product_id = $buy_detail['product_id'];
$amount = $buy_detail['amount'];
$update_product_stock = "UPDATE product SET stock = stock - $amount WHERE product_id = '$product_id'";
$update_product_stock_result = mysqli_query($conexion, $update_product_stock);

if ($update_buy_total_result && $update_product_stock) {
    $delete_sql = "DELETE FROM buy_detail WHERE buy_detail_id = '$buy_detail_id'";
    $delete_sql_result = mysqli_query($conexion, $delete_sql);

    if ($delete_sql) {
        echo "El registro se ha eliminado con exito";
        echo "<br>";
        echo "<a href='../buy_detail/list_buy_details.php'>Volver al listado</a>";
    }else{
        echo "ERROR.". mysqli_error($conexion);
        echo "<br>";
        echo "<a href='../buy_detail/list_buy_details.php'>Volver al listado</a>";
    }
}

?>