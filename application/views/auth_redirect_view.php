<a href="/cabinet">Вернуться в кабинет</a>
<br>
<a href="/">На главную</a>
<br>

<?php

require 'application/models/lib/autorization_yandex.php';

$method = 'GetClientInfo';
$param = array(
    'Filter' => array(
        'StatusArch' => 'No'
    )
);

# отправляем запрос
$result = $client->call($method, $param);

# вывод результата
echo "<pre>";
print_r($result);
echo "</pre>";
?>

