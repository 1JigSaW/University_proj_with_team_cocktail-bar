		<?php include "header.php" ?>
		<?php include "connect_bd.php" ?>
		<div class="contaimer-fluid mx-xl-4 mx-lg-3 mx-md-2 p-4">
			<div class="row m-0">
				<div class="col-md-9 p-0 pr-md-2 m-0">
					<div class="container mb-2 p-2 p-sm-3 p-md-4 bg-white rounded">
						<h1 class="display-2">Список статей</h1>

						<?php 
						 $link = mysqli_connect($host,$user,$password,$db_name) 
        				or die("Ошибка " . mysqli_error($link)); 
        				$res = mysqli_query($link,"SELECT article_id,text_article,img_content,links FROM `content`")or die(mysqli_error());
        				while($row = mysqli_fetch_assoc($res)){
        					echo "<div><a href=\"complete_script_comment.php\" class=\"container-fluid m-3 \">";
        					echo $row['text_article'];
        					echo "</a></div>";

        				}

						mysqli_close($link);



        				
						?>
					</div>				
				</div>
			</div>
		</div>
				<?php include "footer.php" ?>
				