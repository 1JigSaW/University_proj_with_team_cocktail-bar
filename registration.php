<?php require ('header.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
</head>
<body>

<?php

require ('connect_function.php');
$connect=connect();
$select_db=mysqli_select_db($connect,'db_coctailbar');
if (isset($_POST['log']) && isset($_POST['password'])){
$log=$_POST['log'];
$password=$_POST['password'];
$data_born=$_POST['data_born'];
$query = "INSERT INTO user (log,password,data_born) VALUES ('$log','$password','$data_born')";
$result=mysqli_query($connect,$query);
if($result){
	$sm = "Регистрация прошла успешно";
}
else{
	$fsm = "Ошибка";
}



}

?>
	<div class="container">
		<form class="form-signin" method="POST">
			<h2>Регистрация</h2>
			<?php if(isset($sm)){?><div class="alert alert-success" role="alert"><?php echo $sm; ?></div><?php }?>
			<?php if(isset($fsm)){?><div class="alert alert-success" role="alert"><?php echo $fsm; ?></div><?php }?>
			<label for="log" class="text-center pb-3">Введите ваш логин:</label>
			<input type="text" name="log" class="form-control" placeholder="Имя пользователя" ><br>
			<label for="password" class="text-center pb-3">Введите ваш пароль:</label>
			<input type="password" name="password" class="form-control" placeholder="Пароль" ><br>
			<label for="data_born" class="text-center pb-3">Дата рожения:</label>
			<input type="date" name="data_born" class="form-control" placeholder="Дата рождения"><br>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
		</form>
		
	</div>
</body>
</html>
<?php include "footer.php"; ?>