<?php include "header.php" ?>
<?php include "connect_bd.php" ?>


	<?php  $id=$_GET['page'];   
	$cocktail = mysqli_query($connect,"SELECT * FROM `cocktail` WHERE $id=`id` ")or die(mysqli_error()); 
	while($arr_cocktail = mysqli_fetch_assoc($cocktail)){ 						  ?>
		

		<div class="container  bg-white rounded">
			<div class="container bg-white rounded ">
				<h1 class="display-4 text-center p-2">
					<?php echo $arr_cocktail['title_coctail'];?>
				</h1> 
			</div> 
			<div class="row  justify-content-between">																				  
				<div class="alert alert-danger lead col-5 text-center rounded" role="alert">						
					<small>
						Крепость: <?php  echo $arr_cocktail['fortress'];?>
					</small>
				</div>   

				<div class="alert alert-info lead col-5 text-center rounded" role="alert">	
					<small>
						<?php echo $arr_cocktail['category'];}?>
					</small>
				</div>
			</div>
		</div>   

		<div class="container">

			<?php 
			$img = mysqli_query($connect,"SELECT * FROM `set_img` JOIN `content` JOIN `img`  WHERE `set_img`.`content_id`=`content`.`id` AND `set_img`.`img_id`=`img`.`id` AND $id=`set_img`.`id`")
			or die(mysqli_error($connect));
			while($arr_img = mysqli_fetch_assoc($img)){
				?>
				<img src="<?php echo $arr_img['img'];?>" class="img-fluid p-3 m-1">
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
					$a=false;        //  определяет, учавствовал ли в голосовании пользователь(начальное значение - не учавствовал)
					$user_id=$_SESSION['user'];
					$login=$_SESSION['log'];
					if($user_id!=0){  // определяет, сделал ли вход пользователь
						if(($_POST['like'] || $_POST['dislike'])){
							$rating=mysqli_query($connect,"SELECT  `user_id`,`article_id` FROM `rating`")or die(mysqli_error());
							while($arr_rating = mysqli_fetch_assoc($rating)){
								if($user_id==$arr_rating['user_id'] && $id==$arr_rating['article_id'] ){ ?>   <!-- Проверяет, не голосовал ли этот пользователь на этой статье -->
																										
									<div class="alert alert-success text-center" role="alert">
										<h4 class="alert-heading">
											<?php  echo $login; ?>
										</h4> 
										Вы уже оставляли свой голос! 
									</div>
									<?php  $a=true;
									break;}

								}
								if($a==false){	//Пользователь не голосовал
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
												<input class="btn btn-outline-light col" type="submit" name="like" value="LIKE">
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
										if(isset($comment)){
											$add_comment =mysqli_query($connect,"INSERT INTO  comment VALUES(NULL,'$comment','$data','$id' ,'$user_id')") or die("Ошибка " . mysqli_error($connect));
										}?>
										


										<div>
											<form action="" method="post" accept-charset="utf-8" >
												<div class="m-2">
													<input required class="form-control form-control-lg rounded " type="text" placeholder="Введите ваш комментраий" name="comment">
												</div>
												<div class="container">

												</div>
												<div class="row">

												</div>
												<div class="m-2">
													<input class="btn btn-primary p-1 text-center col-12" type="submit" value="Добавить комментарий" name="submit">
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
									$comment = mysqli_query($connect,"SELECT * FROM `comment` JOIN `user` WHERE `user`.`id`=`comment`.`user_id`  ORDER BY `comment`.`id` desc ")or die(mysqli_error());
									while($arr_comment = mysqli_fetch_assoc($comment)) {
										if($id==$arr_comment['article_id']){
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
