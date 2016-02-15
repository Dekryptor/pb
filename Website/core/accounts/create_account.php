<?php
/*
	Создание аккаунта
	Автор - the__all
*/

/* Читаем GET-Запрос */
$login = $_GET['login'];
$mail = $_GET['mail'];
$player_name = $_GET['name'];
$password = $_GET['password'];
$status = 0;//Статус аккаунта | 0-не активирован, 1-активирован, 2-заблокирован
$referals = 0;//Кол-во приглашенных аккаунтом пользователей| Естественно равно нулю

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
if($player_name == null)
{
	echo "ERROR_NO_NAME";
	exit;
}
if($mail == null)
{
	echo "ERROR_NO_MAIL";
	exit;
}
/* Импорт */
include("../config.php");

$query = $mysqli->query("SELECT * FROM `accounts` WHERE `Login` = '$login'");
$fetch = $query->fetch_array();
if($fetch['Login']  == null)//если аккаунт с таким логином не найден
{
	$account_hash = md5($login + $password + '5416515613554')
	$mysqli->query("INSERT INTO `accounts` (`AccountID`, `Login`, `Password`, `Status`, `Referals`, `Mail`, `Hash`) VALUES ('', '$login', '$password', '0', '0', '$mail', '$account_hash')");
	$query2 = $mysqli->query("SELECT * FROM `accounts` WHERE `Login` = '$login'");
	$fetch = $query2->fetch_array();
	$account_id = $fetch['AccountID'];
	/* Отправляем письмо */
		// Сообщение
		$message = "Line 1\r\nLine 2\r\nLine 3";

		// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
		$message = wordwrap($message, 70, "Для активации перейдите по ссылке : http://pb.oz-network.ru/core/accounts/update_status.php?account=$account_hash");

		//Отправляем
		mail('$mail', 'Активация аккаунта', $message);
	
	echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/core/players/create_player.php?id='. $account_id .'&name='. $player_name .'">
	';
}
else
{
	echo "ERROR_LOGIN";
}

?>