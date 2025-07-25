<?php
include "../conexion.php";

$buy_id = $_GET['buy_id'];

$get_buy_detail = "SELECT * FROM buy_detail WHERE buy_id = '$buy_id'";
$get_buy_detail_result = mysqli_query($conexion, $get_buy_detail);

if (mysqli_num_rows($get_buy_detail_result) >= 1) {
    echo "No se puede eliminar una compra asociada a un detalle de compra";
    echo "<br>";
    echo "<a href='../buys/list_buys.php'>Volver al listado</a>";
}else{
    $delete_sql = "DELETE FROM buys WHERE buy_id = '$buy_id'";
    $delete_sql_result = mysqli_query($conexion, $delete_sql);

    if ($delete_sql_result) {
        echo "La compra se ha eliminado con exito";
        echo "<br>";
        echo "<a href='../buys/list_buys.php'>Volver al listado</a>";
    }else{
        echo "ERROR.". mysqli_error($conexion);
        echo "<br>";
        echo "<a href='../buys/list_buys.php'>Volver al listado</a>";
    }

}




?>