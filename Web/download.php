<?php
session_start();
/*
	Страница загрузки
	Автор - the__all
*/
/* Импорт */
include("core/config.php");

$account_id = $_SESSION['AccountID'];

if($account_id != null)//если сессия не пустая
{
	$query2 = $mysqli->query("SELECT * FROM `accounts` WHERE `AccountID` = '$account_id'");
	$fetch = $query2->fetch_array();
	$referals_count = $fetch['Referals'];
	$account_mail = $fetch['Mail'];
	$query3 = $mysqli->query("SELECT * FROM `players` WHERE `AccountID` = '$account_id'");
	$fetch = $query3->fetch_array();
	$player_name = $fetch['Name'];
	$player_rank = $fetch['Rank'];
	$player_gp = $fetch['GP'];
	$player_money = $fetch['Money'];
	
	echo '
		<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Скачать игру - Project Blackout|OZ-Network</title>
<meta name="description" content="Приватный сервер Project Blackout - первый в России!">
<meta property="og:description" content="Приватный сервер Project Blackout - первый в России!">
<meta property="og:title" content="Project Blackout|OZ-Network">
<meta property="og:type" content="game">
<meta property="og:url" content="http://pb.oz-network.ru/">
<meta property="og:image" content="http://oz-network.ru/images/oz-network.png">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="256">
<meta property="og:image:height" content="256">
<meta name="google-site-verification" content="JdZCABcU7pxKsfQyEPwwetR74w0lYUKpixPDedLrMlY" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
<div id="container">
	<div id="bg"></div>
	<!-- HEADER -->
	<div id="header_bg"></div>
	<a href="http://oz-network.ru/" title="На главную">
		<div id="oz_logo"></div>
	</a>
	<a href="http://allods.oz-network.ru/" title="Легендарные Аллоды Онлайн 4.0 возвращаются!">
		<div id="game_ao"></div>
	</a>
	<a href="http://pb.oz-network.ru/" title="Тактический онлайн-шутер от первого лица">
		<div id="game_pb"></div>
	</a>
	<a href="http://l2.oz-network.ru/" title="Фэнтезийная онлайн игра">
		<div id="game_l2"></div>
	</a>
	<a href="http://nwo.oz-network.ru/" title="Динамичные бои и сложные боссы">
		<div id="game_nwo"></div>
	</a>
	<a href="http://wi.oz-network.ru/" title="Бесплатный тактический онлайн-шутер">
		<div id="game_wi"></div>
	</a>
	<!-- END HEADER -->
	<!-- MENU -->
	<div id="menu_bg">
	</div>
	<a href="http://pb.oz-network.ru">
		<div id="pb_logo"></div>
	</a>
	<div id="Menu">
		<span style="color:#FFFFFF;font-family:Arial;font-size:19px;">
			<a href="http://forum.oz-network.ru">НОВОСТИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">ГАЙДЫ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">РАНГИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">ФОРУМ</a></span>
	</div>
	<div id="Menu2">
		<span style="color:#FFFFFF;font-family:Arial;font-size:19px;">
			<a href="http://pb.oz-network.ru/download.php">СКАЧАТЬ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">МАГАЗИН</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">ОБОИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">ПОМОЩЬ</a></span>
	</div>
	<a href="http://youtube.com/oznetgame/">
		<div id="first_visit"></div>
	</a>
	<!-- END MENU -->
	<!-- DOWNLOAD_PAGE -->
	<div id="page_bg"></div>
	<div id="download_page_bg"></div>
	<div id="download_game">
		<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">Скачать игру</span>
	</div>
	<div id="big_lin"></div>
	<a href="http://files.oz-network.ru/pb/Client.zip">
		<div id="download_client"></div>
	</a>
	<a href="http://files.oz-network.ru/pb/PBLauncher.exe">
		<div id="download_launcher"></div>
	</a>
	<div id="client_info">
		<span style="color:#D3D3D3;font-family:Arial;font-size:13px;">Полноценный клиент игры</span>
	</div>
	<div id="launcher_info">
		<span style="color:#D3D3D3;font-family:Arial;font-size:13px;">Лаунчер игры</span>
	</div>
	<!-- END DOWNLOAD_PAGE -->
	<!-- ACCOUNT_LOGIN_TRUE -->
			<div id="login_bg"></div>
			<div id="account_info">
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">ИНФОРМАЦИЯ ОБ </span>
				<span style="color:#1E90FF;font-family:Arial;font-size:13px;">АККАУНТЕ</span>
			</div>
			<div id="lin"></div>
			<div id="rank" style="position:absolute;left:906px;top:425px;width:20px;height:20px;z-index:31;">
				<img src="images/rank/'. $player_rank .'.gif" id="rank" alt="" style="width:20px;height:20px;">
			</div>
			<div id="nickname">
				<span style="color:#F5FFFA;font-family:Arial;font-size:13px;">'. $player_name .'</span>
			</div>
			<div id="lin2"></div>
			<div id="points">
				<span style="color:#DCDCDC;font-family:Arial;font-size:13px;">Очков: </span>
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">'. $player_gp .'</span>
			</div>
			<div id="pts">
				<span style="color:#DCDCDC;font-family:Arial;font-size:13px;">PTS: </span>
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">'. $player_money .'</span>
			</div>
			<div id="account_email">
				<span style="color:#DCDCDC;font-family:Arial;font-size:13px;">E-Mail: </span>
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">'. $account_mail .'</span>
			</div>

			<div id="edit_account">
				<span style="color:#FFFFFF;font-family:Arial;font-size:16px;">
					<a href="http://'. $site_url .'/account.php">Редактировать</a>
				</span>
			</div>
			<div id="lin3"></div>
			<!-- END ACCOUNT_LOGIN_TRUE -->
	<!-- QUICK_MENU -->
	<div id="quick_menu_bg"></div>
	<div id="menu_icon"></div>
	<div id="quick_menu_text">
		<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">БЫСТРОЕ </span><span style="color:#1E90FF;font-family:Arial;font-size:13px;">МЕНЮ</span>
	</div>
	<a href="http://forum.oz-network.ru">
		<div id="quick_forum"></div>
	</a>
	<a href="http://pb.oz-network.ru/download.php">
		<div id="quick_download"></div>
	</a>
	<a href="http://forum.oz-network.ru/">
		<div id="quick_guids"></div>
	</a>
	<a href="http://support.oz-network.ru/">
		<div id="quick_support"></div>
	</a>
	<!-- END QUCIK_MENU -->
	<!-- FOOTER -->
	<a href="http://pb.oz-network.ru/account.php">
		<div id="donate"></div>
	</a>
	<div id="warning"></div>
	<div id="footer_bg"></div>
	<a href="http://oz-network.ru">
		<div id="footer_logo"></div>
	</a>
	<div id="footer_info">
		<span style="color:#DCDCDC;font-family:Arial;font-size:13px;">2013-2015 | OZ-Network - эмулятор сервера Project Blackout | Все торговые марки принадлежат их владельцам.</span>
	</div>
	<a href="http://zepetto.com/">
		<div id="zepetto_logo"></div>
	</a>
	<!-- END FOOTER -->
</div>
</body>
</html>
	';
}
else
{
	echo '
		<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Скачать игру - Project Blackout|OZ-Network</title>
<meta name="description" content="Приватный сервер Project Blackout - первый в России!">
<meta property="og:description" content="Приватный сервер Project Blackout - первый в России!">
<meta property="og:title" content="Project Blackout|OZ-Network">
<meta property="og:type" content="game">
<meta property="og:url" content="http://pb.oz-network.ru/">
<meta property="og:image" content="http://oz-network.ru/images/oz-network.png">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="256">
<meta property="og:image:height" content="256">
<meta name="google-site-verification" content="JdZCABcU7pxKsfQyEPwwetR74w0lYUKpixPDedLrMlY" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
<div id="container">
	<div id="bg"></div>
	<!-- HEADER -->
	<div id="header_bg"></div>
	<a href="http://oz-network.ru/" title="На главную">
		<div id="oz_logo"></div>
	</a>
	<a href="http://allods.oz-network.ru/" title="Легендарные Аллоды Онлайн 4.0 возвращаются!">
		<div id="game_ao"></div>
	</a>
	<a href="http://pb.oz-network.ru/" title="Тактический онлайн-шутер от первого лица">
		<div id="game_pb"></div>
	</a>
	<a href="http://l2.oz-network.ru/" title="Фэнтезийная онлайн игра">
		<div id="game_l2"></div>
	</a>
	<a href="http://nwo.oz-network.ru/" title="Динамичные бои и сложные боссы">
		<div id="game_nwo"></div>
	</a>
	<a href="http://wi.oz-network.ru/" title="Бесплатный тактический онлайн-шутер">
		<div id="game_wi"></div>
	</a>
	<!-- END HEADER -->
	<!-- MENU -->
	<div id="menu_bg">
	</div>
	<a href="http://pb.oz-network.ru">
		<div id="pb_logo"></div>
	</a>
	<div id="Menu">
		<span style="color:#FFFFFF;font-family:Arial;font-size:19px;">
			<a href="http://forum.oz-network.ru">НОВОСТИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">ГАЙДЫ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">РАНГИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">ФОРУМ</a></span>
	</div>
	<div id="Menu2">
		<span style="color:#FFFFFF;font-family:Arial;font-size:19px;">
			<a href="http://pb.oz-network.ru/download.php">СКАЧАТЬ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">МАГАЗИН</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">ОБОИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
			<a href="http://forum.oz-network.ru">ПОМОЩЬ</a></span>
	</div>
	<a href="http://youtube.com/oznetgame/">
		<div id="first_visit"></div>
	</a>
	<!-- END MENU -->
	<!-- DOWNLOAD_PAGE -->
	<div id="page_bg"></div>
	<div id="download_page_bg"></div>
	<div id="download_game">
		<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">Скачать игру</span>
	</div>
	<div id="big_lin"></div>
	<a href="http://files.oz-network.ru/pb/Client.zip">
		<div id="download_client"></div>
	</a>
	<a href="http://files.oz-network.ru/pb/PBLauncher.exe">
		<div id="download_launcher"></div>
	</a>
	<div id="client_info">
		<span style="color:#D3D3D3;font-family:Arial;font-size:13px;">Полноценный клиент игры</span>
	</div>
	<div id="launcher_info">
		<span style="color:#D3D3D3;font-family:Arial;font-size:13px;">Лаунчер игры</span>
	</div>
	<!-- END DOWNLOAD_PAGE -->
	<!-- LOGIN_PANEL -->
	<div id="login_bg"></div>
	<div id="login_icon"></div>
	<div id="form_text">
		<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">ФОРМА </span><span style="color:#1E90FF;font-family:Arial;font-size:13px;">ВХОДА</span>
	</div>
	<form id="login_account" action="http://'. $site_url .'/core/accounts/login_account.php" method="get">
		<input type="text" id="login_box" name="login" value="" title="&#1051;&#1086;&#1075;&#1080;&#1085;" placeholder="&#1051;&#1086;&#1075;&#1080;&#1085;">
		<input type="password" id="password_box" name="password" value="" title="&#1055;&#1072;&#1088;&#1086;&#1083;&#1100;" placeholder="&#1055;&#1072;&#1088;&#1086;&#1083;&#1100;">
		';
		echo "<div id='login_button' onclick = 'document.getElementById("; echo '"login_account"'; echo ").submit();'>";
		echo '
		
		</div>
	</form>
	<div id="repair_password_text">
		<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Забыли пароль ?</span><span style="color:#000000;font-family:Arial;font-size:13px;"> </span><span style="color:#1E90FF;font-family:Arial;font-size:13px;">Восстановить</span>
	</div>
	<a href="http://pb.oz-network.ru/reg.php">
		<div id="reg_button"></div>
	</a>
	<!-- END LOGIN_PANEL -->
	<!-- QUICK_MENU -->
	<div id="quick_menu_bg"></div>
	<div id="menu_icon"></div>
	<div id="quick_menu_text">
		<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">БЫСТРОЕ </span><span style="color:#1E90FF;font-family:Arial;font-size:13px;">МЕНЮ</span>
	</div>
	<a href="http://forum.oz-network.ru">
		<div id="quick_forum"></div>
	</a>
	<a href="http://pb.oz-network.ru/download.php">
		<div id="quick_download"></div>
	</a>
	<a href="http://forum.oz-network.ru/">
		<div id="quick_guids"></div>
	</a>
	<a href="http://support.oz-network.ru/">
		<div id="quick_support"></div>
	</a>
	<!-- END QUCIK_MENU -->
	<!-- FOOTER -->
	<a href="http://pb.oz-network.ru/account.php">
		<div id="donate"></div>
	</a>
	<div id="warning"></div>
	<div id="footer_bg"></div>
	<a href="http://oz-network.ru">
		<div id="footer_logo"></div>
	</a>
	<div id="footer_info">
		<span style="color:#DCDCDC;font-family:Arial;font-size:13px;">2013-2015 | OZ-Network - эмулятор сервера Project Blackout | Все торговые марки принадлежат их владельцам.</span>
	</div>
	<a href="http://zepetto.com/">
		<div id="zepetto_logo"></div>
	</a>
	<!-- END FOOTER -->
</div>
</body>
</html>
	';
}

?>