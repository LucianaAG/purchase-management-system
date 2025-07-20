<?php
include "../conexion.php";

$product_id = $_GET['product_id'];

$get_suppliers_sql = "SELECT * FROM supplier";
$get_suppliers_sql_result = mysqli_query($conexion, $get_suppliers_sql);


$get_sql = "SELECT * FROM product WHERE product_id = '$product_id'";
$get_sql_result = mysqli_query($conexion, $get_sql);
$product = mysqli_fetch_assoc($get_sql_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify product</title>
</head>
<body>
    <form action="../product/process_product_modify.php" method="POST">
        <input type="hidden" name="product_id" value=<?php echo $product['product_id']; ?>>

        Nombre:  <input type="text" name="product_name" value=<?php echo $product['product_name']; ?>>
        <br>

        Precio: <input type="number" name="price" value=<?php echo $product['price']; ?>>
        <br>

        Categoria: <input type="text" name="category" value=<?php echo $product['category']; ?>>
        <br>

        Stock: <input type="text" name="stock" value=<?php echo $product['stock']; ?>>
        <br>

        Proveedor <select name="supplier_id" id="supplier_id">
            <option value="">--seleccione una opcion--</option>
            <?php while($supplier = mysqli_fetch_assoc($get_suppliers_sql_result)): 
                echo "<option value='{$supplier['supplier_id']}'>{$supplier['brand']}</option>";
            ?>
            <?php endwhile; ?>
                
        </select>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>