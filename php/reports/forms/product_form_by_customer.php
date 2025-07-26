<?php
include "../../conexion.php";

$get_customers_sql = "SELECT * FROM customer";
$get_customers_sql_result = mysqli_query($conexion, $get_customers_sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product form by customer</title>
</head>
<body>
    <form action="../list_of_products_by_customer.php" method="POST">
        <label for="customer_id">Seleccione un cliente:</label>
        <select name="customer_id" id="customer_id">
            <option value="">--seleccione una opcion--</option>
            <?php while($customers = mysqli_fetch_assoc($get_customers_sql_result)):
                echo "<option value='{$customers['customer_id']}'>{$customers['customer_name']}</option>";
                
            ?>
            <?php endwhile; ?>
        </select>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>