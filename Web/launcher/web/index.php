<?php
/* 
	Новости в лаунчере
	Автор - the__all
*/

echo '
	<!DOCTYPE HTML>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>Project Blackout News</title>
	<link rel="stylesheet" type="text/css" src="http://pb.oz-network.ru/launcher/web/css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
	<div id="bg"></div>
	<div id="bg_news"></div>
	<div id="bg_server_status"></div>
	<div id="last_news">
		<span style="color:#FFFFFF;font-family:Arial;font-size:17px;">
			<a href="http://forum.oz-network.ru/">ПОСЛЕДНИЕ НОВОСТИ</a>
		</span>
	</div>
';

/* Статус серверов */
$ApiStatus = @fsockopen ("127.0.0.1","80",$errno, $errstr, 1);
$LoginStatus = @fsockopen ("127.0.0.1","39190",$errno, $errstr, 1);
$GameStatus = @fsockopen ("127.0.0.1","39191",$errno, $errstr, 1);
$BattleStatus = @fsockopen ("127.0.0.1","40000",$errno, $errstr, 1);

echo '
	<div id="server_status">
		<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">API Server: </span>';
		if($ApiStatus)
		{
			echo '<span style="color:#00FF7F;font-family:Arial;font-size:12px;">ON</span>';
		}
		else
		{
			echo '<span style="color:#FF0000;font-family:Arial;font-size:12px;">OFF</span>';
		}
		echo '<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">&nbsp;&nbsp; Login Server: </span>';
		if($LoginStatus)
		{
			echo '<span style="color:#00FF7F;font-family:Arial;font-size:12px;">ON</span>';
		}
		else
		{
			echo '<span style="color:#FF0000;font-family:Arial;font-size:12px;">OFF</span>';
		}
		echo '<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">&nbsp;&nbsp; GameServer: </span>';
		if($GameStatus)
		{
			echo '<span style="color:#00FF7F;font-family:Arial;font-size:12px;">ON</span>';
		}
		else
		{
			echo '<span style="color:#FF0000;font-family:Arial;font-size:12px;">OFF</span>';
		}
		echo '<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">&nbsp;&nbsp; BattleServer: </span>';
		if($BattleStatus)
		{
			echo '<span style="color:#00FF7F;font-family:Arial;font-size:12px;">ON</span>';
		}
		else
		{
			echo '<span style="color:#FF0000;font-family:Arial;font-size:12px;">OFF</span>';
		}
	echo '</div>';


?>


<div id="new1_name">
	<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
		<a href="http://forum.oz-network.ru/">Тестовая новость</a>
	</span>
</div>
<div id="new1_data">
	<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">17.06.2015</span>
</div>
<div id="bg_speed_news"></div>
<div id="new2_name">
	<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
		<a href="http://forum.oz-network.ru/">Тестовая новость</a>
	</span>
</div>
<div id="new2_data">
	<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">17.06.2015</span>
</div>
<div id="speed_news">
	<h1 class="marquee">
		<span>Бегущая строка с новостями</span>
	</h1>
</div>
<div id="new3_name">
	<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
		<a href="http://forum.oz-network.ru/">Тестовая новость</a>
	</span>
</div>
<div id="new3_data">
	<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">17.06.2015</span>
</div>
<div id="new4_name">
	<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
		<a href="http://forum.oz-network.ru/">Тестовая новость</a>
	</span>
</div>
<div id="new4_data">
	<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">17.06.2015</span>
</div>
<a href="http://pb.oz-network.ru/account.php">
	<div id="donate"></div>
</a>
</body>
</html>