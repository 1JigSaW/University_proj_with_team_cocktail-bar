<?php
	if ($_SESSION['error']){
			echo '<div class="alert alert-danger" role="alert">Неверное имя пользователя или пароль.</div>';
			$failedusername=$_SESSION['error'];
			session_unset();}
?>
<form method="POST" action="authorisation.php" class="text-center">
  	<div class="form-group">
  		<?php  
  		 	echo '<input type="text" class="form-control" required name="login" placeholder="Имя пользователя" value="'.$failedusername.'">';
  		?>
    	
	</div>
	<div class="form-group">
	    <input type="password" class="form-control" required name="password" placeholder="Пароль" >
	</div>
	<div class="form-group">
		<a href="registration">Впервые на сайте?</a>
	</div>
 	<button type="submit" class="btn btn-primary">Войти</button>
</form>