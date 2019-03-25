<?php header('Content-Type: text/html; charset=utf-8');
mysql_query("SET NAMES 'UTF8'");
?>
<?php include "header.php" ?>
<?php include "connect_bd.php" ?>

<?php 



if(isset($_GET['page'])){
	$id=$_GET['page'];

	$cocktail = mysqli_query($connect,"SELECT * FROM `cocktail` WHERE $id=`id` ")or die(mysqli_error());	//////////////
	while($arr = mysqli_fetch_assoc($cocktail)){
		?>
		<div class="container">
			<div class="row">
				<div class="col"></div>
				<div class="col-6">
					<h1 class="display-3 text-center "><?php echo $arr['title_coctail'];?></h1></div>
					<div class="col">
						<div class="card " >
							<ul class="list-group list-group-flush">
								<li class="list-group-item lead text-center bg-info text-white"><strong>Крепость: <?php  echo $arr['fortress'];?></strong></li>
								<li class="list-group-item lead text-center bg-info text-white"><strong><?php echo $arr['category'];}}?></strong></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			
			<?php 
			
			$img = "SELECT * FROM `set_img` JOIN `content` JOIN `img`  WHERE `set_img`.`content_id`=`content`.`id` AND `set_img`.`img_id`=`img`.`id` AND $id=`set_img`.`id`";
			$a=mysqli_query($connect,$img)or die(mysqli_error($connect));
			while($arr = mysqli_fetch_assoc($a)){
				
				?>


				
				<img src="<?php echo $arr['img'];}?>" class="img-fluid p-5 " alt="">
				<div class="container-fluid h5 bg-info rounded mybtn text-white">
					<?php 

					$text = mysqli_query($connect,"SELECT `article_id`,`text_article`,`links` FROM `content` WHERE $id=`article_id`")or die(mysqli_error());
					while($arr = mysqli_fetch_assoc($text)){
						?>
						<p class="p-3"><?php  echo $arr['text_article'];?></p>

						<div class="container-fluid text-right ">
							<a href="<?php echo $arr['links'];}?>" class="h4 text-white">ССЫЛКА</a>
						</div>
					</div>


					<form action="" method="post">

						<input class="btn btn-primary" type="submit" name="like" value="Мне понравилось" >
						<input type='hidden' name='dislike' value='' >
						<input class="btn btn-primary" type="submit" name="dislike" value="Мне не понравилось">	
					</form>  


					<?php 
			// $user_id=$_SESSION['user'];
			// $input=$_SESSION['log'];
			// $a = mysqli_query($connect,"SELECT * FROM `article` ")or die(mysqli_error());
			// while($arr = mysqli_fetch_assoc($a)){	

			// if($user_id!='user_id'){
			// if($_POST['like']){

			// 	$like=$_POST['like'];
			// 	$query ="UPDATE article SET rating=rating+1,  user_id=$user_id WHERE $id=id ";
			// 	$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
			// }
			// else {echo "stop";}



			// else if($_POST['dislike']){
			// 	$dislike=$_POST['dislike'];
			// 	$query ="UPDATE article SET rating = rating-1  WHERE $id=`id` ";
			// 	$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
			// }


					?>

					<!-- <?php 
					$article = mysqli_query($connect,"SELECT * FROM `rating` WHERE $id=`id`")or die(mysqli_error());	
					while($arr = mysqli_fetch_assoc($article)){?>
						<div class="container-fluid text-center">
							<div  class="display-4"><?php echo $arr['rating'];}?></div>
						</div>
					-->
					<?php

					$id=$_GET['page'];
					$input=$_SESSION['log'];
					$user_id=$_SESSION['user'];
					$data=date("Y-m-d H:i:s", (time()-60*60));
					$id=$_GET['page'];
					
					if(isset($_POST['comment'])){
    								// экранирования символов для mysql
						$comment = htmlentities(mysqli_real_escape_string($connect, $_POST['comment']));
						$query ="INSERT INTO  comment VALUES(NULL,'$comment','$data','$id' ,'$user_id')";
   								 // выполняем запрос
						$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); }
						if($result=true)
						{
							echo "<span style='color:blue;'>Данные добавлены</span>";
						}
						?>
						<div>
							<form action="" method="post" >
								<div class="m-2"><input class="form-control form-control-lg rounded " type="text" placeholder="Введите ваш комментраий" name="comment"></div>
								<div class="container"></div>
								<div class="row"></div>
								<div class="m-2"><input class="btn btn-primary p-1 text-center col-12" type="submit" value="Добавить комментарий"></div>

							</form>
						</div>
						<?php 

						// $res = mysqli_query($connect,"SELECT id,log FROM `user`  ")or die(mysqli_error());
						// while($row = mysqli_fetch_assoc($res)){
						// 	if($user_id==$row['id']){
						// 	$user_id=$row['log'];}
						$res = mysqli_query($connect,"SELECT * FROM `comment` JOIN `user` WHERE `user`.`id`=`comment`.`user_id`")or die(mysqli_error());



						while($row = mysqli_fetch_assoc($res)) {
							if($id==$row['article_id']    ){

								echo "<div class=\"bg-info rounded  container text-white  \">";
								echo "<p></p>";
								echo "<div class=\"container-fluid \"></div>";
								echo "<div class=\"\"></div>";
								echo $row['log'];
								echo "<div class=\"container-fluid  h4\">";	
								echo $row['text_comment'];
								echo "</div>";
								echo "<div class=\"text-right\">";

								echo $row['data_comment'];



								echo "</div>";
								echo "</div>";}}
								mysqli_close($connect);
								?>


								<?php include "footer.php" ?>
