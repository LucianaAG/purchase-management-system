<?php
include "../conexion.php";

$customer_id = $_GET['customer_id'];

$get_sql = "SELECT * FROM buys";
$get_buys_sql_result = mysqli_query($conexion, $get_sql);

if (mysqli_num_rows($get_buys_sql_result) >= 1) {
    echo "No se puede eliminar un cliente asociado a una compra";
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}else{
    $delete_sql = "DELETE FROM customer WHERE customer_id = '$customer_id'";
    $delete_customer_sql_result = mysqli_query($conexion, $delete_sql);

    if ($delete_customer_sql_result) {
        echo "El cliente se ha eliminado con exito";
        echo "<br></br>";
        echo "<a href='../customer/list_customers.php'>Volver al listado</a>";
    }else{
        echo "ERROR.". mysqli_error($conexion);
        echo "<br></br>";
        echo "<a href='../customer/list_customers.php'>Volver al listado</a>";
    }
}
?>