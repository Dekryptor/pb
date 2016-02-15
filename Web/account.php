<?php
session_start();
/*
	Страница аккаунта
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
	
	/* Вывод данных */
	echo '
		<!doctype html>
		<html>
		<head>
		<meta charset="UTF-8">
		<title>Аккаунт '. $player_name .' - '. $site_name .'</title>
		<meta name="description" content="Приватный сервер Project Blackout - первый в России!">
		<meta property="og:description" content="Приватный сервер Project Blackout - первый в России!">
		<meta property="og:title" content="Project Blackout|OZ-Network">
		<meta property="og:type" content="game">
		<meta property="og:url" content="http://'. $site_url .'/">
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
					<a href="http://forum.oz-network.ru/index.php?/forum/3-novosti-i-obiavleniia/">НОВОСТИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
					<a href="http://forum.oz-network.ru/index.php?/forum/53-gajdy/">ГАЙДЫ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
					<a href="http://forum.oz-network.ru">РАНГИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
					<a href="http://forum.oz-network.ru">ФОРУМ</a></span>
			</div>
			<div id="Menu2">
				<span style="color:#FFFFFF;font-family:Arial;font-size:19px;">
					<a href="http://pb.oz-network.ru/download.php">СКАЧАТЬ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
					<a href="http://forum.oz-network.ru">МАГАЗИН</a>&nbsp;&nbsp; &nbsp;&nbsp; 
					<a href="http://forum.oz-network.ru">ОБОИ</a>&nbsp;&nbsp; &nbsp;&nbsp; 
					<a href="http://support.oz-network.ru">ПОМОЩЬ</a></span>
			</div>
			<a href="http://youtube.com/oznetgame/">
				<div id="first_visit"></div>
			</a>
			<!-- END MENU -->
			<!-- ACCOUNT_PAGE-->
			<div id="page_bg"></div>
			<div id="account_page_bg"></div>
			<div id="hello_account">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">Это ваш аккаунт , '. $player_name .' &nbsp; Тут вы можете изменить некоторую информацию</span>
			</div>
			<div id="big_lin"></div>
			<div id="edit_password">
				<span style="color:#4E4D4D;font-family:Arial;font-size:13px;">
					<a href="http://pb.oz-network.ru/edit.php?type=password">Изменить пароль</a>
				</span>
			</div>
			<div id="edit_email">
				<span style="color:#4E4D4D;font-family:Arial;font-size:13px;">
					<a href="http://pb.oz-network.ru/edit.php?type=email">Изменить E-Mail</a>
				</span>
			</div>
			<div id="donate_info">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">Пополнить счёт</span>
			</div>
			<div id="big_line2"></div>
			<div id="price">
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><u>
					<a href="http://api.oz-network.ru/">100руб.</a></u>&nbsp;&nbsp; &nbsp;&nbsp; <u>
					<a href="http://api.oz-network.ru/">200руб.(+25руб. бонус)</a></u>&nbsp;&nbsp; &nbsp;&nbsp; <u>
					<a href="http://api.oz-network.ru/">500руб.(+50руб. бонус</a>)</u>&nbsp;&nbsp; &nbsp;&nbsp; <u>
					<a href="http://api.oz-network.ru/">1000руб.(+100руб. бонус)</a></u>
				</span>
			</div>
			<div id="referal_system_text">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">Реферальная программа</span>
			</div>
			<div id="big_lin3"></div>
			<div id="ref_info">
				<span style="color:#A9A9A9;font-family:Arial;font-size:13px;">Приглашайте друзей на сервер! Каждый пришлашенный вами игрок получит 25000 очков и M4A1 S. , а вы получите по 20PTS за каждого приглашенного.</span>
			</div>
			<div id="ref_code">
				<span style="color:#D3D3D3;font-family:Arial;font-size:15px;">Ваш реферальный код: </span>
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">'. $account_id .' &nbsp; </span>
				<span style="color:#A9A9A9;font-family:Arial;font-size:15px;">(необходимо ввести при регистрации)</span>
			</div>
			<div id="ref_count">
				<span style="color:#D3D3D3;font-family:Arial;font-size:15px;">Вы пригласили: </span>
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">'. $referals_count .' пользователей</span>
			</div>
			<!-- END ACCOUNT_PAGE -->
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
			<a href="http://'. $site_url .'/download.php">
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
			<a href="http://'. $site_url .'/account.php">
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
		<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=http://'. $site_url .'/error.php">
	';
}

?>