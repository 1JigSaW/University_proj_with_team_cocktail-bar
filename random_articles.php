<?php  
namespace RandomArticles;
include "connect_function.php";
$db=connect();
function gen(){
	return rand(1,5);
}
$arr=array(gen());
do{
	$randint=gen();
}while($randint==$arr[0]);
$arr[]=$randint;
$query="
		SELECT img, title_coctail, article.id FROM `set_img` JOIN `content`
		JOIN `img` JOIN `article` JOIN `cocktail` JOIN `popular`
		WHERE `popular`.id IN ($arr[0], $arr[1]) AND `article`.id=`popular`.article_id
		AND `set_img`.`content_id`=`content`.`id` AND `set_img`.`img_id`=`img`.`id`
		AND `article`.`cocktail_id`=`cocktail`.`id`	AND `set_img`.`id`=`article`.`id`
		";
$res=mysqli_query($db,$query)or die(mysqli_error($db));
$return=array();
while ($b=mysqli_fetch_array($res)){
	$return[]=$b;}


/*$query="
		SELECT img, title_coctail FROM `set_img` JOIN `content`
		JOIN `img` JOIN `article` JOIN `cocktail` WHERE 
		`set_img`.`content_id`=`content`.`id` AND `set_img`.`img_id`=`img`.`id`
		AND `set_img`.`id` IN ($ar[0], $ar[1]) AND `article`.`cocktail_id`=`cocktail`.`id`
		AND `set_img`.`id`=`article`.`id`
		";*/
?>
