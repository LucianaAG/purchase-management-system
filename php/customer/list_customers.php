<?php

include "../conexion.php";

$get_sql = "SELECT * FROM customer";
$get_customer_result = mysqli_query($conexion, $get_sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers list</title>
</head>
<body>
    <?php if (mysqli_num_rows($get_customer_result) > 0): ?>
        <table border="1">
            <thead>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php while($customer = mysqli_fetch_assoc($get_customer_result)): ?>
                    <tr>
                        <td><?= $customer['customer_name'] ?></td>
                        <td><?= $customer['dni'] ?></td>
                        <td><?= $customer['adress'] ?></td>
                        <td><?= $customer['city'] ?></td>
                        <td>
                            <a href="../customer/modify_customer.php?customer_id=<?php echo $customer['customer_id']?>">MODIFICAR</a>
                            <a href="../customer/delete_customer.php?customer_id=<?php echo $customer['customer_id']?>">ELIMINAR</a>
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