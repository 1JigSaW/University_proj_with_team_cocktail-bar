<?php 
include ('connect_bd.php');
if (isset($_POST['log']) && isset($_POST['password']))
	{$data_born=strtotime($_POST['data_born']);
	if (!$data_born ||($data_born > mktime(0, 0, 0, date("m"),date("d"),date("Y"))||($data_born < mktime(0, 0, 0, date("m"),date("d"),date("Y")-130))))
		$msg='Некорректная дата рождения';
	else{
		if ($data_born<=mktime(0, 0, 0, date("m"),date("d"),date("Y")-18)){
			$log=$_POST['log'];
			$password=$_POST['password'];
			$s="SELECT * FROM user WHERE log = '$log'";
			$res=mysqli_query( $connect, $s);
			$num = mysqli_num_rows($res);
			if($num == 0) {
				$query="INSERT INTO user (data_born, log, password) VALUES('$data_born','$log', '$password')";
				$result=mysqli_query($connect, $query);
			if($result){
					$suc=true;
					header('Location: success.php');
					exit();
						} 
			else 
				$msg="Ошибка";
						}
						else {$msg="Пользователь с таким логином уже зарегистрирован";}}
			else {
				$msg='Регистрация доступна только пользователям старше 18 лет';}
		}
	}
if (!$suc) 
	include 'registrationform.php';

?>
