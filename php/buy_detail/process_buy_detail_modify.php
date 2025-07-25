<?php
include "../conexion.php";

$buy_detail_id = $_POST['buy_detail_id'];
$product_id = $_POST['product_id'];
$buy_id = $_POST['buy_id'];
$amount = $_POST['amount'];

$get_product_sql = "SELECT * FROM product WHERE product_id = '$product_id'";
$get_product_sql_result = mysqli_query($conexion, $get_product_sql);
$product = mysqli_fetch_assoc($get_product_sql_result);


$get_buy_sql = "SELECT * FROM buys WHERE buy_id = '$buy_id'";
$get_buy_sql_result = mysqli_query($conexion, $get_buy_sql);
$buy = mysqli_fetch_assoc($get_buy_sql_result);

$final_price = 0;

if ($buy['payment_method'] == 'tarjeta') {
    $price = $amount * $product['price'];
    $final_price = $price + (5 * 100);

}else{
    $price = $amount * $product['price'];
    $final_price = $price - (15 * 100);
}

$update_total_buy_sql = "UPDATE buys SET total = $final_price WHERE buy_id = '$buy_id'";
$update_total_buy_sql_result = mysqli_query($conexion, $update_total_buy_sql);


if ($product['stock'] >= $amount) {
    $update_sql = "UPDATE buy_detail SET product_id = '$product_id',
              buy_id = '$buy_id',
              amount = '$amount'
              WHERE buy_detail_id = '$buy_detail_id'";
    $update_sql_result = mysqli_query($conexion, $update_sql);

    if ($update_sql_result) {
        echo "El registro se ha modificado con exito";
        echo "<br>";
        echo "<a href='../buy_detail/list_buy_details.php'>Volver al listado</a>";
    }else{
        echo "ERROR.". mysqli_error($conexion);
        echo "<br>";
        echo "<a> href='../buy_detail/list_buy_details.php'</a>";
    }
}


?>