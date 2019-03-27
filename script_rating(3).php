

					<?php 
					$a=0;  /////Переменная для вывода одиночной информации, а не набора из цикла
					$user_id=$_SESSION['user'];//////
					$input=$_SESSION['log'];
					if($_POST['like'] || $_POST['dislike']){
						$us="SELECT  `user_id`,`article_id` FROM `rating` ";
						$res = mysqli_query($connect,$us)or die(mysqli_error());

						while($arr = mysqli_fetch_assoc($res)){
							
							if($user_id==$arr['user_id'] && $id==$arr['article_id']){


								echo "<div class=\"alert alert-success text-center\" role=\"alert\">
								<h4 class=\"alert-heading\">";
								echo $input; 
								echo "</h4> Вы уже оставляли свой голос! </div>";
								$a=1;
								break;}

							}
							if($a!=1){	
								if($_POST['like']){
									$plus=1;
									$query ="INSERT INTO  rating VALUES(NULL,'$user_id','$plus','$id')";}
									if($_POST['dislike']){
										$minus=-1;

										$query ="INSERT INTO  rating VALUES(NULL,'$user_id','$minus','$id')";}
										$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
										echo "<div class=\"alert alert-success text-center\" role=\"alert\">
										<h4 class=\"alert-heading\">";
										echo $input; 
										echo "</h4> Спасибо за вашу активность! </div>";}	}
										?>

										<?php 
										$article = mysqli_query($connect,"SELECT SUM(`sum`) as sum FROM `rating` WHERE $id=`article_id`")or die(mysqli_error());	
										while($arr = mysqli_fetch_assoc($article)){?>
											<form action="" method="post" class="row p-3">


												<input class="btn btn-outline-dark col" type="submit" name="dislike" value="DISLIKE">
												<div  class="display-5 col-6 text-center alert alert-info m-3" role="alert">ТЕКУЩИЙ РЕЙТИНГ:<?php echo $arr['sum'];}?></div>
												<input class="btn btn-outline-light col" type="submit" name="like" value="LIKE" >

											</form>  