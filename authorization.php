<?php  
include 'connect_function.php';
if (!empty($_POST["login"]) && !empty($_POST["password"]))
	{$link=connect();
	$result=mysqli_query($link,"SELECT id FROM user WHERE log = '".$_POST["login"]."' AND password='".$_POST["password"]."'limit 1;") or die("...".mysqli_error($link));
	if (mysqli_num_rows($result))
		echo 'успех';
	else
		{header("Location: login.php");
		exit();}
}
else
	echo "error";
?>
