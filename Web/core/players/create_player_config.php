<?php
/*
	Создание базовой конфигурации клиента игры
	Автор - the__all
*/
$player_id = $_GET['id'];
if($player_id == null)
{
	echo "ERROR_NO_ACCOUNT";
	exit;
}
/* Импорт */
include("../config.php");

$query = $mysqli->query("SELECT * FROM `players_config` WHERE `PlayerID` = '$player_id'");
$fetch = $query->fetch_array();
if($fetch['PlayerID']  == null)//если медалей у игрока еще нету
{
	$mysqli->query("INSERT INTO `players_config` (`PlayerID`, `Config`, `Blood`, `Visibility`, `Mao`, `Audio1`, `Audio2`, `AudioEnable`, `MouseSensitivity`, `Vision`) VALUES ('$player_id', '55', '1', '2', '0', '30', '100', '2', '70', '80')");
		//Регистрация успешна
		session_start();//стартуем сессию
		$query = $mysqli->query("SELECT * FROM `accounts` WHERE `AccountID` = '$player_id'");// временный фикс
		$fetch = $query->fetch_array();
      	$_SESSION['AccountID'] = $fetch['AccountID'];//создаем глобальную переменную
		echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/account.php">
		';
}
else// если же есть, выдаем ошибку
{
	echo "ERROR_YES_CONFIG";
}
//INSERT INTO `players_config` (`PlayerID`, `Config`, `Blood`, `Visibility`, `Mao`, `Audio1`, `Audio2`, `AudioEnable`, `MouseSensitivity`, `Vision`) VALUES ('4', '55', '1', '2', '0', '30', '100', '2', '70', '80')
?>