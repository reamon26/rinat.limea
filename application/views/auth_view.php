<?php

// Идентификатор приложения
$client_id = '06441eef0fa841478f8b2f73d6519117';
// Пароль приложения
$client_secret = '2610de5bc9914da79d22c4fe55bb0359';

// Если скрипт был вызван с указанием параметра "code" в URL,
// то выполняется запрос на получение токена
if (isset($_GET['code']))
{

    // Формирование параметров (тела) POST-запроса с указанием кода подтверждения
    $query = array(
        'grant_type' => 'authorization_code',
        'code' => $_GET['code'],
        'client_id' => $client_id,
        'client_secret' => $client_secret
    );
    $query = http_build_query($query);

    // Формирование заголовков POST-запроса
    $header = "Content-type: application/x-www-form-urlencoded";

    // Выполнение POST-запроса и вывод результата
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => $header,
            'content' => $query
        ),
        'ssl' =>
            array(
                'verify_peer' => false
            )
    );


    function file_get_contents_curl($url, $params) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $data_curl = curl_exec($ch);
        curl_close($ch);

        return $data_curl;
    }



    //$context = stream_context_create($opts);
    $result = file_get_contents_curl('https://oauth.yandex.ru/token', $query);

    $result = json_decode($result);



    $token =  $result->{'access_token'};
    $error_description = $result->{'error_description'};

    if (isset($token)) echo "Получен токен: ".$token."<br>";
    else echo "Ошибка: ".$error_description."<br>";
}

?>
<a href="https://oauth.yandex.ru/authorize?response_type=code&client_id=06441eef0fa841478f8b2f73d6519117">Login</a>
<br>
<a href='/auth/redirect'>Test connection</a>
