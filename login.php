<?php include "header.php" ?>
	<h1 class="display-4 text-center pb-3">Авторизация</h1>
<?php 
if (!@$_SESSION['user']) 
	include "loginform.php";
else
	echo '<p class="text-center">Страница доступна только неавторизованным пользователям.</p>';
?>
<?php include "footer.php" ?>