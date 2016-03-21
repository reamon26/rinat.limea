<h1>upload</h1>
<?php
require_once 'application/models/lib/autorization_yandex.php';

/*
# Example 
$params = array(
    'CampaignID' => 0,
    'Login' => $new_campaign_login,
    'Name' => "First ad campaign",
    'FIO' => "Owner's Name Surname",
    'StartDate' => '2011-10-19',

    'Strategy' => array(
        'StrategyName' => 'HighestPosition',
    ),

    'EmailNotification' => array(
        'Email' => $new_campaign_email,
        'MoneyWarningValue' => 1,
        'WarnPlaceInterval' => 15,
        'SendWarn' => 'Yes',
        'SendAccNews' => 'Yes'
    )
);

# Creating campaign via SOAP method - CreateOrUpdateCampaign
$result = $client->call("CreateOrUpdateCampaign", array('params' => $params));

echo "Create new campaign:\n";

if ($client->fault) {
    $new_CampaignID = 0;
    echo " SOAP Fault: ";
    print_r($result);
} else {

    $err_msg = $client->getError();
    if ($err_msg) {
        echo " Error: ".$err_msg;
    } else {
        $new_CampaignID = $result;
        echo " CampaignID=".$new_CampaignID."\n";
    }
}

if ($new_CampaignID) {

    $params = array(
        array(
            'CampaignID' => $new_CampaignID
            , 'BannerID' => 0
            , 'Title' => 'Пример заголовка объявления'
            , 'Text' => 'Пример текста объявления'
            , 'Href' => 'http://example.com/catalog/rub1/'
            , 'Geo' => '1, 2, -214'
            , 'Phrases' => array(
                array(
                      'IsRubric' => 'No'
                    , 'Phrase' => 'Пример фразы'
                    , 'PhraseID' => 0
                    , 'Price' => 0.11
                ),
                array(
                      'IsRubric' => 'No'
                    , 'Phrase' => 'Пример фразы +с -минус -словами'
                    , 'PhraseID' => 0
                    , 'Price' => 0.11
                ),
            )

            # Контактная информация
            , 'ContactInfo' => array(
                  'Apart' => 3
                , 'Build' => 2
                , 'City' => 'Моcква'
                , 'CityCode' => 495
                , 'CompanyName' => 'Название компании'
                , 'ContactEmail' => 'email@ya.ru'
                , 'ContactPerson' => 'Контактное лицо'
                , 'Country' => 'Россия'
                , 'CountryCode' => '+7'
                , 'ExtraMessage' => 'Подробнее о товаре/услуге'
                , 'House' => 1
                , 'IMClient' => 'jabber'
                , 'IMLogin' => 'email@ya.ru'
                , 'Phone' => '123-45-67'
                , 'PhoneExt' => '1234'
                , 'Street' => 'улица Главная'
                , 'WorkTime' =>'0;4;10;00;18;00;5;6;13;00;16;00'
            )

            # Быстрые ссылки
            , 'Sitelinks' => array(
                array(
                      'Title' => 'Новости'
                    , 'Href' => 'example.com/search?text=test&action=1'
                ),
                array(
                      'Title' => 'Каталог'
                    , 'Href' => 'example.com/search?text=test&action=2'
                ),
                array(
                      'Title' => 'Контакты'
                    , 'Href' => 'example.com/search?text=test&action=3'
                )
            )
        )
    );

    # Creting banners via SOAP method - CreateOrUpdateBanners
    $result = $client->call("CreateOrUpdateBanners", array("params" => $params));
    echo "Create new banners:\n";
    if ($client->fault) {
        echo " SOAP Fault: ".$result;
    } else {
        echo " List of BannerIDs: ";
        echo join(", ", $result), "\n";
    }

} else {

    echo "Error while ad campaign creating";
}

*/
/*
//Создание отчета
$create_report_params = array(
    'Phrases' => array('купить квартиру', 'купить погода'),
    'GeoID' => array(225)
);
$id_report = $client->call("CreateNewWordstatReport", array("params" => $create_report_params));
//echo "<br>".print_r($id_report)."<br>";
echo "faultcode:  \t" . $id_report[faultcode] . "<br>"; //SOAP-ENV:56
echo "faultstring:  \t" . $id_report[faultstring] . "<br>"; //Request limit exceeded
echo "detail:  \t" . $id_report[detail] . "<br>"; //The limit for 293129546 is 1000, already requested 1030, request attempt number 2

if ($id_report[faultcode] == "SOAP-ENV:56") {
    echo "Ошибка, больше 1000 запросов за день";
} else {

}

//Получение списка отчетов
$report_list = $client->call("GetWordstatReportList");
//echo "<br>report_list_return";
print_r($report_list);
//echo "<br>".$report_list[0][0];
$delete_report_1 = $client->call("DeleteWordstatReport", array("params" => $id_report));
if ($delete_report_1 == 1) echo "<br> <br><br>delete report result id=" . $id_report;
echo "ok<br>";

//Удаление отчетов по номеру
$delete_1 = $client->call("DeleteWordstatReport", array("params" => 99735584));
$delete_2 = $client->call("DeleteWordstatReport", array("params" => 99735585));
$delete_3 = $client->call("DeleteWordstatReport", array("params" => 99735567));
$delete_4 = $client->call("DeleteWordstatReport", array("params" => 99735582));
$delete_5 = $client->call("DeleteWordstatReport", array("params" => 99508130));
echo "<br>delete_report " . print_r($delete_1) . "<br>delete_report " . $delete_2 . "<br>delete_report " . $delete_3 . "<br>delete_report " . $delete_4 . "<br>delete_report " . $delete_5 . "<br>";
*/
/*
//Информация по отчету
$z=0;
while($z!=1) {
    foreach($report_list as $key1 => $value1) {

        echo "$value1[StatusReport] = $value1[ReportID] или $id_report<br>";
        if ($value1[ReportID] == $id_report) {

            if ($value1[StatusReport] == "Done") {
                echo "done";
                $z=1;
            }else{
                echo "гребаный пендинг повторим через секунду<br>";
                $report_list = $client->call("GetWordstatReportList");
                sleep(1);
            }
        }
    }
}


//Получение информации по отчету
$text_report = $client-> call("GetWordstatReport", array("params" => $id_report));
echo "<br>text_report<br>";
//print_r($text_report);
echo "<br><br><br>";



echo '<table cellpadding="5" cellspacing="5" border="1">';
echo "<tr><td>Phrase]</td><td>Shows]</td></tr>";

foreach ($text_report as $keywords) {
    foreach ($keywords[SearchedWith] as $keywords_one) {
        echo "<tr><td>" . $keywords_one[Phrase] . "</td><td>" . $keywords_one[Shows] . "</td></tr>";
    }
}
echo "</table>";

echo "<br>";

echo '<table cellpadding="5" cellspacing="5" border="1">';
echo "<tr><td>Phrase]</td><td>Shows]</td></tr>";
foreach ($text_report as $keywords) {
    foreach ($keywords[SearchedAlso] as $keywords_one) {
        echo "<tr><td>" . $keywords_one[Phrase] . "</td><td>" . $keywords_one[Shows] . "</td></tr>";
    }
}
echo "</table>";

*/
//Удаление отчета
?>
<!--
<td id="beginRegions" style="padding-top: 1em;">


    <div id="quick">
        <b> Быстрый выбор:</b><br>
        <a class="alias" href="#name1" onclick="quick_choose(1);"> Москва и область </a>,<br>
        <a class="alias" href="#name10174" onclick="quick_choose(10174);"> Санкт - Петербург и область </a>,<br>
        <a class="alias" href="#name187" onclick="quick_choose(187);"> Украина</a>,<br>
        <a class="alias" href="#name166" onclick="quick_choose(225); quick_choose(166,1); quick_choose(169,1);"> Россия,
            СНГ и Грузия </a>


    </div>


    <div id="region225" style="display: block;"><a name="name225" style="text-decoration: none" id="link225"
                                                   href="javascript://"
                                                   onclick="regtree(3);regtree(17);regtree(40);regtree(26);regtree(59);regtree(73);regtree(977);regtree(102444);regtree(52);changeSign(225);">
            +</a>&nbsp; <input value="Россия" type="checkbox" id="225_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_"> Россия</label>

        <div id="region3" style="display: none;"><a name="name3" style="text-decoration: none" id="link3"
                                                    href="javascript://"
                                                    onclick="regtree(1);regtree(10645);regtree(10650);regtree(10658);regtree(10672);regtree(10687);regtree(10693);regtree(10699);regtree(10705);regtree(10712);regtree(10772);regtree(10776);regtree(10795);regtree(10802);regtree(10819);regtree(10832);regtree(10841);changeSign(3);">
                +</a>&nbsp; <input value="Центр" type="checkbox" id="225_3_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_3_"> Центр</label>

            <div id="region1" style="display: none;"><a name="name1" style="text-decoration: none" id="link1"
                                                        href="javascript://"
                                                        onclick="regtree(213);regtree(10716);regtree(10717);regtree(98580);regtree(98581);regtree(21735);regtree(98582);regtree(214);regtree(10725);regtree(215);regtree(98584);regtree(20571);regtree(98585);regtree(10729);regtree(21623);regtree(98586);regtree(98587);regtree(98588);regtree(10734);regtree(20728);regtree(100471);regtree(98590);regtree(21647);regtree(98591);regtree(21641);regtree(21635);regtree(98593);regtree(21630);regtree(98594);regtree(98595);regtree(98596);regtree(98597);regtree(98598);regtree(98599);regtree(10745);regtree(98602);regtree(10747);regtree(20576);regtree(98604);regtree(217);regtree(98605);regtree(21621);regtree(98606);regtree(98608);regtree(10754);regtree(98611);regtree(98607);regtree(21619);regtree(10758);regtree(219);regtree(98614);regtree(98615);regtree(98617);regtree(20523);changeSign(1);">
                    +</a>&nbsp; <input value="Москва и область" type="checkbox" id="225_3_1_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_1_"> Москва и
                    область </label>

                <div id="region213" style="display: none;"><a name="name213" style="text-decoration: none" id="link213"
                                                              href="javascript://"
                                                              onclick="regtree(216);regtree(20674);regtree(21624);changeSign(213);">
                        +</a>&nbsp; <input value="Москва" type="checkbox" id="225_3_1_213_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="225_3_1_213_"> Москва</label>

                    <div id="region216" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name216"></a> <input
                            value="Зеленоград" type="checkbox" id="225_3_1_213_216_" name="reg"
                            onclick="javascript:Generate(this)"><label for="225_3_1_213_216_"> Зеленоград</label></div>
                    <div id="region20674" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20674"></a>
                        <input value="Троицк" type="checkbox" id="225_3_1_213_20674_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_213_20674_"> Троицк</label></div>
                    <div id="region21624" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21624"></a>
                        <input value="Щербинка" type="checkbox" id="225_3_1_213_21624_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_213_21624_"> Щербинка</label>
                    </div>
                </div>
                <div id="region10716" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10716"></a> <input
                        value="Балашиха" type="checkbox" id="225_3_1_10716_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_10716_"> Балашиха</label></div>
                <div id="region10717" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10717"></a> <input
                        value="Бронницы" type="checkbox" id="225_3_1_10717_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_10717_"> Бронницы</label></div>
                <div id="region98580" style="display: none;"><a name="name98580" style="text-decoration: none"
                                                                id="link98580" href="javascript://"
                                                                onclick="regtree(10721);changeSign(98580);"> +</a>&nbsp;
                    <input value="Волоколамский район" type="checkbox" id="225_3_1_98580_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98580_"> Волоколамский район </label>

                    <div id="region10721" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10721"></a>
                        <input value="Волоколамск" type="checkbox" id="225_3_1_98580_10721_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98580_10721_">
                            Волоколамск</label></div>
                </div>
                <div id="region98581" style="display: none;"><a name="name98581" style="text-decoration: none"
                                                                id="link98581" href="javascript://"
                                                                onclick="regtree(10722);changeSign(98581);"> +</a>&nbsp;
                    <input value="Воскресенский район" type="checkbox" id="225_3_1_98581_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98581_"> Воскресенский район </label>

                    <div id="region10722" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10722"></a>
                        <input value="Воскресенск" type="checkbox" id="225_3_1_98581_10722_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98581_10722_">
                            Воскресенск</label></div>
                </div>
                <div id="region21735" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21735"></a> <input
                        value="Дзержинский" type="checkbox" id="225_3_1_21735_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_21735_"> Дзержинский</label></div>
                <div id="region98582" style="display: none;"><a name="name98582" style="text-decoration: none"
                                                                id="link98582" href="javascript://"
                                                                onclick="regtree(10723);changeSign(98582);"> +</a>&nbsp;
                    <input value="Дмитровский район" type="checkbox" id="225_3_1_98582_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98582_"> Дмитровский район </label>

                    <div id="region10723" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10723"></a>
                        <input value="Дмитров" type="checkbox" id="225_3_1_98582_10723_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98582_10723_"> Дмитров</label>
                    </div>
                </div>
                <div id="region214" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name214"></a> <input
                        value="Долгопрудный" type="checkbox" id="225_3_1_214_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_214_"> Долгопрудный</label></div>
                <div id="region10725" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10725"></a> <input
                        value="Домодедово" type="checkbox" id="225_3_1_10725_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_10725_"> Домодедово</label></div>
                <div id="region215" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name215"></a> <input
                        value="Дубна" type="checkbox" id="225_3_1_215_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_215_"> Дубна</label></div>
                <div id="region98584" style="display: none;"><a name="name98584" style="text-decoration: none"
                                                                id="link98584" href="javascript://"
                                                                onclick="regtree(10727);changeSign(98584);"> +</a>&nbsp;
                    <input value="Егорьевский район" type="checkbox" id="225_3_1_98584_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98584_"> Егорьевский район </label>

                    <div id="region10727" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10727"></a>
                        <input value="Егорьевск" type="checkbox" id="225_3_1_98584_10727_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98584_10727_"> Егорьевск</label>
                    </div>
                </div>
                <div id="region20571" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20571"></a> <input
                        value="Жуковский" type="checkbox" id="225_3_1_20571_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_20571_"> Жуковский</label></div>
                <div id="region98585" style="display: none;"><a name="name98585" style="text-decoration: none"
                                                                id="link98585" href="javascript://"
                                                                onclick="regtree(10728);changeSign(98585);"> +</a>&nbsp;
                    <input value="Зарайский район" type="checkbox" id="225_3_1_98585_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98585_"> Зарайский район </label>

                    <div id="region10728" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10728"></a>
                        <input value="Зарайск" type="checkbox" id="225_3_1_98585_10728_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98585_10728_"> Зарайск</label>
                    </div>
                </div>
                <div id="region10729" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10729"></a> <input
                        value="Звенигород" type="checkbox" id="225_3_1_10729_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_10729_"> Звенигород</label></div>
                <div id="region21623" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21623"></a> <input
                        value="Ивантеевка" type="checkbox" id="225_3_1_21623_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_21623_"> Ивантеевка</label></div>
                <div id="region98586" style="display: none;"><a name="name98586" style="text-decoration: none"
                                                                id="link98586" href="javascript://"
                                                                onclick="regtree(21627);regtree(10731);changeSign(98586);">
                        +</a>&nbsp; <input value="Истринский район" type="checkbox" id="225_3_1_98586_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="225_3_1_98586_"> Истринский
                        район </label>

                    <div id="region21627" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21627"></a>
                        <input value="Дедовск" type="checkbox" id="225_3_1_98586_21627_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98586_21627_"> Дедовск</label>
                    </div>
                    <div id="region10731" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10731"></a>
                        <input value="Истра" type="checkbox" id="225_3_1_98586_10731_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98586_10731_"> Истра</label>
                    </div>
                </div>
                <div id="region98587" style="display: none;"><a name="name98587" style="text-decoration: none"
                                                                id="link98587" href="javascript://"
                                                                onclick="regtree(10732);changeSign(98587);"> +</a>&nbsp;
                    <input value="Каширский район" type="checkbox" id="225_3_1_98587_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98587_"> Каширский район </label>

                    <div id="region10732" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10732"></a>
                        <input value="Кашира" type="checkbox" id="225_3_1_98587_10732_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98587_10732_"> Кашира</label>
                    </div>
                </div>
                <div id="region98588" style="display: none;"><a name="name98588" style="text-decoration: none"
                                                                id="link98588" href="javascript://"
                                                                onclick="regtree(10733);changeSign(98588);"> +</a>&nbsp;
                    <input value="Клинский район" type="checkbox" id="225_3_1_98588_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98588_"> Клинский район </label>

                    <div id="region10733" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10733"></a>
                        <input value="Клин" type="checkbox" id="225_3_1_98588_10733_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98588_10733_"> Клин</label></div>
                </div>
                <div id="region10734" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10734"></a> <input
                        value="Коломна" type="checkbox" id="225_3_1_10734_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_10734_"> Коломна</label></div>
                <div id="region20728" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20728"></a> <input
                        value="Королёв" type="checkbox" id="225_3_1_20728_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_20728_"> Королёв</label></div>
                <div id="region100471" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name100471"></a> <input
                        value="Красноармейск" type="checkbox" id="225_3_1_100471_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_100471_"> Красноармейск</label></div>
                <div id="region98590" style="display: none;"><a name="name98590" style="text-decoration: none"
                                                                id="link98590" href="javascript://"
                                                                onclick="regtree(10735);regtree(21745);changeSign(98590);">
                        +</a>&nbsp; <input value="Красногорский район" type="checkbox" id="225_3_1_98590_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="225_3_1_98590_">
                        Красногорский район </label>

                    <div id="region10735" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10735"></a>
                        <input value="Красногорск" type="checkbox" id="225_3_1_98590_10735_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98590_10735_">
                            Красногорск</label></div>
                    <div id="region21745" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21745"></a>
                        <input value="Нахабино" type="checkbox" id="225_3_1_98590_21745_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98590_21745_"> Нахабино</label>
                    </div>
                </div>
                <div id="region21647" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21647"></a> <input
                        value="Краснознаменск" type="checkbox" id="225_3_1_21647_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_21647_"> Краснознаменск</label></div>
                <div id="region98591" style="display: none;"><a name="name98591" style="text-decoration: none"
                                                                id="link98591" href="javascript://"
                                                                onclick="regtree(10719);changeSign(98591);"> +</a>&nbsp;
                    <input value="Ленинский район" type="checkbox" id="225_3_1_98591_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98591_"> Ленинский район </label>

                    <div id="region10719" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10719"></a>
                        <input value="Видное" type="checkbox" id="225_3_1_98591_10719_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98591_10719_"> Видное</label>
                    </div>
                </div>
                <div id="region21641" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21641"></a> <input
                        value="Лобня" type="checkbox" id="225_3_1_21641_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_21641_"> Лобня</label></div>
                <div id="region21635" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21635"></a> <input
                        value="Лосино-Петровский" type="checkbox" id="225_3_1_21635_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_21635_"> Лосино - Петровский</label>
                </div>
                <div id="region98593" style="display: none;"><a name="name98593" style="text-decoration: none"
                                                                id="link98593" href="javascript://"
                                                                onclick="regtree(10737);changeSign(98593);"> +</a>&nbsp;
                    <input value="Луховицкий район" type="checkbox" id="225_3_1_98593_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98593_"> Луховицкий район </label>

                    <div id="region10737" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10737"></a>
                        <input value="Луховицы" type="checkbox" id="225_3_1_98593_10737_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98593_10737_"> Луховицы</label>
                    </div>
                </div>
                <div id="region21630" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21630"></a> <input
                        value="Лыткарино" type="checkbox" id="225_3_1_21630_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_21630_"> Лыткарино</label></div>
                <div id="region98594" style="display: none;"><a name="name98594" style="text-decoration: none"
                                                                id="link98594" href="javascript://"
                                                                onclick="regtree(10738);changeSign(98594);"> +</a>&nbsp;
                    <input value="Люберецкий район" type="checkbox" id="225_3_1_98594_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98594_"> Люберецкий район </label>

                    <div id="region10738" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10738"></a>
                        <input value="Люберцы" type="checkbox" id="225_3_1_98594_10738_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98594_10738_"> Люберцы</label>
                    </div>
                </div>
                <div id="region98595" style="display: none;"><a name="name98595" style="text-decoration: none"
                                                                id="link98595" href="javascript://"
                                                                onclick="regtree(10739);changeSign(98595);"> +</a>&nbsp;
                    <input value="Можайский район" type="checkbox" id="225_3_1_98595_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98595_"> Можайский район </label>

                    <div id="region10739" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10739"></a>
                        <input value="Можайск" type="checkbox" id="225_3_1_98595_10739_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98595_10739_"> Можайск</label>
                    </div>
                </div>
                <div id="region98596" style="display: none;"><a name="name98596" style="text-decoration: none"
                                                                id="link98596" href="javascript://"
                                                                onclick="regtree(10740);changeSign(98596);"> +</a>&nbsp;
                    <input value="Мытищинский район" type="checkbox" id="225_3_1_98596_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98596_"> Мытищинский район </label>

                    <div id="region10740" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10740"></a>
                        <input value="Мытищи" type="checkbox" id="225_3_1_98596_10740_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98596_10740_"> Мытищи</label>
                    </div>
                </div>
                <div id="region98597" style="display: none;"><a name="name98597" style="text-decoration: none"
                                                                id="link98597" href="javascript://"
                                                                onclick="regtree(10715);regtree(10741);changeSign(98597);">
                        +</a>&nbsp; <input value="Наро-Фоминский район" type="checkbox" id="225_3_1_98597_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="225_3_1_98597_"> Наро -
                        Фоминский район </label>

                    <div id="region10715" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10715"></a>
                        <input value="Апрелевка" type="checkbox" id="225_3_1_98597_10715_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98597_10715_"> Апрелевка</label>
                    </div>
                    <div id="region10741" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10741"></a>
                        <input value="Наро-Фоминск" type="checkbox" id="225_3_1_98597_10741_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98597_10741_"> Наро -
                            Фоминск</label></div>
                </div>
                <div id="region98598" style="display: none;"><a name="name98598" style="text-decoration: none"
                                                                id="link98598" href="javascript://"
                                                                onclick="regtree(10742);regtree(21656);regtree(21642);changeSign(98598);">
                        +</a>&nbsp; <input value="Ногинский район" type="checkbox" id="225_3_1_98598_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="225_3_1_98598_"> Ногинский
                        район </label>

                    <div id="region10742" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10742"></a>
                        <input value="Ногинск" type="checkbox" id="225_3_1_98598_10742_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98598_10742_"> Ногинск</label>
                    </div>
                    <div id="region21656" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21656"></a>
                        <input value="Старая Купавна" type="checkbox" id="225_3_1_98598_21656_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98598_21656_"> Старая
                            Купавна </label></div>
                    <div id="region21642" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21642"></a>
                        <input value="Электроугли" type="checkbox" id="225_3_1_98598_21642_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98598_21642_">
                            Электроугли</label></div>
                </div>
                <div id="region98599" style="display: none;"><a name="name98599" style="text-decoration: none"
                                                                id="link98599" href="javascript://"
                                                                onclick="regtree(21646);regtree(21625);regtree(10743);changeSign(98599);">
                        +</a>&nbsp; <input value="Одинцовский район" type="checkbox" id="225_3_1_98599_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="225_3_1_98599_"> Одинцовский
                        район </label>

                    <div id="region21646" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21646"></a>
                        <input value="Голицыно" type="checkbox" id="225_3_1_98599_21646_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98599_21646_"> Голицыно</label>
                    </div>
                    <div id="region21625" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21625"></a>
                        <input value="Кубинка" type="checkbox" id="225_3_1_98599_21625_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98599_21625_"> Кубинка</label>
                    </div>
                    <div id="region10743" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10743"></a>
                        <input value="Одинцово" type="checkbox" id="225_3_1_98599_10743_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98599_10743_"> Одинцово</label>
                    </div>
                </div>
                <div id="region10745" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10745"></a> <input
                        value="Орехово-Зуево" type="checkbox" id="225_3_1_10745_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_10745_"> Орехово - Зуево</label></div>
                <div id="region98602" style="display: none;"><a name="name98602" style="text-decoration: none"
                                                                id="link98602" href="javascript://"
                                                                onclick="regtree(10746);changeSign(98602);"> +</a>&nbsp;
                    <input value="Павлово-Посадский район" type="checkbox" id="225_3_1_98602_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98602_"> Павлово - Посадский
                        район </label>

                    <div id="region10746" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10746"></a>
                        <input value="Павловский Посад" type="checkbox" id="225_3_1_98602_10746_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98602_10746_"> Павловский
                            Посад </label></div>
                </div>
                <div id="region10747" style="display: none;"><a name="name10747" style="text-decoration: none"
                                                                id="link10747" href="javascript://"
                                                                onclick="regtree(37147);changeSign(10747);"> +</a>&nbsp;
                    <input value="Подольск" type="checkbox" id="225_3_1_10747_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_10747_"> Подольск</label>

                    <div id="region37147" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name37147"></a>
                        <input value="Климовск" type="checkbox" id="225_3_1_10747_37147_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_10747_37147_"> Климовск</label>
                    </div>
                </div>
                <div id="region20576" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20576"></a> <input
                        value="Протвино" type="checkbox" id="225_3_1_20576_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_20576_"> Протвино</label></div>
                <div id="region98604" style="display: none;"><a name="name98604" style="text-decoration: none"
                                                                id="link98604" href="javascript://"
                                                                onclick="regtree(10748);changeSign(98604);"> +</a>&nbsp;
                    <input value="Пушкинский район" type="checkbox" id="225_3_1_98604_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98604_"> Пушкинский район </label>

                    <div id="region10748" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10748"></a>
                        <input value="Пушкино" type="checkbox" id="225_3_1_98604_10748_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98604_10748_"> Пушкино</label>
                    </div>
                </div>
                <div id="region217" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name217"></a> <input
                        value="Пущино" type="checkbox" id="225_3_1_217_" name="reg" onclick="javascript:Generate(this)"><label
                        for="225_3_1_217_"> Пущино</label></div>
                <div id="region98605" style="display: none;"><a name="name98605" style="text-decoration: none"
                                                                id="link98605" href="javascript://"
                                                                onclick="regtree(10750);changeSign(98605);"> +</a>&nbsp;
                    <input value="Раменский район" type="checkbox" id="225_3_1_98605_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98605_"> Раменский район </label>

                    <div id="region10750" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10750"></a>
                        <input value="Раменское" type="checkbox" id="225_3_1_98605_10750_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98605_10750_"> Раменское</label>
                    </div>
                </div>
                <div id="region21621" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21621"></a> <input
                        value="Реутов" type="checkbox" id="225_3_1_21621_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_21621_"> Реутов</label></div>
                <div id="region98606" style="display: none;"><a name="name98606" style="text-decoration: none"
                                                                id="link98606" href="javascript://"
                                                                onclick="regtree(10751);changeSign(98606);"> +</a>&nbsp;
                    <input value="Рузский район" type="checkbox" id="225_3_1_98606_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98606_"> Рузский район </label>

                    <div id="region10751" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10751"></a>
                        <input value="Руза" type="checkbox" id="225_3_1_98606_10751_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98606_10751_"> Руза</label></div>
                </div>
                <div id="region98608" style="display: none;"><a name="name98608" style="text-decoration: none"
                                                                id="link98608" href="javascript://"
                                                                onclick="regtree(10752);regtree(21645);changeSign(98608);">
                        +</a>&nbsp; <input value="Сергиево-Посадский район" type="checkbox" id="225_3_1_98608_"
                                           name="reg" onclick="javascript:Generate(this)"><label for="225_3_1_98608_">
                        Сергиево - Посадский район </label>

                    <div id="region10752" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10752"></a>
                        <input value="Сергиев Посад" type="checkbox" id="225_3_1_98608_10752_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98608_10752_"> Сергиев
                            Посад </label></div>
                    <div id="region21645" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21645"></a>
                        <input value="Хотьково" type="checkbox" id="225_3_1_98608_21645_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98608_21645_"> Хотьково</label>
                    </div>
                </div>
                <div id="region10754" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10754"></a> <input
                        value="Серпухов" type="checkbox" id="225_3_1_10754_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_10754_"> Серпухов</label></div>
                <div id="region98611" style="display: none;"><a name="name98611" style="text-decoration: none"
                                                                id="link98611" href="javascript://"
                                                                onclick="regtree(10755);changeSign(98611);"> +</a>&nbsp;
                    <input value="Солнечногорский район" type="checkbox" id="225_3_1_98611_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98611_"> Солнечногорский
                        район </label>

                    <div id="region10755" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10755"></a>
                        <input value="Солнечногорск" type="checkbox" id="225_3_1_98611_10755_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98611_10755_">
                            Солнечногорск</label></div>
                </div>
                <div id="region98607" style="display: none;"><a name="name98607" style="text-decoration: none"
                                                                id="link98607" href="javascript://"
                                                                onclick="regtree(10756);changeSign(98607);"> +</a>&nbsp;
                    <input value="Ступинский район" type="checkbox" id="225_3_1_98607_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98607_"> Ступинский район </label>

                    <div id="region10756" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10756"></a>
                        <input value="Ступино" type="checkbox" id="225_3_1_98607_10756_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98607_10756_"> Ступино</label>
                    </div>
                </div>
                <div id="region21619" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21619"></a> <input
                        value="Фрязино" type="checkbox" id="225_3_1_21619_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_21619_"> Фрязино</label></div>
                <div id="region10758" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10758"></a> <input
                        value="Химки" type="checkbox" id="225_3_1_10758_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_10758_"> Химки</label></div>
                <div id="region219" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name219"></a> <input
                        value="Черноголовка" type="checkbox" id="225_3_1_219_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_219_"> Черноголовка</label></div>
                <div id="region98614" style="display: none;"><a name="name98614" style="text-decoration: none"
                                                                id="link98614" href="javascript://"
                                                                onclick="regtree(10761);changeSign(98614);"> +</a>&nbsp;
                    <input value="Чеховский район" type="checkbox" id="225_3_1_98614_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98614_"> Чеховский район </label>

                    <div id="region10761" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10761"></a>
                        <input value="Чехов" type="checkbox" id="225_3_1_98614_10761_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98614_10761_"> Чехов</label>
                    </div>
                </div>
                <div id="region98615" style="display: none;"><a name="name98615" style="text-decoration: none"
                                                                id="link98615" href="javascript://"
                                                                onclick="regtree(10762);changeSign(98615);"> +</a>&nbsp;
                    <input value="Шатурский район" type="checkbox" id="225_3_1_98615_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98615_"> Шатурский район </label>

                    <div id="region10762" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10762"></a>
                        <input value="Шатура" type="checkbox" id="225_3_1_98615_10762_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98615_10762_"> Шатура</label>
                    </div>
                </div>
                <div id="region98617" style="display: none;"><a name="name98617" style="text-decoration: none"
                                                                id="link98617" href="javascript://"
                                                                onclick="regtree(10765);changeSign(98617);"> +</a>&nbsp;
                    <input value="Щелковский район" type="checkbox" id="225_3_1_98617_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_1_98617_"> Щелковский район </label>

                    <div id="region10765" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10765"></a>
                        <input value="Щелково" type="checkbox" id="225_3_1_98617_10765_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_1_98617_10765_"> Щелково</label>
                    </div>
                </div>
                <div id="region20523" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20523"></a> <input
                        value="Электросталь" type="checkbox" id="225_3_1_20523_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_1_20523_"> Электросталь</label></div>
            </div>
            <div id="region10645" style="display: none;"><a name="name10645" style="text-decoration: none"
                                                            id="link10645" href="javascript://"
                                                            onclick="regtree(98697);regtree(4);regtree(10646);regtree(10649);regtree(98716);regtree(98717);changeSign(10645);">
                    +</a>&nbsp; <input value="Белгородская область" type="checkbox" id="225_3_10645_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10645_"> Белгородская
                    область </label>

                <div id="region98697" style="display: none;"><a name="name98697" style="text-decoration: none"
                                                                id="link98697" href="javascript://"
                                                                onclick="regtree(20192);changeSign(98697);"> +</a>&nbsp;
                    <input value="Алексеевский район" type="checkbox" id="225_3_10645_98697_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10645_98697_"> Алексеевский
                        район </label>

                    <div id="region20192" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20192"></a>
                        <input value="Алексеевка" type="checkbox" id="225_3_10645_98697_20192_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10645_98697_20192_">
                            Алексеевка</label></div>
                </div>
                <div id="region4" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name4"></a> <input
                        value="Белгород" type="checkbox" id="225_3_10645_4_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10645_4_"> Белгород</label></div>
                <div id="region10646" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10646"></a> <input
                        value="Губкин" type="checkbox" id="225_3_10645_10646_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10645_10646_"> Губкин</label></div>
                <div id="region10649" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10649"></a> <input
                        value="Старый Оскол" type="checkbox" id="225_3_10645_10649_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10645_10649_"> Старый Оскол </label></div>
                <div id="region98716" style="display: none;"><a name="name98716" style="text-decoration: none"
                                                                id="link98716" href="javascript://"
                                                                onclick="regtree(20196);changeSign(98716);"> +</a>&nbsp;
                    <input value="Шебекинский район" type="checkbox" id="225_3_10645_98716_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10645_98716_"> Шебекинский
                        район </label>

                    <div id="region20196" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20196"></a>
                        <input value="Шебекино" type="checkbox" id="225_3_10645_98716_20196_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10645_98716_20196_">
                            Шебекино</label></div>
                </div>
                <div id="region98717" style="display: none;"><a name="name98717" style="text-decoration: none"
                                                                id="link98717" href="javascript://"
                                                                onclick="regtree(20587);changeSign(98717);"> +</a>&nbsp;
                    <input value="Яковлевский район" type="checkbox" id="225_3_10645_98717_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10645_98717_"> Яковлевский
                        район </label>

                    <div id="region20587" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20587"></a>
                        <input value="Строитель" type="checkbox" id="225_3_10645_98717_20587_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10645_98717_20587_">
                            Строитель</label></div>
                </div>
            </div>
            <div id="region10650" style="display: none;"><a name="name10650" style="text-decoration: none"
                                                            id="link10650" href="javascript://"
                                                            onclick="regtree(191);regtree(10653);changeSign(10650);">
                    +</a>&nbsp; <input value="Брянская область" type="checkbox" id="225_3_10650_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10650_"> Брянская
                    область </label>

                <div id="region191" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name191"></a> <input
                        value="Брянск" type="checkbox" id="225_3_10650_191_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10650_191_"> Брянск</label></div>
                <div id="region10653" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10653"></a> <input
                        value="Клинцы" type="checkbox" id="225_3_10650_10653_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10650_10653_"> Клинцы</label></div>
            </div>
            <div id="region10658" style="display: none;"><a name="name10658" style="text-decoration: none"
                                                            id="link10658" href="javascript://"
                                                            onclick="regtree(98745);regtree(192);regtree(10661);regtree(98750);regtree(10664);regtree(10668);regtree(98755);changeSign(10658);">
                    +</a>&nbsp; <input value="Владимирская область" type="checkbox" id="225_3_10658_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10658_"> Владимирская
                    область </label>

                <div id="region98745" style="display: none;"><a name="name98745" style="text-decoration: none"
                                                                id="link98745" href="javascript://"
                                                                onclick="regtree(10656);changeSign(98745);"> +</a>&nbsp;
                    <input value="Александровский район" type="checkbox" id="225_3_10658_98745_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10658_98745_"> Александровский
                        район </label>

                    <div id="region10656" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10656"></a>
                        <input value="Александров" type="checkbox" id="225_3_10658_98745_10656_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10658_98745_10656_">
                            Александров</label></div>
                </div>
                <div id="region192" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name192"></a> <input
                        value="Владимир" type="checkbox" id="225_3_10658_192_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10658_192_"> Владимир</label></div>
                <div id="region10661" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10661"></a> <input
                        value="Гусь-Хрустальный" type="checkbox" id="225_3_10658_10661_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10658_10661_"> Гусь - Хрустальный</label>
                </div>
                <div id="region98750" style="display: none;"><a name="name98750" style="text-decoration: none"
                                                                id="link98750" href="javascript://"
                                                                onclick="regtree(10663);changeSign(98750);"> +</a>&nbsp;
                    <input value="Киржачский район" type="checkbox" id="225_3_10658_98750_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10658_98750_"> Киржачский
                        район </label>

                    <div id="region10663" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10663"></a>
                        <input value="Киржач" type="checkbox" id="225_3_10658_98750_10663_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10658_98750_10663_"> Киржач</label>
                    </div>
                </div>
                <div id="region10664" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10664"></a> <input
                        value="Ковров" type="checkbox" id="225_3_10658_10664_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10658_10664_"> Ковров</label></div>
                <div id="region10668" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10668"></a> <input
                        value="Муром" type="checkbox" id="225_3_10658_10668_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10658_10668_"> Муром</label></div>
                <div id="region98755" style="display: none;"><a name="name98755" style="text-decoration: none"
                                                                id="link98755" href="javascript://"
                                                                onclick="regtree(37129);changeSign(98755);"> +</a>&nbsp;
                    <input value="Петушинский район" type="checkbox" id="225_3_10658_98755_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10658_98755_"> Петушинский
                        район </label>

                    <div id="region37129" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name37129"></a>
                        <input value="Покров" type="checkbox" id="225_3_10658_98755_37129_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10658_98755_37129_"> Покров</label>
                    </div>
                </div>
            </div>
            <div id="region10672" style="display: none;"><a name="name10672" style="text-decoration: none"
                                                            id="link10672" href="javascript://"
                                                            onclick="regtree(193);regtree(98787);changeSign(10672);">
                    +</a>&nbsp; <input value="Воронежская область" type="checkbox" id="225_3_10672_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10672_"> Воронежская
                    область </label>

                <div id="region193" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name193"></a> <input
                        value="Воронеж" type="checkbox" id="225_3_10672_193_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10672_193_"> Воронеж</label></div>
                <div id="region98787" style="display: none;"><a name="name98787" style="text-decoration: none"
                                                                id="link98787" href="javascript://"
                                                                onclick="regtree(10681);changeSign(98787);"> +</a>&nbsp;
                    <input value="Россошанский район" type="checkbox" id="225_3_10672_98787_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10672_98787_"> Россошанский
                        район </label>

                    <div id="region10681" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10681"></a>
                        <input value="Россошь" type="checkbox" id="225_3_10672_98787_10681_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10672_98787_10681_">
                            Россошь</label></div>
                </div>
            </div>
            <div id="region10687" style="display: none;"><a name="name10687" style="text-decoration: none"
                                                            id="link10687" href="javascript://"
                                                            onclick="regtree(5);regtree(10689);regtree(10691);changeSign(10687);">
                    +</a>&nbsp; <input value="Ивановская область" type="checkbox" id="225_3_10687_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10687_"> Ивановская
                    область </label>

                <div id="region5" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name5"></a> <input
                        value="Иваново" type="checkbox" id="225_3_10687_5_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10687_5_"> Иваново</label></div>
                <div id="region10689" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10689"></a> <input
                        value="Кинешма" type="checkbox" id="225_3_10687_10689_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10687_10689_"> Кинешма</label></div>
                <div id="region10691" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10691"></a> <input
                        value="Шуя" type="checkbox" id="225_3_10687_10691_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10687_10691_"> Шуя</label></div>
            </div>
            <div id="region10693" style="display: none;"><a name="name10693" style="text-decoration: none"
                                                            id="link10693" href="javascript://"
                                                            onclick="regtree(6);regtree(98826);regtree(967);changeSign(10693);">
                    +</a>&nbsp; <input value="Калужская область" type="checkbox" id="225_3_10693_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10693_"> Калужская
                    область </label>

                <div id="region6" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name6"></a> <input
                        value="Калуга" type="checkbox" id="225_3_10693_6_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10693_6_"> Калуга</label></div>
                <div id="region98826" style="display: none;"><a name="name98826" style="text-decoration: none"
                                                                id="link98826" href="javascript://"
                                                                onclick="regtree(10697);changeSign(98826);"> +</a>&nbsp;
                    <input value="Малоярославецкий район" type="checkbox" id="225_3_10693_98826_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10693_98826_"> Малоярославецкий
                        район </label>

                    <div id="region10697" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10697"></a>
                        <input value="Малоярославец" type="checkbox" id="225_3_10693_98826_10697_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10693_98826_10697_">
                            Малоярославец</label></div>
                </div>
                <div id="region967" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name967"></a> <input
                        value="Обнинск" type="checkbox" id="225_3_10693_967_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10693_967_"> Обнинск</label></div>
            </div>
            <div id="region10699" style="display: none;"><a name="name10699" style="text-decoration: none"
                                                            id="link10699" href="javascript://"
                                                            onclick="regtree(7);changeSign(10699);"> +</a>&nbsp; <input
                    value="Костромская область" type="checkbox" id="225_3_10699_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_3_10699_"> Костромская область </label>

                <div id="region7" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name7"></a> <input
                        value="Кострома" type="checkbox" id="225_3_10699_7_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10699_7_"> Кострома</label></div>
            </div>
            <div id="region10705" style="display: none;"><a name="name10705" style="text-decoration: none"
                                                            id="link10705" href="javascript://"
                                                            onclick="regtree(10710);regtree(8);regtree(20707);changeSign(10705);">
                    +</a>&nbsp; <input value="Курская область" type="checkbox" id="225_3_10705_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10705_"> Курская
                    область </label>

                <div id="region10710" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10710"></a> <input
                        value="Железногорск" type="checkbox" id="225_3_10705_10710_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10705_10710_"> Железногорск</label></div>
                <div id="region8" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name8"></a> <input
                        value="Курск" type="checkbox" id="225_3_10705_8_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10705_8_"> Курск</label></div>
                <div id="region20707" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20707"></a> <input
                        value="Курчатов" type="checkbox" id="225_3_10705_20707_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10705_20707_"> Курчатов</label></div>
            </div>
            <div id="region10712" style="display: none;"><a name="name10712" style="text-decoration: none"
                                                            id="link10712" href="javascript://"
                                                            onclick="regtree(10713);regtree(9);changeSign(10712);">
                    +</a>&nbsp; <input value="Липецкая область" type="checkbox" id="225_3_10712_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10712_"> Липецкая
                    область </label>

                <div id="region10713" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10713"></a> <input
                        value="Елец" type="checkbox" id="225_3_10712_10713_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10712_10713_"> Елец</label></div>
                <div id="region9" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name9"></a> <input
                        value="Липецк" type="checkbox" id="225_3_10712_9_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10712_9_"> Липецк</label></div>
            </div>
            <div id="region10772" style="display: none;"><a name="name10772" style="text-decoration: none"
                                                            id="link10772" href="javascript://"
                                                            onclick="regtree(10);changeSign(10772);"> +</a>&nbsp; <input
                    value="Орловская область" type="checkbox" id="225_3_10772_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_3_10772_"> Орловская область </label>

                <div id="region10" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10"></a> <input
                        value="Орёл" type="checkbox" id="225_3_10772_10_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10772_10_"> Орёл</label></div>
            </div>
            <div id="region10776" style="display: none;"><a name="name10776" style="text-decoration: none"
                                                            id="link10776" href="javascript://"
                                                            onclick="regtree(10773);regtree(11);changeSign(10776);">
                    +</a>&nbsp; <input value="Рязанская область" type="checkbox" id="225_3_10776_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10776_"> Рязанская
                    область </label>

                <div id="region10773" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10773"></a> <input
                        value="Касимов" type="checkbox" id="225_3_10776_10773_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10776_10773_"> Касимов</label></div>
                <div id="region11" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11"></a> <input
                        value="Рязань" type="checkbox" id="225_3_10776_11_" name="reg"
  td                    onclick="javascript:Generate(this)"><label for="225_3_10776_11_"> Рязань</label></div>
            </div>
            <div id="region10795" style="display: none;"><a name="name10795" style="text-decoration: none"
                                                            id="link10795" href="javascript://"
                                                            onclick="regtree(98958);regtree(98959);regtree(12);regtree(98981);changeSign(10795);">
                    +</a>&nbsp; <input value="Смоленская область" type="checkbox" id="225_3_10795_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10795_"> Смоленская
                    область </label>

                <div id="region98958" style="display: none;"><a name="name98958" style="text-decoration: none"
                                                                id="link98958" href="javascript://"
                                                                onclick="regtree(10782);changeSign(98958);"> +</a>&nbsp;
                    <input value="Вяземский район" type="checkbox" id="225_3_10795_98958_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10795_98958_"> Вяземский район </label>

                    <div id="region10782" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10782"></a>
                        <input value="Вязьма" type="checkbox" id="225_3_10795_98958_10782_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10795_98958_10782_"> Вязьма</label>
                    </div>
                </div>
                <div id="region98959" style="display: none;"><a name="name98959" style="text-decoration: none"
                                                                id="link98959" href="javascript://"
                                                                onclick="regtree(10783);changeSign(98959);"> +</a>&nbsp;
                    <input value="Гагаринский район" type="checkbox" id="225_3_10795_98959_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10795_98959_"> Гагаринский
                        район </label>

                    <div id="region10783" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10783"></a>
                        <input value="Гагарин" type="checkbox" id="225_3_10795_98959_10783_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10795_98959_10783_">
                            Гагарин</label></div>
                </div>
                <div id="region12" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name12"></a> <input
                        value="Смоленск" type="checkbox" id="225_3_10795_12_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10795_12_"> Смоленск</label></div>
                <div id="region98981" style="display: none;"><a name="name98981" style="text-decoration: none"
                                                                id="link98981" href="javascript://"
                                                                onclick="regtree(10801);changeSign(98981);"> +</a>&nbsp;
                    <input value="Ярцевский район" type="checkbox" id="225_3_10795_98981_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10795_98981_"> Ярцевский район </label>

                    <div id="region10801" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10801"></a>
                        <input value="Ярцево" type="checkbox" id="225_3_10795_98981_10801_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10795_98981_10801_"> Ярцево</label>
                    </div>
                </div>
            </div>
            <div id="region10802" style="display: none;"><a name="name10802" style="text-decoration: none"
                                                            id="link10802" href="javascript://"
                                                            onclick="regtree(10803);regtree(13);changeSign(10802);">
                    +</a>&nbsp; <input value="Тамбовская область" type="checkbox" id="225_3_10802_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10802_"> Тамбовская
                    область </label>

                <div id="region10803" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10803"></a> <input
                        value="Мичуринск" type="checkbox" id="225_3_10802_10803_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10802_10803_"> Мичуринск</label></div>
                <div id="region13" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name13"></a> <input
                        value="Тамбов" type="checkbox" id="225_3_10802_13_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10802_13_"> Тамбов</label></div>
            </div>
            <div id="region10819" style="display: none;"><a name="name10819" style="text-decoration: none"
                                                            id="link10819" href="javascript://"
                                                            onclick="regtree(99008);regtree(10807);regtree(10811);regtree(99019);regtree(10820);regtree(14);regtree(99039);changeSign(10819);">
                    +</a>&nbsp; <input value="Тверская область" type="checkbox" id="225_3_10819_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10819_"> Тверская
                    область </label>

                <div id="region99008" style="display: none;"><a name="name99008" style="text-decoration: none"
                                                                id="link99008" href="javascript://"
                                                                onclick="regtree(10805);changeSign(99008);"> +</a>&nbsp;
                    <input value="Бологовский район" type="checkbox" id="225_3_10819_99008_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10819_99008_"> Бологовский
                        район </label>

                    <div id="region10805" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10805"></a>
                        <input value="Бологое" type="checkbox" id="225_3_10819_99008_10805_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10819_99008_10805_">
                            Бологое</label></div>
                </div>
                <div id="region10807" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10807"></a> <input
                        value="Вышний Волочёк" type="checkbox" id="225_3_10819_10807_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10819_10807_"> Вышний Волочёк </label>
                </div>
                <div id="region10811" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10811"></a> <input
                        value="Кимры" type="checkbox" id="225_3_10819_10811_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10819_10811_"> Кимры</label></div>
                <div id="region99019" style="display: none;"><a name="name99019" style="text-decoration: none"
                                                                id="link99019" href="javascript://"
                                                                onclick="regtree(10812);changeSign(99019);"> +</a>&nbsp;
                    <input value="Конаковский район" type="checkbox" id="225_3_10819_99019_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10819_99019_"> Конаковский
                        район </label>

                    <div id="region10812" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10812"></a>
                        <input value="Конаково" type="checkbox" id="225_3_10819_99019_10812_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10819_99019_10812_">
                            Конаково</label></div>
                </div>
                <div id="region10820" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10820"></a> <input
                        value="Ржев" type="checkbox" id="225_3_10819_10820_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10819_10820_"> Ржев</label></div>
                <div id="region14" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name14"></a> <input
                        value="Тверь" type="checkbox" id="225_3_10819_14_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10819_14_"> Тверь</label></div>
                <div id="region99039" style="display: none;"><a name="name99039" style="text-decoration: none"
                                                                id="link99039" href="javascript://"
                                                                onclick="regtree(10824);changeSign(99039);"> +</a>&nbsp;
                    <input value="Удомельский район" type="checkbox" id="225_3_10819_99039_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10819_99039_"> Удомельский
                        район </label>

                    <div id="region10824" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10824"></a>
                        <input value="Удомля" type="checkbox" id="225_3_10819_99039_10824_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10819_99039_10824_"> Удомля</label>
                    </div>
                </div>
            </div>
            <div id="region10832" style="display: none;"><a name="name10832" style="text-decoration: none"
                                                            id="link10832" href="javascript://"
                                                            onclick="regtree(99044);regtree(10828);regtree(10830);regtree(15);changeSign(10832);">
                    +</a>&nbsp; <input value="Тульская область" type="checkbox" id="225_3_10832_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10832_"> Тульская
                    область </label>

                <div id="region99044" style="display: none;"><a name="name99044" style="text-decoration: none"
                                                                id="link99044" href="javascript://"
                                                                onclick="regtree(20667);changeSign(99044);"> +</a>&nbsp;
                    <input value="Богородицкий район" type="checkbox" id="225_3_10832_99044_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10832_99044_"> Богородицкий
                        район </label>

                    <div id="region20667" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20667"></a>
                        <input value="Богородицк" type="checkbox" id="225_3_10832_99044_20667_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10832_99044_20667_">
                            Богородицк</label></div>
                </div>
                <div id="region10828" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10828"></a> <input
                        value="Ефремов" type="checkbox" id="225_3_10832_10828_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10832_10828_"> Ефремов</label></div>
                <div id="region10830" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10830"></a> <input
                        value="Новомосковск" type="checkbox" id="225_3_10832_10830_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10832_10830_"> Новомосковск</label></div>
                <div id="region15" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name15"></a> <input
                        value="Тула" type="checkbox" id="225_3_10832_15_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10832_15_"> Тула</label></div>
            </div>
            <div id="region10841" style="display: none;"><a name="name10841" style="text-decoration: none"
                                                            id="link10841" href="javascript://"
                                                            onclick="regtree(10837);regtree(10839);regtree(99078);regtree(99079);regtree(16);changeSign(10841);">
                    +</a>&nbsp; <input value="Ярославская область" type="checkbox" id="225_3_10841_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_3_10841_"> Ярославская
                    область </label>

                <div id="region10837" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10837"></a> <input
                        value="Переславль-Залесский" type="checkbox" id="225_3_10841_10837_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10841_10837_"> Переславль -
                        Залесский</label></div>
                <div id="region10839" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10839"></a> <input
                        value="Рыбинск" type="checkbox" id="225_3_10841_10839_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10841_10839_"> Рыбинск</label></div>
                <div id="region99078" style="display: none;"><a name="name99078" style="text-decoration: none"
                                                                id="link99078" href="javascript://"
                                                                onclick="regtree(21154);changeSign(99078);"> +</a>&nbsp;
                    <input value="Тутаевский район" type="checkbox" id="225_3_10841_99078_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10841_99078_"> Тутаевский
                        район </label>

                    <div id="region21154" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21154"></a>
                        <input value="Тутаев" type="checkbox" id="225_3_10841_99078_21154_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10841_99078_21154_"> Тутаев</label>
                    </div>
                </div>
                <div id="region99079" style="display: none;"><a name="name99079" style="text-decoration: none"
                                                                id="link99079" href="javascript://"
                                                                onclick="regtree(10840);changeSign(99079);"> +</a>&nbsp;
                    <input value="Угличский район" type="checkbox" id="225_3_10841_99079_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_3_10841_99079_"> Угличский район </label>

                    <div id="region10840" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10840"></a>
                        <input value="Углич" type="checkbox" id="225_3_10841_99079_10840_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_3_10841_99079_10840_"> Углич</label>
                    </div>
                </div>
                <div id="region16" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name16"></a> <input
                        value="Ярославль" type="checkbox" id="225_3_10841_16_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_3_10841_16_"> Ярославль</label></div>
            </div>
        </div>
        <div id="region17" style="display: none;"><a name="name17" style="text-decoration: none" id="link17"
                                                     href="javascript://"
                                                     onclick="regtree(10174);regtree(10842);regtree(10853);regtree(10857);regtree(10897);regtree(10176);regtree(10904);regtree(10926);regtree(10933);regtree(10939);changeSign(17);">
                +</a>&nbsp; <input value="Северо-Запад" type="checkbox" id="225_17_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_17_"> Северо - Запад</label>

            <div id="region10174" style="display: none;"><a name="name10174" style="text-decoration: none"
                                                            id="link10174" href="javascript://"
                                                            onclick="regtree(98620);regtree(98621);regtree(98622);regtree(98623);regtree(98624);regtree(98625);regtree(98626);regtree(98629);regtree(98630);regtree(98631);regtree(2);regtree(98632);regtree(10891);regtree(98633);regtree(98634);changeSign(10174);">
                    +</a>&nbsp; <input value="Санкт-Петербург и Ленинградская область" type="checkbox"
                                       id="225_17_10174_" name="reg" onclick="javascript:Generate(this)"><label
                    for="225_17_10174_"> Санкт - Петербург и Ленинградская область </label>

                <div id="region98620" style="display: none;"><a name="name98620" style="text-decoration: none"
                                                                id="link98620" href="javascript://"
                                                                onclick="regtree(10864);changeSign(98620);"> +</a>&nbsp;
                    <input value="Волховский район" type="checkbox" id="225_17_10174_98620_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98620_"> Волховский
                        район </label>

                    <div id="region10864" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10864"></a>
                        <input value="Волхов" type="checkbox" id="225_17_10174_98620_10864_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98620_10864_">
                            Волхов</label></div>
                </div>
                <div id="region98621" style="display: none;"><a name="name98621" style="text-decoration: none"
                                                                id="link98621" href="javascript://"
                                                                onclick="regtree(10865);changeSign(98621);"> +</a>&nbsp;
                    <input value="Всеволожский район" type="checkbox" id="225_17_10174_98621_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98621_"> Всеволожский
                        район </label>

                    <div id="region10865" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10865"></a>
                        <input value="Всеволожск" type="checkbox" id="225_17_10174_98621_10865_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98621_10865_">
                            Всеволожск</label></div>
                </div>
                <div id="region98622" style="display: none;"><a name="name98622" style="text-decoration: none"
                                                                id="link98622" href="javascript://"
                                                                onclick="regtree(969);changeSign(98622);"> +</a>&nbsp;
                    <input value="Выборгский район" type="checkbox" id="225_17_10174_98622_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98622_"> Выборгский
                        район </label>

                    <div id="region969" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name969"></a> <input
                            value="Выборг" type="checkbox" id="225_17_10174_98622_969_" name="reg"
                            onclick="javascript:Generate(this)"><label for="225_17_10174_98622_969_"> Выборг</label>
                    </div>
                </div>
                <div id="region98623" style="display: none;"><a name="name98623" style="text-decoration: none"
                                                                id="link98623" href="javascript://"
                                                                onclick="regtree(10867);changeSign(98623);"> +</a>&nbsp;
                    <input value="Гатчинский район" type="checkbox" id="225_17_10174_98623_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98623_"> Гатчинский
                        район </label>

                    <div id="region10867" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10867"></a>
                        <input value="Гатчина" type="checkbox" id="225_17_10174_98623_10867_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98623_10867_">
                            Гатчина</label></div>
                </div>
                <div id="region98624" style="display: none;"><a name="name98624" style="text-decoration: none"
                                                                id="link98624" href="javascript://"
                                                                onclick="regtree(10870);changeSign(98624);"> +</a>&nbsp;
                    <input value="Кингисеппский район" type="checkbox" id="225_17_10174_98624_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98624_"> Кингисеппский
                        район </label>

                    <div id="region10870" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10870"></a>
                        <input value="Кингисепп" type="checkbox" id="225_17_10174_98624_10870_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98624_10870_">
                            Кингисепп</label></div>
                </div>
                <div id="region98625" style="display: none;"><a name="name98625" style="text-decoration: none"
                                                                id="link98625" href="javascript://"
                                                                onclick="regtree(10871);changeSign(98625);"> +</a>&nbsp;
                    <input value="Киришский район" type="checkbox" id="225_17_10174_98625_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98625_"> Киришский
                        район </label>

                    <div id="region10871" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10871"></a>
                        <input value="Кириши" type="checkbox" id="225_17_10174_98625_10871_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98625_10871_">
                            Кириши</label></div>
                </div>
                <div id="region98626" style="display: none;"><a name="name98626" style="text-decoration: none"
                                                                id="link98626" href="javascript://"
                                                                onclick="regtree(10872);changeSign(98626);"> +</a>&nbsp;
                    <input value="Кировский район" type="checkbox" id="225_17_10174_98626_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98626_"> Кировский
                        район </label>

                    <div id="region10872" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10872"></a>
                        <input value="Кировск" type="checkbox" id="225_17_10174_98626_10872_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98626_10872_">
                            Кировск</label></div>
                </div>
                <div id="region98629" style="display: none;"><a name="name98629" style="text-decoration: none"
                                                                id="link98629" href="javascript://"
                                                                onclick="regtree(10876);changeSign(98629);"> +</a>&nbsp;
                    <input value="Лужский район" type="checkbox" id="225_17_10174_98629_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98629_"> Лужский район </label>

                    <div id="region10876" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10876"></a>
                        <input value="Луга" type="checkbox" id="225_17_10174_98629_10876_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98629_10876_"> Луга</label>
                    </div>
                </div>
                <div id="region98630" style="display: none;"><a name="name98630" style="text-decoration: none"
                                                                id="link98630" href="javascript://"
                                                                onclick="regtree(10881);changeSign(98630);"> +</a>&nbsp;
                    <input value="Подпорожский район" type="checkbox" id="225_17_10174_98630_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98630_"> Подпорожский
                        район </label>

                    <div id="region10881" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10881"></a>
                        <input value="Подпорожье" type="checkbox" id="225_17_10174_98630_10881_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98630_10881_">
                            Подпорожье</label></div>
                </div>
                <div id="region98631" style="display: none;"><a name="name98631" style="text-decoration: none"
                                                                id="link98631" href="javascript://"
                                                                onclick="regtree(10883);changeSign(98631);"> +</a>&nbsp;
                    <input value="Приозерский район" type="checkbox" id="225_17_10174_98631_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98631_"> Приозерский
                        район </label>

                    <div id="region10883" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10883"></a>
                        <input value="Приозерск" type="checkbox" id="225_17_10174_98631_10883_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98631_10883_">
                            Приозерск</label></div>
                </div>
                <div id="region2" style="display: none;"><a name="name2" style="text-decoration: none" id="link2"
                                                            href="javascript://"
                                                            onclick="regtree(20293);regtree(20297);changeSign(2);">
                        +</a>&nbsp; <input value="Санкт-Петербург" type="checkbox" id="225_17_10174_2_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="225_17_10174_2_"> Санкт -
                        Петербург</label>

                    <div id="region20293" style="display: none;"><a name="name20293" style="text-decoration: none"
                                                                    id="link20293" href="javascript://"
                                                                    onclick="regtree(26081);changeSign(20293);"> +</a>&nbsp;
                        <input value="Колпинский район" type="checkbox" id="225_17_10174_2_20293_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_2_20293_"> Колпинский
                            район </label>

                        <div id="region26081" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name26081"></a>
                            <input value="Колпино" type="checkbox" id="225_17_10174_2_20293_26081_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_17_10174_2_20293_26081_">
                                Колпино</label></div>
                    </div>
                    <div id="region20297" style="display: none;"><a name="name20297" style="text-decoration: none"
                                                                    id="link20297" href="javascript://"
                                                                    onclick="regtree(10884);changeSign(20297);"> +</a>&nbsp;
                        <input value="Пушкинский район" type="checkbox" id="225_17_10174_2_20297_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_2_20297_"> Пушкинский
                            район </label>

                        <div id="region10884" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10884"></a>
                            <input value="Пушкин" type="checkbox" id="225_17_10174_2_20297_10884_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_17_10174_2_20297_10884_">
                                Пушкин</label></div>
                    </div>
                </div>
                <div id="region98632" style="display: none;"><a name="name98632" style="text-decoration: none"
                                                                id="link98632" href="javascript://"
                                                                onclick="regtree(10888);changeSign(98632);"> +</a>&nbsp;
                    <input value="Сланцевский район" type="checkbox" id="225_17_10174_98632_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98632_"> Сланцевский
                        район </label>

                    <div id="region10888" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10888"></a>
                        <input value="Сланцы" type="checkbox" id="225_17_10174_98632_10888_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98632_10888_">
                            Сланцы</label></div>
                </div>
                <div id="region10891" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10891"></a> <input
                        value="Сосновый Бор" type="checkbox" id="225_17_10174_10891_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10174_10891_"> Сосновый Бор </label>
                </div>
                <div id="region98633" style="display: none;"><a name="name98633" style="text-decoration: none"
                                                                id="link98633" href="javascript://"
                                                                onclick="regtree(10892);changeSign(98633);"> +</a>&nbsp;
                    <input value="Тихвинский район" type="checkbox" id="225_17_10174_98633_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98633_"> Тихвинский
                        район </label>

                    <div id="region10892" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10892"></a>
                        <input value="Тихвин" type="checkbox" id="225_17_10174_98633_10892_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98633_10892_">
                            Тихвин</label></div>
                </div>
                <div id="region98634" style="display: none;"><a name="name98634" style="text-decoration: none"
                                                                id="link98634" href="javascript://"
                                                                onclick="regtree(10893);changeSign(98634);"> +</a>&nbsp;
                    <input value="Тосненский район" type="checkbox" id="225_17_10174_98634_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10174_98634_"> Тосненский
                        район </label>

                    <div id="region10893" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10893"></a>
                        <input value="Тосно" type="checkbox" id="225_17_10174_98634_10893_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10174_98634_10893_"> Тосно</label>
                    </div>
                </div>
            </div>
            <div id="region10842" style="display: none;"><a name="name10842" style="text-decoration: none"
                                                            id="link10842" href="javascript://"
                                                            onclick="regtree(20);regtree(10846);regtree(10849);changeSign(10842);">
                    +</a>&nbsp; <input value="Архангельская область" type="checkbox" id="225_17_10842_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_17_10842_"> Архангельская
                    область </label>

                <div id="region20" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20"></a> <input
                        value="Архангельск" type="checkbox" id="225_17_10842_20_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10842_20_"> Архангельск</label></div>
                <div id="region10846" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10846"></a> <input
                        value="Котлас" type="checkbox" id="225_17_10842_10846_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10842_10846_"> Котлас</label></div>
                <div id="region10849" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10849"></a> <input
                        value="Северодвинск" type="checkbox" id="225_17_10842_10849_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10842_10849_"> Северодвинск</label></div>
            </div>
            <div id="region10853" style="display: none;"><a name="name10853" style="text-decoration: none"
                                                            id="link10853" href="javascript://"
                                                            onclick="regtree(21);regtree(968);changeSign(10853);"> +</a>&nbsp;
                <input value="Вологодская область" type="checkbox" id="225_17_10853_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_17_10853_"> Вологодская область </label>

                <div id="region21" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21"></a> <input
                        value="Вологда" type="checkbox" id="225_17_10853_21_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10853_21_"> Вологда</label></div>
                <div id="region968" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name968"></a> <input
                        value="Череповец" type="checkbox" id="225_17_10853_968_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10853_968_"> Череповец</label></div>
            </div>
            <div id="region10857" style="display: none;"><a name="name10857" style="text-decoration: none"
                                                            id="link10857" href="javascript://"
                                                            onclick="regtree(22);regtree(10860);changeSign(10857);">
                    +</a>&nbsp; <input value="Калининградская область" type="checkbox" id="225_17_10857_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_17_10857_"> Калининградская
                    область </label>

                <div id="region22" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name22"></a> <input
                        value="Калининград" type="checkbox" id="225_17_10857_22_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10857_22_"> Калининград</label></div>
                <div id="region10860" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10860"></a> <input
                        value="Советск" type="checkbox" id="225_17_10857_10860_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10857_10860_"> Советск</label></div>
            </div>
            <div id="region10897" style="display: none;"><a name="name10897" style="text-decoration: none"
                                                            id="link10897" href="javascript://"
                                                            onclick="regtree(10894);regtree(101749);regtree(10896);regtree(23);regtree(20155);changeSign(10897);">
                    +</a>&nbsp; <input value="Мурманская область" type="checkbox" id="225_17_10897_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_17_10897_"> Мурманская
                    область </label>

                <div id="region10894" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10894"></a> <input
                        value="Апатиты" type="checkbox" id="225_17_10897_10894_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10897_10894_"> Апатиты</label></div>
                <div id="region101749" style="display: none;"><a name="name101749" style="text-decoration: none"
                                                                 id="link101749" href="javascript://"
                                                                 onclick="regtree(10895);changeSign(101749);"> +</a>&nbsp;
                    <input value="Кандалакшский район" type="checkbox" id="225_17_10897_101749_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10897_101749_"> Кандалакшский
                        район </label>

                    <div id="region10895" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10895"></a>
                        <input value="Кандалакша" type="checkbox" id="225_17_10897_101749_10895_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10897_101749_10895_">
                            Кандалакша</label></div>
                </div>
                <div id="region10896" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10896"></a> <input
                        value="Мончегорск" type="checkbox" id="225_17_10897_10896_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10897_10896_"> Мончегорск</label></div>
                <div id="region23" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name23"></a> <input
                        value="Мурманск" type="checkbox" id="225_17_10897_23_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10897_23_"> Мурманск</label></div>
                <div id="region20155" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20155"></a> <input
                        value="Оленегорск" type="checkbox" id="225_17_10897_20155_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10897_20155_"> Оленегорск</label></div>
            </div>
            <div id="region10176" style="display: none;"><a name="name10176" style="text-decoration: none"
                                                            id="link10176" href="javascript://"
                                                            onclick="regtree(10902);changeSign(10176);"> +</a>&nbsp;
                <input value="Ненецкий автономный округ" type="checkbox" id="225_17_10176_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_17_10176_"> Ненецкий автономный
                    округ </label>

                <div id="region10902" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10902"></a> <input
                        value="Нарьян-Мар" type="checkbox" id="225_17_10176_10902_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10176_10902_"> Нарьян - Мар</label></div>
            </div>
            <div id="region10904" style="display: none;"><a name="name10904" style="text-decoration: none"
                                                            id="link10904" href="javascript://"
                                                            onclick="regtree(99146);regtree(24);regtree(99161);changeSign(10904);">
                    +</a>&nbsp; <input value="Новгородская область" type="checkbox" id="225_17_10904_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_17_10904_"> Новгородская
                    область </label>

                <div id="region99146" style="display: none;"><a name="name99146" style="text-decoration: none"
                                                                id="link99146" href="javascript://"
                                                                onclick="regtree(10906);changeSign(99146);"> +</a>&nbsp;
                    <input value="Боровичский район" type="checkbox" id="225_17_10904_99146_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10904_99146_"> Боровичский
                        район </label>

                    <div id="region10906" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10906"></a>
                        <input value="Боровичи" type="checkbox" id="225_17_10904_99146_10906_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10904_99146_10906_">
                            Боровичи</label></div>
                </div>
                <div id="region24" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name24"></a> <input
                        value="Великий Новгород" type="checkbox" id="225_17_10904_24_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10904_24_"> Великий Новгород </label>
                </div>
                <div id="region99161" style="display: none;"><a name="name99161" style="text-decoration: none"
                                                                id="link99161" href="javascript://"
                                                                onclick="regtree(10923);changeSign(99161);"> +</a>&nbsp;
                    <input value="Старорусский район" type="checkbox" id="225_17_10904_99161_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10904_99161_"> Старорусский
                        район </label>

                    <div id="region10923" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10923"></a>
                        <input value="Старая Русса" type="checkbox" id="225_17_10904_99161_10923_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10904_99161_10923_"> Старая
                            Русса </label></div>
                </div>
            </div>
            <div id="region10926" style="display: none;"><a name="name10926" style="text-decoration: none"
                                                            id="link10926" href="javascript://"
                                                            onclick="regtree(10928);regtree(25);changeSign(10926);">
                    +</a>&nbsp; <input value="Псковская область" type="checkbox" id="225_17_10926_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_17_10926_"> Псковская
                    область </label>

                <div id="region10928" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10928"></a> <input
                        value="Великие Луки" type="checkbox" id="225_17_10926_10928_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10926_10928_"> Великие Луки </label>
                </div>
                <div id="region25" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name25"></a> <input
                        value="Псков" type="checkbox" id="225_17_10926_25_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10926_25_"> Псков</label></div>
            </div>
            <div id="region10933" style="display: none;"><a name="name10933" style="text-decoration: none"
                                                            id="link10933" href="javascript://"
                                                            onclick="regtree(99193);regtree(10935);regtree(18);regtree(99203);regtree(110934);changeSign(10933);">
                    +</a>&nbsp; <input value="Республика Карелия" type="checkbox" id="225_17_10933_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_17_10933_"> Республика
                    Карелия </label>

                <div id="region99193" style="display: none;"><a name="name99193" style="text-decoration: none"
                                                                id="link99193" href="javascript://"
                                                                onclick="regtree(10934);changeSign(99193);"> +</a>&nbsp;
                    <input value="Кондопожский район" type="checkbox" id="225_17_10933_99193_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10933_99193_"> Кондопожский
                        район </label>

                    <div id="region10934" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10934"></a>
                        <input value="Кондопога" type="checkbox" id="225_17_10933_99193_10934_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10933_99193_10934_">
                            Кондопога</label></div>
                </div>
                <div id="region10935" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10935"></a> <input
                        value="Костомукша" type="checkbox" id="225_17_10933_10935_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10933_10935_"> Костомукша</label></div>
                <div id="region18" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name18"></a> <input
                        value="Петрозаводск" type="checkbox" id="225_17_10933_18_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10933_18_"> Петрозаводск</label></div>
                <div id="region99203" style="display: none;"><a name="name99203" style="text-decoration: none"
                                                                id="link99203" href="javascript://"
                                                                onclick="regtree(10936);changeSign(99203);"> +</a>&nbsp;
                    <input value="Сегежский район" type="checkbox" id="225_17_10933_99203_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10933_99203_"> Сегежский
                        район </label>

                    <div id="region10936" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10936"></a>
                        <input value="Сегежа" type="checkbox" id="225_17_10933_99203_10936_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10933_99203_10936_">
                            Сегежа</label></div>
                </div>
                <div id="region110934" style="display: none;"><a name="name110934" style="text-decoration: none"
                                                                 id="link110934" href="javascript://"
                                                                 onclick="regtree(10937);changeSign(110934);"> +</a>&nbsp;
                    <input value="Сортавальский район" type="checkbox" id="225_17_10933_110934_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10933_110934_"> Сортавальский
                        район </label>

                    <div id="region10937" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10937"></a>
                        <input value="Сортавала" type="checkbox" id="225_17_10933_110934_10937_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10933_110934_10937_">
                            Сортавала</label></div>
                </div>
            </div>
            <div id="region10939" style="display: none;"><a name="name10939" style="text-decoration: none"
                                                            id="link10939" href="javascript://"
                                                            onclick="regtree(10940);regtree(10941);regtree(99210);regtree(19);regtree(10944);regtree(10945);changeSign(10939);">
                    +</a>&nbsp; <input value="Республика Коми" type="checkbox" id="225_17_10939_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_17_10939_"> Республика
                    Коми </label>

                <div id="region10940" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10940"></a> <input
                        value="Воркута" type="checkbox" id="225_17_10939_10940_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10939_10940_"> Воркута</label></div>
                <div id="region10941" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10941"></a> <input
                        value="Инта" type="checkbox" id="225_17_10939_10941_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10939_10941_"> Инта</label></div>
                <div id="region99210" style="display: none;"><a name="name99210" style="text-decoration: none"
                                                                id="link99210" href="javascript://"
                                                                onclick="regtree(10942);changeSign(99210);"> +</a>&nbsp;
                    <input value="Район Печора" type="checkbox" id="225_17_10939_99210_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_17_10939_99210_"> Район Печора </label>

                    <div id="region10942" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10942"></a>
                        <input value="Печора" type="checkbox" id="225_17_10939_99210_10942_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_17_10939_99210_10942_">
                            Печора</label></div>
                </div>
                <div id="region19" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name19"></a> <input
                        value="Сыктывкар" type="checkbox" id="225_17_10939_19_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10939_19_"> Сыктывкар</label></div>
                <div id="region10944" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10944"></a> <input
                        value="Усинск" type="checkbox" id="225_17_10939_10944_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10939_10944_"> Усинск</label></div>
                <div id="region10945" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10945"></a> <input
                        value="Ухта" type="checkbox" id="225_17_10939_10945_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_17_10939_10945_"> Ухта</label></div>
            </div>
        </div>
        <div id="region40" style="display: none;"><a name="name40" style="text-decoration: none" id="link40"
                                                     href="javascript://"
                                                     onclick="regtree(11070);regtree(11079);regtree(11084);regtree(11095);regtree(11108);regtree(11111);regtree(11077);regtree(11117);regtree(11119);regtree(11131);regtree(11146);regtree(11148);regtree(11153);regtree(11156);changeSign(40);">
                +</a>&nbsp; <input value="Поволжье" type="checkbox" id="225_40_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_40_"> Поволжье</label>

            <div id="region11070" style="display: none;"><a name="name11070" style="text-decoration: none"
                                                            id="link11070" href="javascript://"
                                                            onclick="regtree(20020);regtree(46);regtree(11071);changeSign(11070);">
                    +</a>&nbsp; <input value="Кировская область" type="checkbox" id="225_40_11070_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11070_"> Кировская
                    область </label>

                <div id="region20020" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20020"></a> <input
                        value="Вятские Поляны" type="checkbox" id="225_40_11070_20020_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11070_20020_"> Вятские Поляны </label>
                </div>
                <div id="region46" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name46"></a> <input
                        value="Киров" type="checkbox" id="225_40_11070_46_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11070_46_"> Киров</label></div>
                <div id="region11071" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11071"></a> <input
                        value="Кирово-Чепецк" type="checkbox" id="225_40_11070_11071_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11070_11071_"> Кирово - Чепецк</label>
                </div>
            </div>
            <div id="region11079" style="display: none;"><a name="name11079" style="text-decoration: none"
                                                            id="link11079" href="javascript://"
                                                            onclick="regtree(11080);regtree(20040);regtree(972);regtree(99555);regtree(47);regtree(99560);regtree(11083);changeSign(11079);">
                    +</a>&nbsp; <input value="Нижегородская область" type="checkbox" id="225_40_11079_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11079_"> Нижегородская
                    область </label>

                <div id="region11080" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11080"></a> <input
                        value="Арзамас" type="checkbox" id="225_40_11079_11080_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11079_11080_"> Арзамас</label></div>
                <div id="region20040" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20040"></a> <input
                        value="Выкса" type="checkbox" id="225_40_11079_20040_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11079_20040_"> Выкса</label></div>
                <div id="region972" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name972"></a> <input
                        value="Дзержинск" type="checkbox" id="225_40_11079_972_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11079_972_"> Дзержинск</label></div>
                <div id="region99555" style="display: none;"><a name="name99555" style="text-decoration: none"
                                                                id="link99555" href="javascript://"
                                                                onclick="regtree(20044);changeSign(99555);"> +</a>&nbsp;
                    <input value="Кстовский район" type="checkbox" id="225_40_11079_99555_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11079_99555_"> Кстовский
                        район </label>

                    <div id="region20044" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20044"></a>
                        <input value="Кстово" type="checkbox" id="225_40_11079_99555_20044_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11079_99555_20044_">
                            Кстово</label></div>
                </div>
                <div id="region47" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name47"></a> <input
                        value="Нижний Новгород" type="checkbox" id="225_40_11079_47_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11079_47_"> Нижний Новгород </label>
                </div>
                <div id="region99560" style="display: none;"><a name="name99560" style="text-decoration: none"
                                                                id="link99560" href="javascript://"
                                                                onclick="regtree(11082);changeSign(99560);"> +</a>&nbsp;
                    <input value="Павловский район" type="checkbox" id="225_40_11079_99560_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11079_99560_"> Павловский
                        район </label>

                    <div id="region11082" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11082"></a>
                        <input value="Павлово" type="checkbox" id="225_40_11079_99560_11082_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11079_99560_11082_">
                            Павлово</label></div>
                </div>
                <div id="region11083" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11083"></a> <input
                        value="Саров" type="checkbox" id="225_40_11079_11083_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11079_11083_"> Саров</label></div>
            </div>
            <div id="region11084" style="display: none;"><a name="name11084" style="text-decoration: none"
                                                            id="link11084" href="javascript://"
                                                            onclick="regtree(11086);regtree(11087);regtree(11090);regtree(48);regtree(11091);changeSign(11084);">
                    +</a>&nbsp; <input value="Оренбургская область" type="checkbox" id="225_40_11084_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11084_"> Оренбургская
                    область </label>

                <div id="region11086" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11086"></a> <input
                        value="Бузулук" type="checkbox" id="225_40_11084_11086_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11084_11086_"> Бузулук</label></div>
                <div id="region11087" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11087"></a> <input
                        value="Гай" type="checkbox" id="225_40_11084_11087_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11084_11087_"> Гай</label></div>
                <div id="region11090" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11090"></a> <input
                        value="Новотроицк" type="checkbox" id="225_40_11084_11090_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11084_11090_"> Новотроицк</label></div>
                <div id="region48" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name48"></a> <input
                        value="Оренбург" type="checkbox" id="225_40_11084_48_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11084_48_"> Оренбург</label></div>
                <div id="region11091" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11091"></a> <input
                        value="Орск" type="checkbox" id="225_40_11084_11091_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11084_11091_"> Орск</label></div>
            </div>
            <div id="region11095" style="display: none;"><a name="name11095" style="text-decoration: none"
                                                            id="link11095" href="javascript://"
                                                            onclick="regtree(11101);regtree(49);changeSign(11095);">
                    +</a>&nbsp; <input value="Пензенская область" type="checkbox" id="225_40_11095_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11095_"> Пензенская
                    область </label>

                <div id="region11101" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11101"></a> <input
                        value="Кузнецк" type="checkbox" id="225_40_11095_11101_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11095_11101_"> Кузнецк</label></div>
                <div id="region49" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name49"></a> <input
                        value="Пенза" type="checkbox" id="225_40_11095_49_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11095_49_"> Пенза</label></div>
            </div>
            <div id="region11108" style="display: none;"><a name="name11108" style="text-decoration: none"
                                                            id="link11108" href="javascript://"
                                                            onclick="regtree(20237);regtree(20244);regtree(50);regtree(11110);regtree(110916);changeSign(11108);">
                    +</a>&nbsp; <input value="Пермский край" type="checkbox" id="225_40_11108_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11108_"> Пермский
                    край </label>

                <div id="region20237" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20237"></a> <input
                        value="Березники" type="checkbox" id="225_40_11108_20237_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11108_20237_"> Березники</label></div>
                <div id="region20244" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20244"></a> <input
                        value="Лысьва" type="checkbox" id="225_40_11108_20244_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11108_20244_"> Лысьва</label></div>
                <div id="region50" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name50"></a> <input
                        value="Пермь" type="checkbox" id="225_40_11108_50_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11108_50_"> Пермь</label></div>
                <div id="region11110" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11110"></a> <input
                        value="Соликамск" type="checkbox" id="225_40_11108_11110_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11108_11110_"> Соликамск</label></div>
                <div id="region110916" style="display: none;"><a name="name110916" style="text-decoration: none"
                                                                 id="link110916" href="javascript://"
                                                                 onclick="regtree(20243);changeSign(110916);"> +</a>&nbsp;
                    <input value="Чайковский район" type="checkbox" id="225_40_11108_110916_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11108_110916_"> Чайковский
                        район </label>

                    <div id="region20243" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20243"></a>
                        <input value="Чайковский" type="checkbox" id="225_40_11108_110916_20243_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11108_110916_20243_">
                            Чайковский</label></div>
                </div>
            </div>
            <div id="region11111" style="display: none;"><a name="name11111" style="text-decoration: none"
                                                            id="link11111" href="javascript://"
                                                            onclick="regtree(99675);regtree(99677);regtree(99694);regtree(11113);regtree(99703);regtree(11114);regtree(20235);regtree(11115);regtree(20716);regtree(11116);regtree(99712);regtree(172);regtree(99714);changeSign(11111);">
                    +</a>&nbsp; <input value="Республика Башкортостан" type="checkbox" id="225_40_11111_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11111_"> Республика
                    Башкортостан </label>

                <div id="region99675" style="display: none;"><a name="name99675" style="text-decoration: none"
                                                                id="link99675" href="javascript://"
                                                                onclick="regtree(20714);changeSign(99675);"> +</a>&nbsp;
                    <input value="Белебеевский район" type="checkbox" id="225_40_11111_99675_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11111_99675_"> Белебеевский
                        район </label>

                    <div id="region20714" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20714"></a>
                        <input value="Белебей" type="checkbox" id="225_40_11111_99675_20714_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11111_99675_20714_">
                            Белебей</label></div>
                </div>
                <div id="region99677" style="display: none;"><a name="name99677" style="text-decoration: none"
                                                                id="link99677" href="javascript://"
                                                                onclick="regtree(20259);changeSign(99677);"> +</a>&nbsp;
                    <input value="Белорецкий район" type="checkbox" id="225_40_11111_99677_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11111_99677_"> Белорецкий
                        район </label>

                    <div id="region20259" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20259"></a>
                        <input value="Белорецк" type="checkbox" id="225_40_11111_99677_20259_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11111_99677_20259_">
                            Белорецк</label></div>
                </div>
                <div id="region99694" style="display: none;"><a name="name99694" style="text-decoration: none"
                                                                id="link99694" href="javascript://"
                                                                onclick="regtree(20718);changeSign(99694);"> +</a>&nbsp;
                    <input value="Ишимбайский район" type="checkbox" id="225_40_11111_99694_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11111_99694_"> Ишимбайский
                        район </label>

                    <div id="region20718" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20718"></a>
                        <input value="Ишимбай" type="checkbox" id="225_40_11111_99694_20718_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11111_99694_20718_">
                            Ишимбай</label></div>
                </div>
                <div id="region11113" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11113"></a> <input
                        value="Кумертау" type="checkbox" id="225_40_11111_11113_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11111_11113_"> Кумертау</label></div>
                <div id="region99703" style="display: none;"><a name="name99703" style="text-decoration: none"
                                                                id="link99703" href="javascript://"
                                                                onclick="regtree(20715);changeSign(99703);"> +</a>&nbsp;
                    <input value="Мелеузовский район" type="checkbox" id="225_40_11111_99703_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11111_99703_"> Мелеузовский
                        район </label>

                    <div id="region20715" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20715"></a>
                        <input value="Мелеуз" type="checkbox" id="225_40_11111_99703_20715_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11111_99703_20715_">
                            Мелеуз</label></div>
                </div>
                <div id="region11114" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11114"></a> <input
                        value="Нефтекамск" type="checkbox" id="225_40_11111_11114_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11111_11114_"> Нефтекамск</label></div>
                <div id="region20235" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20235"></a> <input
                        value="Октябрьский" type="checkbox" id="225_40_11111_20235_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11111_20235_"> Октябрьский</label></div>
                <div id="region11115" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11115"></a> <input
                        value="Салават" type="checkbox" id="225_40_11111_11115_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11111_11115_"> Салават</label></div>
                <div id="region20716" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20716"></a> <input
                        value="Сибай" type="checkbox" id="225_40_11111_20716_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11111_20716_"> Сибай</label></div>
                <div id="region11116" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11116"></a> <input
                        value="Стерлитамак" type="checkbox" id="225_40_11111_11116_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11111_11116_"> Стерлитамак</label></div>
                <div id="region99712" style="display: none;"><a name="name99712" style="text-decoration: none"
                                                                id="link99712" href="javascript://"
                                                                onclick="regtree(20717);changeSign(99712);"> +</a>&nbsp;
                    <input value="Туймазинский район" type="checkbox" id="225_40_11111_99712_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11111_99712_"> Туймазинский
                        район </label>

                    <div id="region20717" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20717"></a>
                        <input value="Туймазы" type="checkbox" id="225_40_11111_99712_20717_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11111_99712_20717_">
                            Туймазы</label></div>
                </div>
                <div id="region172" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name172"></a> <input
                        value="Уфа" type="checkbox" id="225_40_11111_172_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11111_172_"> Уфа</label></div>
                <div id="region99714" style="display: none;"><a name="name99714" style="text-decoration: none"
                                                                id="link99714" href="javascript://"
                                                                onclick="regtree(20680);changeSign(99714);"> +</a>&nbsp;
                    <input value="Учалинский район" type="checkbox" id="225_40_11111_99714_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11111_99714_"> Учалинский
                        район </label>

                    <div id="region20680" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20680"></a>
                        <input value="Учалы" type="checkbox" id="225_40_11111_99714_20680_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11111_99714_20680_"> Учалы</label>
                    </div>
                </div>
            </div>
            <div id="region11077" style="display: none;"><a name="name11077" style="text-decoration: none"
                                                            id="link11077" href="javascript://"
                                                            onclick="regtree(20721);regtree(41);changeSign(11077);">
                    +</a>&nbsp; <input value="Республика Марий Эл" type="checkbox" id="225_40_11077_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11077_"> Республика Марий
                    Эл </label>

                <div id="region20721" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20721"></a> <input
                        value="Волжск" type="checkbox" id="225_40_11077_20721_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11077_20721_"> Волжск</label></div>
                <div id="region41" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name41"></a> <input
                        value="Йошкар-Ола" type="checkbox" id="225_40_11077_41_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11077_41_"> Йошкар - Ола</label></div>
            </div>
            <div id="region11117" style="display: none;"><a name="name11117" style="text-decoration: none"
                                                            id="link11117" href="javascript://"
                                                            onclick="regtree(20010);regtree(42);changeSign(11117);">
                    +</a>&nbsp; <input value="Республика Мордовия" type="checkbox" id="225_40_11117_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11117_"> Республика
                    Мордовия </label>

                <div id="region20010" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20010"></a> <input
                        value="Рузаевка" type="checkbox" id="225_40_11117_20010_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11117_20010_"> Рузаевка</label></div>
                <div id="region42" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name42"></a> <input
                        value="Саранск" type="checkbox" id="225_40_11117_42_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11117_42_"> Саранск</label></div>
            </div>
            <div id="region11119" style="display: none;"><a name="name11119" style="text-decoration: none"
                                                            id="link11119" href="javascript://"
                                                            onclick="regtree(11121);regtree(11122);regtree(43);regtree(236);regtree(11127);changeSign(11119);">
                    +</a>&nbsp; <input value="Республика Татарстан" type="checkbox" id="225_40_11119_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11119_"> Республика
                    Татарстан </label>

                <div id="region11121" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11121"></a> <input
                        value="Альметьевск" type="checkbox" id="225_40_11119_11121_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11119_11121_"> Альметьевск</label></div>
                <div id="region11122" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11122"></a> <input
                        value="Бугульма" type="checkbox" id="225_40_11119_11122_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11119_11122_"> Бугульма</label></div>
                <div id="region43" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name43"></a> <input
                        value="Казань" type="checkbox" id="225_40_11119_43_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11119_43_"> Казань</label></div>
                <div id="region236" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name236"></a> <input
                        value="Набережные Челны" type="checkbox" id="225_40_11119_236_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11119_236_"> Набережные Челны </label>
                </div>
                <div id="region11127" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11127"></a> <input
                        value="Нижнекамск" type="checkbox" id="225_40_11119_11127_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11119_11127_"> Нижнекамск</label></div>
            </div>
            <div id="region11131" style="display: none;"><a name="name11131" style="text-decoration: none"
                                                            id="link11131" href="javascript://"
                                                            onclick="regtree(11132);regtree(51);regtree(11139);regtree(240);changeSign(11131);">
                    +</a>&nbsp; <input value="Самарская область" type="checkbox" id="225_40_11131_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11131_"> Самарская
                    область </label>

                <div id="region11132" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11132"></a> <input
                        value="Жигулёвск" type="checkbox" id="225_40_11131_11132_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11131_11132_"> Жигулёвск</label></div>
                <div id="region51" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name51"></a> <input
                        value="Самара" type="checkbox" id="225_40_11131_51_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11131_51_"> Самара</label></div>
                <div id="region11139" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11139"></a> <input
                        value="Сызрань" type="checkbox" id="225_40_11131_11139_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11131_11139_"> Сызрань</label></div>
                <div id="region240" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name240"></a> <input
                        value="Тольятти" type="checkbox" id="225_40_11131_240_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11131_240_"> Тольятти</label></div>
            </div>
            <div id="region11146" style="display: none;"><a name="name11146" style="text-decoration: none"
                                                            id="link11146" href="javascript://"
                                                            onclick="regtree(99817);regtree(99818);regtree(194);regtree(99850);changeSign(11146);">
                    +</a>&nbsp; <input value="Саратовская область" type="checkbox" id="225_40_11146_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11146_"> Саратовская
                    область </label>

                <div id="region99817" style="display: none;"><a name="name99817" style="text-decoration: none"
                                                                id="link99817" href="javascript://"
                                                                onclick="regtree(11143);changeSign(99817);"> +</a>&nbsp;
                    <input value="Балаковский район" type="checkbox" id="225_40_11146_99817_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11146_99817_"> Балаковский
                        район </label>

                    <div id="region11143" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11143"></a>
                        <input value="Балаково" type="checkbox" id="225_40_11146_99817_11143_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11146_99817_11143_">
                            Балаково</label></div>
                </div>
                <div id="region99818" style="display: none;"><a name="name99818" style="text-decoration: none"
                                                                id="link99818" href="javascript://"
                                                                onclick="regtree(11144);changeSign(99818);"> +</a>&nbsp;
                    <input value="Балашовский район" type="checkbox" id="225_40_11146_99818_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11146_99818_"> Балашовский
                        район </label>

                    <div id="region11144" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11144"></a>
                        <input value="Балашов" type="checkbox" id="225_40_11146_99818_11144_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11146_99818_11144_">
                            Балашов</label></div>
                </div>
                <div id="region194" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name194"></a> <input
                        value="Саратов" type="checkbox" id="225_40_11146_194_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11146_194_"> Саратов</label></div>
                <div id="region99850" style="display: none;"><a name="name99850" style="text-decoration: none"
                                                                id="link99850" href="javascript://"
                                                                onclick="regtree(11147);changeSign(99850);"> +</a>&nbsp;
                    <input value="Энгельсский район" type="checkbox" id="225_40_11146_99850_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_40_11146_99850_"> Энгельсский
                        район </label>

                    <div id="region11147" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11147"></a>
                        <input value="Энгельс" type="checkbox" id="225_40_11146_99850_11147_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_40_11146_99850_11147_">
                            Энгельс</label></div>
                </div>
            </div>
            <div id="region11148" style="display: none;"><a name="name11148" style="text-decoration: none"
                                                            id="link11148" href="javascript://"
                                                            onclick="regtree(11149);regtree(11150);regtree(44);regtree(11152);changeSign(11148);">
                    +</a>&nbsp; <input value="Удмуртская Республика" type="checkbox" id="225_40_11148_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11148_"> Удмуртская
                    Республика </label>

                <div id="region11149" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11149"></a> <input
                        value="Воткинск" type="checkbox" id="225_40_11148_11149_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11148_11149_"> Воткинск</label></div>
                <div id="region11150" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11150"></a> <input
                        value="Глазов" type="checkbox" id="225_40_11148_11150_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11148_11150_"> Глазов</label></div>
                <div id="region44" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name44"></a> <input
                        value="Ижевск" type="checkbox" id="225_40_11148_44_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11148_44_"> Ижевск</label></div>
                <div id="region11152" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11152"></a> <input
                        value="Сарапул" type="checkbox" id="225_40_11148_11152_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11148_11152_"> Сарапул</label></div>
            </div>
            <div id="region11153" style="display: none;"><a name="name11153" style="text-decoration: none"
                                                            id="link11153" href="javascript://"
                                                            onclick="regtree(11155);regtree(195);changeSign(11153);">
                    +</a>&nbsp; <input value="Ульяновская область" type="checkbox" id="225_40_11153_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11153_"> Ульяновская
                    область </label>

                <div id="region11155" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11155"></a> <input
                        value="Димитровград" type="checkbox" id="225_40_11153_11155_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11153_11155_"> Димитровград</label></div>
                <div id="region195" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name195"></a> <input
                        value="Ульяновск" type="checkbox" id="225_40_11153_195_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11153_195_"> Ульяновск</label></div>
            </div>
            <div id="region11156" style="display: none;"><a name="name11156" style="text-decoration: none"
                                                            id="link11156" href="javascript://"
                                                            onclick="regtree(37133);regtree(45);regtree(20078);changeSign(11156);">
                    +</a>&nbsp; <input value="Чувашская Республика" type="checkbox" id="225_40_11156_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_40_11156_"> Чувашская
                    Республика </label>

                <div id="region37133" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name37133"></a> <input
                        value="Новочебоксарск" type="checkbox" id="225_40_11156_37133_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11156_37133_"> Новочебоксарск</label>
                </div>
                <div id="region45" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name45"></a> <input
                        value="Чебоксары" type="checkbox" id="225_40_11156_45_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11156_45_"> Чебоксары</label></div>
                <div id="region20078" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20078"></a> <input
                        value="Шумерля" type="checkbox" id="225_40_11156_20078_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_40_11156_20078_"> Шумерля</label></div>
            </div>
        </div>
        <div id="region26" style="display: none;"><a name="name26" style="text-decoration: none" id="link26"
                                                     href="javascript://"
                                                     onclick="regtree(10946);regtree(10950);regtree(10995);regtree(11004);regtree(11015);regtree(11029);changeSign(26);">
                +</a>&nbsp; <input value="Юг" type="checkbox" id="225_26_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_26_"> Юг</label>

            <div id="region10946" style="display: none;"><a name="name10946" style="text-decoration: none"
                                                            id="link10946" href="javascript://"
                                                            onclick="regtree(37);regtree(99221);changeSign(10946);">
                    +</a>&nbsp; <input value="Астраханская область" type="checkbox" id="225_26_10946_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_26_10946_"> Астраханская
                    область </label>

                <div id="region37" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name37"></a> <input
                        value="Астрахань" type="checkbox" id="225_26_10946_37_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10946_37_"> Астрахань</label></div>
                <div id="region99221" style="display: none;"><a name="name99221" style="text-decoration: none"
                                                                id="link99221" href="javascript://"
                                                                onclick="regtree(20167);changeSign(99221);"> +</a>&nbsp;
                    <input value="Ахтубинский район" type="checkbox" id="225_26_10946_99221_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10946_99221_"> Ахтубинский
                        район </label>

                    <div id="region20167" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20167"></a>
                        <input value="Ахтубинск" type="checkbox" id="225_26_10946_99221_20167_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_10946_99221_20167_">
                            Ахтубинск</label></div>
                </div>
            </div>
            <div id="region10950" style="display: none;"><a name="name10950" style="text-decoration: none"
                                                            id="link10950" href="javascript://"
                                                            onclick="regtree(38);regtree(10951);regtree(10959);regtree(10965);regtree(10981);changeSign(10950);">
                    +</a>&nbsp; <input value="Волгоградская область" type="checkbox" id="225_26_10950_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_26_10950_"> Волгоградская
                    область </label>

                <div id="region38" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name38"></a> <input
                        value="Волгоград" type="checkbox" id="225_26_10950_38_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10950_38_"> Волгоград</label></div>
                <div id="region10951" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10951"></a> <input
                        value="Волжский" type="checkbox" id="225_26_10950_10951_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10950_10951_"> Волжский</label></div>
                <div id="region10959" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10959"></a> <input
                        value="Камышин" type="checkbox" id="225_26_10950_10959_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10950_10959_"> Камышин</label></div>
                <div id="region10965" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10965"></a> <input
                        value="Михайловка" type="checkbox" id="225_26_10950_10965_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10950_10965_"> Михайловка</label></div>
                <div id="region10981" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10981"></a> <input
                        value="Урюпинск" type="checkbox" id="225_26_10950_10981_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10950_10981_"> Урюпинск</label></div>
            </div>
            <div id="region10995" style="display: none;"><a name="name10995" style="text-decoration: none"
                                                            id="link10995" href="javascript://"
                                                            onclick="regtree(1107);regtree(10987);regtree(99269);regtree(10990);regtree(99274);regtree(99275);regtree(35);regtree(99281);regtree(970);regtree(99293);regtree(239);regtree(99297);regtree(99298);regtree(99299);changeSign(10995);">
                    +</a>&nbsp; <input value="Краснодарский край" type="checkbox" id="225_26_10995_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_26_10995_"> Краснодарский
                    край </label>

                <div id="region1107" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1107"></a> <input
                        value="Анапа" type="checkbox" id="225_26_10995_1107_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10995_1107_"> Анапа</label></div>
                <div id="region10987" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10987"></a> <input
                        value="Армавир" type="checkbox" id="225_26_10995_10987_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10995_10987_"> Армавир</label></div>
                <div id="region99269" style="display: none;"><a name="name99269" style="text-decoration: none"
                                                                id="link99269" href="javascript://"
                                                                onclick="regtree(10988);changeSign(99269);"> +</a>&nbsp;
                    <input value="Белореченский район" type="checkbox" id="225_26_10995_99269_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10995_99269_"> Белореченский
                        район </label>

                    <div id="region10988" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10988"></a>
                        <input value="Белореченск" type="checkbox" id="225_26_10995_99269_10988_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_10995_99269_10988_">
                            Белореченск</label></div>
                </div>
                <div id="region10990" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10990"></a> <input
                        value="Геленджик" type="checkbox" id="225_26_10995_10990_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10995_10990_"> Геленджик</label></div>
                <div id="region99274" style="display: none;"><a name="name99274" style="text-decoration: none"
                                                                id="link99274" href="javascript://"
                                                                onclick="regtree(10993);changeSign(99274);"> +</a>&nbsp;
                    <input value="Ейский район" type="checkbox" id="225_26_10995_99274_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10995_99274_"> Ейский район </label>

                    <div id="region10993" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10993"></a>
                        <input value="Ейск" type="checkbox" id="225_26_10995_99274_10993_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_10995_99274_10993_"> Ейск</label>
                    </div>
                </div>
                <div id="region99275" style="display: none;"><a name="name99275" style="text-decoration: none"
                                                                id="link99275" href="javascript://"
                                                                onclick="regtree(10996);changeSign(99275);"> +</a>&nbsp;
                    <input value="Кавказский район" type="checkbox" id="225_26_10995_99275_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10995_99275_"> Кавказский
                        район </label>

                    <div id="region10996" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10996"></a>
                        <input value="Кропоткин" type="checkbox" id="225_26_10995_99275_10996_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_10995_99275_10996_">
                            Кропоткин</label></div>
                </div>
                <div id="region35" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name35"></a> <input
                        value="Краснодар" type="checkbox" id="225_26_10995_35_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10995_35_"> Краснодар</label></div>
                <div id="region99281" style="display: none;"><a name="name99281" style="text-decoration: none"
                                                                id="link99281" href="javascript://"
                                                                onclick="regtree(10997);changeSign(99281);"> +</a>&nbsp;
                    <input value="Крымский район" type="checkbox" id="225_26_10995_99281_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10995_99281_"> Крымский район </label>

                    <div id="region10997" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10997"></a>
                        <input value="Крымск" type="checkbox" id="225_26_10995_99281_10997_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_10995_99281_10997_">
                            Крымск</label></div>
                </div>
                <div id="region970" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name970"></a> <input
                        value="Новороссийск" type="checkbox" id="225_26_10995_970_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10995_970_"> Новороссийск</label></div>
                <div id="region99293" style="display: none;"><a name="name99293" style="text-decoration: none"
                                                                id="link99293" href="javascript://"
                                                                onclick="regtree(20704);changeSign(99293);"> +</a>&nbsp;
                    <input value="Славянский район" type="checkbox" id="225_26_10995_99293_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10995_99293_"> Славянский
                        район </label>

                    <div id="region20704" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20704"></a>
                        <input value="Славянск-на-Кубани" type="checkbox" id="225_26_10995_99293_20704_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_10995_99293_20704_"> Славянск - на
                            - Кубани</label></div>
                </div>
                <div id="region239" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name239"></a> <input
                        value="Сочи" type="checkbox" id="225_26_10995_239_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_10995_239_"> Сочи</label></div>
                <div id="region99297" style="display: none;"><a name="name99297" style="text-decoration: none"
                                                                id="link99297" href="javascript://"
                                                                onclick="regtree(21141);changeSign(99297);"> +</a>&nbsp;
                    <input value="Тимашёвский район" type="checkbox" id="225_26_10995_99297_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10995_99297_"> Тимашёвский
                        район </label>

                    <div id="region21141" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21141"></a>
                        <input value="Тимашёвск" type="checkbox" id="225_26_10995_99297_21141_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_10995_99297_21141_">
                            Тимашёвск</label></div>
                </div>
                <div id="region99298" style="display: none;"><a name="name99298" style="text-decoration: none"
                                                                id="link99298" href="javascript://"
                                                                onclick="regtree(11002);changeSign(99298);"> +</a>&nbsp;
                    <input value="Тихорецкий район" type="checkbox" id="225_26_10995_99298_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10995_99298_"> Тихорецкий
                        район </label>

                    <div id="region11002" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11002"></a>
                        <input value="Тихорецк" type="checkbox" id="225_26_10995_99298_11002_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_10995_99298_11002_">
                            Тихорецк</label></div>
                </div>
                <div id="region99299" style="display: none;"><a name="name99299" style="text-decoration: none"
                                                                id="link99299" href="javascript://"
                                                                onclick="regtree(1058);changeSign(99299);"> +</a>&nbsp;
                    <input value="Туапсинский район" type="checkbox" id="225_26_10995_99299_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_10995_99299_"> Туапсинский
                        район </label>

                    <div id="region1058" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1058"></a> <input
                            value="Туапсе" type="checkbox" id="225_26_10995_99299_1058_" name="reg"
                            onclick="javascript:Generate(this)"><label for="225_26_10995_99299_1058_"> Туапсе</label>
                    </div>
                </div>
            </div>
            <div id="region11004" style="display: none;"><a name="name11004" style="text-decoration: none"
                                                            id="link11004" href="javascript://"
                                                            onclick="regtree(1093);changeSign(11004);"> +</a>&nbsp;
                <input value="Республика Адыгея" type="checkbox" id="225_26_11004_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_26_11004_"> Республика Адыгея </label>

                <div id="region1093" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1093"></a> <input
                        value="Майкоп" type="checkbox" id="225_26_11004_1093_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11004_1093_"> Майкоп</label></div>
            </div>
            <div id="region11015" style="display: none;"><a name="name11015" style="text-decoration: none"
                                                            id="link11015" href="javascript://"
                                                            onclick="regtree(1094);changeSign(11015);"> +</a>&nbsp;
                <input value="Республика Калмыкия" type="checkbox" id="225_26_11015_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_26_11015_"> Республика Калмыкия </label>

                <div id="region1094" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1094"></a> <input
                        value="Элиста" type="checkbox" id="225_26_11015_1094_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11015_1094_"> Элиста</label></div>
            </div>
            <div id="region11029" style="display: none;"><a name="name11029" style="text-decoration: none"
                                                            id="link11029" href="javascript://"
                                                            onclick="regtree(11030);regtree(99411);regtree(11036);regtree(11043);regtree(238);regtree(39);regtree(971);regtree(11053);changeSign(11029);">
                    +</a>&nbsp; <input value="Ростовская область" type="checkbox" id="225_26_11029_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_26_11029_"> Ростовская
                    область </label>

                <div id="region11030" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11030"></a> <input
                        value="Азов" type="checkbox" id="225_26_11029_11030_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11029_11030_"> Азов</label></div>
                <div id="region99411" style="display: none;"><a name="name99411" style="text-decoration: none"
                                                                id="link99411" href="javascript://"
                                                                onclick="regtree(11034);changeSign(99411);"> +</a>&nbsp;
                    <input value="Белокалитвинский район" type="checkbox" id="225_26_11029_99411_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_26_11029_99411_"> Белокалитвинский
                        район </label>

                    <div id="region11034" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11034"></a>
                        <input value="Белая Калитва" type="checkbox" id="225_26_11029_99411_11034_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_26_11029_99411_11034_"> Белая
                            Калитва </label></div>
                </div>
                <div id="region11036" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11036"></a> <input
                        value="Волгодонск" type="checkbox" id="225_26_11029_11036_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11029_11036_"> Волгодонск</label></div>
                <div id="region11043" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11043"></a> <input
                        value="Каменск-Шахтинский" type="checkbox" id="225_26_11029_11043_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11029_11043_"> Каменск -
                        Шахтинский</label></div>
                <div id="region238" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name238"></a> <input
                        value="Новочеркасск" type="checkbox" id="225_26_11029_238_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11029_238_"> Новочеркасск</label></div>
                <div id="region39" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name39"></a> <input
                        value="Ростов-на-Дону" type="checkbox" id="225_26_11029_39_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11029_39_"> Ростов - на - Дону</label>
                </div>
                <div id="region971" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name971"></a> <input
                        value="Таганрог" type="checkbox" id="225_26_11029_971_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11029_971_"> Таганрог</label></div>
                <div id="region11053" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11053"></a> <input
                        value="Шахты" type="checkbox" id="225_26_11029_11053_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_26_11029_11053_"> Шахты</label></div>
            </div>
        </div>
        <div id="region59" style="display: none;"><a name="name59" style="text-decoration: none" id="link59"
                                                     href="javascript://"
                                                     onclick="regtree(11235);regtree(21949);regtree(11266);regtree(11282);regtree(11309);regtree(11316);regtree(11318);regtree(10231);regtree(11330);regtree(10233);regtree(11340);regtree(11353);changeSign(59);">
                +</a>&nbsp; <input value="Сибирь" type="checkbox" id="225_59_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_59_"> Сибирь</label>

            <div id="region11235" style="display: none;"><a name="name11235" style="text-decoration: none"
                                                            id="link11235" href="javascript://"
                                                            onclick="regtree(197);regtree(975);regtree(11240);regtree(11251);changeSign(11235);">
                    +</a>&nbsp; <input value="Алтайский край" type="checkbox" id="225_59_11235_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_59_11235_"> Алтайский
                    край </label>

                <div id="region197" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name197"></a> <input
                        value="Барнаул" type="checkbox" id="225_59_11235_197_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11235_197_"> Барнаул</label></div>
                <div id="region975" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name975"></a> <input
                        value="Бийск" type="checkbox" id="225_59_11235_975_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11235_975_"> Бийск</label></div>
                <div id="region11240" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11240"></a> <input
                        value="Заринск" type="checkbox" id="225_59_11235_11240_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11235_11240_"> Заринск</label></div>
                <div id="region11251" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11251"></a> <input
                        value="Рубцовск" type="checkbox" id="225_59_11235_11251_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11235_11251_"> Рубцовск</label></div>
            </div>
            <div id="region21949" style="display: none;"><a name="name21949" style="text-decoration: none"
                                                            id="link21949" href="javascript://"
                                                            onclick="regtree(68);changeSign(21949);"> +</a>&nbsp; <input
                    value="Забайкальский край" type="checkbox" id="225_59_21949_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_59_21949_"> Забайкальский край </label>

                <div id="region68" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name68"></a> <input
                        value="Чита" type="checkbox" id="225_59_21949_68_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_21949_68_"> Чита</label></div>
            </div>
            <div id="region11266" style="display: none;"><a name="name11266" style="text-decoration: none"
                                                            id="link11266" href="javascript://"
                                                            onclick="regtree(11256);regtree(976);regtree(63);regtree(100109);regtree(100112);regtree(11271);regtree(11272);regtree(11273);regtree(100116);regtree(11274);changeSign(11266);">
                    +</a>&nbsp; <input value="Иркутская область" type="checkbox" id="225_59_11266_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_59_11266_"> Иркутская
                    область </label>

                <div id="region11256" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11256"></a> <input
                        value="Ангарск" type="checkbox" id="225_59_11266_11256_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11266_11256_"> Ангарск</label></div>
                <div id="region976" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name976"></a> <input
                        value="Братск" type="checkbox" id="225_59_11266_976_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11266_976_"> Братск</label></div>
                <div id="region63" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name63"></a> <input
                        value="Иркутск" type="checkbox" id="225_59_11266_63_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11266_63_"> Иркутск</label></div>
                <div id="region100109" style="display: none;"><a name="name100109" style="text-decoration: none"
                                                                 id="link100109" href="javascript://"
                                                                 onclick="regtree(11268);changeSign(100109);"> +</a>&nbsp;
                    <input value="Нижнеудинский район" type="checkbox" id="225_59_11266_100109_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_59_11266_100109_"> Нижнеудинский
                        район </label>

                    <div id="region11268" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11268"></a>
                        <input value="Нижнеудинск" type="checkbox" id="225_59_11266_100109_11268_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_59_11266_100109_11268_">
                            Нижнеудинск</label></div>
                </div>
                <div id="region100112" style="display: none;"><a name="name100112" style="text-decoration: none"
                                                                 id="link100112" href="javascript://"
                                                                 onclick="regtree(11270);changeSign(100112);"> +</a>&nbsp;
                    <input value="Тайшетский район" type="checkbox" id="225_59_11266_100112_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_59_11266_100112_"> Тайшетский
                        район </label>

                    <div id="region11270" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11270"></a>
                        <input value="Тайшет" type="checkbox" id="225_59_11266_100112_11270_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_59_11266_100112_11270_">
                            Тайшет</label></div>
                </div>
                <div id="region11271" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11271"></a> <input
                        value="Тулун" type="checkbox" id="225_59_11266_11271_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11266_11271_"> Тулун</label></div>
                <div id="region11272" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11272"></a> <input
                        value="Усолье-Сибирское" type="checkbox" id="225_59_11266_11272_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11266_11272_"> Усолье - Сибирское</label>
                </div>
                <div id="region11273" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11273"></a> <input
                        value="Усть-Илимск" type="checkbox" id="225_59_11266_11273_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11266_11273_"> Усть - Илимск</label>
                </div>
                <div id="region100116" style="display: none;"><a name="name100116" style="text-decoration: none"
                                                                 id="link100116" href="javascript://"
                                                                 onclick="regtree(20097);changeSign(100116);"> +</a>&nbsp;
                    <input value="Усть-Кутский район" type="checkbox" id="225_59_11266_100116_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_59_11266_100116_"> Усть - Кутский
                        район </label>

                    <div id="region20097" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20097"></a>
                        <input value="Усть-Кут" type="checkbox" id="225_59_11266_100116_20097_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_59_11266_100116_20097_"> Усть -
                            Кут</label></div>
                </div>
                <div id="region11274" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11274"></a> <input
                        value="Черемхово" type="checkbox" id="225_59_11266_11274_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11266_11274_"> Черемхово</label></div>
            </div>
            <div id="region11282" style="display: none;"><a name="name11282" style="text-decoration: none"
                                                            id="link11282" href="javascript://"
                                                            onclick="regtree(11276);regtree(11277);regtree(64);regtree(11283);regtree(11285);regtree(11287);regtree(11288);regtree(237);regtree(11292);regtree(11291);regtree(11299);changeSign(11282);">
                    +</a>&nbsp; <input value="Кемеровская область" type="checkbox" id="225_59_11282_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_59_11282_"> Кемеровская
                    область </label>

                <div id="region11276" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11276"></a> <input
                        value="Анжеро-Судженск" type="checkbox" id="225_59_11282_11276_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11276_"> Анжеро - Судженск</label>
                </div>
                <div id="region11277" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11277"></a> <input
                        value="Белово" type="checkbox" id="225_59_11282_11277_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11277_"> Белово</label></div>
                <div id="region64" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name64"></a> <input
                        value="Кемерово" type="checkbox" id="225_59_11282_64_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_64_"> Кемерово</label></div>
                <div id="region11283" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11283"></a> <input
                        value="Киселёвск" type="checkbox" id="225_59_11282_11283_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11283_"> Киселёвск</label></div>
                <div id="region11285" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11285"></a> <input
                        value="Ленинск-Кузнецкий" type="checkbox" id="225_59_11282_11285_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11285_"> Ленинск -
                        Кузнецкий</label></div>
                <div id="region11287" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11287"></a> <input
                        value="Междуреченск" type="checkbox" id="225_59_11282_11287_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11287_"> Междуреченск</label></div>
                <div id="region11288" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11288"></a> <input
                        value="Мыски" type="checkbox" id="225_59_11282_11288_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11288_"> Мыски</label></div>
                <div id="region237" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name237"></a> <input
                        value="Новокузнецк" type="checkbox" id="225_59_11282_237_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_237_"> Новокузнецк</label></div>
                <div id="region11292" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11292"></a> <input
                        value="Полысаево" type="checkbox" id="225_59_11282_11292_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11292_"> Полысаево</label></div>
                <div id="region11291" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11291"></a> <input
                        value="Прокопьевск" type="checkbox" id="225_59_11282_11291_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11291_"> Прокопьевск</label></div>
                <div id="region11299" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11299"></a> <input
                        value="Юрга" type="checkbox" id="225_59_11282_11299_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11282_11299_"> Юрга</label></div>
            </div>
            <div id="region11309" style="display: none;"><a name="name11309" style="text-decoration: none"
                                                            id="link11309" href="javascript://"
                                                            onclick="regtree(11302);regtree(20086);regtree(20088);regtree(62);regtree(11310);regtree(11311);changeSign(11309);">
                    +</a>&nbsp; <input value="Красноярский край" type="checkbox" id="225_59_11309_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_59_11309_"> Красноярский
                    край </label>

                <div id="region11302" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11302"></a> <input
                        value="Ачинск" type="checkbox" id="225_59_11309_11302_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11309_11302_"> Ачинск</label></div>
                <div id="region20086" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20086"></a> <input
                        value="Железногорск" type="checkbox" id="225_59_11309_20086_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11309_20086_"> Железногорск</label></div>
                <div id="region20088" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20088"></a> <input
                        value="Зеленогорск" type="checkbox" id="225_59_11309_20088_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11309_20088_"> Зеленогорск</label></div>
                <div id="region62" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name62"></a> <input
                        value="Красноярск" type="checkbox" id="225_59_11309_62_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11309_62_"> Красноярск</label></div>
                <div id="region11310" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11310"></a> <input
                        value="Минусинск" type="checkbox" id="225_59_11309_11310_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11309_11310_"> Минусинск</label></div>
                <div id="region11311" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11311"></a> <input
                        value="Норильск" type="checkbox" id="225_59_11309_11311_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11309_11311_"> Норильск</label></div>
            </div>
            <div id="region11316" style="display: none;"><a name="name11316" style="text-decoration: none"
                                                            id="link11316" href="javascript://"
                                                            onclick="regtree(20100);regtree(65);changeSign(11316);">
                    +</a>&nbsp; <input value="Новосибирская область" type="checkbox" id="225_59_11316_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_59_11316_"> Новосибирская
                    область </label>

                <div id="region20100" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20100"></a> <input
                        value="Искитим" type="checkbox" id="225_59_11316_20100_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11316_20100_"> Искитим</label></div>
                <div id="region65" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name65"></a> <input
                        value="Новосибирск" type="checkbox" id="225_59_11316_65_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11316_65_"> Новосибирск</label></div>
            </div>
            <div id="region11318" style="display: none;"><a name="name11318" style="text-decoration: none"
                                                            id="link11318" href="javascript://"
                                                            onclick="regtree(66);changeSign(11318);"> +</a>&nbsp; <input
                    value="Омская область" type="checkbox" id="225_59_11318_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_59_11318_"> Омская область </label>

                <div id="region66" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name66"></a> <input
                        value="Омск" type="checkbox" id="225_59_11318_66_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11318_66_"> Омск</label></div>
            </div>
            <div id="region10231" style="display: none;"><a name="name10231" style="text-decoration: none"
                                                            id="link10231" href="javascript://"
                                                            onclick="regtree(11319);changeSign(10231);"> +</a>&nbsp;
                <input value="Республика Алтай" type="checkbox" id="225_59_10231_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_59_10231_"> Республика Алтай </label>

                <div id="region11319" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11319"></a> <input
                        value="Горно-Алтайск" type="checkbox" id="225_59_10231_11319_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_10231_11319_"> Горно - Алтайск</label>
                </div>
            </div>
            <div id="region11330" style="display: none;"><a name="name11330" style="text-decoration: none"
                                                            id="link11330" href="javascript://"
                                                            onclick="regtree(11327);regtree(198);changeSign(11330);">
                    +</a>&nbsp; <input value="Республика Бурятия" type="checkbox" id="225_59_11330_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_59_11330_"> Республика
                    Бурятия </label>

                <div id="region11327" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11327"></a> <input
                        value="Северобайкальск" type="checkbox" id="225_59_11330_11327_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11330_11327_"> Северобайкальск</label>
                </div>
                <div id="region198" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name198"></a> <input
                        value="Улан-Удэ" type="checkbox" id="225_59_11330_198_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11330_198_"> Улан - Удэ</label></div>
            </div>
            <div id="region10233" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10233"></a> <input
                    value="Республика Тыва" type="checkbox" id="225_59_10233_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_59_10233_"> Республика Тыва </label></div>
            <div id="region11340" style="display: none;"><a name="name11340" style="text-decoration: none"
                                                            id="link11340" href="javascript://"
                                                            onclick="regtree(1095);changeSign(11340);"> +</a>&nbsp;
                <input value="Республика Хакасия" type="checkbox" id="225_59_11340_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_59_11340_"> Республика Хакасия </label>

                <div id="region1095" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1095"></a> <input
                        value="Абакан" type="checkbox" id="225_59_11340_1095_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11340_1095_"> Абакан</label></div>
            </div>
            <div id="region11353" style="display: none;"><a name="name11353" style="text-decoration: none"
                                                            id="link11353" href="javascript://"
                                                            onclick="regtree(11351);regtree(11352);regtree(67);changeSign(11353);">
                    +</a>&nbsp; <input value="Томская область" type="checkbox" id="225_59_11353_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_59_11353_"> Томская
                    область </label>

                <div id="region11351" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11351"></a> <input
                        value="Северск" type="checkbox" id="225_59_11353_11351_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11353_11351_"> Северск</label></div>
                <div id="region11352" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11352"></a> <input
                        value="Стрежевой" type="checkbox" id="225_59_11353_11352_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11353_11352_"> Стрежевой</label></div>
                <div id="region67" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name67"></a> <input
                        value="Томск" type="checkbox" id="225_59_11353_67_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_59_11353_67_"> Томск</label></div>
            </div>
        </div>
        <div id="region73" style="display: none;"><a name="name73" style="text-decoration: none" id="link73"
                                                     href="javascript://"
                                                     onclick="regtree(11375);regtree(10243);regtree(11398);regtree(11403);regtree(11409);regtree(11443);regtree(11450);regtree(11457);regtree(10251);changeSign(73);">
                +</a>&nbsp; <input value="Дальний Восток" type="checkbox" id="225_73_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_73_"> Дальний Восток </label>

            <div id="region11375" style="display: none;"><a name="name11375" style="text-decoration: none"
                                                            id="link11375" href="javascript://"
                                                            onclick="regtree(11374);regtree(77);regtree(11387);regtree(11391);changeSign(11375);">
                    +</a>&nbsp; <input value="Амурская область" type="checkbox" id="225_73_11375_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_73_11375_"> Амурская
                    область </label>

                <div id="region11374" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11374"></a> <input
                        value="Белогорск" type="checkbox" id="225_73_11375_11374_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11375_11374_"> Белогорск</label></div>
                <div id="region77" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name77"></a> <input
                        value="Благовещенск" type="checkbox" id="225_73_11375_77_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11375_77_"> Благовещенск</label></div>
                <div id="region11387" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11387"></a> <input
                        value="Свободный" type="checkbox" id="225_73_11375_11387_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11375_11387_"> Свободный</label></div>
                <div id="region11391" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11391"></a> <input
                        value="Тында" type="checkbox" id="225_73_11375_11391_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11375_11391_"> Тында</label></div>
            </div>
            <div id="region10243" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10243"></a> <input
                    value="Еврейская автономная область" type="checkbox" id="225_73_10243_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_73_10243_"> Еврейская автономная
                    область </label></div>
            <div id="region11398" style="display: none;"><a name="name11398" style="text-decoration: none"
                                                            id="link11398" href="javascript://"
                                                            onclick="regtree(78);changeSign(11398);"> +</a>&nbsp; <input
                    value="Камчатский край" type="checkbox" id="225_73_11398_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_73_11398_"> Камчатский край </label>

                <div id="region78" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name78"></a> <input
                        value="Петропавловск-Камчатский" type="checkbox" id="225_73_11398_78_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11398_78_"> Петропавловск -
                        Камчатский</label></div>
            </div>
            <div id="region11403" style="display: none;"><a name="name11403" style="text-decoration: none"
                                                            id="link11403" href="javascript://"
                                                            onclick="regtree(79);changeSign(11403);"> +</a>&nbsp; <input
                    value="Магаданская область" type="checkbox" id="225_73_11403_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_73_11403_"> Магаданская область </label>

                <div id="region79" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name79"></a> <input
                        value="Магадан" type="checkbox" id="225_73_11403_79_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11403_79_"> Магадан</label></div>
            </div>
            <div id="region11409" style="display: none;"><a name="name11409" style="text-decoration: none"
                                                            id="link11409" href="javascript://"
                                                            onclick="regtree(11405);regtree(11406);regtree(75);regtree(11411);regtree(974);regtree(11426);changeSign(11409);">
                    +</a>&nbsp; <input value="Приморский край" type="checkbox" id="225_73_11409_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_73_11409_"> Приморский
                    край </label>

                <div id="region11405" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11405"></a> <input
                        value="Арсеньев" type="checkbox" id="225_73_11409_11405_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11409_11405_"> Арсеньев</label></div>
                <div id="region11406" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11406"></a> <input
                        value="Артём" type="checkbox" id="225_73_11409_11406_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11409_11406_"> Артём</label></div>
                <div id="region75" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name75"></a> <input
                        value="Владивосток" type="checkbox" id="225_73_11409_75_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11409_75_"> Владивосток</label></div>
                <div id="region11411" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11411"></a> <input
                        value="Дальнегорск" type="checkbox" id="225_73_11409_11411_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11409_11411_"> Дальнегорск</label></div>
                <div id="region974" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name974"></a> <input
                        value="Находка" type="checkbox" id="225_73_11409_974_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11409_974_"> Находка</label></div>
                <div id="region11426" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11426"></a> <input
                        value="Уссурийск" type="checkbox" id="225_73_11409_11426_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11409_11426_"> Уссурийск</label></div>
            </div>
            <div id="region11443" style="display: none;"><a name="name11443" style="text-decoration: none"
                                                            id="link11443" href="javascript://"
                                                            onclick="regtree(101987);regtree(74);changeSign(11443);">
                    +</a>&nbsp; <input value="Республика Саха (Якутия)" type="checkbox" id="225_73_11443_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_73_11443_"> Республика
                    Саха(Якутия) </label>

                <div id="region101987" style="display: none;"><a name="name101987" style="text-decoration: none"
                                                                 id="link101987" href="javascript://"
                                                                 onclick="regtree(11437);changeSign(101987);"> +</a>&nbsp;
                    <input value="Нерюнгринский район" type="checkbox" id="225_73_11443_101987_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_73_11443_101987_"> Нерюнгринский
                        район </label>

                    <div id="region11437" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11437"></a>
                        <input value="Нерюнгри" type="checkbox" id="225_73_11443_101987_11437_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_73_11443_101987_11437_">
                            Нерюнгри</label></div>
                </div>
                <div id="region74" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name74"></a> <input
                        value="Якутск" type="checkbox" id="225_73_11443_74_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11443_74_"> Якутск</label></div>
            </div>
            <div id="region11450" style="display: none;"><a name="name11450" style="text-decoration: none"
                                                            id="link11450" href="javascript://"
                                                            onclick="regtree(80);changeSign(11450);"> +</a>&nbsp; <input
                    value="Сахалинская область" type="checkbox" id="225_73_11450_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_73_11450_"> Сахалинская область </label>

                <div id="region80" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name80"></a> <input
                        value="Южно-Сахалинск" type="checkbox" id="225_73_11450_80_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11450_80_"> Южно - Сахалинск</label>
                </div>
            </div>
            <div id="region11457" style="display: none;"><a name="name11457" style="text-decoration: none"
                                                            id="link11457" href="javascript://"
                                                            onclick="regtree(100398);regtree(11453);regtree(76);changeSign(11457);">
                    +</a>&nbsp; <input value="Хабаровский край" type="checkbox" id="225_73_11457_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_73_11457_"> Хабаровский
                    край </label>

                <div id="region100398" style="display: none;"><a name="name100398" style="text-decoration: none"
                                                                 id="link100398" href="javascript://"
                                                                 onclick="regtree(11451);changeSign(100398);"> +</a>&nbsp;
                    <input value="Амурский район" type="checkbox" id="225_73_11457_100398_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_73_11457_100398_"> Амурский
                        район </label>

                    <div id="region11451" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11451"></a>
                        <input value="Амурск" type="checkbox" id="225_73_11457_100398_11451_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_73_11457_100398_11451_">
                            Амурск</label></div>
                </div>
                <div id="region11453" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11453"></a> <input
                        value="Комсомольск-на-Амуре" type="checkbox" id="225_73_11457_11453_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11457_11453_"> Комсомольск - на -
                        Амуре</label></div>
                <div id="region76" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name76"></a> <input
                        value="Хабаровск" type="checkbox" id="225_73_11457_76_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_73_11457_76_"> Хабаровск</label></div>
            </div>
            <div id="region10251" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10251"></a> <input
                    value="Чукотский автономный округ" type="checkbox" id="225_73_10251_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_73_10251_"> Чукотский автономный округ </label>
            </div>
        </div>
        <div id="region977" style="display: none;"><a name="name977" style="text-decoration: none" id="link977"
                                                      href="javascript://"
                                                      onclick="regtree(11471);regtree(28892);regtree(24696);regtree(27555);regtree(11463);regtree(11464);regtree(27693);regtree(24702);regtree(20556);regtree(959);regtree(146);regtree(11472);regtree(11469);regtree(11470);changeSign(977);">
                +</a>&nbsp; <input value="Республика Крым" type="checkbox" id="225_977_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_977_"> Республика Крым </label>

            <div id="region11471" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11471"></a> <input
                    value="Алушта" type="checkbox" id="225_977_11471_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_11471_"> Алушта</label></div>
            <div id="region28892" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name28892"></a> <input
                    value="Армянск" type="checkbox" id="225_977_28892_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_28892_"> Армянск</label></div>
            <div id="region24696" style="display: none;"><a name="name24696" style="text-decoration: none"
                                                            id="link24696" href="javascript://"
                                                            onclick="regtree(27217);changeSign(24696);"> +</a>&nbsp;
                <input value="Бахчисарайский район" type="checkbox" id="225_977_24696_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_977_24696_"> Бахчисарайский район </label>

                <div id="region27217" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name27217"></a> <input
                        value="Бахчисарай" type="checkbox" id="225_977_24696_27217_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_977_24696_27217_"> Бахчисарай</label></div>
            </div>
            <div id="region27555" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name27555"></a> <input
                    value="Джанкой" type="checkbox" id="225_977_27555_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_27555_"> Джанкой</label></div>
            <div id="region11463" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11463"></a> <input
                    value="Евпатория" type="checkbox" id="225_977_11463_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_11463_"> Евпатория</label></div>
            <div id="region11464" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11464"></a> <input
                    value="Керчь" type="checkbox" id="225_977_11464_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_11464_"> Керчь</label></div>
            <div id="region27693" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name27693"></a> <input
                    value="Красноперекопск" type="checkbox" id="225_977_27693_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_27693_"> Красноперекопск</label></div>
            <div id="region24702" style="display: none;"><a name="name24702" style="text-decoration: none"
                                                            id="link24702" href="javascript://"
                                                            onclick="regtree(28786);changeSign(24702);"> +</a>&nbsp;
                <input value="Ленинский район" type="checkbox" id="225_977_24702_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_977_24702_"> Ленинский район </label>

                <div id="region28786" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name28786"></a> <input
                        value="Щёлкино" type="checkbox" id="225_977_24702_28786_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_977_24702_28786_"> Щёлкино</label></div>
            </div>
            <div id="region20556" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20556"></a> <input
                    value="Саки" type="checkbox" id="225_977_20556_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_20556_"> Саки</label></div>
            <div id="region959" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name959"></a> <input
                    value="Севастополь" type="checkbox" id="225_977_959_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_959_"> Севастополь</label></div>
            <div id="region146" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name146"></a> <input
                    value="Симферополь" type="checkbox" id="225_977_146_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_146_"> Симферополь</label></div>
            <div id="region11472" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11472"></a> <input
                    value="Судак" type="checkbox" id="225_977_11472_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_11472_"> Судак</label></div>
            <div id="region11469" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11469"></a> <input
                    value="Феодосия" type="checkbox" id="225_977_11469_" name="reg" onclick="javascript:Generate(this)"><label
                    for="225_977_11469_"> Феодосия</label></div>
            <div id="region11470" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11470"></a> <input
                    value="Ялта" type="checkbox" id="225_977_11470_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_977_11470_"> Ялта</label></div>
        </div>
        <div id="region102444" style="display: none;"><a name="name102444" style="text-decoration: none" id="link102444"
                                                         href="javascript://"
                                                         onclick="regtree(11013);regtree(11020);regtree(11010);regtree(11012);regtree(11021);regtree(11069);regtree(11024);changeSign(102444);">
                +</a>&nbsp; <input value="Северный Кавказ" type="checkbox" id="225_102444_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_102444_"> Северный
                Кавказ </label>

            <div id="region11013" style="display: none;"><a name="name11013" style="text-decoration: none"
                                                            id="link11013" href="javascript://"
                                                            onclick="regtree(30);changeSign(11013);"> +</a>&nbsp; <input
                    value="Кабардино-Балкарская Республика" type="checkbox" id="225_102444_11013_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_102444_11013_"> Кабардино - Балкарская
                    Республика </label>

                <div id="region30" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name30"></a> <input
                        value="Нальчик" type="checkbox" id="225_102444_11013_30_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11013_30_"> Нальчик</label></div>
            </div>
            <div id="region11020" style="display: none;"><a name="name11020" style="text-decoration: none"
                                                            id="link11020" href="javascript://"
                                                            onclick="regtree(1104);changeSign(11020);"> +</a>&nbsp;
                <input value="Карачаево-Черкесская Республика" type="checkbox" id="225_102444_11020_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_102444_11020_"> Карачаево - Черкесская
                    Республика </label>

                <div id="region1104" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1104"></a> <input
                        value="Черкесск" type="checkbox" id="225_102444_11020_1104_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11020_1104_"> Черкесск</label></div>
            </div>
            <div id="region11010" style="display: none;"><a name="name11010" style="text-decoration: none"
                                                            id="link11010" href="javascript://"
                                                            onclick="regtree(11006);regtree(11007);regtree(21521);regtree(11008);regtree(11009);regtree(28);regtree(11011);changeSign(11010);">
                    +</a>&nbsp; <input value="Республика Дагестан" type="checkbox" id="225_102444_11010_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_102444_11010_"> Республика
                    Дагестан </label>

                <div id="region11006" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11006"></a> <input
                        value="Буйнакск" type="checkbox" id="225_102444_11010_11006_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11010_11006_"> Буйнакск</label></div>
                <div id="region11007" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11007"></a> <input
                        value="Дербент" type="checkbox" id="225_102444_11010_11007_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11010_11007_"> Дербент</label></div>
                <div id="region21521" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21521"></a> <input
                        value="Избербаш" type="checkbox" id="225_102444_11010_21521_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11010_21521_"> Избербаш</label></div>
                <div id="region11008" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11008"></a> <input
                        value="Каспийск" type="checkbox" id="225_102444_11010_11008_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11010_11008_"> Каспийск</label></div>
                <div id="region11009" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11009"></a> <input
                        value="Кизляр" type="checkbox" id="225_102444_11010_11009_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11010_11009_"> Кизляр</label></div>
                <div id="region28" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name28"></a> <input
                        value="Махачкала" type="checkbox" id="225_102444_11010_28_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11010_28_"> Махачкала</label></div>
                <div id="region11011" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11011"></a> <input
                        value="Хасавюрт" type="checkbox" id="225_102444_11010_11011_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11010_11011_"> Хасавюрт</label></div>
            </div>
            <div id="region11012" style="display: none;"><a name="name11012" style="text-decoration: none"
                                                            id="link11012" href="javascript://"
                                                            onclick="regtree(1092);changeSign(11012);"> +</a>&nbsp;
                <input value="Республика Ингушетия" type="checkbox" id="225_102444_11012_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_102444_11012_"> Республика Ингушетия </label>

                <div id="region1092" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1092"></a> <input
                        value="Назрань" type="checkbox" id="225_102444_11012_1092_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11012_1092_"> Назрань</label></div>
            </div>
            <div id="region11021" style="display: none;"><a name="name11021" style="text-decoration: none"
                                                            id="link11021" href="javascript://"
                                                            onclick="regtree(33);changeSign(11021);"> +</a>&nbsp; <input
                    value="Республика Северная Осетия-Алания" type="checkbox" id="225_102444_11021_" name="reg"
                    onclick="javascript:Generate(this)"><label for="225_102444_11021_"> Республика Северная Осетия -
                    Алания </label>

                <div id="region33" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name33"></a> <input
                        value="Владикавказ" type="checkbox" id="225_102444_11021_33_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11021_33_"> Владикавказ</label></div>
            </div>
            <div id="region11069" style="display: none;"><a name="name11069" style="text-decoration: none"
                                                            id="link11069" href="javascript://"
                                                            onclick="regtree(99456);regtree(11056);regtree(11057);regtree(11062);regtree(11063);regtree(11064);regtree(11067);regtree(36);changeSign(11069);">
                    +</a>&nbsp; <input value="Ставропольский край" type="checkbox" id="225_102444_11069_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_102444_11069_">
                    Ставропольский край </label>

                <div id="region99456" style="display: none;"><a name="name99456" style="text-decoration: none"
                                                                id="link99456" href="javascript://"
                                                                onclick="regtree(11055);changeSign(99456);"> +</a>&nbsp;
                    <input value="Буденновский район" type="checkbox" id="225_102444_11069_99456_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_102444_11069_99456_"> Буденновский
                        район </label>

                    <div id="region11055" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11055"></a>
                        <input value="Буденновск" type="checkbox" id="225_102444_11069_99456_11055_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_102444_11069_99456_11055_">
                            Буденновск</label></div>
                </div>
                <div id="region11056" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11056"></a> <input
                        value="Георгиевск" type="checkbox" id="225_102444_11069_11056_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11069_11056_"> Георгиевск</label>
                </div>
                <div id="region11057" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11057"></a> <input
                        value="Ессентуки" type="checkbox" id="225_102444_11069_11057_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11069_11057_"> Ессентуки</label>
                </div>
                <div id="region11062" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11062"></a> <input
                        value="Кисловодск" type="checkbox" id="225_102444_11069_11062_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11069_11062_"> Кисловодск</label>
                </div>
                <div id="region11063" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11063"></a> <input
                        value="Минеральные Воды" type="checkbox" id="225_102444_11069_11063_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11069_11063_"> Минеральные
                        Воды </label></div>
                <div id="region11064" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11064"></a> <input
                        value="Невинномысск" type="checkbox" id="225_102444_11069_11064_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11069_11064_"> Невинномысск</label>
                </div>
                <div id="region11067" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11067"></a> <input
                        value="Пятигорск" type="checkbox" id="225_102444_11069_11067_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11069_11067_"> Пятигорск</label>
                </div>
                <div id="region36" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name36"></a> <input
                        value="Ставрополь" type="checkbox" id="225_102444_11069_36_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11069_36_"> Ставрополь</label></div>
            </div>
            <div id="region11024" style="display: none;"><a name="name11024" style="text-decoration: none"
                                                            id="link11024" href="javascript://"
                                                            onclick="regtree(1106);changeSign(11024);"> +</a>&nbsp;
                <input value="Чеченская Республика" type="checkbox" id="225_102444_11024_" name="reg"
                       onclick="javascript:Generate(this)"><label for="225_102444_11024_"> Чеченская Республика </label>

                <div id="region1106" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1106"></a> <input
                        value="Грозный" type="checkbox" id="225_102444_11024_1106_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_102444_11024_1106_"> Грозный</label></div>
            </div>
        </div>
        <div id="region52" style="display: none;"><a name="name52" style="text-decoration: none" id="link52"
                                                     href="javascript://"
                                                     onclick="regtree(11158);regtree(11162);regtree(11176);regtree(11193);regtree(11225);regtree(11232);changeSign(52);">
                +</a>&nbsp; <input value="Урал" type="checkbox" id="225_52_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="225_52_"> Урал</label>

            <div id="region11158" style="display: none;"><a name="name11158" style="text-decoration: none"
                                                            id="link11158" href="javascript://"
                                                            onclick="regtree(53);regtree(11159);changeSign(11158);">
                    +</a>&nbsp; <input value="Курганская область" type="checkbox" id="225_52_11158_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_52_11158_"> Курганская
                    область </label>

                <div id="region53" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name53"></a> <input
                        value="Курган" type="checkbox" id="225_52_11158_53_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11158_53_"> Курган</label></div>
                <div id="region11159" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11159"></a> <input
                        value="Шадринск" type="checkbox" id="225_52_11158_11159_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11158_11159_"> Шадринск</label></div>
            </div>
            <div id="region11162" style="display: none;"><a name="name11162" style="text-decoration: none"
                                                            id="link11162" href="javascript://"
                                                            onclick="regtree(11160);regtree(29397);regtree(20720);regtree(11161);regtree(54);regtree(11164);regtree(20234);regtree(11165);regtree(20691);regtree(11166);regtree(11167);regtree(20654);regtree(11168);regtree(11169);regtree(11170);regtree(11171);regtree(21726);regtree(20224);regtree(20684);regtree(20672);regtree(11172);changeSign(11162);">
                    +</a>&nbsp; <input value="Свердловская область" type="checkbox" id="225_52_11162_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_52_11162_"> Свердловская
                    область </label>

                <div id="region11160" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11160"></a> <input
                        value="Асбест" type="checkbox" id="225_52_11162_11160_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11160_"> Асбест</label></div>
                <div id="region29397" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29397"></a> <input
                        value="Берёзовский" type="checkbox" id="225_52_11162_29397_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_29397_"> Берёзовский</label></div>
                <div id="region20720" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20720"></a> <input
                        value="Верхняя Пышма" type="checkbox" id="225_52_11162_20720_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_20720_"> Верхняя Пышма </label>
                </div>
                <div id="region11161" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11161"></a> <input
                        value="Верхняя Салда" type="checkbox" id="225_52_11162_11161_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11161_"> Верхняя Салда </label>
                </div>
                <div id="region54" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name54"></a> <input
                        value="Екатеринбург" type="checkbox" id="225_52_11162_54_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_54_"> Екатеринбург</label></div>
                <div id="region11164" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11164"></a> <input
                        value="Каменск-Уральский" type="checkbox" id="225_52_11162_11164_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11164_"> Каменск -
                        Уральский</label></div>
                <div id="region20234" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20234"></a> <input
                        value="Качканар" type="checkbox" id="225_52_11162_20234_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_20234_"> Качканар</label></div>
                <div id="region11165" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11165"></a> <input
                        value="Краснотурьинск" type="checkbox" id="225_52_11162_11165_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11165_"> Краснотурьинск</label>
                </div>
                <div id="region20691" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20691"></a> <input
                        value="Красноуфимск" type="checkbox" id="225_52_11162_20691_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_20691_"> Красноуфимск</label></div>
                <div id="region11166" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11166"></a> <input
                        value="Кушва" type="checkbox" id="225_52_11162_11166_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11166_"> Кушва</label></div>
                <div id="region11167" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11167"></a> <input
                        value="Лесной" type="checkbox" id="225_52_11162_11167_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11167_"> Лесной</label></div>
                <div id="region20654" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20654"></a> <input
                        value="Невьянск" type="checkbox" id="225_52_11162_20654_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_20654_"> Невьянск</label></div>
                <div id="region11168" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11168"></a> <input
                        value="Нижний Тагил" type="checkbox" id="225_52_11162_11168_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11168_"> Нижний Тагил </label>
                </div>
                <div id="region11169" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11169"></a> <input
                        value="Нижняя Тура" type="checkbox" id="225_52_11162_11169_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11169_"> Нижняя Тура </label></div>
                <div id="region11170" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11170"></a> <input
                        value="Новоуральск" type="checkbox" id="225_52_11162_11170_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11170_"> Новоуральск</label></div>
                <div id="region11171" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11171"></a> <input
                        value="Первоуральск" type="checkbox" id="225_52_11162_11171_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11171_"> Первоуральск</label></div>
                <div id="region21726" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21726"></a> <input
                        value="Полевской" type="checkbox" id="225_52_11162_21726_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_21726_"> Полевской</label></div>
                <div id="region20224" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20224"></a> <input
                        value="Ревда" type="checkbox" id="225_52_11162_20224_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_20224_"> Ревда</label></div>
                <div id="region20684" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20684"></a> <input
                        value="Реж" type="checkbox" id="225_52_11162_20684_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_20684_"> Реж</label></div>
                <div id="region20672" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20672"></a> <input
                        value="Североуральск" type="checkbox" id="225_52_11162_20672_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_20672_"> Североуральск</label>
                </div>
                <div id="region11172" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11172"></a> <input
                        value="Серов" type="checkbox" id="225_52_11162_11172_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11162_11172_"> Серов</label></div>
            </div>
            <div id="region11176" style="display: none;"><a name="name11176" style="text-decoration: none"
                                                            id="link11176" href="javascript://"
                                                            onclick="regtree(11173);regtree(11175);regtree(55);regtree(11178);changeSign(11176);">
                    +</a>&nbsp; <input value="Тюменская область" type="checkbox" id="225_52_11176_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_52_11176_"> Тюменская
                    область </label>

                <div id="region11173" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11173"></a> <input
                        value="Ишим" type="checkbox" id="225_52_11176_11173_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11176_11173_"> Ишим</label></div>
                <div id="region11175" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11175"></a> <input
                        value="Тобольск" type="checkbox" id="225_52_11176_11175_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11176_11175_"> Тобольск</label></div>
                <div id="region55" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name55"></a> <input
                        value="Тюмень" type="checkbox" id="225_52_11176_55_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11176_55_"> Тюмень</label></div>
                <div id="region11178" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11178"></a> <input
                        value="Ялуторовск" type="checkbox" id="225_52_11176_11178_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11176_11178_"> Ялуторовск</label></div>
            </div>
            <div id="region11193" style="display: none;"><a name="name11193" style="text-decoration: none"
                                                            id="link11193" href="javascript://"
                                                            onclick="regtree(11180);regtree(11181);regtree(11182);regtree(11184);regtree(1091);regtree(11186);regtree(11188);regtree(11189);regtree(973);regtree(11192);regtree(57);regtree(11177);changeSign(11193);">
                    +</a>&nbsp; <input value="Ханты-Мансийский автономный округ" type="checkbox" id="225_52_11193_"
                                       name="reg" onclick="javascript:Generate(this)"><label for="225_52_11193_"> Ханты
                    - Мансийский автономный округ </label>

                <div id="region11180" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11180"></a> <input
                        value="Когалым" type="checkbox" id="225_52_11193_11180_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11180_"> Когалым</label></div>
                <div id="region11181" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11181"></a> <input
                        value="Лангепас" type="checkbox" id="225_52_11193_11181_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11181_"> Лангепас</label></div>
                <div id="region11182" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11182"></a> <input
                        value="Мегион" type="checkbox" id="225_52_11193_11182_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11182_"> Мегион</label></div>
                <div id="region11184" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11184"></a> <input
                        value="Нефтеюганск" type="checkbox" id="225_52_11193_11184_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11184_"> Нефтеюганск</label></div>
                <div id="region1091" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1091"></a> <input
                        value="Нижневартовск" type="checkbox" id="225_52_11193_1091_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_1091_"> Нижневартовск</label></div>
                <div id="region11186" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11186"></a> <input
                        value="Нягань" type="checkbox" id="225_52_11193_11186_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11186_"> Нягань</label></div>
                <div id="region11188" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11188"></a> <input
                        value="Пыть-Ях" type="checkbox" id="225_52_11193_11188_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11188_"> Пыть - Ях</label></div>
                <div id="region11189" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11189"></a> <input
                        value="Радужный" type="checkbox" id="225_52_11193_11189_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11189_"> Радужный</label></div>
                <div id="region973" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name973"></a> <input
                        value="Сургут" type="checkbox" id="225_52_11193_973_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_973_"> Сургут</label></div>
                <div id="region11192" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11192"></a> <input
                        value="Урай" type="checkbox" id="225_52_11193_11192_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11192_"> Урай</label></div>
                <div id="region57" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name57"></a> <input
                        value="Ханты-Мансийск" type="checkbox" id="225_52_11193_57_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_57_"> Ханты - Мансийск</label>
                </div>
                <div id="region11177" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11177"></a> <input
                        value="Югорск" type="checkbox" id="225_52_11193_11177_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11193_11177_"> Югорск</label></div>
            </div>
            <div id="region11225" style="display: none;"><a name="name11225" style="text-decoration: none"
                                                            id="link11225" href="javascript://"
                                                            onclick="regtree(11200);regtree(11202);regtree(11207);regtree(235);regtree(11212);regtree(11214);regtree(100020);regtree(11218);regtree(11220);regtree(11223);regtree(56);changeSign(11225);">
                    +</a>&nbsp; <input value="Челябинская область" type="checkbox" id="225_52_11225_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="225_52_11225_"> Челябинская
                    область </label>

                <div id="region11200" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11200"></a> <input
                        value="Верхний Уфалей" type="checkbox" id="225_52_11225_11200_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_11200_"> Верхний Уфалей </label>
                </div>
                <div id="region11202" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11202"></a> <input
                        value="Златоуст" type="checkbox" id="225_52_11225_11202_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_11202_"> Златоуст</label></div>
                <div id="region11207" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11207"></a> <input
                        value="Копейск" type="checkbox" id="225_52_11225_11207_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_11207_"> Копейск</label></div>
                <div id="region235" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name235"></a> <input
                        value="Магнитогорск" type="checkbox" id="225_52_11225_235_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_235_"> Магнитогорск</label></div>
                <div id="region11212" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11212"></a> <input
                        value="Миасс" type="checkbox" id="225_52_11225_11212_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_11212_"> Миасс</label></div>
                <div id="region11214" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11214"></a> <input
                        value="Озёрск" type="checkbox" id="225_52_11225_11214_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_11214_"> Озёрск</label></div>
                <div id="region100020" style="display: none;"><a name="name100020" style="text-decoration: none"
                                                                 id="link100020" href="javascript://"
                                                                 onclick="regtree(11217);changeSign(100020);"> +</a>&nbsp;
                    <input value="Саткинский район" type="checkbox" id="225_52_11225_100020_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_52_11225_100020_"> Саткинский
                        район </label>

                    <div id="region11217" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11217"></a>
                        <input value="Сатка" type="checkbox" id="225_52_11225_100020_11217_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_52_11225_100020_11217_">
                            Сатка</label></div>
                </div>
                <div id="region11218" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11218"></a> <input
                        value="Снежинск" type="checkbox" id="225_52_11225_11218_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_11218_"> Снежинск</label></div>
                <div id="region11220" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11220"></a> <input
                        value="Троицк" type="checkbox" id="225_52_11225_11220_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_11220_"> Троицк</label></div>
                <div id="region11223" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11223"></a> <input
                        value="Усть-Катав" type="checkbox" id="225_52_11225_11223_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_11223_"> Усть - Катав</label></div>
                <div id="region56" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name56"></a> <input
                        value="Челябинск" type="checkbox" id="225_52_11225_56_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11225_56_"> Челябинск</label></div>
            </div>
            <div id="region11232" style="display: none;"><a name="name11232" style="text-decoration: none"
                                                            id="link11232" href="javascript://"
                                                            onclick="regtree(11228);regtree(100028);regtree(11230);regtree(11231);regtree(58);changeSign(11232);">
                    +</a>&nbsp; <input value="Ямало-Ненецкий автономный округ" type="checkbox" id="225_52_11232_"
                                       name="reg" onclick="javascript:Generate(this)"><label for="225_52_11232_"> Ямало
                    - Ненецкий автономный округ </label>

                <div id="region11228" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11228"></a> <input
                        value="Губкинский" type="checkbox" id="225_52_11232_11228_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11232_11228_"> Губкинский</label></div>
                <div id="region100028" style="display: none;"><a name="name100028" style="text-decoration: none"
                                                                 id="link100028" href="javascript://"
                                                                 onclick="regtree(11229);changeSign(100028);"> +</a>&nbsp;
                    <input value="Надымский район" type="checkbox" id="225_52_11232_100028_" name="reg"
                           onclick="javascript:Generate(this)"><label for="225_52_11232_100028_"> Надымский
                        район </label>

                    <div id="region11229" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11229"></a>
                        <input value="Надым" type="checkbox" id="225_52_11232_100028_11229_" name="reg"
                               onclick="javascript:Generate(this)"><label for="225_52_11232_100028_11229_">
                            Надым</label></div>
                </div>
                <div id="region11230" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11230"></a> <input
                        value="Новый Уренгой" type="checkbox" id="225_52_11232_11230_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11232_11230_"> Новый Уренгой </label>
                </div>
                <div id="region11231" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name11231"></a> <input
                        value="Ноябрьск" type="checkbox" id="225_52_11232_11231_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11232_11231_"> Ноябрьск</label></div>
                <div id="region58" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name58"></a> <input
                        value="Салехард" type="checkbox" id="225_52_11232_58_" name="reg"
                        onclick="javascript:Generate(this)"><label for="225_52_11232_58_"> Салехард</label></div>
            </div>
        </div>
    </div>
    <div id="region166" style="display: block;"><a name="name166" style="text-decoration: none" id="link166"
                                                   href="javascript://"
                                                   onclick="regtree(29386);regtree(167);regtree(168);regtree(149);regtree(159);regtree(207);regtree(208);regtree(209);regtree(170);regtree(171);regtree(187);changeSign(166);">
            +</a>&nbsp; <input value="СНГ (исключая Россию)" type="checkbox" id="166_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_"> СНГ(исключая Россию)</label>

        <div id="region29386" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29386"></a> <input
                value="Абхазия" type="checkbox" id="166_29386_" name="reg" onclick="javascript:Generate(this)"><label
                for="166_29386_"> Абхазия</label></div>
        <div id="region167" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name167"></a> <input
                value="Азербайджан" type="checkbox" id="166_167_" name="reg" onclick="javascript:Generate(this)"><label
                for="166_167_"> Азербайджан</label></div>
        <div id="region168" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name168"></a> <input
                value="Армения" type="checkbox" id="166_168_" name="reg" onclick="javascript:Generate(this)"><label
                for="166_168_"> Армения</label></div>
        <div id="region149" style="display: none;"><a name="name149" style="text-decoration: none" id="link149"
                                                      href="javascript://"
                                                      onclick="regtree(29632);regtree(29633);regtree(29631);regtree(29634);regtree(29630);regtree(29629);changeSign(149);">
                +</a>&nbsp; <input value="Беларусь" type="checkbox" id="166_149_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="166_149_"> Беларусь</label>

            <div id="region29632" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29632"></a> <input
                    value="Брест и область" type="checkbox" id="166_149_29632_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_149_29632_"> Брест и область </label></div>
            <div id="region29633" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29633"></a> <input
                    value="Витебск и область" type="checkbox" id="166_149_29633_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_149_29633_"> Витебск и область </label></div>
            <div id="region29631" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29631"></a> <input
                    value="Гомель и область" type="checkbox" id="166_149_29631_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_149_29631_"> Гомель и область </label></div>
            <div id="region29634" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29634"></a> <input
                    value="Гродно и область" type="checkbox" id="166_149_29634_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_149_29634_"> Гродно и область </label></div>
            <div id="region29630" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29630"></a> <input
                    value="Минск и область" type="checkbox" id="166_149_29630_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_149_29630_"> Минск и область </label></div>
            <div id="region29629" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29629"></a> <input
                    value="Могилёв и область" type="checkbox" id="166_149_29629_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_149_29629_"> Могилёв и область </label></div>
        </div>
        <div id="region159" style="display: none;"><a name="name159" style="text-decoration: none" id="link159"
                                                      href="javascript://"
                                                      onclick="regtree(29414);regtree(29404);regtree(29406);regtree(29403);regtree(29407);regtree(29408);regtree(29410);regtree(29411);regtree(29412);regtree(29413);regtree(29415);regtree(29416);regtree(29409);regtree(29417);changeSign(159);">
                +</a>&nbsp; <input value="Казахстан" type="checkbox" id="166_159_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="166_159_"> Казахстан</label>

            <div id="region29414" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29414"></a> <input
                    value="Актау и Мангистауская область" type="checkbox" id="166_159_29414_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29414_"> Актау и Мангистауская
                    область </label></div>
            <div id="region29404" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29404"></a> <input
                    value="Актобе и область" type="checkbox" id="166_159_29404_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29404_"> Актобе и область </label></div>
            <div id="region29406" style="display: none;"><a name="name29406" style="text-decoration: none"
                                                            id="link29406" href="javascript://"
                                                            onclick="regtree(162);regtree(10303);changeSign(29406);">
                    +</a>&nbsp; <input value="Алматы и область" type="checkbox" id="166_159_29406_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="166_159_29406_"> Алматы и
                    область </label>

                <div id="region162" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name162"></a> <input
                        value="Алматы" type="checkbox" id="166_159_29406_162_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_159_29406_162_"> Алматы</label></div>
                <div id="region10303" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10303"></a> <input
                        value="Талдыкорган" type="checkbox" id="166_159_29406_10303_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_159_29406_10303_"> Талдыкорган</label></div>
            </div>
            <div id="region29403" style="display: none;"><a name="name29403" style="text-decoration: none"
                                                            id="link29403" href="javascript://"
                                                            onclick="regtree(163);regtree(20809);changeSign(29403);">
                    +</a>&nbsp; <input value="Астана и Акмолинская область" type="checkbox" id="166_159_29403_"
                                       name="reg" onclick="javascript:Generate(this)"><label for="166_159_29403_">
                    Астана и Акмолинская область </label>

                <div id="region163" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name163"></a> <input
                        value="Астана" type="checkbox" id="166_159_29403_163_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_159_29403_163_"> Астана</label></div>
                <div id="region20809" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20809"></a> <input
                        value="Кокшетау" type="checkbox" id="166_159_29403_20809_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_159_29403_20809_"> Кокшетау</label></div>
            </div>
            <div id="region29407" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29407"></a> <input
                    value="Атырау и область" type="checkbox" id="166_159_29407_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29407_"> Атырау и область </label></div>
            <div id="region29408" style="display: none;"><a name="name29408" style="text-decoration: none"
                                                            id="link29408" href="javascript://"
                                                            onclick="regtree(165);regtree(10306);changeSign(29408);">
                    +</a>&nbsp; <input value="Восточно-Казахстанская область" type="checkbox" id="166_159_29408_"
                                       name="reg" onclick="javascript:Generate(this)"><label for="166_159_29408_">
                    Восточно - Казахстанская область </label>

                <div id="region165" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name165"></a> <input
                        value="Семей" type="checkbox" id="166_159_29408_165_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_159_29408_165_"> Семей</label></div>
                <div id="region10306" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10306"></a> <input
                        value="Усть-Каменогорск" type="checkbox" id="166_159_29408_10306_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_159_29408_10306_"> Усть -
                        Каменогорск</label></div>
            </div>
            <div id="region29410" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29410"></a> <input
                    value="Западно-Казахстанская область" type="checkbox" id="166_159_29410_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29410_"> Западно - Казахстанская
                    область </label></div>
            <div id="region29411" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29411"></a> <input
                    value="Караганда и область" type="checkbox" id="166_159_29411_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29411_"> Караганда и область </label></div>
            <div id="region29412" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29412"></a> <input
                    value="Костанай и область" type="checkbox" id="166_159_29412_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29412_"> Костанай и область </label></div>
            <div id="region29413" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29413"></a> <input
                    value="Кызылорда и область" type="checkbox" id="166_159_29413_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29413_"> Кызылорда и область </label></div>
            <div id="region29415" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29415"></a> <input
                    value="Павлодар и область" type="checkbox" id="166_159_29415_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29415_"> Павлодар и область </label></div>
            <div id="region29416" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29416"></a> <input
                    value="Северо-Казахстанская область" type="checkbox" id="166_159_29416_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29416_"> Северо - Казахстанская
                    область </label></div>
            <div id="region29409" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29409"></a> <input
                    value="Тараз и Жамбылская область" type="checkbox" id="166_159_29409_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29409_"> Тараз и Жамбылская область </label>
            </div>
            <div id="region29417" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29417"></a> <input
                    value="Южно-Казахстанская область" type="checkbox" id="166_159_29417_" name="reg"
                    onclick="javascript:Generate(this)"><label for="166_159_29417_"> Южно - Казахстанская
                    область </label></div>
        </div>
        <div id="region207" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name207"></a> <input
                value="Киргизия" type="checkbox" id="166_207_" name="reg" onclick="javascript:Generate(this)"><label
                for="166_207_"> Киргизия</label></div>
        <div id="region208" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name208"></a> <input
                value="Молдова" type="checkbox" id="166_208_" name="reg" onclick="javascript:Generate(this)"><label
                for="166_208_"> Молдова</label></div>
        <div id="region209" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name209"></a> <input
                value="Таджикистан" type="checkbox" id="166_209_" name="reg" onclick="javascript:Generate(this)"><label
                for="166_209_"> Таджикистан</label></div>
        <div id="region170" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name170"></a> <input
                value="Туркмения" type="checkbox" id="166_170_" name="reg" onclick="javascript:Generate(this)"><label
                for="166_170_"> Туркмения</label></div>
        <div id="region171" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name171"></a> <input
                value="Узбекистан" type="checkbox" id="166_171_" name="reg" onclick="javascript:Generate(this)"><label
                for="166_171_"> Узбекистан</label></div>
        <div id="region187" style="display: none;"><a name="name187" style="text-decoration: none" id="link187"
                                                      href="javascript://"
                                                      onclick="regtree(20525);regtree(20524);regtree(20528);regtree(20527);regtree(20526);changeSign(187);">
                +</a>&nbsp; <input value="Украина" type="checkbox" id="166_187_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="166_187_"> Украина</label>

            <div id="region20525" style="display: none;"><a name="name20525" style="text-decoration: none"
                                                            id="link20525" href="javascript://"
                                                            onclick="regtree(20537);regtree(20536);regtree(20539);regtree(20540);regtree(20538);changeSign(20525);">
                    +</a>&nbsp; <input value="Восток" type="checkbox" id="166_187_20525_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="166_187_20525_"> Восток</label>

                <div id="region20537" style="display: none;"><a name="name20537" style="text-decoration: none"
                                                                id="link20537" href="javascript://"
                                                                onclick="regtree(21775);regtree(141);regtree(10347);regtree(21773);regtree(28401);changeSign(20537);">
                        +</a>&nbsp; <input value="Днепропетровск и область" type="checkbox" id="166_187_20525_20537_"
                                           name="reg" onclick="javascript:Generate(this)"><label
                        for="166_187_20525_20537_"> Днепропетровск и область </label>

                    <div id="region21775" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21775"></a>
                        <input value="Днепродзержинск" type="checkbox" id="166_187_20525_20537_21775_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20537_21775_">
                            Днепродзержинск</label></div>
                    <div id="region141" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name141"></a> <input
                            value="Днепропетровск" type="checkbox" id="166_187_20525_20537_141_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20525_20537_141_">
                            Днепропетровск</label></div>
                    <div id="region10347" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10347"></a>
                        <input value="Кривой Рог" type="checkbox" id="166_187_20525_20537_10347_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20537_10347_"> Кривой
                            Рог </label></div>
                    <div id="region21773" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21773"></a>
                        <input value="Никополь" type="checkbox" id="166_187_20525_20537_21773_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20537_21773_">
                            Никополь</label></div>
                    <div id="region28401" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name28401"></a>
                        <input value="Павлоград" type="checkbox" id="166_187_20525_20537_28401_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20537_28401_">
                            Павлоград</label></div>
                </div>
                <div id="region20536" style="display: none;"><a name="name20536" style="text-decoration: none"
                                                                id="link20536" href="javascript://"
                                                                onclick="regtree(21774);regtree(142);regtree(20554);regtree(24876);regtree(10366);changeSign(20536);">
                        +</a>&nbsp; <input value="Донецк и область" type="checkbox" id="166_187_20525_20536_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="166_187_20525_20536_"> Донецк
                        и область </label>

                    <div id="region21774" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21774"></a>
                        <input value="Горловка" type="checkbox" id="166_187_20525_20536_21774_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20536_21774_">
                            Горловка</label></div>
                    <div id="region142" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name142"></a> <input
                            value="Донецк" type="checkbox" id="166_187_20525_20536_142_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20525_20536_142_"> Донецк</label>
                    </div>
                    <div id="region20554" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20554"></a>
                        <input value="Краматорск" type="checkbox" id="166_187_20525_20536_20554_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20536_20554_">
                            Краматорск</label></div>
                    <div id="region24876" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name24876"></a>
                        <input value="Макеевка" type="checkbox" id="166_187_20525_20536_24876_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20536_24876_">
                            Макеевка</label></div>
                    <div id="region10366" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10366"></a>
                        <input value="Мариуполь" type="checkbox" id="166_187_20525_20536_10366_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20536_10366_">
                            Мариуполь</label></div>
                </div>
                <div id="region20539" style="display: none;"><a name="name20539" style="text-decoration: none"
                                                                id="link20539" href="javascript://"
                                                                onclick="regtree(960);changeSign(20539);"> +</a>&nbsp;
                    <input value="Запорожье и область" type="checkbox" id="166_187_20525_20539_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20525_20539_"> Запорожье и
                        область </label>

                    <div id="region960" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name960"></a> <input
                            value="Запорожье" type="checkbox" id="166_187_20525_20539_960_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20525_20539_960_"> Запорожье</label>
                    </div>
                </div>
                <div id="region20540" style="display: none;"><a name="name20540" style="text-decoration: none"
                                                                id="link20540" href="javascript://"
                                                                onclick="regtree(24885);regtree(222);regtree(24893);changeSign(20540);">
                        +</a>&nbsp; <input value="Луганск и область" type="checkbox" id="166_187_20525_20540_"
                                           name="reg" onclick="javascript:Generate(this)"><label
                        for="166_187_20525_20540_"> Луганск и область </label>

                    <div id="region24885" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name24885"></a>
                        <input value="Алчевск" type="checkbox" id="166_187_20525_20540_24885_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20540_24885_">
                            Алчевск</label></div>
                    <div id="region222" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name222"></a> <input
                            value="Луганск" type="checkbox" id="166_187_20525_20540_222_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20525_20540_222_"> Луганск</label>
                    </div>
                    <div id="region24893" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name24893"></a>
                        <input value="Северодонецк" type="checkbox" id="166_187_20525_20540_24893_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20525_20540_24893_">
                            Северодонецк</label></div>
                </div>
                <div id="region20538" style="display: none;"><a name="name20538" style="text-decoration: none"
                                                                id="link20538" href="javascript://"
                                                                onclick="regtree(147);changeSign(20538);"> +</a>&nbsp;
                    <input value="Харьков и область" type="checkbox" id="166_187_20525_20538_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20525_20538_"> Харьков и
                        область </label>

                    <div id="region147" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name147"></a> <input
                            value="Харьков" type="checkbox" id="166_187_20525_20538_147_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20525_20538_147_"> Харьков</label>
                    </div>
                </div>
            </div>
            <div id="region20524" style="display: none;"><a name="name20524" style="text-decoration: none"
                                                            id="link20524" href="javascript://"
                                                            onclick="regtree(20532);regtree(20550);regtree(20529);regtree(20534);regtree(20531);regtree(20530);regtree(20535);regtree(20533);changeSign(20524);">
                    +</a>&nbsp; <input value="Запад" type="checkbox" id="166_187_20524_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="166_187_20524_"> Запад</label>

                <div id="region20532" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20532"></a> <input
                        value="Ивано-Франковск и область" type="checkbox" id="166_187_20524_20532_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20524_20532_"> Ивано - Франковск и
                        область </label></div>
                <div id="region20550" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20550"></a> <input
                        value="Луцк и Волынская область" type="checkbox" id="166_187_20524_20550_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20524_20550_"> Луцк и Волынская
                        область </label></div>
                <div id="region20529" style="display: none;"><a name="name20529" style="text-decoration: none"
                                                                id="link20529" href="javascript://"
                                                                onclick="regtree(144);changeSign(20529);"> +</a>&nbsp;
                    <input value="Львов и область" type="checkbox" id="166_187_20524_20529_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20524_20529_"> Львов и
                        область </label>

                    <div id="region144" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name144"></a> <input
                            value="Львов" type="checkbox" id="166_187_20524_20529_144_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20524_20529_144_"> Львов</label>
                    </div>
                </div>
                <div id="region20534" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20534"></a> <input
                        value="Ровно и область" type="checkbox" id="166_187_20524_20534_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20524_20534_"> Ровно и область </label>
                </div>
                <div id="region20531" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20531"></a> <input
                        value="Тернополь и область" type="checkbox" id="166_187_20524_20531_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20524_20531_"> Тернополь и
                        область </label></div>
                <div id="region20530" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20530"></a> <input
                        value="Ужгород и Закарпатская область" type="checkbox" id="166_187_20524_20530_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20524_20530_"> Ужгород и Закарпатская
                        область </label></div>
                <div id="region20535" style="display: none;"><a name="name20535" style="text-decoration: none"
                                                                id="link20535" href="javascript://"
                                                                onclick="regtree(961);changeSign(20535);"> +</a>&nbsp;
                    <input value="Хмельницкий и область" type="checkbox" id="166_187_20524_20535_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20524_20535_"> Хмельницкий и
                        область </label>

                    <div id="region961" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name961"></a> <input
                            value="Хмельницкий" type="checkbox" id="166_187_20524_20535_961_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20524_20535_961_">
                            Хмельницкий</label></div>
                </div>
                <div id="region20533" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20533"></a> <input
                        value="Черновцы и область" type="checkbox" id="166_187_20524_20533_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20524_20533_"> Черновцы и
                        область </label></div>
            </div>
            <div id="region20528" style="display: none;"><a name="name20528" style="text-decoration: none"
                                                            id="link20528" href="javascript://"
                                                            onclick="regtree(20552);regtree(20551);changeSign(20528);">
                    +</a>&nbsp; <input value="Север" type="checkbox" id="166_187_20528_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="166_187_20528_"> Север</label>

                <div id="region20552" style="display: none;"><a name="name20552" style="text-decoration: none"
                                                                id="link20552" href="javascript://"
                                                                onclick="regtree(965);changeSign(20552);"> +</a>&nbsp;
                    <input value="Сумы и область" type="checkbox" id="166_187_20528_20552_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20528_20552_"> Сумы и
                        область </label>

                    <div id="region965" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name965"></a> <input
                            value="Сумы" type="checkbox" id="166_187_20528_20552_965_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20528_20552_965_"> Сумы</label>
                    </div>
                </div>
                <div id="region20551" style="display: none;"><a name="name20551" style="text-decoration: none"
                                                                id="link20551" href="javascript://"
                                                                onclick="regtree(29053);changeSign(20551);"> +</a>&nbsp;
                    <input value="Чернигов и область" type="checkbox" id="166_187_20528_20551_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20528_20551_"> Чернигов и
                        область </label>

                    <div id="region29053" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name29053"></a>
                        <input value="Нежин" type="checkbox" id="166_187_20528_20551_29053_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20528_20551_29053_">
                            Нежин</label></div>
                </div>
            </div>
            <div id="region20527" style="display: none;"><a name="name20527" style="text-decoration: none"
                                                            id="link20527" href="javascript://"
                                                            onclick="regtree(20545);regtree(20547);regtree(20544);regtree(20548);regtree(20549);regtree(20546);changeSign(20527);">
                    +</a>&nbsp; <input value="Центр" type="checkbox" id="166_187_20527_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="166_187_20527_"> Центр</label>

                <div id="region20545" style="display: none;"><a name="name20545" style="text-decoration: none"
                                                                id="link20545" href="javascript://"
                                                                onclick="regtree(963);changeSign(20545);"> +</a>&nbsp;
                    <input value="Винница и область" type="checkbox" id="166_187_20527_20545_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20527_20545_"> Винница и
                        область </label>

                    <div id="region963" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name963"></a> <input
                            value="Винница" type="checkbox" id="166_187_20527_20545_963_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20527_20545_963_"> Винница</label>
                    </div>
                </div>
                <div id="region20547" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20547"></a> <input
                        value="Житомир и область" type="checkbox" id="166_187_20527_20547_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20527_20547_"> Житомир и
                        область </label></div>
                <div id="region20544" style="display: none;"><a name="name20544" style="text-decoration: none"
                                                                id="link20544" href="javascript://"
                                                                onclick="regtree(10369);regtree(143);changeSign(20544);">
                        +</a>&nbsp; <input value="Киев и область" type="checkbox" id="166_187_20527_20544_" name="reg"
                                           onclick="javascript:Generate(this)"><label for="166_187_20527_20544_"> Киев и
                        область </label>

                    <div id="region10369" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10369"></a>
                        <input value="Белая Церковь" type="checkbox" id="166_187_20527_20544_10369_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20527_20544_10369_"> Белая
                            Церковь </label></div>
                    <div id="region143" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name143"></a> <input
                            value="Киев" type="checkbox" id="166_187_20527_20544_143_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20527_20544_143_"> Киев</label>
                    </div>
                </div>
                <div id="region20548" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20548"></a> <input
                        value="Кировоград и область" type="checkbox" id="166_187_20527_20548_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20527_20548_"> Кировоград и
                        область </label></div>
                <div id="region20549" style="display: none;"><a name="name20549" style="text-decoration: none"
                                                                id="link20549" href="javascript://"
                                                                onclick="regtree(21609);regtree(964);changeSign(20549);">
                        +</a>&nbsp; <input value="Полтава и область" type="checkbox" id="166_187_20527_20549_"
                                           name="reg" onclick="javascript:Generate(this)"><label
                        for="166_187_20527_20549_"> Полтава и область </label>

                    <div id="region21609" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21609"></a>
                        <input value="Кременчуг" type="checkbox" id="166_187_20527_20549_21609_" name="reg"
                               onclick="javascript:Generate(this)"><label for="166_187_20527_20549_21609_">
                            Кременчуг</label></div>
                    <div id="region964" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name964"></a> <input
                            value="Полтава" type="checkbox" id="166_187_20527_20549_964_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20527_20549_964_"> Полтава</label>
                    </div>
                </div>
                <div id="region20546" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20546"></a> <input
                        value="Черкассы и область" type="checkbox" id="166_187_20527_20546_" name="reg"
                        onclick="javascript:Generate(this)"><label for="166_187_20527_20546_"> Черкассы и
                        область </label></div>
            </div>
            <div id="region20526" style="display: none;"><a name="name20526" style="text-decoration: none"
                                                            id="link20526" href="javascript://"
                                                            onclick="regtree(20543);regtree(20541);regtree(20542);changeSign(20526);">
                    +</a>&nbsp; <input value="Юг" type="checkbox" id="166_187_20526_" name="reg"
                                       onclick="javascript:Generate(this)"><label for="166_187_20526_"> Юг</label>

                <div id="region20543" style="display: none;"><a name="name20543" style="text-decoration: none"
                                                                id="link20543" href="javascript://"
                                                                onclick="regtree(148);changeSign(20543);"> +</a>&nbsp;
                    <input value="Николаев и область" type="checkbox" id="166_187_20526_20543_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20526_20543_"> Николаев и
                        область </label>

                    <div id="region148" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name148"></a> <input
                            value="Николаев" type="checkbox" id="166_187_20526_20543_148_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20526_20543_148_"> Николаев</label>
                    </div>
                </div>
                <div id="region20541" style="display: none;"><a name="name20541" style="text-decoration: none"
                                                                id="link20541" href="javascript://"
                                                                onclick="regtree(145);changeSign(20541);"> +</a>&nbsp;
                    <input value="Одесса и область" type="checkbox" id="166_187_20526_20541_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20526_20541_"> Одесса и
                        область </label>

                    <div id="region145" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name145"></a> <input
                            value="Одесса" type="checkbox" id="166_187_20526_20541_145_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20526_20541_145_"> Одесса</label>
                    </div>
                </div>
                <div id="region20542" style="display: none;"><a name="name20542" style="text-decoration: none"
                                                                id="link20542" href="javascript://"
                                                                onclick="regtree(962);changeSign(20542);"> +</a>&nbsp;
                    <input value="Херсон и область" type="checkbox" id="166_187_20526_20542_" name="reg"
                           onclick="javascript:Generate(this)"><label for="166_187_20526_20542_"> Херсон и
                        область </label>

                    <div id="region962" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name962"></a> <input
                            value="Херсон" type="checkbox" id="166_187_20526_20542_962_" name="reg"
                            onclick="javascript:Generate(this)"><label for="166_187_20526_20542_962_"> Херсон</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="region111" style="display: block;"><a name="name111" style="text-decoration: none" id="link111"
                                                   href="javascript://"
                                                   onclick="regtree(113);regtree(114);regtree(115);regtree(102);regtree(116);regtree(96);regtree(246);regtree(203);regtree(204);regtree(205);regtree(20574);regtree(118);regtree(119);regtree(120);regtree(180);regtree(121);regtree(122);regtree(980);regtree(983);regtree(123);regtree(124);regtree(10083);regtree(21610);regtree(125);regtree(126);regtree(127);changeSign(111);">
            +</a>&nbsp; <input value="Европа" type="checkbox" id="111_" name="reg"
                               onclick="javascript:Generate(this)"><label for="111_"> Европа</label>

        <div id="region113" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name113"></a> <input
                value="Австрия" type="checkbox" id="111_113_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_113_"> Австрия</label></div>
        <div id="region114" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name114"></a> <input
                value="Бельгия" type="checkbox" id="111_114_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_114_"> Бельгия</label></div>
        <div id="region115" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name115"></a> <input
                value="Болгария" type="checkbox" id="111_115_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_115_"> Болгария</label></div>
        <div id="region102" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name102"></a> <input
                value="Великобритания" type="checkbox" id="111_102_" name="reg"
                onclick="javascript:Generate(this)"><label for="111_102_"> Великобритания</label></div>
        <div id="region116" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name116"></a> <input
                value="Венгрия" type="checkbox" id="111_116_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_116_"> Венгрия</label></div>
        <div id="region96" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name96"></a> <input value="Германия"
                                                                                                        type="checkbox"
                                                                                                        id="111_96_"
                                                                                                        name="reg"
                                                                                                        onclick="javascript:Generate(this)"><label
                for="111_96_"> Германия</label></div>
        <div id="region246" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name246"></a> <input value="Греция"
                                                                                                          type="checkbox"
                                                                                                          id="111_246_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="111_246_"> Греция</label></div>
        <div id="region203" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name203"></a> <input value="Дания"
                                                                                                          type="checkbox"
                                                                                                          id="111_203_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="111_203_"> Дания</label></div>
        <div id="region204" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name204"></a> <input
                value="Испания" type="checkbox" id="111_204_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_204_"> Испания</label></div>
        <div id="region205" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name205"></a> <input value="Италия"
                                                                                                          type="checkbox"
                                                                                                          id="111_205_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="111_205_"> Италия</label></div>
        <div id="region20574" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20574"></a> <input
                value="Кипр" type="checkbox" id="111_20574_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_20574_"> Кипр</label></div>
        <div id="region118" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name118"></a> <input
                value="Нидерланды" type="checkbox" id="111_118_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_118_"> Нидерланды</label></div>
        <div id="region119" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name119"></a> <input
                value="Норвегия" type="checkbox" id="111_119_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_119_"> Норвегия</label></div>
        <div id="region120" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name120"></a> <input value="Польша"
                                                                                                          type="checkbox"
                                                                                                          id="111_120_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="111_120_"> Польша</label></div>
        <div id="region180" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name180"></a> <input value="Сербия"
                                                                                                          type="checkbox"
                                                                                                          id="111_180_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="111_180_"> Сербия</label></div>
        <div id="region121" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name121"></a> <input
                value="Словакия" type="checkbox" id="111_121_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_121_"> Словакия</label></div>
        <div id="region122" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name122"></a> <input
                value="Словения" type="checkbox" id="111_122_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_122_"> Словения</label></div>
        <div id="region980" style="display: none;"><a name="name980" style="text-decoration: none" id="link980"
                                                      href="javascript://"
                                                      onclick="regtree(206);regtree(117);regtree(179);changeSign(980);">
                +</a>&nbsp; <input value="Страны Балтии" type="checkbox" id="111_980_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="111_980_"> Страны Балтии </label>

            <div id="region206" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name206"></a> <input
                    value="Латвия" type="checkbox" id="111_980_206_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_980_206_"> Латвия</label></div>
            <div id="region117" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name117"></a> <input
                    value="Литва" type="checkbox" id="111_980_117_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_980_117_"> Литва</label></div>
            <div id="region179" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name179"></a> <input
                    value="Эстония" type="checkbox" id="111_980_179_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_980_179_"> Эстония</label></div>
        </div>
        <div id="region983" style="display: none;"><a name="name983" style="text-decoration: none" id="link983"
                                                      href="javascript://"
                                                      onclick="regtree(103668);regtree(103669);regtree(103670);regtree(103671);regtree(103672);regtree(103673);regtree(103674);regtree(103675);regtree(103676);regtree(103677);regtree(103678);regtree(103679);regtree(103680);regtree(103681);regtree(103682);regtree(103683);regtree(103684);regtree(103685);regtree(103686);regtree(103687);regtree(103688);regtree(103689);regtree(103690);regtree(103691);regtree(103692);regtree(103693);regtree(103694);regtree(103695);regtree(103696);regtree(103697);regtree(103698);regtree(103699);regtree(103700);regtree(103701);regtree(103702);regtree(103703);regtree(103704);regtree(103705);regtree(103706);regtree(103707);regtree(103708);regtree(103709);regtree(103710);regtree(103711);regtree(103712);regtree(103713);regtree(103714);regtree(103715);regtree(103716);regtree(103717);regtree(103718);regtree(103719);regtree(103720);regtree(103721);regtree(103722);regtree(103723);regtree(103724);regtree(103725);regtree(103726);regtree(103727);regtree(103728);regtree(103729);regtree(103730);regtree(103731);regtree(103732);regtree(103733);regtree(103734);regtree(103735);regtree(103736);regtree(103737);regtree(103738);regtree(103739);regtree(103740);regtree(103741);regtree(103742);regtree(103743);regtree(103744);regtree(103745);regtree(103746);regtree(103747);regtree(103748);changeSign(983);">
                +</a>&nbsp; <input value="Турция" type="checkbox" id="111_983_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="111_983_"> Турция</label>

            <div id="region103668" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103668"></a> <input
                    value="Провинция Агры" type="checkbox" id="111_983_103668_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103668_"> Провинция Агры </label></div>
            <div id="region103669" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103669"></a> <input
                    value="Провинция Адана" type="checkbox" id="111_983_103669_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103669_"> Провинция Адана </label></div>
            <div id="region103670" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103670"></a> <input
                    value="Провинция Адыяман" type="checkbox" id="111_983_103670_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103670_"> Провинция Адыяман </label></div>
            <div id="region103671" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103671"></a> <input
                    value="Провинция Айдын" type="checkbox" id="111_983_103671_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103671_"> Провинция Айдын </label></div>
            <div id="region103672" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103672"></a> <input
                    value="Провинция Аксарай" type="checkbox" id="111_983_103672_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103672_"> Провинция Аксарай </label></div>
            <div id="region103673" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103673"></a> <input
                    value="Провинция Амасья" type="checkbox" id="111_983_103673_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103673_"> Провинция Амасья </label></div>
            <div id="region103674" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103674"></a> <input
                    value="Провинция Анкара" type="checkbox" id="111_983_103674_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103674_"> Провинция Анкара </label></div>
            <div id="region103675" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103675"></a> <input
                    value="Провинция Анталья" type="checkbox" id="111_983_103675_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103675_"> Провинция Анталья </label></div>
            <div id="region103676" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103676"></a> <input
                    value="Провинция Ардахан" type="checkbox" id="111_983_103676_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103676_"> Провинция Ардахан </label></div>
            <div id="region103677" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103677"></a> <input
                    value="Провинция Артвин" type="checkbox" id="111_983_103677_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103677_"> Провинция Артвин </label></div>
            <div id="region103678" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103678"></a> <input
                    value="Провинция Афьонкарахисар" type="checkbox" id="111_983_103678_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103678_"> Провинция Афьонкарахисар </label>
            </div>
            <div id="region103679" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103679"></a> <input
                    value="Провинция Байбурт" type="checkbox" id="111_983_103679_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103679_"> Провинция Байбурт </label></div>
            <div id="region103680" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103680"></a> <input
                    value="Провинция Балыкесир" type="checkbox" id="111_983_103680_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103680_"> Провинция Балыкесир </label></div>
            <div id="region103681" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103681"></a> <input
                    value="Провинция Бартын" type="checkbox" id="111_983_103681_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103681_"> Провинция Бартын </label></div>
            <div id="region103682" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103682"></a> <input
                    value="Провинция Батман" type="checkbox" id="111_983_103682_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103682_"> Провинция Батман </label></div>
            <div id="region103683" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103683"></a> <input
                    value="Провинция Биледжик" type="checkbox" id="111_983_103683_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103683_"> Провинция Биледжик </label></div>
            <div id="region103684" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103684"></a> <input
                    value="Провинция Бингёль" type="checkbox" id="111_983_103684_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103684_"> Провинция Бингёль </label></div>
            <div id="region103685" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103685"></a> <input
                    value="Провинция Битлис" type="checkbox" id="111_983_103685_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103685_"> Провинция Битлис </label></div>
            <div id="region103686" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103686"></a> <input
                    value="Провинция Болу" type="checkbox" id="111_983_103686_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103686_"> Провинция Болу </label></div>
            <div id="region103687" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103687"></a> <input
                    value="Провинция Бурдур" type="checkbox" id="111_983_103687_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103687_"> Провинция Бурдур </label></div>
            <div id="region103688" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103688"></a> <input
                    value="Провинция Бурса" type="checkbox" id="111_983_103688_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103688_"> Провинция Бурса </label></div>
            <div id="region103689" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103689"></a> <input
                    value="Провинция Ван" type="checkbox" id="111_983_103689_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103689_"> Провинция Ван </label></div>
            <div id="region103690" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103690"></a> <input
                    value="Провинция Газиантеп" type="checkbox" id="111_983_103690_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103690_"> Провинция Газиантеп </label></div>
            <div id="region103691" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103691"></a> <input
                    value="Провинция Гиресун" type="checkbox" id="111_983_103691_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103691_"> Провинция Гиресун </label></div>
            <div id="region103692" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103692"></a> <input
                    value="Провинция Гюмюшхане" type="checkbox" id="111_983_103692_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103692_"> Провинция Гюмюшхане </label></div>
            <div id="region103693" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103693"></a> <input
                    value="Провинция Денизли" type="checkbox" id="111_983_103693_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103693_"> Провинция Денизли </label></div>
            <div id="region103694" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103694"></a> <input
                    value="Провинция Диярбакыр" type="checkbox" id="111_983_103694_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103694_"> Провинция Диярбакыр </label></div>
            <div id="region103695" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103695"></a> <input
                    value="Провинция Дюздже" type="checkbox" id="111_983_103695_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103695_"> Провинция Дюздже </label></div>
            <div id="region103696" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103696"></a> <input
                    value="Провинция Зонгулдак" type="checkbox" id="111_983_103696_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103696_"> Провинция Зонгулдак </label></div>
            <div id="region103697" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103697"></a> <input
                    value="Провинция Измир" type="checkbox" id="111_983_103697_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103697_"> Провинция Измир </label></div>
            <div id="region103698" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103698"></a> <input
                    value="Провинция Йозгат" type="checkbox" id="111_983_103698_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103698_"> Провинция Йозгат </label></div>
            <div id="region103699" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103699"></a> <input
                    value="Провинция Кайсери" type="checkbox" id="111_983_103699_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103699_"> Провинция Кайсери </label></div>
            <div id="region103700" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103700"></a> <input
                    value="Провинция Карабюк" type="checkbox" id="111_983_103700_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103700_"> Провинция Карабюк </label></div>
            <div id="region103701" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103701"></a> <input
                    value="Провинция Караман" type="checkbox" id="111_983_103701_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103701_"> Провинция Караман </label></div>
            <div id="region103702" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103702"></a> <input
                    value="Провинция Карс" type="checkbox" id="111_983_103702_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103702_"> Провинция Карс </label></div>
            <div id="region103703" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103703"></a> <input
                    value="Провинция Кастамону" type="checkbox" id="111_983_103703_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103703_"> Провинция Кастамону </label></div>
            <div id="region103704" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103704"></a> <input
                    value="Провинция Кахраманмараш" type="checkbox" id="111_983_103704_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103704_"> Провинция Кахраманмараш </label>
            </div>
            <div id="region103705" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103705"></a> <input
                    value="Провинция Килис" type="checkbox" id="111_983_103705_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103705_"> Провинция Килис </label></div>
            <div id="region103706" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103706"></a> <input
                    value="Провинция Коджаэли" type="checkbox" id="111_983_103706_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103706_"> Провинция Коджаэли </label></div>
            <div id="region103707" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103707"></a> <input
                    value="Провинция Конья" type="checkbox" id="111_983_103707_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103707_"> Провинция Конья </label></div>
            <div id="region103708" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103708"></a> <input
                    value="Провинция Кыркларели" type="checkbox" id="111_983_103708_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103708_"> Провинция Кыркларели </label>
            </div>
            <div id="region103709" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103709"></a> <input
                    value="Провинция Кыршехир" type="checkbox" id="111_983_103709_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103709_"> Провинция Кыршехир </label></div>
            <div id="region103710" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103710"></a> <input
                    value="Провинция Кырыккале" type="checkbox" id="111_983_103710_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103710_"> Провинция Кырыккале </label></div>
            <div id="region103711" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103711"></a> <input
                    value="Провинция Кютахья" type="checkbox" id="111_983_103711_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103711_"> Провинция Кютахья </label></div>
            <div id="region103712" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103712"></a> <input
                    value="Провинция Малатья" type="checkbox" id="111_983_103712_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103712_"> Провинция Малатья </label></div>
            <div id="region103713" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103713"></a> <input
                    value="Провинция Маниса" type="checkbox" id="111_983_103713_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103713_"> Провинция Маниса </label></div>
            <div id="region103714" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103714"></a> <input
                    value="Провинция Мардин" type="checkbox" id="111_983_103714_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103714_"> Провинция Мардин </label></div>
            <div id="region103715" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103715"></a> <input
                    value="Провинция Мерсин" type="checkbox" id="111_983_103715_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103715_"> Провинция Мерсин </label></div>
            <div id="region103716" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103716"></a> <input
                    value="Провинция Мугла" type="checkbox" id="111_983_103716_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103716_"> Провинция Мугла </label></div>
            <div id="region103717" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103717"></a> <input
                    value="Провинция Муш" type="checkbox" id="111_983_103717_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103717_"> Провинция Муш </label></div>
            <div id="region103718" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103718"></a> <input
                    value="Провинция Невшехир" type="checkbox" id="111_983_103718_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103718_"> Провинция Невшехир </label></div>
            <div id="region103719" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103719"></a> <input
                    value="Провинция Нигде" type="checkbox" id="111_983_103719_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103719_"> Провинция Нигде </label></div>
            <div id="region103720" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103720"></a> <input
                    value="Провинция Орду" type="checkbox" id="111_983_103720_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103720_"> Провинция Орду </label></div>
            <div id="region103721" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103721"></a> <input
                    value="Провинция Османие" type="checkbox" id="111_983_103721_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103721_"> Провинция Османие </label></div>
            <div id="region103722" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103722"></a> <input
                    value="Провинция Ризе" type="checkbox" id="111_983_103722_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103722_"> Провинция Ризе </label></div>
            <div id="region103723" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103723"></a> <input
                    value="Провинция Сакарья" type="checkbox" id="111_983_103723_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103723_"> Провинция Сакарья </label></div>
            <div id="region103724" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103724"></a> <input
                    value="Провинция Самсун" type="checkbox" id="111_983_103724_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103724_"> Провинция Самсун </label></div>
            <div id="region103725" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103725"></a> <input
                    value="Провинция Сивас" type="checkbox" id="111_983_103725_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103725_"> Провинция Сивас </label></div>
            <div id="region103726" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103726"></a> <input
                    value="Провинция Сиирт" type="checkbox" id="111_983_103726_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103726_"> Провинция Сиирт </label></div>
            <div id="region103727" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103727"></a> <input
                    value="Провинция Синоп" type="checkbox" id="111_983_103727_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103727_"> Провинция Синоп </label></div>
            <div id="region103728" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103728"></a> <input
                    value="Провинция Стамбул" type="checkbox" id="111_983_103728_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103728_"> Провинция Стамбул </label></div>
            <div id="region103729" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103729"></a> <input
                    value="Провинция Текирдаг" type="checkbox" id="111_983_103729_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103729_"> Провинция Текирдаг </label></div>
            <div id="region103730" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103730"></a> <input
                    value="Провинция Токат" type="checkbox" id="111_983_103730_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103730_"> Провинция Токат </label></div>
            <div id="region103731" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103731"></a> <input
                    value="Провинция Трабзон" type="checkbox" id="111_983_103731_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103731_"> Провинция Трабзон </label></div>
            <div id="region103732" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103732"></a> <input
                    value="Провинция Тунджели" type="checkbox" id="111_983_103732_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103732_"> Провинция Тунджели </label></div>
            <div id="region103733" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103733"></a> <input
                    value="Провинция Ушак" type="checkbox" id="111_983_103733_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103733_"> Провинция Ушак </label></div>
            <div id="region103734" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103734"></a> <input
                    value="Провинция Хаккяри" type="checkbox" id="111_983_103734_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103734_"> Провинция Хаккяри </label></div>
            <div id="region103735" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103735"></a> <input
                    value="Провинция Хатай" type="checkbox" id="111_983_103735_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103735_"> Провинция Хатай </label></div>
            <div id="region103736" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103736"></a> <input
                    value="Провинция Чанаккале" type="checkbox" id="111_983_103736_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103736_"> Провинция Чанаккале </label></div>
            <div id="region103737" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103737"></a> <input
                    value="Провинция Чанкыры" type="checkbox" id="111_983_103737_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103737_"> Провинция Чанкыры </label></div>
            <div id="region103738" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103738"></a> <input
                    value="Провинция Чорум" type="checkbox" id="111_983_103738_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103738_"> Провинция Чорум </label></div>
            <div id="region103739" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103739"></a> <input
                    value="Провинция Шанлыурфа" type="checkbox" id="111_983_103739_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103739_"> Провинция Шанлыурфа </label></div>
            <div id="region103740" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103740"></a> <input
                    value="Провинция Ширнак" type="checkbox" id="111_983_103740_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103740_"> Провинция Ширнак </label></div>
            <div id="region103741" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103741"></a> <input
                    value="Провинция Ыгдыр" type="checkbox" id="111_983_103741_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103741_"> Провинция Ыгдыр </label></div>
            <div id="region103742" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103742"></a> <input
                    value="Провинция Ыспарта" type="checkbox" id="111_983_103742_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103742_"> Провинция Ыспарта </label></div>
            <div id="region103743" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103743"></a> <input
                    value="Провинция Эдирне" type="checkbox" id="111_983_103743_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103743_"> Провинция Эдирне </label></div>
            <div id="region103744" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103744"></a> <input
                    value="Провинция Элязыг" type="checkbox" id="111_983_103744_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103744_"> Провинция Элязыг </label></div>
            <div id="region103745" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103745"></a> <input
                    value="Провинция Эрзинджан" type="checkbox" id="111_983_103745_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103745_"> Провинция Эрзинджан </label></div>
            <div id="region103746" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103746"></a> <input
                    value="Провинция Эрзурум" type="checkbox" id="111_983_103746_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103746_"> Провинция Эрзурум </label></div>
            <div id="region103747" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103747"></a> <input
                    value="Провинция Эскишехир" type="checkbox" id="111_983_103747_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103747_"> Провинция Эскишехир </label></div>
            <div id="region103748" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name103748"></a> <input
                    value="Провинция Ялова" type="checkbox" id="111_983_103748_" name="reg"
                    onclick="javascript:Generate(this)"><label for="111_983_103748_"> Провинция Ялова </label></div>
        </div>
        <div id="region123" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name123"></a> <input
                value="Финляндия" type="checkbox" id="111_123_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_123_"> Финляндия</label></div>
        <div id="region124" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name124"></a> <input
                value="Франция" type="checkbox" id="111_124_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_124_"> Франция</label></div>
        <div id="region10083" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name10083"></a> <input
                value="Хорватия" type="checkbox" id="111_10083_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_10083_"> Хорватия</label></div>
        <div id="region21610" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name21610"></a> <input
                value="Черногория" type="checkbox" id="111_21610_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_21610_"> Черногория</label></div>
        <div id="region125" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name125"></a> <input value="Чехия"
                                                                                                          type="checkbox"
                                                                                                          id="111_125_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="111_125_"> Чехия</label></div>
        <div id="region126" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name126"></a> <input
                value="Швейцария" type="checkbox" id="111_126_" name="reg" onclick="javascript:Generate(this)"><label
                for="111_126_"> Швейцария</label></div>
        <div id="region127" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name127"></a> <input value="Швеция"
                                                                                                          type="checkbox"
                                                                                                          id="111_127_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="111_127_"> Швеция</label></div>
    </div>
    <div id="region183" style="display: block;"><a name="name183" style="text-decoration: none" id="link183"
                                                   href="javascript://"
                                                   onclick="regtree(1004);regtree(169);regtree(994);regtree(20975);regtree(134);regtree(995);regtree(135);regtree(137);changeSign(183);">
            +</a>&nbsp; <input value="Азия" type="checkbox" id="183_" name="reg"
                               onclick="javascript:Generate(this)"><label for="183_"> Азия</label>

        <div id="region1004" style="display: none;"><a name="name1004" style="text-decoration: none" id="link1004"
                                                       href="javascript://"
                                                       onclick="regtree(1056);regtree(181);regtree(210);changeSign(1004);">
                +</a>&nbsp; <input value="Ближний Восток" type="checkbox" id="183_1004_" name="reg"
                                   onclick="javascript:Generate(this)"><label for="183_1004_"> Ближний Восток </label>

            <div id="region1056" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name1056"></a> <input
                    value="Египет" type="checkbox" id="183_1004_1056_" name="reg"
                    onclick="javascript:Generate(this)"><label for="183_1004_1056_"> Египет</label></div>
            <div id="region181" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name181"></a> <input
                    value="Израиль" type="checkbox" id="183_1004_181_" name="reg"
                    onclick="javascript:Generate(this)"><label for="183_1004_181_"> Израиль</label></div>
            <div id="region210" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name210"></a> <input
                    value="Объединённые Арабские Эмираты" type="checkbox" id="183_1004_210_" name="reg"
                    onclick="javascript:Generate(this)"><label for="183_1004_210_"> Объединённые Арабские
                    Эмираты </label></div>
        </div>
        <div id="region169" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name169"></a> <input value="Грузия"
                                                                                                          type="checkbox"
                                                                                                          id="183_169_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="183_169_"> Грузия</label></div>
        <div id="region994" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name994"></a> <input value="Индия"
                                                                                                          type="checkbox"
                                                                                                          id="183_994_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="183_994_"> Индия</label></div>
        <div id="region20975" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name20975"></a> <input
                value="Камбоджа" type="checkbox" id="183_20975_" name="reg" onclick="javascript:Generate(this)"><label
                for="183_20975_"> Камбоджа</label></div>
        <div id="region134" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name134"></a> <input value="Китай"
                                                                                                          type="checkbox"
                                                                                                          id="183_134_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="183_134_"> Китай</label></div>
        <div id="region995" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name995"></a> <input
                value="Таиланд" type="checkbox" id="183_995_" name="reg" onclick="javascript:Generate(this)"><label
                for="183_995_"> Таиланд</label></div>
        <div id="region135" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name135"></a> <input
                value="Южная Корея" type="checkbox" id="183_135_" name="reg" onclick="javascript:Generate(this)"><label
                for="183_135_"> Южная Корея </label></div>
        <div id="region137" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name137"></a> <input value="Япония"
                                                                                                          type="checkbox"
                                                                                                          id="183_137_"
                                                                                                          name="reg"
                                                                                                          onclick="javascript:Generate(this)"><label
                for="183_137_"> Япония</label></div>
    </div>
    <div id="region241" style="display: block;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name241"></a> <input value="Африка"
                                                                                                       type="checkbox"
                                                                                                       id="241_"
                                                                                                       name="reg"
                                                                                                       onclick="javascript:Generate(this)"><label
            for="241_"> Африка</label></div>
    <div id="region10002" style="display: block;"><a name="name10002" style="text-decoration: none" id="link10002"
                                                     href="javascript://"
                                                     onclick="regtree(95);regtree(84);changeSign(10002);"> +</a>&nbsp;
        <input value="Северная Америка" type="checkbox" id="10002_" name="reg"
               onclick="javascript:Generate(this)"><label for="10002_"> Северная Америка </label>

        <div id="region95" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name95"></a> <input value="Канада"
                                                                                                        type="checkbox"
                                                                                                        id="10002_95_"
                                                                                                        name="reg"
                                                                                                        onclick="javascript:Generate(this)"><label
                for="10002_95_"> Канада</label></div>
        <div id="region84" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name84"></a> <input value="США"
                                                                                                        type="checkbox"
                                                                                                        id="10002_84_"
                                                                                                        name="reg"
                                                                                                        onclick="javascript:Generate(this)"><label
                for="10002_84_"> США</label></div>
    </div>
    <div id="region10003" style="display: block;"><a name="name10003" style="text-decoration: none" id="link10003"
                                                     href="javascript://"
                                                     onclick="regtree(93);regtree(94);changeSign(10003);"> +</a>&nbsp;
        <input value="Южная Америка" type="checkbox" id="10003_" name="reg" onclick="javascript:Generate(this)"><label
            for="10003_"> Южная Америка </label>

        <div id="region93" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name93"></a> <input
                value="Аргентина" type="checkbox" id="10003_93_" name="reg" onclick="javascript:Generate(this)"><label
                for="10003_93_"> Аргентина</label></div>
        <div id="region94" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name94"></a> <input value="Бразилия"
                                                                                                        type="checkbox"
                                                                                                        id="10003_94_"
                                                                                                        name="reg"
                                                                                                        onclick="javascript:Generate(this)"><label
                for="10003_94_"> Бразилия</label></div>
    </div>
    <div id="region138" style="display: block;">
        <a name="name138" style="text-decoration: none" id="link138"
                                                   href="javascript://"
                                                   onclick="regtree(211);regtree(139);changeSign(138);"> +</a>&nbsp;
        <input value="Австралия и Океания" type="checkbox" id="138_" name="reg"
               onclick="javascript:Generate(this)"><label for="138_"> Австралия и Океания </label>

        <div id="region211" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name211"></a> <input
                value="Австралия" type="checkbox" id="138_211_" name="reg" onclick="javascript:Generate(this)"><label
                for="138_211_"> Австралия</label></div>
        <div id="region139" style="display: none;"> &nbsp;&nbsp;&nbsp;&nbsp;<a name="name139"></a> <input
                value="Новая Зеландия" type="checkbox" id="138_139_" name="reg"
                onclick="javascript:Generate(this)"><label for="138_139_"> Новая Зеландия </label></div>
    </div>

</td>

-->

<script type="text/javascript">

    window.onload= function() {
        document.getElementById('toggler').onclick = function() {
            openbox('coolect_kw','coolect_ad', this);
            return false;
        };
    };
    function openbox(id1, id2, toggler) {
        var div_ad = document.getElementById(id1);
        var div_kw = document.getElementById(id2);
        if(div_kw.style.display == 'block') {
            div_kw.style.display = 'none';
            div_ad.style.display = 'block';
            toggler.innerHTML = 'Открыть';
        }
        else {
            div_kw.style.display = 'block';
            div_ad.style.display = 'none';
            toggler.innerHTML = 'Закрыть';
        }
    }

</script>

<a id="toggler" href="#">Открыть</a>
<div class = "row">

    <div class="col-md-6" id="coolect_kw" style="display: none;"><pre>Запросы</pre></div>
    <div class="col-md-6" id="coolect_ad" style="display: block;"><pre>Объявления</pre></div>

</div>