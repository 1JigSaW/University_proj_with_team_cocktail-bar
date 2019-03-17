						<?php $coc = mysqli_query($link,"SELECT * FROM `cocktail` ")or die(mysqli_error()); 
						$id=$_GET['page'];
						$title = mysqli_query($link,"SELECT * FROM `cocktail` WHERE $id=`id` ")or die(mysqli_error());	
						while($arr = mysqli_fetch_assoc($title)){
						echo $arr['title_coctail'];
						echo "<br>";
						echo $arr['fortress'];
						echo "<br>";						
						echo $arr['category'];
						echo "<br>";}
						?>