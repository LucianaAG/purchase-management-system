<?php
include "../conexion.php";

$get_buys_sql = "SELECT * FROM buys";
$get_buys_sql_result = mysqli_query($conexion, $get_buys_sql);

$get_products_sql = "SELECT * FROM product";
$get_products_sql_result = mysqli_query($conexion, $get_products_sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register buy detail</title>
</head>
<body>
    <form action="../buy_detail/process_buy_detail_registration.php" method="POST">
        <label for="buy_id">Compra asociada:</label>
        <select name="buy_id" id="buy_id">
            <option value="">--seleccione una opcion--</option>
            <?php while($buys = mysqli_fetch_assoc($get_buys_sql_result)):
                echo "<option value='{$buys['buy_id']}'>{$buys['buy_id']}</option>";
            
            ?>
            <?php endwhile; ?>
        </select>
        <br>

        <label for="product_id">Producto asociado:</label>
        <select name="product_id" id="product_id">
            <option value="">--seleccione una opcion--</option>
            <?php while($products = mysqli_fetch_assoc($get_products_sql_result)):
                echo "<option value='{$products['product_id']}'>{$products['product_name']}</option>";
                
            ?>
            <?php endwhile; ?>
        </select>
        <br>
        
        <label for="amount">Cantidad:</label>
        <input type="number" name="amount" id="amount" min=1>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>