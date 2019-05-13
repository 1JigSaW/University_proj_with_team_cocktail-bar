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
//временное  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
?>

<div class="row mt-2 text-center">
	<div class="col-2">
		<a href="/" role="button" class="btn btn-block bg-secondary text-white border mx-1 mt-4">Назад</a>
	</div>
	<div class="col-8">
		<h1 class="display-3 d-none d-lg-block">Результаты поиска</h1>
	</div>
	<div class="col-2"></div>
</div>

<?php
//получаем строки из базы данных, где есть хотя бы одно совпадение с добавленными ингридиентами, если таких нет, то выводим ошибку
$added = array_merge($_SESSION['added_drink'], $_SESSION['added_product']);
$query = "SELECT * FROM `set_ingredients` WHERE `ingredient_id` = " . $added['0'];
foreach ($added as $item)
	$query = $query . " OR `ingredient_id` = " . $item;
$query = $query . " ORDER BY `set_ingredients`.`cocktail_id` ASC";
$result = mysqli_query($connect, $query);
$matches = mysqli_num_rows($result);
if (!$matches)
{
	echo "
		<div class='row mt-2'>
			<div class='col'>
				<div class='alert alert-danger text-center' role='alert'>По выбранным ингридиентам не было найдено ни одного коктейля</div>
			</div>
		</div>
		 ";
	die;
}

//подсчитываем количество совпадений с ингридиентами, а также записываем id совпавших ингридиентов и id коктейля в общий массив для вывода
$output = array();
$any_match = mysqli_fetch_assoc($result);
$tmp = $any_match['cocktail_id'];
$number = 0;
$output[$number] = array(
	'id' => $any_match['cocktail_id'], 
	'matches' => 1,
	'matched' => array(0 => $any_match['ingredient_id']),
	// также в этом массиве будут поля для крепости и несовпавших ингридиентов 'fortress' => int, 'other' => array()
);
for ($i=1; $i<$matches; $i++)
{
	$any_match = mysqli_fetch_assoc($result);
	if ($any_match['cocktail_id'] == $tmp)
	{
		$output[$number]['matches']++;
		$output[$number]['matched'][] = $any_match['ingredient_id'];
	}
	else
	{
		$tmp = $any_match['cocktail_id'];
		$output[++$number] = array('id' => $any_match['cocktail_id'], 'matches' => 1, 'matched' => array(0 => $any_match['ingredient_id']));
	}
}


//временное VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV
print_r($added); echo "<br><br><br>";
echo $query; echo "<br><br><br>";
print_r($any_match); echo "<br><br><br>";
print_r($output); echo "<br><br><br>";
//временное ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
?>

<div class="row mt-2 text-center">
	<div class="col-5"></div>
	<div class="col-3 font-size-2 mt-2">
		<h4>Сортировать по:</h3>
	</div>
	<div class="col-2">
		<?php
		if ($_GET['sort'] == "s")
			$paste = "disabled";
		else
			$paste = "";
		echo "<h4><a href='/isearch.php?sort=s' role='button' class='btn btn-lg bg-primary text-white border mx-1 " . $paste . "'>Совпадению</a></h4>";
		?>
	</div>
	<div class="col-2">
		<?php
		if ($_GET['sort'] == "k")
				$paste = "disabled";
			else
				$paste = "";
		echo "<h4><a href='/isearch.php?sort=k' role='button' class='btn btn-lg bg-primary text-white border mx-1 " . $paste . "'>Крепости</a></h4>";
		?>
	</div>
</div>

<div class="row mt-2">
	<div class="col-1">
		<h3>Номер</h3>
	</div>
	<div class="col-6">
		<h3>Название</h3>
	</div>
	<div class="col-1">
		<h3>Креп.</h3>
	</div>
	<div class="col-4">
		<h3>Совпадения</h3>
	</div>
</div>
<div class="row mt-2">
	<div class="col-1 text-center">
		<h3>1.</h3>
	</div>
	<div class="col-6">
		<h3><a href="/article_1">Зеленая фея</a></h3>
	</div>
	<div class="col-1">
		<h3>36%</h3>
	</div>
	<div class="col-4">
		<h5><p class="text-primary">Белый ром, Лёд,</p>Лимон, Абсент, Энергетик... (+5)</h5>
	</div>
</div>
<div class="row mt-2">
	<div class="col-1 text-center">
		<h3>2.</h3>
	</div>
	<div class="col-6">
		<h3><a href="/article_2">Дайкири</a></h3>
	</div>
	<div class="col-1">
		<h3>100%</h3>
	</div>
	<div class="col-4">
		<h5><p class="text-primary">Белый ром, Лёд,</p>Лайм, Сахарный сироп</h5>
	</div>
</div>
<div class="row mt-2">
	<div class="col-1 text-center">
		<h3>3.</h3>
	</div>
	<div class="col-6">
		<h3><a href="###">Коктейль с длинным названием</a></h3>
	</div>
	<div class="col-1">
		<h3>5%</h3>
	</div>
	<div class="col-4">
		<h5><p class="text-primary">Ингридиенты, Совпавшие... (+4),</p>Прочие, Еще прочие... (+12)</h5>
	</div>
</div>

<?php include "footer.php";?>