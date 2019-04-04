<?php  
namespace RandomArticles;
include "connect_function.php";
function gen(){
	return rand(1,5);
}
$db=connect();
$arr=array(gen());
do{
	$randint=gen();
}while($randint==$arr[0]);
$arr[]=$randint;
echo $arr[0],$arr[1];
//$result=mysqli_query($db,"SELECT article_id  FROM `popular` WHERE id=")or die(mysqli_error($db));


?>