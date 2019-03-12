<!DOCTYPE html>
<html>
<head>
    <title>DB</title>
</head>
<body>


<?php 
echo "Connect data_base";
$host='localhost';
$user='root';
$password='';
$db_name='db_coctailbar';

$connect=mysqli_connect($host,$user,$password,$db_name)
or die("Ошибка " . mysqli_error($connect));
/*
mysqli_select_db($db_name,$connect);

if($connect=true){
    echo "lol";
}

else {echo "nooooooooooooooooooooooo";}
*/
/*$connect = mysqli_connect ($host, $user, $password) or die(mysqli_error());
 
mysqli_select_db($db_name) or die(mysqli_error())
*/
 ?>
</body>
</html>

