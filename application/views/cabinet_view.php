
<?php

print_r($data) ;

//require 'application/core/oauth/yandex.php';
//echo $client_id;
// Идентификатор приложения
$client_id = '06441eef0fa841478f8b2f73d6519117';
// Пароль приложения
$client_secret = 'db2385af9f7b4547929e66f541287def';

// Если скрипт был вызван с указанием параметра "code" в URL,
// то выполняется запрос на получение токена
if (isset($_GET['code']))
{
    require 'application/core/oauth/yandex.php';

    $token =  $result->{'access_token'};
    $error_description = $result->{'error_description'};

    if (isset($token)) {
        echo "<br>Получен токен: ".$token."<br>";

        include ("php/db.php");
        mysql_query("UPDATE users SET token='$token' WHERE login='$_SESSION[login]' AND password='$_SESSION[password]'");
    }

    else {
        echo "<br>.Ошибка: ".$error_description."<br>";
    }
}

print_r($result);
?>
<br>
<a href="https://oauth.yandex.ru/authorize?response_type=code&client_id=06441eef0fa841478f8b2f73d6519117">Login</a>
<br>
<a href='/auth/redirect'>Test connection</a>
<br>
<a href='/'>На главную</a>
