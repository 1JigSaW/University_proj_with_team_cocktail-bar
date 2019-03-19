<?php include "header.php" ?>
<?php include "connect_bd.php" ?>

<?php 
if(isset($_GET['page'])){
	$id=$_GET['page'];
	$title = mysqli_query($connect,"SELECT * FROM `cocktail` WHERE $id=`id` ")or die(mysqli_error());	
	while($arr = mysqli_fetch_assoc($title)){
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
			$text = mysqli_query($connect,"SELECT * FROM `content` WHERE $id=`article_id` ")or die(mysqli_error());
			while($arr = mysqli_fetch_assoc($text)){
				?>
			<img src="<?php echo $arr['img_content'];?>" class="img-fluid p-5 " alt="">
			<div class="container-fluid h5 bg-info rounded mybtn text-white">
 				<p class="p-3"><?php  echo $arr['text_article'];?></p>
			
			<div class="container-fluid text-right ">
				<a href="<?php echo $arr['links'];}?>" class="h4 text-white">ССЫЛКА</a>
			</div>
		</div>

			<?php 
			$article = mysqli_query($connect,"SELECT * FROM `article` WHERE $id=`cocktail_id`")or die(mysqli_error());	
			while($arr = mysqli_fetch_assoc($article)){?>
				<div class="container-fluid text-center">
				<div  class="display-4"><?php echo $arr['rating'];}?></div>
				</div>



				<?php
				
				

				$data=date("Y-m-d H:i:s", (time()+60*60*2));
				$id=$_GET['page'];

				if(isset($_POST['comment'])){
    								// экранирования символов для mysql
					$comment = htmlentities(mysqli_real_escape_string($connect, $_POST['comment']));
					$query ="INSERT INTO comment VALUES(NULL,'$id','user', '$comment','$data')";
   								 // выполняем запрос
					$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); }
							
				?>
				<div>
				<form action="" method="post" >
					<div class="m-2"><input class="form-control form-control-lg rounded " type="text" placeholder="Введите ваш комментраий" name="comment"></div>
					<div class="container"></div>
					<div class="row"></div>
					<div class="m-2"><input class="btn btn-primary p-1 text-center col-12" type="submit" value="Добавить комментарий"></div>
					
				</form>
			</div>
				<div>
				<?php 
				$res = mysqli_query($connect,"SELECT * FROM `comment`")or die(mysqli_error());


				while($row = mysqli_fetch_assoc($res)) {
					if($id==$row['article_id']){
						
						echo "<div class=\"bg-info rounded  container text-white  \">";
						echo "<p></p>";
						echo "<div class=\"container-fluid \"></div>";
						echo "<div class=\"\"></div>";
						echo "<div class=\"container-fluid  h4\">";	
						echo $row['text_comment'];
						echo "</div>";
						echo "<div class=\"text-right\">";
						echo $row['data_comment'];
						echo "</div>";
						echo "</div>";}}
						mysqli_close($connect);
						?>
				
					</div>
						<?php include "footer.php" ?>
