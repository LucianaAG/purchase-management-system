<?php 
include "../conexion.php";

$customer_name = $_POST['customer_name'];
$dni = $_POST['dni'];
$adress = $_POST['adress'];
$city = $_POST['city'];

$insert_sql = "INSERT INTO customer (customer_name, dni, adress, city) VALUES ('$customer_name', '$dni', '$adress', '$city')";
$insert_customer_result = mysqli_query($conexion, $insert_sql);

if ($insert_customer_result) {
    echo "El cliente se añadido con exito";
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}else{
    echo "ERROR. ". mysqli_error($conexion);
    echo "<br></br>";
    echo "<a href='../../menu.html'>Volver al menú</a>";
}



?>