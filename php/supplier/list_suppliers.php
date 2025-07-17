<?php
include "../conexion.php";

$get_sql = "SELECT * FROM supplier";
$get_sql_result = mysqli_query($conexion, $get_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers list</title>
</head>
<body>
    <?php if(mysqli_num_rows($get_sql_result) > 0): ?>
        <table border="1">
            <thead>
                <th>Marca</th>
                <th>Direccion</th>
                <th>Calidad</th>
                <td>Acciones</td>
            </thead>
            <tbody>
                <?php while($supplier = mysqli_fetch_assoc($get_sql_result)): ?>
                    <tr>
                        <td><?= $supplier['brand'] ?></td>
                        <td><?= $supplier['adress'] ?></td>
                        <td><?= $supplier['quality'] ?></td>
                        <td>
                            <a href="../supplier/modify_supplier.php?supplier_id=<?php echo $supplier['supplier_id']?>">MODIFICAR</a>
                            <a href="../supplier/delete_supplier.php?supplier_id=<?php echo $supplier['supplier_id']?>">ELIMINAR</a>
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