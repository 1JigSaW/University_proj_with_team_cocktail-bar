<?php require ('header.php');?>
<title>Регистрация</title>
<style >
	.reg{
		max-width: 400px;
		padding: 15px;
		margin: 0 auto;

}
</style>
<form class="reg" method="POST" >
<h2>Регистрация</h2>
<?php
if ($msg)
	echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
?>		
	<label for="log" class="text-center pb-3">Введите ваш логин:</label>
	<input type="text" name="log" class="form-control" placeholder="Имя пользователя" required="Заполните это поле."><br>
	<label for="password" class="text-center pb-3">Введите ваш пароль:</label>
	<input type="password" name="password" class="form-control" placeholder="Пароль" required="Заполните это поле."><br>
	<label for="data_born" class="text-center pb-3">Дата рождения:</label>
	<input type="date" name="data_born" class="form-control" placeholder="Дата рождения" required="Заполните это поле."><br>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
</form>

<?php include "footer.php";?>