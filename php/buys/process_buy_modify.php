<?php
include "../conexion.php";

$buy_id = $_POST['buy_id'];
$buy_date = $_POST['buy_date'];
$payment_method = $_POST['payment_method'];
$customer_id = $_POST['customer_id'];

$update_sql = "UPDATE buys SET buy_date = '$buy_date',
              payment_method = '$payment_method',
              customer_id = '$customer_id'
              WHERE buy_id = '$buy_id'";
$update_sql_result = mysqli_query($conexion, $update_sql);

if ($update_sql) {
    echo "El registro se ha modificado con exito";
    echo "<br>";
    echo "<a href='../buys/list_buys.php'>Volver al listado</a>";
}else{
    echo "ERROR.". mysqli_error($conexion);
    echo "<br>";
    echo "<a href='../buys/list_buys.php'>Volver al listado</a>";
}

?>