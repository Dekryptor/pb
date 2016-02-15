<?php
/*
	Создание перок игрока
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

$query = $mysqli->query("SELECT * FROM `players_titles` WHERE `PlayerID` = '$player_id'");
$fetch = $query->fetch_array();
if($fetch['PlayerID']  == null)//если перок у игрока еще нету
{
	$mysqli->query("INSERT INTO `players_titles` (`PlayerID`, `SlotCount`, `TitleEquiped1`, `TitleEquiped2`, `TitleEquiped3`, `titlePos1`, `titlePos2`, `titlePos3`, `titlePos4`, `titlePos5`, `titlePos6`, `title1`, `title2`, `title3`, `title4`, `title5`, `title6`, `title7`, `title8`, `title9`, `title10`, `title11`, `title12`, `title13`, `title14`, `title15`, `title16`, `title17`, `title18`, `title19`, `title20`, `title21`, `title22`, `title23`, `title24`, `title25`, `title26`, `title27`, `title28`, `title29`, `title30`, `title31`, `title32`, `title33`, `title34`, `title35`, `title36`, `title37`, `title38`, `title39`, `title40`, `title41`, `title42`, `title43`, `title44`) VALUES ('$player_id', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
	echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/core/players/create_player_config.php?id='. $player_id .'">
	';
}
else// если же есть, выдаем ошибку
{
	echo "ERROR_YES_TITLES";
}
?>