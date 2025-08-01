<?php
include "../conexion.php";

$category = $_POST['category'];

$get_products_sql = "SELECT * FROM product WHERE category = '$category'";
$get_products_sql_result = mysqli_query($conexion, $get_products_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of products by category</title>
</head>
<body>
    <?php if(mysqli_num_rows($get_products_sql_result) > 0): ?>
        <table border="1">
            <thead>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Proveedor</th>
            </thead>
            <tbody>
                <?php while($products = mysqli_fetch_assoc($get_products_sql_result)): ?>
                    <tr>
                        <td><?= $products['product_name']?></td>
                        <td><?= $products['price']?></td>
                        <td><?= $products['category']?></td>
                        <td><?= $products['stock']?></td>
                        <td><?= $products['supplier_id']?></td>
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