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

if(isset($_POST['remove_drink']))
	foreach($_SESSION['added_drink'] as $key => $value)
	{
		if ($value == $_POST['remove_drink'])
			$_SESSION['added_drink'][$key] = 0;
		if ($_SESSION['added_drink'][$key] == 0)
			if (isset($_SESSION['added_drink'][$key+1]))
			{
				$_SESSION['added_drink'][$key] = $_SESSION['added_drink'][$key+1];
				$_SESSION['added_drink'][$key+1] = 0;
			}
			else
				unset($_SESSION['added_drink'][$key]);
	}

if(isset($_POST['remove_product']))
	foreach($_SESSION['added_product'] as $key => $value)
	{
		if ($value == $_POST['remove_product'])
			$_SESSION['added_product'][$key] = 0;
		if ($_SESSION['added_product'][$key] == 0)
			if (isset($_SESSION['added_product'][$key+1]))
			{
				$_SESSION['added_product'][$key] = $_SESSION['added_product'][$key+1];
				$_SESSION['added_product'][$key+1] = 0;
			}
			else
				unset($_SESSION['added_product'][$key]);
	}

$ndrink = 0;
$nproduct = 0;
if (isset($_SESSION['added_drink']))
{	
	foreach ($_SESSION['added_drink'] as $id)
		if($id)
			$ndrink++;
}
if (isset($_SESSION['added_product']))
{	
	foreach ($_SESSION['added_product'] as $id)
		if($id)
			$nproduct++;
}

if(isset($_POST['add']) || isset($_POST['remove_drink']) || isset($_POST['remove_product']))
	header ("Location: main.php?drink=" . $ndrink . "&product=" . $nproduct);

if(isset($_POST['search']) && !$ndrink && !$nproduct)
{
	header("Location: main.php?error=choose");
	exit;
}


// временное  VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV
print_r($_POST);
echo "<br>";
print_r($_SESSION['added_drink']);
echo "<br>";
print_r($_SESSION['added_product']);

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