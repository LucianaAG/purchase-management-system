<?php
include "../conexion.php";

$date_from = $_POST['date_from'];
$date_to = $_POST['date_to'];

$get_join_sql = "SELECT p.*, bd.*, b.*, c.*
            FROM buy_detail bd
            INNER JOIN product p ON bd.product_id = p.product_id
            INNER JOIN buys b ON bd.buy_id = b.buy_id
            INNER JOIN customer c ON c.customer_id = b.customer_id
            WHERE b.date BETWEEN '$date_from' AND '$date_to'";
$get_join_sql_result = mysqli_query($conexion, $get_join_sql);

// fecha de
// compra, forma de pago, total, nombre y apellido del cliente, producto, cantidad vendida, precio unitario,
// descuento o recargo y total de la compra.


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of products by date</title>
</head>
<body>
    <?php if(mysqli_num_rows($get_join_sql_result) > 0): ?>
        <table border="1">
            <thead>
                <th>date</th>
                <th>payment_method</th>
                <th>total</th>
                <th>customer_name</th>
                <th>amount</th>
                <th>price</th>
            </thead>
            <tbody>
                <?php while($products = mysqli_fetch_assoc($get_join_sql_result)): ?>
                    <tr>
                        <td><?= $products['date']?></td>
                        <td><?= $products['payment_method']?></td>
                        <td><?= $products['total']?></td>
                        <td><?= $products['customer_name']?></td>
                        <td><?= $products['amount']?></td>
                        <td><?= $products['price']?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="../../menu.html">Volver al menú</a>
    <?php else: ?>
        <p>No hay registros disponibles</p>
        <a href="../../menu.html">Volver al menú</a>
    <?php endif; ?>
</body>
</html>