<?php
include "../conexion.php";

$get_buys_sql = "SELECT * FROM buys";
$get_buys_sql_result = mysqli_query($conexion, $get_buys_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List buys</title>
</head>
<body>
    <?php if(mysqli_num_rows($get_buys_sql_result) >= 1): ?>
        <table border="1">
            <thead>
                <th>Fecha</th>
                <th>Metodo de pago</th>
                <th>Total</th>
                <th>Cliente asociado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php while($buy = mysqli_fetch_assoc($get_buys_sql_result)): ?>
                    <tr>
                        <td><?= $buy['buy_date']?></td>
                        <td><?= $buy['method_payment']?></td>
                        <td><?= $buy['total']?></td>
                        <td><?= $buy['customer_id']?></td>
                        <td>
                            <a href="../buys/modify_buy.php?buy_id=<?php echo $buy['buy_id']; ?>">MODIFICAR</a>
                            <a href="../buys/delete_buy.php=buy_id=<?php echo $buy['buy_id']; ?>">ELIMINAR</a>
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