<?php
/*
	Вход в аккаунт
	Автор - the__all
*/

/* Читаем GET-Запрос */
$login = $_GET['login'];
$password = $_GET['password'];
/* Проверка */
if($login == null)
{
	echo "ERROR_NO_LOGIN";
	exit;
}
if($password == null)
{
	echo "ERROR_NO_PASSWORD";
	exit;
}
/* Импорт */
include("../config.php");

$query = $mysqli->query("SELECT * FROM `accounts` WHERE `Login` = '$login'");
$fetch = $query->fetch_array();
if($fetch['Login']  != null)//если аккаунт с таким логином существует
{
	if($fetch['Password'] == $password)
	{
		//Авторизация успешна
		session_start();//стартуем сессию
      	$_SESSION['AccountID'] = $fetch['AccountID'];//создаем глобальную переменную
		echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/account.php">
		';
	}
	else
	{
		//Неверный пароль
		echo "ERROR_PASSWORD";
	}
}
else
{
	//Не найден аккаунт
	echo "ERROR_ACCOUNT";
}

?>