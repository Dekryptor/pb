<?php
/*
	Обновление статуса аккаунта
	Автор - the__all
*/
/* Читаем GET-Запрос */
$account_id = $_GET['id'];
if($account_id == null)
{
	echo "ERROR_NO_LOGIN";
	exit;
}
/* Подключение к серверу MySQL */ 
$mysqli = mysqli_connect( 
'localhost', /* Хост, к которому мы подключаемся */ 
'root', /* Имя пользователя */ 
'root', /* Используемый пароль */ 
'pb'); /* База данных для запросов по умолчанию */

$mysqli->query("UPDATE `accounts` SET `Status`='1' WHERE (`AccountID`='$account_id')");

?>