<?php include "header.php";?>
<?php include "connect_bd.php";?>

<?php

$query = $_GET['q'];

if (!empty($query)) 
{ 
    if (strlen($query) < 3)
    {
        $text = '<p>Слишком короткий поисковый запрос.</p>';
    } 
    else if (strlen($query) > 128) 
    {
        $text = '<p>Слишком длинный поисковый запрос.</p>';
    }
    else
    { 
        $result = mysqli_query($connect, "SELECT * FROM `cocktail` WHERE `title_coctail` LIKE '%$query%'");

        if (mysqli_num_rows($result) > 0)
        { 
            $num = mysqli_num_rows($result);
            $text = '<p>По запросу <b>"'.$query.'"</b> найдено совпадений: '.$num.'</p>';
            for ($i=0; $i<$num; $i++)
            {
                $row = mysqli_fetch_assoc($result);
                $text .= '<p><a href="/article_'.$row['id'].'" title="'.$row['title_coctail'].'">'.$row['title_coctail'].'</a></p>';
            }
        } 
        else 
        {
            $text = '<p>По вашему запросу ничего не найдено.</p>';
        }
    } 
}
else 
{
    $text = '<p>Задан пустой поисковый запрос.</p>';
}

?>

<title>Поиск по сайту: "<?php echo $query ?>"</title>
<div class="row">
    <div class="col text-center">
        <h1 class="display-4">Поиск по сайту</h1>
    </div>
</div>
<div class="row mt-2">
	<div class="col">
		<h3><?php echo $text; ?></h3>
	</div>
</div>

<?php include "footer.php";?>