<?php include "header.php" ?>
<title>Авторизация</title>
<h3 class="text-center pb-3">Авторизация</h3>
<?php 
if (!@$_SESSION['user']) 
	include "loginform.php";
else
	echo '<p class="text-center">Страница доступна только неавторизованным пользователям.</p>';
?>
<?php include "footer.php" ?>