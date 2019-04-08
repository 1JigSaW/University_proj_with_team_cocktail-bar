<?php 
function popularrange($db){
	$query="SELECT MAX(id) as max, MIN(id) as min FROM `popular`";
	$res=mysqli_query($db,$query)or die(mysqli_error($db));
	$row=mysqli_fetch_assoc($res);

	$arr=array(rand($row['min'],$row['max']));
	do{
		$randint=rand($row['min'],$row['max']);
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
		$result[]=$b}
	return $result;
}

?>
