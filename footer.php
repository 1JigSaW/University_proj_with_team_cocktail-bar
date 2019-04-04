</div>		
				</div>
				<div class="col-md-3 p-0">
					<div class="container p-2 my-auto text-white rounded bg-success" style="min-width:200px;">
						<h6 class="text-center ">Популярные статьи</h6>
						<div class="row p-0 mx-2 my-2">
							<?php
								include "random_articles.php";
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
	<footer class="contaimer-fluid text-center bg-light" style="height: 50px;
	background: rgb(213,213,213);
	background: linear-gradient(180deg, rgba(213,213,213,0) 0%, rgba(59,59,59,0.7511379551820728) 100%);">
		<div class="row m-0 text-nowrap align-items-center">
			<div class="col text-center px-0 px-md-3">
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
				<a class="p-0 float-left" href="#"><img src="img/inst.png"></a>
			</div>			
		</div>		
	</footer>
</body>
</html>