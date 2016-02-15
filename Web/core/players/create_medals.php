<?php
/*
	Создание медалей персонажа
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

$query = $mysqli->query("SELECT * FROM `players_medals` WHERE `PlayerID` = '$player_id'");
$fetch = $query->fetch_array();
if($fetch['PlayerID']  == null)//если медалей у игрока еще нету
{
	$mysqli->query("INSERT INTO `players_medals` (`PlayerID`, `Ribbons`, `Badges`, `Medals`, `MasterMedals`) VALUES ('$player_id', '0', '0', '0', '0')");
	echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/core/players/create_quest.php?id='. $player_id .'">
	';
}
else// если же есть, выдаем ошибку
{
	echo "ERROR_YES_MEDALS";
}
//INSERT INTO `players_medals` (`PlayerID`, `Ribbons`, `Badges`, `Medals`, `MasterMedals`) VALUES ('1', '1', '1', '1', '1')
?>