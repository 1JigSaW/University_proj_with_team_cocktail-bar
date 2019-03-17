		<?php include "header.php" ?>
		<?php include "connect_bd.php" ?>
					<div>
						<h1 class="display-2">Список статей</h1>		
						<?php 						
						 $link = mysqli_connect($host,$user,$password,$db_name) 
        				or die("Ошибка " . mysqli_error($link));
        				mysqli_set_charset($link,'utf8');       				
        				$res = mysqli_query($link,"SELECT * FROM `cocktail`")or die(mysqli_error());

        				while($row = mysqli_fetch_assoc($res)){
        					echo "<div><a class='container-fluid m-3' href='complete_script_comment.php?page=". $row['id']. "'>";
        					$id=$row['id'];
        					echo $row['title_coctail'];
        					echo "</a></div>";

        				}

						mysqli_close($link);
						?> 
					</div>
				<?php include "footer.php" ?>
				
				