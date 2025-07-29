<?php
include "../conexion.php";

$quality = $_POST['quality'];
$category = $_POST['category'];

//Listado de artículos ofrecido según calidad de proveedores y categoría de productos.

$join_sql = "SELECT p.*, s.*
            FROM product p
            INNER JOIN supplier s ON p.supplier_id = s.supplier_id
            WHERE p.category = '$category' AND s.quality = '$quality'";
$join_sql_result = mysqli_query($conexion, $join_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of prooducts by quality and category</title>
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
                <?php while($products = mysqli_fetch_assoc($join_sql_result)): ?>
                    <tr>
                        <td><?= $products['product_name']?></td>
                        <td><?= $products['price']?></td>
                        <td><?= $products['category']?></td>
                        <td><?= $products['stock']?></td>
                        <td><?= $products['supplier']?></td>
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