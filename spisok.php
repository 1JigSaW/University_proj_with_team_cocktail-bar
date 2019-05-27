<?php include "header.php";
include "connect_bd.php";?>
<title>Все статьи</title>
<h1 class="display-4 text-center pb-1 pb-md-3">Доступные статьи</h1>		
<?php
$res = mysqli_query($connect,"SELECT * FROM `cocktail`")or die(mysqli_error());

while($row = mysqli_fetch_assoc($res)){
	echo "<div class=\"text-center\" ><a class='container-fluid h1' href='article_". $row['id']. "'>";
	$id=$row['id'];
	echo $row['title_coctail'];
	echo "</a></div>";
}
mysqli_close($connect);
?> 
<?php include "footer.php" ?>

