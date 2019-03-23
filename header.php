<?php
session_start(); 
if(@$_GET['do'] == 'logout'){
	unset($_SESSION['user']);
	session_destroy();}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="open-iconic/font/css/open-iconic-bootstrap.css">
	<style type="text/css">
		html, body {
				    height: 100%;
				    min-height: 100%;}
	</style>
</head>
<body>
	<div class="contaimer-fluid bg-light" style="min-height: calc(100% - 50px);">
		<header class="container-fluid bg-info">
			<div class="row">
				<div class="col my-auto p-0 ">
					<div class="btn-group p-1 m-0 float-right">
						<a href="main.php" role="button" class="btn btn-lg bg-primary text-white border">Лого</a>
						<a href="spisok.php" role="button" class="btn btn-lg bg-secondary text-white border mx-1">Статьи</a>
						<a href="#" role="button" class="btn btn-lg bg-secondary text-white border">О нас</a>
					</div>
				</div>
				<div class="col my-auto d-none d-sm-block">
					    <form action='#' method="get" class="form-inline float-right">
					       <input class="form-control p-0 m-0" name="q" type="text" class="input-medium search-query" placeholder=" Search...">
						</form>

				</div>
				<div class="col d-sm-none py-1 px-0">
					<a href="#" role="button" class="btn btn-lg text-white"><span class="oi oi-magnifying-glass"></span></a>
				</div>
				<div class="container col p-0 m-0 btn-group my-auto">
					<div class="container text-white text-center d-none d-sm-none d-md-block p-0 m-0">
					<?php
						if (!@$_SESSION['user']){
							echo '<a href="../login.php" role="button" class="btn  border-white bg-primary rounded text-white mr-1" style="">Вход</a>';
							echo '<a href="#" role="button" class="btn  border-white bg-primary rounded text-white">Регистрация</a>';}
						else
							{$logout='<a href="?do=logout" role="button" class="p-0 m-0 btn btn-lg text-white"><span class="oi oi-account-logout"></span></a>';
							echo '<ul class="list-inline my-auto"><li class="list-inline-item">Вы вошли как <b>'.$_SESSION['log'].'</b></li>';
							echo $logout;}
					?>
					</div>
					<div class="d-md-none p-0 m-auto">
						<?php
						if (!@$_SESSION['user'])
							echo '<a href="../login.php" role="button" class="p-0 m-0 btn btn-lg text-white"><span class="oi oi-account-login"></span></a>';
						else
							echo $logout;
						?>
					</div>
				</div>
			</div>
		</header>
		<div class="contaimer-fluid mx-xl-4 mx-lg-3 mx-md-2 p-4">
			<div class="row m-0">
				<div class="col-md-9 p-0 pr-md-2 m-0">
					<div class="container mb-2 p-2 p-sm-3 p-md-4 bg-white rounded">