﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connect_bd.php'; // подключаем скрипт

$id=$_GET['page'];// здесь будет номер статьи
// здесь будет номер пользователя
$data=date("Y-m-d H:i:s");
if(isset($_POST['comment'])){
 

    // подключаемся к серверу
    $link = mysqli_connect($host,$user,$password,$db_name) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $comment = htmlentities(mysqli_real_escape_string($link, $_POST['comment']));
    
     
    // создание строки запроса
    $query ="INSERT INTO comment VALUES(NULL,'$id','user', '$comment','$data')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result=true)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
}
?>
<h2>Комментарий</h2>
<form class="comment_form" action="" method="POST" name="comment_form">
<p>Введите комментарий:<br> 


<input type="text" name="comment" /></p>
<input type="submit" value="Добавить">
</form>
<p></p>
<h2>Вывод комментария</h2>
<div>
    <?php 
       $link = mysqli_connect($host,$user,$password,$db_name) 
        or die("Ошибка " . mysqli_error($link)); 
        $res = mysqli_query($link,"SELECT article_id,user_id,text_comment,data_comment FROM `comment`")or die(mysqli_error());

       /* $myrow[]='';
        do{
    echo "Article - ".$myrow['article_id']."<br>";
    echo "User - ".$myrow['user_id']."<br>";
    echo "Comment - ".$myrow['text_comment']."<br>";
    echo "Data - ".$myrow['data_comment']."<br>";
}while ($myrow = mysqli_fetch_array($result));*/
echo '<table>';
while($row = mysqli_fetch_assoc($res)) {
if($id==$row['article_id']){
echo "<div class=\"bg-info rounded m-2 h4 container mb-2 p-2 p-sm-3 p-md-4   \">";
echo "<div>";	
echo $row['text_comment'];
echo "</div>";
echo "<div class=\"text-right\">";
echo $row['data_comment'];
echo "</div>";
echo "</div>";}}
 

mysqli_close($link);
     ?>
 
</div>
</body>
</html>