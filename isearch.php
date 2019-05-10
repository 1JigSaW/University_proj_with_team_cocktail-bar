<?php include "connect_bd.php";?>
<?php
session_start(); //нужно здесь, потому что включение header'a было перемещено ниже, а сессия нужна
if(isset($_POST['add']))
{
	if($_POST['add'] == "drink")
	{
		$_SESSION['tmp'] = $_POST['product'];
		if(!$_POST['drink'])
		{
			header("Location: /?error=drink");
			exit;
		}
		if(isset($_SESSION['added_drink']))
		{
			foreach($_SESSION['added_drink'] as $val)
				if($_POST['drink'] == $val)
				{
					header("Location: /?error=same_drink");
					exit;
				}
			foreach($_SESSION['added_drink'] as $key => $value)
				$_SESSION['added_drink'][$key+1] = $value;
		}
		$_SESSION['added_drink'][0]=$_POST['drink'];
	}
	if($_POST['add'] == "product")
	{
		$_SESSION['tmp'] = $_POST['drink'];
		if(!$_POST['product'])
		{
		header("Location: /?error=product");
		exit;
		}
		if(isset($_SESSION['added_product']))
		{
			foreach($_SESSION['added_product'] as $val)
				if($_POST['product'] == $val)
				{
					header("Location: /?error=same_product");
					exit;
				}
			foreach($_SESSION['added_product'] as $key => $value)
				$_SESSION['added_product'][$key+1] = $value;
		}
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
{
	header("Location: /?drink=" . $ndrink . "&product=" . $nproduct);
	exit;
}

if(isset($_POST['search']) && !$ndrink && !$nproduct)
{
	header("Location: /?error=choose");
	exit;
}
?>
<?php include "header.php"; //включается только тут, потому что иначе он мешает функции header()?>
<?php
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

<div class="container">
	<div class="row mt-2 text-center">
		<div class="col-2">
			<button type="button" class="btn border-white bg-primary rounded text-white btn-lg btn-block">Назад</button>
		</div>
		<div class="col-8">
			<h1 class="display-3 d-none d-lg-block text-center">Результаты поиска</h1>
		</div>
		<div class="col-2"></div>
	</div>
	<div class="row mt-2 text-center">
		<div class="col-6"></div>
		<div class="col-2">
			Сортировать по:
		</div>
		<div class="col-2">
			<button type="button" class="btn border-white bg-primary rounded text-white btn-lg btn-block">Совпадению</button>
		</div>
		<div class="col-2">
			<button type="button" class="btn border-white bg-primary rounded text-white btn-lg btn-block">Крепости</button>
		</div>
	</div>
	<div class="row mt-2 text-center">
		<div class="col">
			ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
		</div>
	</div>
	<div class="row mt-2 text-center">
		<div class="col-9">
			texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttext
		</div>
		<div class="col-3">
			texttexttexttexttexttexttexttext
		</div>
	</div>
	<div class="row mt-2 text-center">
		<div class="col-9">
			texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttext
		</div>
		<div class="col-3">
			texttexttexttexttexttexttexttext
		</div>
	</div>
	<div class="row mt-2 text-center">
		<div class="col-9">
			texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttext
		</div>
		<div class="col-3">
			texttexttexttexttexttexttexttext
		</div>
	</div>
</div>

<?php include "footer.php";?>