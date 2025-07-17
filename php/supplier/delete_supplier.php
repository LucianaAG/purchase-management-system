<?php
include "../conexion.php";

$supplier_id = $_GET['supplier_id'];
$get_products_sql = "SELECT * FROM product WHERE supplier_id = '$supplier_id'";
$get_products_sql_result = mysqli_query($conexion, $get_products_sql);

if (mysqli_num_rows($get_products_sql_result) >= 1) {
    echo "No se puede eliminar un proveedor asociado a un producto";
    echo "<br></br>";
    echo "<a href='../supplier/list_suppliers.php'>Volver al listado</a>";
}else{
    $delete_sql = "DELETE FROM supplier WHERE supplier_id = '$supplier_id'";
    $delete_sql_result = mysqli_query($conexion, $delete_sql);

    if ($delete_sql_result) {
        echo "El proveedor se ha eliminado con exito";
        echo "<br></br>";
        echo "<a href='../supplier/list_suppliers.php'>Volver al listado</a>";
    }else{
        echo "ERROR." . mysqli_error($conexion);
        echo "<br></br>";
        echo "<a href='../supplier/list_suppliers.php'>Volver al listado</a>";
    }
}


?>