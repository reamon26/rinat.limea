<?php
# подключаем библиотеку NuSOAP
require_once 'lib/nusoap.php';


# авторизационный токен
//$token = '5d3654273c0748bd8a92570f9785b1cc';
include ("php/db.php");
$result_token = mysql_query("SELECT token FROM users WHERE login='$_SESSION[login]' AND password='$_SESSION[password]'");
$myrow_token = mysql_fetch_array($result_token);
$token = $myrow_token[0];

# локаль
$locale = 'ru';
# путь к WSDL
$wsdlurl = 'https://api-sandbox.direct.yandex.ru/live/v4/wsdl/'; //'https://api.direct.yandex.ru/v4/wsdl/';
#######################################################
# создаем клиента
$client = new nusoap_client($wsdlurl, 'wsdl');
# параметры клиента
$client->authtype = 'basic';
$client->decode_utf8 = 0;
$client->soap_defencoding = 'UTF-8';
# добавляем заголовки
$headers =
    "<token>$token</token>
     <locale>$locale</locale>";
$client->setHeaders($headers);

?>