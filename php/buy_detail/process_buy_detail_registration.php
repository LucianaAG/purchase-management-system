<?php
include "../conexion.php";

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
    $final_price = $price + (5 / 100);

}else{
    $price = $amount * $product['price'];
    $final_price = $price - (15 / 100);
}

$update_total_buy_sql = "UPDATE buys SET total = $final_price";
$update_total_buy_sql_result = mysqli_query($conexion, $update_total_buy_sql);

if ($product['stock'] >= $amount) {
    $insert_sql = "INSERT INTO buy_detail (product_id, buy_id, amount) VALUES ('$product_id', '$buy_id', '$amount')";
    $insert_sql_result = mysqli_query($conexion, $insert_sql);

    $update_product_stock_sql = "UPDATE product SET stock = stock - $amount WHERE product_id = '$product_id'";
    $update_product_stock_sql_result = mysqli_query($conexion, $update_product_stock_sql);

    if ($insert_sql_result && $update_product_stock_sql_result) {
        echo "La compra se ha realizado con exito";
        echo "<br>";
        echo "<a href='../../menu.html'>Volver al menú</a>";
    }else{
        echo "ERROR.". mysqli_error($conexion);
        echo "<br>";
        echo "<a href='../../menu.html'>Volver al menú</a>";
    }

}else{
    echo "No se puede realizar la compra, porque no hay stock disponible";
    echo "<br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}



?>