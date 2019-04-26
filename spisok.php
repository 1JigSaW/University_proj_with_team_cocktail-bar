<?php include "header.php"?>
<div>
	<h1 class="display-4 text-center ">СПИСОК ВСЕХ ДОСТУПНЫХ СТАТЕЙ</h1>		
	<?php
	include "connect_bd.php";		
	$res = mysqli_query($connect,"SELECT * FROM `cocktail`")or die(mysqli_error());

	while($row = mysqli_fetch_assoc($res)){
	echo "<div class=\"text-center\" ><a class='container-fluid h1' href='article_". $row['id']. "'>";
	$id=$row['id'];
	echo $row['title_coctail'];
	echo "</a></div>";

    }

     mysqli_close($connect);
    ?> 
</div>
<?php include "footer.php" ?>

