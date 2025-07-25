<?php
include "../conexion.php";

$get_buy_details = "SELECT * FROM buy_detail";
$get_buy_details_result = mysqli_query($conexion, $get_buy_details);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy details list</title>
</head>
<body>
    <?php if(mysqli_num_rows($get_buy_details_result) > 0): ?>
        <table border="1">
            <thead>
                <th>Compra asociada</th>
                <th>Producto asociado</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php while($buy_details = mysqli_fetch_assoc($get_buy_details_result)): ?>
                    <tr>
                        <td><?= $buy_details['product_id']?> </td>
                        <td><?= $buy_details['buy_id']?> </td>
                        <td><?= $buy_details['amount']?> </td>
                        <td>
                            <a href="../buy_detail/modify_buy_detail.php?buy_detail_id=<?php echo $buy_details['buy_detail_id']; ?>">MODIFICAR</a>
                            <a href="../buy_detail/delete_buy_detail.php?buy_detail_id=<?php echo $buy_details['buy_detail_id']; ?>">ELIMINAR</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="../../menu.html">Volver al menú</a>
    <?php else: ?>
        <p>No hay registros disponibles</p>
        <br>
        <a href="../../menu.html">Volver al menú</a>
    <?php endif; ?>
</body>
</html>