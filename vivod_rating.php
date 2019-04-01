<?php
function rating($id){
	$arr = mysqli_query($connect,"SELECT SUM(`sum`) as sum FROM `rating` WHERE $id=`article_id`")or die(mysqli_error());	
	return $arr['sum'];}
	?>