<?php
include "../conexion.php";

$customer_id = $_POST['customer_id'];
$customer_name = $_POST['customer_name'];
$dni = $_POST['dni'];
$adress = $_POST['adress'];
$city = $_POST['city'];

$update_sql = "UPDATE customer SET customer_name = '$customer_name',
            dni = '$dni',
            adress = '$adress',
            city = '$city'
            WHERE customer_id = '$customer_id'";
$result_update_sql = mysqli_query($conexion, $update_sql);

if ($result_update_sql) {
    echo "El cliente ha modificado con exito";
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}else{
    echo "ERROR.". mysqli_error($conexion);
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}

?>