<?php require ('header.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>
<style >
.reg{
	max-width: 400px;
	padding: 15px;
	margin: 0 auto;

}
</style>
<body>
<?php 
include ('connect_bd.php');
if (isset($_POST['log']) && isset($_POST['password']))
{
	
	$data_born=$_POST['data_born'];
	$log=$_POST['log'];
	$password=$_POST['password'];
$s="SELECT * FROM user WHERE log = '$log'";
$res=mysqli_query( $connect, $s);
$num = mysqli_num_rows($res);
if($num == 0) {

	$query="INSERT INTO user (data_born, log, password) VALUES('$data_born','$log', '$password')";
	$result=mysqli_query($connect, $query);
if($result){
		$zr="Регистрация прошла успешно";
			} else {
				$br="Ошибка";}
			}
			else { $ur="Пользователь с таким логином уже зарегистрирован";}
}
 ?>
<div class="container">
	<form class="reg" method="POST" >
<h2> Регистрация</h2>
<?php 
if (isset($zr)){ ?> <div class="alert alert-success" role="alert"> <?php echo $zr;  ?> </div><?php  }?>
<?php 
if (isset($br)){ ?> <div class="alert alert-danger" role="alert"> <?php echo $br;  ?> </div><?php  }?>
<?php 
if (isset($ur)){ ?> <div class="alert alert-danger" role="alert"> <?php echo $ur;  ?> </div><?php  }?>

			<label for="log" class="text-center pb-3">Введите ваш логин:</label>
			<input type="text" name="log" class="form-control" placeholder="Имя пользователя" required="Заполните это поле."><br>
			<label for="password" class="text-center pb-3">Введите ваш пароль:</label>
			<input type="password" name="password" class="form-control" placeholder="Пароль" required="Заполните это поле."><br>
			<label for="data_born" class="text-center pb-3">Дата рождения:</label>
			<input type="date" name="data_born" class="form-control" placeholder="Дата рождения" required="Заполните это поле."><br>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
	</form>
</div>
</body>
</html>


<?php include "footer.php"; ?>