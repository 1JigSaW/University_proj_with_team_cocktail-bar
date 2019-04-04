<?php 
namespace Popular;
include "connect_function.php";
function cmp_function_desc($a, $b){
    return ($a['sum'] < $b['sum']);
}
$amounts_=array();
$db=connect();
$result=mysqli_query($db,"SELECT DISTINCT article_id FROM `rating`")or die(mysqli_error($db));
while ($article = mysqli_fetch_array($result, MYSQLI_NUM)) {
	$arr=mysqli_query($db,"SELECT article_id, SUM(sum) as sum FROM `rating` WHERE article_id=$article[0]")or die(mysqli_error($db));
	$res=mysqli_fetch_array($arr);
    $amounts[]=$res;
    }
uasort($amounts, 'Popular\cmp_function_desc');
mysqli_query($db,"DELETE FROM `popular`")or die(mysqli_error($db));
for ($x=0; $x<count($amounts) and $x<5; $x++)  {
	$a=$amounts[$x]["article_id"];
	mysqli_query($db,"INSERT INTO  `popular` VALUES(NULL,$a)")or die(mysqli_error($db));}
?>
