<?php include "header.php" ?>
	<title>Авторизация</title>
	<h1 class="display-4 text-center pb-1 pb-md-3">Вход</h1>
<?php 
if (!@$_SESSION['user']) 
	include "loginform.php";
else
	echo '<p class="text-center">Страница доступна только неавторизованным пользователям.</p>';
?>
<?php include "footer.php" ?>