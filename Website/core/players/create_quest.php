<?php
/*
	Создание обучающего набора карт
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

$query = $mysqli->query("SELECT * FROM `players_quests` WHERE `PlayerID` = '$player_id'");
$fetch = $query->fetch_array();
if($fetch['PlayerID']  == null)//если квеста у игрока еще нету
{
	$mysqli->query("INSERT INTO `players_quests` (`PlayerID`, `MissionID`, `CardID`, `Card1_1`, `Card1_2`, `Card1_3`, `Card1_4`, `Card2_1`, `Card2_2`, `Card2_3`, `Card2_4`, `Card3_1`, `Card3_2`, `Card3_3`, `Card3_4`, `Card4_1`, `Card4_2`, `Card4_3`, `Card4_4`, `Card5_1`, `Card5_2`, `Card5_3`, `Card5_4`, `Card6_1`, `Card6_2`, `Card6_3`, `Card6_4`, `Card7_1`, `Card7_2`, `Card7_3`, `Card7_4`, `Card8_1`, `Card8_2`, `Card8_3`, `Card8_4`, `Card9_1`, `Card9_2`, `Card9_3`, `Card9_4`, `Card10_1`, `Card10_2`, `Card10_3`, `Card10_4`, `LastRewardEXP`, `LastRewardCredits`, `RepeatCount`) VALUES ('$player_id', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
	echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/core/players/create_titles.php?id='. $player_id .'">
	';
}
else// если же есть, выдаем ошибку
{
	echo "ERROR_YES_QUEST";
}

?>