<?php include "header.php" ?>
<h3 class="text-center pb-3">Авторизация</h3>
<form method="POST" action="../main.php" class="text-center">
  	<div class="form-group">
    	<input type="text" class="form-control" name="login" placeholder="Имя пользователя">
	</div>
	<div class="form-group">
	    <input type="password" class="form-control" name="password" placeholder="Пароль" >
	</div>
	<div class="form-group">
		<a href="#">Впервые на сайте?</a>
	</div>
 	<button type="submit" class="btn btn-primary">Войти</button>
</form>
<?php include "footer.php" ?>