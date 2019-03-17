                                                <?php 
							$id=$_GET['page'];
							$text = mysqli_query($link,"SELECT * FROM `content` WHERE $id=`article_id` ")or die(mysqli_error());	
							while($arr = mysqli_fetch_assoc($text)){
        					echo "<div class=\"container-fluid bg-info m-3 \">";
        					echo $arr['text_article'];
        					echo "<br>";
        					echo $arr['img_content'];
        					echo "<br>";
        					echo $arr['links'];
        					echo "</div>";

        				}
						mysqli_close($link);
							 ?>