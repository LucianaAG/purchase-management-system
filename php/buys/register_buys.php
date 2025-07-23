<?php
include "../conexion.php";

$get_customers_sql = "SELECT * FROM customer";
$get_customers_sql_result = mysqli_query($conexion, $get_customers_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register buys</title>
</head>
<body>
    <form action="../buys/process_buys_register.php" method="POST">
        <label for="buy_date">Fecha:</label>
        <input type="date" name="buy_date" id="buy_date">
        <br>

        <label for="payment_method">Metodo de pago:</label>
        <select name="payment_method" id="payment_method">
            <option value="">--seleccione una opcion--</option>
            <option value="tarjeta">tarjeta</option>
            <option value="efectivo">efectivo</option>
        </select>
        <br>

        <label for="customer_id">Cliente asociado:</label>
        <select name="customer_id" id="customer_id">
            <option value="">--seleccione un cliente asociado--</option>
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