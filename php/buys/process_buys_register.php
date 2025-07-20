<?php
include "../conexion.php";

$buy_date = $_POST['buy_date'];
$payment_method = $_POST['payment_method'];
$customer_id = $_POST['customer_id'];

$insert_sql = "INSERT INTO buys (buy_date, payment_method, customer_id) VALUES ('$buy_date', '$payment_method', '$customer_id')";
$insert_sql_result = mysqli_query($conexion, $insert_sql);

if ($insert_sql_result) {
    echo "La compra se ha registrado con exito";
    echo "<br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}else{
    echo "ERROR.". mysqli_error($conexion);
    echo "<br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}
?>