<?php
/*
	Создание игрока
	Автор - the__all
*/
$account_id = $_GET['id'];
$name = $_GET['name'];
if($account_id == null)
{
	echo "ERROR_NO_ACCOUNT";
	exit;
}
/* Импорт */
include("../config.php");

$query = $mysqli->query("SELECT * FROM `players` WHERE `AccountID` = '$account_id'");
$fetch = $query->fetch_array();
if($fetch['Name']  == null)//если аккаунт с таким логином не найден
{
	$mysqli->query("INSERT INTO `players` (`PlayerID`, `AccountID`, `Name`, `Rank`, `PC_Cafe`, `Emblem`, `Exp`, `GP`, `Money`, `ClanID`) VALUES ('', '$account_id', '$name', '0', '0', '0', '0', '65000', '0', '0')");
	$query2 = $mysqli->query("SELECT * FROM `players` WHERE `AccountID` = '$account_id'");
	$fetch = $query2->fetch_array();
	$player_id = $fetch['PlayerID'];
	echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/core/players/create_inventory.php?id='. $account_id .'">
	';
}
else
{
	echo "ERROR_PLAYER";
}

?>