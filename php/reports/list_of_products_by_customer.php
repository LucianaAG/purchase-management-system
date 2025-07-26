<?php
include "../conexion.php";

$customer_id = $_POST['customer_id'];

$join_sql = "SELECT bt.*, b.*, c.*, p.*
            FROM buy_detail bt
            INNER JOIN buys b ON bt.buy_id = b.buy_id
            INNER JOIN product p ON bt.product_id = p.product_id
            INNER JOIN customer c ON b.customer_id = c.customer_id
            WHERE c.customer_id = '$customer_id'";
$join_sql_result = mysqli_query($conexion, $join_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of products by customer</title>
</head>
<body>
    <?php if(mysqli_num_rows($join_sql_result) > 0): ?>
        <table border="1">
            <thead>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Proveedor</th>
            </thead>
            <tbody>
                <?php while($product = mysqli_fetch_assoc($join_sql_result)): ?>
                    <tr>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['stock'] ?></td>
                        <td><?= $product['supplier_id'] ?></td>
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