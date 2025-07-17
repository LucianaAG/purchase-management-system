<?php
include "../conexion.php";

$supplier_id = $_GET['supplier_id'];
$get_sql = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
$get_sql_result = mysqli_query($conexion, $get_sql);
$supplier = mysqli_fetch_assoc($get_sql_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify supplier</title>
</head>
<body>
    <form action="../supplier/process_supplier_modify.php" method="POST">
        <input type="hidden" name="supplier_id" value=<?php echo $supplier['supplier_id']; ?>>

        Marca: <input type="text" name="brand" value=<?php echo $supplier['brand']; ?>>
        <br>

        Dirección <input type="text" name="adress" value=<?php echo $supplier['adress']; ?>>
        <br>

        Calidad: <select name="quality" id="quality">
            <option value="">--seleccione una opcion--</option>
            <option value="alta">alta</option>
            <option value="media">media</option>
            <option value="baja">baja</option>
        </select>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>