<?php
include "../conexion.php";

$quality = $_POST['quality'];

$sql_join = "SELECT product.*, supplier.*
            FROM product
            INNER JOIN supplier ON product.supplier_id = supplier.supplier_id
            WHERE supplier.quality = '$quality'";
$sql_join_result = mysqli_query($conexion, $sql_join);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of products by quality</title>
</head>
<body>
    <?php if(mysqli_num_rows($sql_join_result) > 0): ?>
        <table border="1">
            <thead>
                <th>product_name</th>
                <th>price</th>
                <th>category</th>
                <th>stock</th>
                <th>supplier_id</th>
            </thead>
            <tbody>
                <?php while($products = mysqli_fetch_assoc($sql_join_result)): ?>
                    <tr>
                        <td><?= $products['product_name'] ?></td>
                        <td><?= $products['price'] ?></td>
                        <td><?= $products['category'] ?></td>
                        <td><?= $products['stock'] ?></td>
                        <td><?= $products['supplier_id'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <a href="../../menu.html">Volver al menú</a>
        </table>
    <?php else: ?>
        <p>No hay registros disponibles</p>
        <a href="../../menu.html">Volver al menú</a>
    <?php endif; ?>
</body>
</html>