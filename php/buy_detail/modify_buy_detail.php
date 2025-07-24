<?php
include "../conexion.php";

$buy_detail_id = $_GET['buy_detail_id'];
$get_buy_detail_sql = "SELECT * FROM buy_detail WHERE buy_detail_id = '$buy_detail_id'";
$get_buy_detail_sql_result = mysqli_query($conexion, $get_buy_detail_sql);
$buy_detail = mysqli_fetch_assoc($get_buy_detail_sql_result);

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
    <title>Modify buy detail</title>
</head>
<body>
    <form action="../buy_detail/modify_buy_detail.php" method="POST">
        <input type="hidden" name="buy_detail_id" value=<?php echo $buy_detail['buy_detail_id']; ?>>
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

        <label for="buy_id">Compra asociada:</label>
        <select name="buy_id" id="buy_id">
            <option value="">--seleccione una opcion--</option>
            <?php while($buys = mysqli_fetch_assoc($get_buys_sql_result)): 
                echo "<option value='{$buys['buy_id']}'>{$buys['buy_id']}</option>";
            
            ?>
            <?php endwhile; ?>
        </select>
        <br>

        Cantidad: <input type="number" name="amount" value=<?php echo $buy_detail['amount']; ?>>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>