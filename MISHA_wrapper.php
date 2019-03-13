﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="open-iconic/font/css/open-iconic-bootstrap.css">
	<style type="text/css">
		html, body {
				    height: 100%;
				    min-height: 100%;}
	    #background{
	    	background-color:#7FFFD4;
	    }
	</style>
</head>
<body>
	<div class="contaimer-fluid bg-light" style="min-height: calc(100% - 50px);">
		<header class="container-fluid bg-info">
			<div class="row">
				<div class="col my-auto p-0 ">
					<div class="btn-group p-1 m-0 float-right">
						<a href="#" role="button" class="btn btn-lg bg-primary text-white border">Лого</a>
						<a href="#" role="button" class="btn btn-lg bg-secondary text-white border mx-1">Статьи</a>
						<a href="#" role="button" class="btn btn-lg bg-secondary text-white border">О нас</a>
					</div>
				</div>
				<div class="col my-auto d-none d-sm-block">
					    <form action='#' method="get" class="form-inline float-right">
					       <input class="form-control p-0 m-0" name="q" type="text" class="input-medium search-query" placeholder=" Search...">
						</form>

				</div>
				<div class="col d-sm-none py-1">
					<a href="#" role="button" class="btn btn-lg text-white"><span class="oi oi-magnifying-glass"></span></a>
				</div>
				<div class="container col p-0 m-0 btn-group my-auto">
					<div class="container text-center d-none d-sm-none d-md-block p-0 m-0"> 
						<a href="#" role="button" class="btn  border-white bg-primary rounded text-white" style="">Вход</a>
						<a href="#" role="button" class="btn  border-white bg-primary rounded text-white">Регистрация</a>
					</div>
					<div class="d-md-none p-0 m-auto">
						<a href="#" role="button" class="p-0 m-0 btn btn-lg text-white"><span class="oi oi-account-login"></span></a>
					</div>
				</div>
			</div>
		</header>
		<div class="contaimer-fluid mx-xl-4 mx-lg-3 mx-md-2 p-4">
			<div class="row m-0" >
				<div class="col-md-9 p-0 pr-md-2 m-0">
					<div class="container mb-2 p-2 p-sm-3 p-md-4 rounded bg-info text-center  text-white" >						
						<?php include_once 'MISHA_article_page.php' ?>
					</div>			
					</div>
					<div class="col-md-3 p-0">
					<div class="container p-2 my-auto text-light rounded " style="background:url(technicalissues.jpg);">
						<h6 class="text-center">Популярные статьи</h6>
					</div>
				</div>
				</div>
				
			</div>
			
		</div>
	</div>
	<footer class="contaimer-fluid text-center bg-light" style="height: 50px;
	background: rgb(213,213,213);
	background: linear-gradient(180deg, rgba(213,213,213,0) 0%, rgba(59,59,59,0.7511379551820728) 100%);">
		<div class="row m-0 text-nowrap align-items-center">
			<div class="col text-center">
				<div class="row flex-row-reverse">
					<div class="col">
						<p class="m-0 my-auto float-md-right">Обратная связь: cocktailbarteam@mail.ru</p>
					</div>
					<div class="col">
						<p class="m-0">copyright 2019 ©</p>
					</div>
			</div>
			</div>
			<div class="col-auto col-sm-2">
				<a class="p-0 float-left" href="#"><img src="inst.png"></a>
			</div>
					
						
			
		</div>
		

		
	</footer>

</body>
</html>