<?php
# Client's information
$new_campaign_login = 'reamon26limea';
$new_campaign_email = 'reamon26limea@yandex.ru';

# подключаем библиотеку NuSOAP
require_once 'lib/nusoap.php';
# авторизационный токен
$token = '8675635ad28343de86387685e0791ef4';
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




/*
# Initializing soap object
$wsdlurl = 'https://api.direct.yandex.ru/v4/wsdl/';
$client = new nusoap_client($wsdlurl, 'wsdl');
$client->authtype = 'certificate';
$client->decode_utf8 = 0;
$client->soap_defencoding  = 'UTF-8';
$client->certRequest['sslcertfile'] = $cert;
$client->certRequest['sslkeyfile']  = $private;
$client->certRequest['cainfofile']  = $cacert;*/
?>