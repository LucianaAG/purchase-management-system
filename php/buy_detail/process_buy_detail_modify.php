<?php
include "../conexion.php";

$buy_detail_id = $_POST['buy_detail_id'];
$product_id = $_POST['product_id'];
$buy_id = $_POST['buy_id'];
$amount = $_POST['amount'];

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


?>