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
    <form action="../product/process_product_registration.php" method="POST">
        <label for="product_name">Nombre:</label>
        <input type="text" name="product_name" id="product_name">
        <br>

        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" min=1>
        <br>

        <label for="category">Categoria:</label>
        <select name="category" id="category">
            <option value="">--seleccione una opcion--</option>
            <option value="computacion">computacion</option>
            <option value="deporte">deporte</option>
            <option value="mueble">mueble</option>
            <option value="libreria">libreria</option>
        </select>
        <br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" min=1>
        <br>

        <label for="supplier_id">Proveedor:</label>
        <select name="supplier_id" id="supplier_id">
            <option value="">--seleccione una opcion--</option>
            <?php while($suppliers = mysqli_fetch_assoc($get_suppliers_sql_result)):
                echo "<option value='{$suppliers['supplier_id']}'>{$suppliers['brand']}</option>";
                
            ?>
            <?php endwhile; ?>
        </select>
        <br>

        <button type="submit">enviar</button>
    </form>
</body>
</html>