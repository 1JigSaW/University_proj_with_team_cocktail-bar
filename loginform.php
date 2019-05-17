<form method="POST" action="authorisation.php" class="text-center">
  	<div class="form-group">
    	<input type="text" class="form-control" required name="login" placeholder="Имя пользователя">
	</div>
	<div class="form-group">
	    <input type="password" class="form-control" required name="password" placeholder="Пароль" >
	</div>
	<?php
		if ($_SESSION['error']){
			echo '<div class="alert alert-danger" role="alert">Неверное имя пользователя или пароль.</div>';
			session_unset();}
	?>
	<div class="form-group">
		<a href="registration">Впервые на сайте?</a>
	</div>
 	<button type="submit" class="btn btn-primary">Войти</button>
</form>