<?php include "header.php";?>
<?php include "connect_bd.php";?>

<?php

if(isset($_POST['add']))
{
	if($_POST['add'] == "drink")
	{
		$_SESSION['tmp'] = $_POST['product'];
		if(!$_POST['drink'])
		{
			header("Location: main.php?error=drink");
			exit;
		}
		if(isset($_SESSION['added_drink']))
			foreach($_SESSION['added_drink'] as $val)
				if($_POST['drink'] == $val)
				{
					header("Location: main.php?error=same_drink");
					exit;
				}
		foreach($_SESSION['added_drink'] as $key => $value)
			$_SESSION['added_drink'][$key+1] = $value;
		$_SESSION['added_drink'][0]=$_POST['drink'];
	}
	if($_POST['add'] == "product")
	{
		$_SESSION['tmp'] = $_POST['drink'];
		if(!$_POST['product'])
		{
		header("Location: main.php?error=product");
		exit;
		}
		if(isset($_SESSION['added_product']))
			foreach($_SESSION['added_product'] as $val)
				if($_POST['product'] == $val)
				{
					header("Location: main.php?error=same_product");
					exit;
				}
		foreach($_SESSION['added_product'] as $key => $value)
			$_SESSION['added_product'][$key+1] = $value;
		$_SESSION['added_product'][0]=$_POST['product'];
	}
}

$ndrink = 0;
$nproduct = 0;
if (isset($_SESSION['added_drink']))
{	
	foreach ($_SESSION['added_drink'] as $id)
		$ndrink++;
}
if (isset($_SESSION['added_product']))
{	
	foreach ($_SESSION['added_product'] as $id)
		$nproduct++;
}

if(isset($_POST['add']))
	header ("Location: main.php?drink=" . $ndrink . "&product=" . $nproduct);

print_r($_POST);

$result = mysqli_query($connect, "SELECT title_product FROM `product` WHERE `id` = " . $_POST['drink']);
$name = mysqli_fetch_assoc($result);

echo "<br><br>В первом столбце был выбран продукт из базы данных под названием: ";
if($_POST['drink'])
echo $name['title_product'];
else
echo "[ПРОДУКТ НЕ БЫЛ ВЫБРАН]";

echo "<br><br>Во втором столбце был выбран продукт из списка под названием: ";
if($_POST['product'])
echo $_POST['product'];
else
echo "[ПРОДУКТ НЕ БЫЛ ВЫБРАН]";

?>

<?php include "footer.php";?>