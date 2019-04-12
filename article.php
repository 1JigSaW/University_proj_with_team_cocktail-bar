<?php include "header.php" ?>
<?php include "connect_bd.php" ?>


	<?php  $id=$_GET['page'];    // присваиваю переменной id номер статьи, взятый с помощью GET метода из ссылки статьи, а именно, ее номер
	$cocktail = mysqli_query($connect,"SELECT * FROM `cocktail` WHERE $id=`id` ")or die(mysqli_error());  // Обращаюсь к бд, к таблице - cocktail, к тем полям где номер страницы равен id  в таблице cocktail
	while($arr_cocktail = mysqli_fetch_assoc($cocktail)){  //  Через цикл while присваиваю новому массиву значения , которые получили при обращении к бд через ассоциативный список													  ?>
		
	
				<div class="container  bg-white rounded">
					<div class="container bg-white rounded ">
						<h1 class="display-4 text-center p-2">
							<?php echo $arr_cocktail['title_coctail'];?>
						</h1> <!-- С помощью ассоциативного массива запрашиваю из таблицы cocktail название коктейлей, которые хранятся  -->
					</div> 
					<div class="row  justify-content-between">																				   <!-- в поле title_cocktail   -->
						<div class="alert alert-danger lead col-5 text-center rounded" role="alert">						
							<small>
								Крепость: <?php  echo $arr_cocktail['fortress'];?>
							</small>
						</div>   <!-- С помощью ассоциативного массива запрашиваю из таблицы cocktail крепость коктейля, которое находится в поле fortress   -->

						<div class="alert alert-info lead col-5 text-center rounded" role="alert">	
							<small>
								<?php echo $arr_cocktail['category'];}?>
							</small>
						</div>
					</div>
				</div>   <!-- С помощью ассоциативного массива запрашиваю из таблицы cocktail категорию коктейля, которое находится в поле category   -->

				<div>

					<?php 
					$img = mysqli_query($connect,"SELECT * FROM `set_img` JOIN `content` JOIN `img`  WHERE `set_img`.`content_id`=`content`.`id` AND `set_img`.`img_id`=`img`.`id` AND $id=`set_img`.`id`")
					or die(mysqli_error($connect));
					while($arr_img = mysqli_fetch_assoc($img)){
						?>
						<img src="<?php echo $arr_img['img'];?>" class="img-fluid p-1">
					<?php } ?>
				</div>
			

		<div class="container-fluid h5 bg-info rounded mybtn text-white">
			<?php 
			$content = mysqli_query($connect,"SELECT `article_id`,`text_article`,`links` FROM `content` WHERE $id=`article_id`")or die(mysqli_error());
			while($arr_content = mysqli_fetch_assoc($content)){?>
				<p class="p-3">
					<?php  echo $arr_content['text_article'];?>				
				</p>
				<div class="container-fluid text-right ">
					<a href="<?php echo $arr_content['links'];?>" class="h4 text-white">
						ССЫЛКА
					</a>
				</div>
			<?php } ?>
			<div>
				<?php 
					$a=0;        //  Переменная для вывода одиночной информации, а не набора из цикла
					$user_id=$_SESSION['user'];//////
					$login=$_SESSION['log'];
					if($user_id!=0){
						if(($_POST['like'] || $_POST['dislike'])){
							$rating=mysqli_query($connect,"SELECT  `user_id`,`article_id` FROM `rating`")or die(mysqli_error());
							while($arr_rating = mysqli_fetch_assoc($rating)){
								if($user_id==$arr_rating['user_id'] && $id==$arr_rating['article_id'] ){ ?>

									<div class="alert alert-success text-center" role="alert">
										<h4 class="alert-heading">
											<?php  echo $login; ?>
										</h4> 
										Вы уже оставляли свой голос! 
									</div>
									<?php  $a=1;
									break;}

								}
								if($a!=1){	
									if($_POST['like']){
										$plus=1;
										$golos ="INSERT INTO  rating VALUES(NULL,'$user_id','$plus','$id')";}
										if($_POST['dislike']){
											$minus=-1;

											$golos ="INSERT INTO  rating VALUES(NULL,'$user_id','$minus','$id')";}
											$result = mysqli_query($connect, $golos) or die("Ошибка " . mysqli_error($connect));?>

											<div class="alert alert-success text-center" role="alert">
												<h4 class="alert-heading">

													<?php  echo $login; ?>

												</h4> 
												Спасибо за вашу активность! 
											</div>

										<?php  }} ?>

										<?php 
										$rating = mysqli_query($connect,"SELECT SUM(`sum`) as sum FROM `rating` WHERE $id=`article_id`")or die(mysqli_error());	
										while($arr_rating = mysqli_fetch_assoc($rating)){
											?>

											<form action="" method="post" class="row p-3">
												<input class="btn btn-outline-dark col" type="submit" name="dislike" value="DISLIKE">
												<div class="display-5 text-center alert alert-info m-3" role="alert">
													ТЕКУЩИЙ РЕЙТИНГ:
													<?php echo $arr_rating['sum'];?>													
												</div>
												<input class="btn btn-outline-light col" type="submit" name="like" value="LIKE" >
											</form>

										<?php }} ?>
									</div>
								</div>


								<div>

									<?php
									$comment=$_POST['comment'];
									$id=$_GET['page'];
									$data=date("Y-m-d H:i:s", (time()-60*60));

									if($user_id!=0){
										if(isset($_POST['comment'])){
    								// экранирования символов для mysql
											
											$add_comment =mysqli_query($connect,"INSERT INTO  comment VALUES(NULL,'$comment','$data','$id' ,'$user_id')") or die("Ошибка " . mysqli_error($connect));}

											?>


											<div>
												<form action="" method="post" accept-charset="utf-8" >
													<div class="m-2">
														<input class="form-control form-control-lg rounded " type="text" placeholder="Введите ваш комментраий" name="comment">
													</div>
													<div class="container">
														
													</div>
													<div class="row">
														
													</div>
													<div class="m-2">
														<input class="btn btn-primary p-1 text-center col-12" type="submit" value="Добавить комментарий">
													</div>

												</form>
											</div>

										<?php } 
										else { ?>
											<div class="alert alert-success text-center" role="alert">
												<h4 class="alert-heading">
													Войдите на сайт для комментирования 
												</h4> 
												
											</div>
										<?php  } ?>




										<?php 
										$comment = mysqli_query($connect,"SELECT * FROM `comment` JOIN `user` WHERE `user`.`id`=`comment`.`user_id` ORDER BY `comment`.`id` desc")or die(mysqli_error());
										while($arr_comment = mysqli_fetch_assoc($comment)) {
											if($id==$arr_comment['article_id'] ){
												?>
												<div class="bg-info rounded  container text-light">
													<p>
													</p>
													<?php  echo $arr_comment['log'];?>
													<div class="container-fluid  h5">
														<strong>
															<?php  echo $arr_comment['text_comment'];?>
														</strong>
													</div>
													<div class="text-right ">
														<small>
															<?php  echo $arr_comment['data_comment'];?>
														</small>
													</div>
												</div>
											<?php  }}?>
										</div>




										<?php include "footer.php" ?>
