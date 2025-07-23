<?php
include "../conexion.php";

$get_sql = "SELECT * FROM product";
$get_sql_result = mysqli_query($conexion, $get_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products list</title>
</head>
<body>
    <?php if(mysqli_num_rows($get_sql_result) > 0): ?>
        <table border="1">
            <thead>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php while($product = mysqli_fetch_assoc($get_sql_result)): ?>
                    <tr>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['stock'] ?></td>
                        <td><?= $product['supplier_id'] ?></td>
                        <td>
                            <a href="../product/modify_product.php?product_id=<?php echo $product['product_id']; ?>">MODIFICAR</a>
                            <a href="../product/delete_product.php?product_id=<?php echo $product['product_id']; ?>">ELIMINAR</a>
                        </td>
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