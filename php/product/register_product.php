<?php
include "../conexion.php";

$get_suppliers_sql = "SELECT * FROM supplier";
$get_suppliers_sql_result = mysqli_query($conexion, $get_suppliers_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register product</title>
</head>
<body>
    <form action="" method="POST">
        <label for="product_name">Nombre:</label>
        <input type="text" name="product_name" id="product_name">
        <br>

        <label for="price">Precio:</label>
        <input type="number" name="price" id="price">
        <br>

        <label for="category">Categoria:</label>
        <input type="text" name="category" id="category">
        <br>

        <label for="stock">Stock:</label>
        <input type="text" name="stock" id="stock">
        <br>

        <label for="supplier_id">Proveedor:</label>
        <select name="supplier_id" id="supplier_id">
            <option value="">--seleccione una opcion--</option>
            <?php while($suppliers = mysqli_fetch_assoc($get_suppliers_sql_result)):
                echo "<option value='{$supplier['supplier_id']}'>{$supplier['brand']}</option>"
                
            ?>
            <?php endwhile; ?>
        </select>
        <br>

        <button type="sybmit">enviar</button>
    </form>
</body>
</html>