<?php 
include ('connect_bd.php');
if (isset($_POST['log']) && isset($_POST['password']))
	{$log=$_POST['log'];
	$password=$_POST['password'];
	$date=$_POST['data_born'];
	$data_born=strtotime($date);
	if (!$data_born ||($data_born > mktime(0, 0, 0, date("m"),date("d"),date("Y"))||($data_born < mktime(0, 0, 0, date("m"),date("d"),date("Y")-130))))
		$msg='Некорректная дата рождения';
	elseif (!(preg_match('|[_\w&&[^A-Z]]{3,15}|',$log)))
		$msg='Логин должен состоять из 3-15 строчных символов латинского алфавита. Также допускатся цифры и символ нижнего подчеркивания.';
	elseif (!(preg_match('|.{6,15}|',$password)))
		$msg='Пароль должен состоять из 6-15 символов.';
	elseif ($data_born<=mktime(0, 0, 0, date("m"),date("d"),date("Y")-18)){
			
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
	else 
		$msg='Регистрация доступна только пользователям старше 18 лет';
		}

if (!$suc) 
	include 'registrationform.php';
?>
