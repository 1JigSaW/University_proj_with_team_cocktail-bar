<?php
if (!isset($_SESSION['user']) && !isset($_SESSION['log']))
	session_start();
if(@$_GET['do'] == 'logout')
	{
	unset($_SESSION['user']);
	session_destroy();}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="open-iconic/font/css/open-iconic-bootstrap.css">
	<style type="text/css">
		html, body {
					min-width: 300px;
				    height: 100%;
				    min-height: 100%;}
		a:hover{
			text-decoration:none;
		}
		body{
			background: url(img/textur.jpg);
		}
	</style>
</head>
	<body>
		<header class="container-fluid bg-info fixed-top px-3">
			<div class="row">
				<div class="col my-auto p-0 m-0">
					<div class="btn-group p-1 m-0 float-right">
						<a href="/main" role="button" class="btn btn-lg text-white border"><span class="oi oi-home"></span></a>
						<a href="/spisok" role="button" class="btn btn-lg bg-secondary text-white border mx-1">Статьи</a>
						<div class="d-none d-sm-block">
							<a href="/about" role="button" class="btn btn-lg bg-secondary text-white border">О нас</a>
						</div>
						<div class="d-sm-none">
							<a href="/about" role="button" class="btn btn-lg text-white px-3 py-2"><span class="oi oi-info"></span></a>
						</div>
					</div>
				</div>
				<div class="col my-auto d-none d-sm-block">
					    <form action='#' method="get" class="form-inline float-right">
					       <input class="form-control p-0 m-0" name="q" type="text" class="input-medium search-query" placeholder=" Search...">
						</form>

				</div>
				<div class="col d-sm-none py-1 px-0">
					<a href="#" role="button" class="btn btn-lg text-white pl-0 pr-2 mx-0"><span class="oi oi-magnifying-glass"></span></a>
				</div>
				<div class="container col p-0 m-0 btn-group my-auto">
					<div class="container text-white text-center d-none d-sm-none d-md-block p-0 m-0">
					<?php
						if (!@$_SESSION['user']){
							echo '<a href="/login.php" role="button" class="btn  border-white rounded text-white mr-1" style="">Вход</a>';
							echo '<a href="/registration.php" role="button" class="btn  border-white rounded text-white">Регистрация</a>';}
						else
							{if (isset($_SERVER['QUERY_STRING']))
								$request=$_SERVER['QUERY_STRING']."&";
							else
								$request="";
							$logout='<a href="?'.$request.'do=logout" role="button" class="p-0 m-0 btn btn-lg text-white"><span class="oi oi-account-logout"></span></a>';
							echo '<ul class="list-inline my-auto"><li class="list-inline-item">Вы вошли как <b>'.$_SESSION['log'].'</b></li>';
							echo $logout;}
					?>
					</div>
					<div class="d-md-none p-0 m-auto">
						<?php
						if (!@$_SESSION['user'])
							echo '<a href="/login.php" role="button" class="p-0 m-0 btn btn-lg mr-1 text-white"><span class="oi oi-account-login"></span></a>';
						else
							echo $logout;

						?>
					</div>
				</div>
			</div>
		</header>
	
	<div class="container-fluid p-0" style="min-height: calc(100% - 50px);">
		<div class="container-fluid" style="height:56px;">	
		</div>
	
		<div class=" mx-xl-4 mx-lg-3 mx-md-2 p-3">
			<div class="row m-0">
				<div class="col-md-9 p-0 pr-md-2 m-0">
					<div class="container mb-3 p-2 p-sm-3 p-md-4 bg-white rounded">