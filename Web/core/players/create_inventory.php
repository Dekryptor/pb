<?php
/*
	Создание стартового инвентаря
	Автор - the__all
*/
/* Читаем GET-Запрос */
$player_id = $_GET['id'];
if($player_id == null)
{
	echo "ERROR_NO_ACCOUNT";
	exit;
}
/* Импорт */
include("../config.php");

$query = $mysqli->query("SELECT * FROM `items` WHERE `OwnerID` = '$player_id'");
$fetch = $query->fetch_array();
if($fetch['OwnerID']  == null)//если шмоток у игрока нету, то добродушно выдаем
{
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '100003004', '0', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '200004006', '0', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '300005003', '0', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '400006001', '0', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '601002003', '1', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '702001001', '2', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '803007001', '3', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '904007002', '4', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '1001001005', '5', '1', '100')");
	$mysqli->query("INSERT INTO `items` (`ObjectID`, `OwnerID`, `ItemID`, `Slot`, `Type`, `Count`) VALUES ('', '$player_id', '1001001006', '6', '1', '100')");
	echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/core/players/create_player_equip.php?id='. $player_id .'">
	';
}
else
{
	echo "ERROR_YES_INVENTORY";
}

?>