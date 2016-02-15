<?php
/*
	Создание статистики игрока
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

$query = $mysqli->query("SELECT * FROM `players_stats` WHERE `PlayerID` = '$player_id'");
$fetch = $query->fetch_array();
if($fetch['PlayerID']  == null)//если статистики у игрока еще нету, то создаем
{
	$mysqli->query("INSERT INTO `players_stats` (`PlayerID`, `Fights`, `Wins`, `Losts`, `Kills`, `Headshots`, `Deaths`, `Escapes`, `SeasonFights`, `SeasonWins`, `SeasonLosts`, `SeasonKills`, `SeasonHeadshots`, `SeasonDeaths`, `SeasonEscapes`) VALUES ('$player_id', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
	echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/core/players/create_medals.php?id='. $player_id .'">
	';
}
else// если же есть, выдаем ошибку
{
	echo "ERROR_YES_STATS";
}
?>