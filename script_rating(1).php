<form action="" method="post">

						<input class="btn btn-primary" type="submit" name="like" value="Мне понравилось" >
						<input type='hidden' name='dislike' value='' >
						<input class="btn btn-primary" type="submit" name="dislike" value="Мне не понравилось">	
					</form>  


					<?php 
					$a=0;
					$user_id=$_SESSION['user'];
					if($_POST['like']){
						$us="SELECT  `user_id` FROM `rating` ";
						$res = mysqli_query($connect,$us)or die(mysqli_error());

						while($arr = mysqli_fetch_assoc($res)){
							
							if($user_id==$arr['user_id']){
								echo "пользователь голосовал!!!!!";$a=1;break;}
								

							}
							if($a!=1){
								echo "пользователь не голосовалл";	
								$plus=1;
								$like=$_POST['like'];
								$query ="INSERT INTO  rating VALUES(NULL,'$user_id','$plus','$id')";
								$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));}	}
								
							
							




							// else if($_POST['dislike']){

							// 	$minus=-1;
							// 	$dislike=$_POST['dislike'];
							// 	$query ="INSERT INTO  rating VALUES(NULL,'$user_id','$minus','$id')";
							// 	$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
							// }


							?>