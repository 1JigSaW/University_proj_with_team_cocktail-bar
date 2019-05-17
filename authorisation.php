<?php
include 'connect_bd.php';
if (!empty($_POST["login"]) && !empty($_POST["password"]))
{
	$result=mysqli_query($connect,"SELECT id,log FROM user WHERE log = '".$_POST["login"]."' AND password='".$_POST["password"]."'limit 1;") or die("...".mysqli_error($connect));
		session_start();
	if (mysqli_num_rows($result))
	{
		$row=mysqli_fetch_assoc($result);
		$_SESSION['user'] = $row['id'];
		$_SESSION['log'] = $row['log'];
		header("Location: /");
	}
	else
	{
		$_SESSION['error'] = 'asdas';
		header("Location: login");
		exit();
		
	}
}

?>