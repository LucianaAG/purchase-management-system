<?php
include "../conexion.php";

$buy_id = $_GET['buy_id'];
$get_buy = "SELECT * FROM buys WHERE buy_id = '$buy_id'";
$get_buy_result = mysqli_query($conexion, $get_buy);
$buy = mysqli_fetch_assoc($conexion, $get_buy_result);

$get_customers_sql = "SELECT * FROM customer";
$get_customers_sql_result = mysqli_query($conexion, $get_customers_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify buy</title>
</head>
<body>
    <form action="../buys/process_buy_modify.php" method="POST">
        <input type="hidden" name="buy_id" value=<?php echo $buy['buy_id']; ?>>
        <br>

        Fecha: <input type="date" name="buy_date" value=<?php echo $buy['buy_date'];?>>
        <br>

        <label for="payment_method">Metodo de pago:</label>
        <select name="payment_method" id="payment_method">
            <option value="">--seleccione un metodo de pago--</option>
            <option value="tarjeta">tarjeta</option>
            <option value="efectivo">efectivo</option>
        </select>
        <br>

        <label for="customer_id">Cliente asociado:</label>
        <select name="customer_id" id="customer_id">
            <option value="">--seleccione una opcion--</option>
            <?php while($customer = mysqli_fetch_assoc($get_customers_sql_result)): 
                echo "<option value='{$customer['customer_id']}'>{$customer['customer_name']}</option>";    
            ?>
            <?php endwhile; ?>
        </select>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>