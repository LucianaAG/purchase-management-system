<?php
include "../conexion.php";

$customer_id = $_GET['customer_id'];
$get_sql = "SELECT * FROM customer WHERE customer_id = $customer_id";
$get_customer_result = mysqli_query($conexion, $get_sql);
$customer = mysqli_fetch_assoc($get_customer_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify customer</title>
</head>
<body>
    <form action="../customer/process_customer_modify.php" method="POST">
        <input type="hidden" name="customer_id" value=<?php echo $customer['customer_id']; ?>>
        <br>

        Nombre:<input type="text" name="customer_name" value=<?php echo $customer['customer_name'];?>>
        <br>

        DNI: <input type="number" name="dni" value=<?php echo $customer['dni'];?>>
        <br>

        Direccion: <input type="text" name="adress" value=<?php echo $customer['adress'];?>>
        <br>

        Ciudad: <select name="city" id="city">
            <option value="">--seleccione una ciudad--</option>
            <option value="ushuaia">ushuaia</option>
            <option value="rio grande">rio grande</option>
            <option value="tolhuin">tolhuin</option>
        </select>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>