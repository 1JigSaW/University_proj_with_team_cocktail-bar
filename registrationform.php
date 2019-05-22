<?php require_once ('header.php');?>
<title>Регистрация</title>
<h3 class="text-center pb-3">Регистрация</h3>
<?php
	if ($msg)
		echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
?>
<form method="POST" class="">
  	<div class="form-group">
  		<label for="log">Введите ваш логин:</label>
  	<?php echo '<input type="text" name="log" class="form-control" placeholder="Имя пользователя" required="Заполните это поле." value="'.$log.'">';?>
	</div>
	<div class="form-group">
		<label for="password">Введите ваш пароль:</label>
	    <input type="password" name="password" class="form-control" placeholder="Пароль" required="Заполните это поле.">
	</div>
	<div class="form-group">
		<label for="data_born">Дата рождения:</label>
		<?php echo '<input type="date" name="data_born" class="form-control" placeholder="Дата рождения" required="Заполните это поле." value="'.$date.'">';?>
	    
	</div>
	<div class="container">
  		<div class="row">
		    <div class="col-12 text-center">
		      <button type="submit" class="btn block btn-primary center">Регистрация</button>
		    </div>
  		</div>
	</div>
</form>
<?php include "footer.php";?>
