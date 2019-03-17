<?php 
						$id=$_GET['page'];
						$article = mysqli_query($link,"SELECT * FROM `article` WHERE $id=`cocktail_id`")or die(mysqli_error());	
						while($arr = mysqli_fetch_assoc($article)){
						{
						echo $arr['rating'];
						echo "<br>";}
					}
						?>