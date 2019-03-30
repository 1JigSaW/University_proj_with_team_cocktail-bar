<?php 
$article = mysqli_query($connect,"SELECT SUM(`sum`) as sum FROM `rating` WHERE $id=`article_id`")or die(mysqli_error());	
while($arr = mysqli_fetch_assoc($article)){?>
	<form action="" method="post" class="row p-3">
		<input class="btn btn-outline-dark col" type="submit" name="dislike" value="DISLIKE">
		<div  class="display-5 col-6 text-center alert alert-info m-3" role="alert">ТЕКУЩИЙ РЕЙТИНГ:<?php echo $arr['sum'];}?></div>
		<input class="btn btn-outline-light col" type="submit" name="like" value="LIKE" >
	</form>  
<?php