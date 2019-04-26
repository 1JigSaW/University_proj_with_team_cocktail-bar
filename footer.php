</div>		
				</div>
				<div class="col-md-3 p-0 ">
					<div class="container p-2 my-auto text-white rounded" style="min-width:200px; background-color:rgba(0,100,0,.95);">
						<h6 class="text-center ">Популярные статьи</h6>
						<div class="row p-0 mx-2 my-2">
							<?php
								include "random_articles.php";
								include "connect_bd.php";
								$return=popular_range($connect);
								$query=
										"<a class='col col-md-12 %s text-center popular' href='/article.php?page=%d'><div class='row align-items-center text-white' style='height:144px; background:url(img/%s);background-size: cover;background-position: center;'><div class='col item'><p style='text-shadow:black 1px 1px 0, black -1px -1px 0,black -1px 1px 0, black 1px -1px 0;'>%s</p></div></div></a>
										";
								$m=array('mr-2 mr-md-0 mb-md-2','ml-2 ml-md-0 mt-md-2');
								for($i=0;$i<2;$i++){
									printf($query,$m[$i],$return[$i]['id'],$return[$i]['img'],$return[$i]['title_coctail']);
								}
							?>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<footer class="contaimer-fluid text-center text-white" style="height: 50px;background-color:rgba(0,0,0,.6);">
		<div class="row m-0 text-nowrap align-items-center">
			<div class="col text-center px-0 px-md-3">
				<div class="row flex-row-reverse">
					<div class="col">
						<p class="m-0 d-none d-sm-block my-auto float-md-right">Обратная связь: cocktailbarteam@mail.ru</p>
						<p class="m-0 d-sm-none my-auto float-md-right">cocktailbarteam@mail.ru</p>
					</div>
					<div class="col">
						<p class="m-0">copyright 2019 ©</p>
					</div>
			</div>
			</div>
			<div class="col-auto col-sm-2">
				<a class="p-0 float-left" href="https://instagram.com/cocktailbar"><img src="img/inst.png"></a>
			</div>			
		</div>		
	</footer>
</body>
</html>