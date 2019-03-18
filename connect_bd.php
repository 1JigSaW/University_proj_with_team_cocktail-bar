
<?php 
echo "Connect data_base";
$host='localhost';
$user='root';
$password='';
$db_name='db_coctailbar';
$connect=mysqli_connect($host,$user,$password,$db_name)
or die("Ошибка " . mysqli_error($connect));
 mysqli_set_charset($connect,'utf8');
 ?>


