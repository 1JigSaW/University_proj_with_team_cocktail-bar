<?php

include 'connect_bd.php';
if (!empty($_POST["login"]) && !empty($_POST["password"]))
{
	$result=mysqli_query($connect,"SELECT id,log FROM user WHERE log = '".$_POST["login"]."' AND password='".$_POST["password"]."'limit 1;") or die("...".mysqli_error($connect));
	if (mysqli_num_rows($result))
	{
		session_start();
		$row=mysqli_fetch_assoc($result);
		$_SESSION['user'] = $row['id'];
		$_SESSION['log'] = $row['log'];
		header("Location: main.php");
	}
	else
	{
		header("Location: login.php");
		exit;
	}
}

?>