<?php include "header.php";?>
<?php include "connect_bd.php";?>

<?php

print_r($_POST);

$result = mysqli_query($connect, "SELECT title_product FROM `product` WHERE `id` = " . $_POST['product1']);
$name = mysqli_fetch_assoc($result);

echo "<br>В первом столбце был выбран продукт из базы данных под названием: " . $name['title_product'];

?>

<?php include "footer.php";?>