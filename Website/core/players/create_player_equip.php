<?php
/*
	Экипируем стандартные предметы
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

$query = $mysqli->query("SELECT * FROM `players_equip` WHERE `PlayerID` = '$player_id'");
$fetch = $query->fetch_array();
if($fetch['OwnerID']  == null)//если шмоток у игрока не одето, то одеваем
{
	$mysqli->query("INSERT INTO `players_equip` (`PlayerID`, `WeaponPrimary`, `WeaponSecondary`, `WeaponMelee`, `WeaponThrownNormal`, `WeaponThrownSpecial`, `CharRed`, `CharBlue`, `CharHelmet`, `CharDino`, `CharBeret`) VALUES ('$player_id', '100003004', '601002003', '702001001', '803007001', '904007002', '1001001005', '1001001006', '1102003001', '0', '0')");
	echo '
		<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://'. $site_url .'/core/players/create_stats.php?id='. $player_id .'">
	';
}
else// если же уже одеты, то надеваем стандартные(малоли, восстановить захотелось)
{
	
}
?>