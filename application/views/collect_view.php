<h1 id="">
    Сбор запросов
    <span class="glyphicon glyphicon_h1 glyphicon-question-sign" aria-hidden="true" onclick="tip_collect_1();"></span>
</h1>


<div class="row">

    <div class="col-md-4" id="coolect_kw" style="display: block;">

        <script type="text/javascript">
            // Instance the tour

            var tour = new Tour({
                name: 'текст',
                debug: true,
                storage: false,
                backdrop: true,
                backdropContainer: 'body',
                backdropPadding: 0,
                template: '<div class="popover" role="tooltip">' +
                '<div class="arrow"></div> ' +
                '<h3 class="popover-title"></h3> ' +
                '<div class="popover-content"></div> ' +
                '<div class="popover-navigation"> ' +
                '<div class="btn-group"> ' +
                '<button class="btn btn-sm btn-default" data-role="prev">Назад</button> ' +
                '<button class="btn btn-sm btn-default" data-role="next">Далее</button> ' +
                '<button class="btn btn-sm btn-default" data-role="pause-resume" data-pause-text="Pause" data-resume-text="Resume">Pause</button> </div> ' +
                '<button class="btn btn-sm btn-default" data-role="end">Закрыть</button> </div> ' +
                '</div>',
                steps: [
                    {
                        element: "#step1",
                        title: "Помощь",
                        content: "Введите список запросов для парсинга Wordstat",
                        placement: "right"
                    },
                    {
                        element: "#step2",
                        title: "Помощь",
                        content: "Укажите минимальную частоту для парсинга Wordstat",
                        placement: "right"
                    },
                    {
                        element: "#step3",
                        title: "Помощь",
                        content: "Начните набирать список регионов для выбора",
                        placement: "right"
                    },
                    {
                        element: "#step4",
                        title: "Помощь",
                        content: "Если не знаете кодов регионов, откройте справку с информацией",
                        placement: "right"
                    },
                    {
                        element: "#step5",
                        title: "Помощь",
                        content: "Нажмите кнопку, чтобы вывести список вложенных запросов",
                        placement: "right"
                    }
                ]
            });

            function tip_collect_1() {
                if (tour.ended()) {
                    tour.restart();
                } else {
                    tour.init();
                    tour.start();
                }
            }

        </script>


        <!--
        <div class="checkbox">
          <label>
                  <input type="checkbox" value="">
                  Первая опция&mdash;выбирайте его, если вам нравится этот пункт
                </label>
        </div>

        <div class="radio">
          <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                  Первая опция&mdash;выбирайте его, если вам нравится этот пункт
                </label>
        </div>
        <div class="radio page-header">
          <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Вторая опция - это несколько другое, и она отменяет выбор первой опции
                </label>
        </div>
        <div class="radio ">
          <label>
                  Запишите новые запросы
                </label>
        </div>
        -->
        <form id="new_phrase" action="/collect" method="post">

        </form>
        <div class="contaner-textarea-keywords ">

            <div id="step1">
                <textarea class="form-control text-input-new-keywords " rows="10" form="new_phrase"
                          name="request_new_get_ws" onkeydown="return limitLines(this, event)" id="textarea_limited"><?php
                    if (isset($_POST[request_new_get_ws])) {
                        $newzapros1 = explode("\n", $_POST[request_new_get_ws]);
                        echo $_POST[request_new_get_ws];
                    }
                    ?></textarea>
            </div>


            <div class="input-group" id="step2">
                <span class="input-group-addon"> Минимальная частота</span>
                <input type="text" class="form-control" name="request_new_get_ws_freq" form="new_phrase"
                       value="<? echo $_POST[request_new_get_ws_freq]; ?>">
            </div>

            <!--
            <div class="input-group" id="step3">
                <span class="input-group-addon"> № ГЕО</span>


                <input type="text" class="form-control" name="request_new_get_ws_geo" form="new_phrase"
                       value="<? echo $_POST[request_new_get_ws_geo]; ?>">
            </div>
            -->

            <div class="btn-group"  id="step3" ng-controller="GeoController">

                <input type="text" class="form-control dropdown-toggle" placeholder="ГЕО" ng-model="name" data-toggle="dropdown" name="requiredField" >

                <div ng-repeat="geo in geos" ng-cloak >{{ geo }}
                    <span class="glyphicon glyphicon_xs glyphicon-remove"
                          ng-click="geos.splice($index,1); codes.splice($index,1)"></span>
                </div>
                <ul class="dropdown-menu" role="menu">
                    <li ng-repeat="city in cities | filter: name" ng-cloak>
                        <a ng-click="geos.push(city.name);codes.push(city.code)" >
                            {{ city.name }} | {{ city.code}}
                        </a>
                    </li>
                </ul>
                <textarea type="text" class="form-control" name="request_new_get_ws_geo_2" form="new_phrase"  style="display:none;">{{ geos.join(',') }}</textarea>
                <textarea type="text" class="form-control" name="request_new_get_ws_geo_1" form="new_phrase"  style="display:none;">{{ codes.join(',') }}</textarea>
            </div>

            <script>
                function GeoController($scope) {
                    $scope.codes = [<?
                    if ((isset($_POST[request_new_get_ws_geo_1]))&&($_POST[request_new_get_ws_geo_1]!="")){
                        $geos_php = explode(",",$_POST[request_new_get_ws_geo_1]);
                        foreach ($geos_php as $geos_php_1){
                            echo '"'.$geos_php_1.'",';
                        }
                    }
                    ?>];
                    $scope.geos = [<?
                    if ((isset($_POST[request_new_get_ws_geo_2]))&&($_POST[request_new_get_ws_geo_2]!="")){
                        $codes_php = explode(",",$_POST[request_new_get_ws_geo_2]);
                        foreach ($codes_php as $codes_php_1){
                            echo '"'.$codes_php_1.'",';
                        }
                    }
                    ?>];

                    $scope.cities = [
                        {name: "Регионы", code: "0"},
                        {name: "Европа", code: "111"},
                        {name: "СНГ", code: "166"},
                        {name: "------------", code: "29"},
                        {name: "Универсальное", code: "318"},
                        {name: "Азия", code: "183"},
                        {name: "Москва", code: "213"},
                        {name: "Санкт-Петербург", code: "2"},
                        {name: "Россия", code: "225"},
                        {name: "Северная Америка", code: "10002"},
                        {name: "Южная Америка", code: "10003"},
                        {name: "Австралия и Океания", code: "138"},
                        {name: "Африка", code: "241"},
                        {name: "Арктика и Антарктика", code: "245"},
                        {name: "Москва", code: "213"},
                        {name: "Долгопрудный", code: "214"},
                        {name: "Дубна", code: "215"},
                        {name: "Пущино", code: "217"},
                        {name: "Другие города региона", code: "349"},
                        {name: "Универсальное", code: "350"},
                        {name: "Черноголовка", code: "219"},
                        {name: "Мытищи", code: "10740"},
                        {name: "Люберцы", code: "10738"},
                        {name: "Одинцово", code: "10743"},
                        {name: "Подольск", code: "10747"},
                        {name: "Жуковский", code: "20571"},
                        {name: "Сергиев Посад", code: "10752"},
                        {name: "Балашиха", code: "10716"},
                        {name: "Ногинск", code: "10742"},
                        {name: "Пушкино", code: "10748"},
                        {name: "Раменское", code: "10750"},
                        {name: "Химки", code: "10758"},
                        {name: "Щелково", code: "10765"},
                        {name: "Серпухов", code: "10754"},
                        {name: "Коломна", code: "10734"},
                        {name: "Орехово-Зуево", code: "10745"},
                        {name: "Клин", code: "10733"},
                        {name: "Чехов", code: "10761"},
                        {name: "Ступино", code: "10756"},
                        {name: "Красногорск", code: "10735"},
                        {name: "Электросталь", code: "20523"},
                        {name: "Королёв", code: "20728"},
                        {name: "Реутов", code: "21621"},
                        {name: "Видное", code: "10719"},
                        {name: "Железнодорожный", code: "21622"},
                        {name: "Домодедово", code: "10725"},
                        {name: "Солнечногорск", code: "10755"},
                        {name: "Дмитров", code: "10723"},
                        {name: "Павловский Посад", code: "10746"},
                        {name: "Другие города региона", code: "413"},
                        {name: "Универсальное", code: "414"},
                        {name: "Москва и область", code: "1"},
                        {name: "Белгородская область", code: "10645"},
                        {name: "Брянская область", code: "10650"},
                        {name: "Владимирcкая область", code: "10658"},
                        {name: "Воронежcкая область", code: "10672"},
                        {name: "Ивановская область", code: "10687"},
                        {name: "Калужская область", code: "10693"},
                        {name: "Костромская область", code: "10699"},
                        {name: "Курская область", code: "10705"},
                        {name: "Липецкая область", code: "10712"},
                        {name: "Орловская область", code: "10772"},
                        {name: "Рязанская область", code: "10776"},
                        {name: "Смоленская область", code: "10795"},
                        {name: "Тамбовская область", code: "10802"},
                        {name: "Тверская область", code: "10819"},
                        {name: "Тульская область", code: "10832"},
                        {name: "Ярославская область", code: "10841"},
                        {name: "Другие города региона", code: "445"},
                        {name: "Универсальное", code: "446"},
                        {name: "Санкт-Петербург и Ленинградская область", code: "10174"},
                        {name: "Архангельская область", code: "10842"},
                        {name: "Вологодская область", code: "10853"},
                        {name: "Калининградская область", code: "10857"},
                        {name: "Мурманская область", code: "10897"},
                        {name: "Новгородская область", code: "10904"},
                        {name: "Псковская область", code: "10926"},
                        {name: "Республика Карелия", code: "10933"},
                        {name: "Республика Коми", code: "10939"},
                        {name: "Ненецкий АО", code: "10176"},
                        {name: "Другие города региона", code: "477"},
                        {name: "Универсальное", code: "478"},
                        {name: "Астраханская область", code: "10946"},
                        {name: "Волгоградская область", code: "10950"},
                        {name: "Краснодарский край", code: "10995"},
                        {name: "Республика Адыгея", code: "11004"},
                        {name: "Республика Калмыкия", code: "11015"},
                        {name: "Ростовская область", code: "11029"},
                        {name: "Другие города региона", code: "509"},
                        {name: "Универсальное", code: "510"},
                        {name: "Кировская область", code: "11070"},
                        {name: "Республика Марий Эл", code: "11077"},
                        {name: "Нижегородская область", code: "11079"},
                        {name: "Оренбургская область", code: "11084"},
                        {name: "Пензенская область", code: "11095"},
                        {name: "Пермский край", code: "11108"},
                        {name: "Республика Башкортостан", code: "11111"},
                        {name: "Республика Мордовия", code: "11117"},
                        {name: "Татарстан", code: "11119"},
                        {name: "Самарская область", code: "11131"},
                        {name: "Саратовская область", code: "11146"},
                        {name: "Удмуртская республика", code: "11148"},
                        {name: "Ульяновская область", code: "11153"},
                        {name: "Чувашская республика", code: "11156"},
                        {name: "Другие города региона", code: "541"},
                        {name: "Универсальное", code: "542"},
                        {name: "Курганская область", code: "11158"},
                        {name: "Свердловская область", code: "11162"},
                        {name: "Тюменская область", code: "11176"},
                        {name: "Ханты-Мансийский АО", code: "11193"},
                        {name: "Челябинская область", code: "11225"},
                        {name: "Ямало-Ненецкий АО", code: "11232"},
                        {name: "Другие города региона", code: "573"},
                        {name: "Универсальное", code: "574"},
                        {name: "Алтайский край", code: "11235"},
                        {name: "Иркутская область", code: "11266"},
                        {name: "Кемеровская область", code: "11282"},
                        {name: "Красноярский край", code: "11309"},
                        {name: "Новосибирская область", code: "11316"},
                        {name: "Омская область", code: "11318"},
                        {name: "Республика Алтай", code: "10231"},
                        {name: "Республика Бурятия", code: "11330"},
                        {name: "Республика Тыва", code: "10233"},
                        {name: "Республика Хакасия", code: "11340"},
                        {name: "Томская область", code: "11353"},
                        {name: "Забайкальский край", code: "21949"},
                        {name: "Другие города региона", code: "605"},
                        {name: "Универсальное", code: "606"},
                        {name: "Магаданская область", code: "11403"},
                        {name: "Камчатский край", code: "11398"},
                        {name: "Еврейская автономная область", code: "10243"},
                        {name: "Чукотский автономный округ", code: "10251"},
                        {name: "Хабаровский край", code: "11457"},
                        {name: "Приморский край", code: "11409"},
                        {name: "Амурская область", code: "11375"},
                        {name: "Республика Саха (Якутия)", code: "11443"},
                        {name: "Сахалинская область", code: "11450"},
                        {name: "Атланта", code: "86"},
                        {name: "Вашингтон", code: "87"},
                        {name: "Детройт", code: "89"},
                        {name: "Сан-Франциско", code: "90"},
                        {name: "Сиэтл", code: "91"},
                        {name: "Лос-Анджелес", code: "200"},
                        {name: "Нью-Йорк", code: "202"},
                        {name: "Бостон", code: "223"},
                        {name: "Прочее", code: "637"},
                        {name: "Универсальное", code: "638"},
                        {name: "Прочее", code: "1048"},
                        {name: "Универсальное", code: "1049"},
                        {name: "Гейдельберг", code: "97"},
                        {name: "Кельн", code: "98"},
                        {name: "Мюнхен", code: "99"},
                        {name: "Франкфурт-на-Майне", code: "100"},
                        {name: "Штутгарт", code: "101"},
                        {name: "Берлин", code: "177"},
                        {name: "Гамбург", code: "178"},
                        {name: "Прочее", code: "701"},
                        {name: "Универсальное", code: "702"},
                        {name: "Нидерланды", code: "118"},
                        {name: "Норвегия", code: "119"},
                        {name: "Польша", code: "120"},
                        {name: "Словакия", code: "121"},
                        {name: "Словения", code: "122"},
                        {name: "Финляндия", code: "123"},
                        {name: "Франция", code: "124"},
                        {name: "Чехия", code: "125"},
                        {name: "Швейцария", code: "126"},
                        {name: "Швеция", code: "127"},
                        {name: "Сербия", code: "180"},
                        {name: "Дания", code: "203"},
                        {name: "Испания", code: "204"},
                        {name: "Италия", code: "205"},
                        {name: "Прочее", code: "733"},
                        {name: "Универсальное", code: "734"},
                        {name: "Германия", code: "96"},
                        {name: "Великобритания", code: "102"},
                        {name: "Австрия", code: "113"},
                        {name: "Бельгия", code: "114"},
                        {name: "Болгария", code: "115"},
                        {name: "Венгрия", code: "116"},
                        {name: "Греция", code: "246"},
                        {name: "Страны Балтии", code: "980"},
                        {name: "Кипр", code: "20574"},
                        {name: "Мальта", code: "10069"},
                        {name: "Хорватия", code: "10083"},
                        {name: "Черногория", code: "21610"},
                        {name: "Турция", code: "983"},
                        {name: "Новая Зеландия", code: "139"},
                        {name: "Австралия", code: "211"},
                        {name: "Прочее", code: "829"},
                        {name: "Универсальное", code: "830"},
                        {name: "Прочее", code: "893"},
                        {name: "Универсальное", code: "894"},
                        {name: "Минская область", code: "29630"},
                        {name: "Гомельская область", code: "29631"},
                        {name: "Витебская область", code: "29633"},
                        {name: "Брестская область", code: "29632"},
                        {name: "Гродненская область", code: "29634"},
                        {name: "Могилевская область", code: "29629"},
                        {name: "Минск", code: "157"},
                        {name: "Прочее", code: "925"},
                        {name: "Универсальное", code: "926"},
                        {name: "Алматинская область", code: "29406"},
                        {name: "Карагандинская область", code: "29411"},
                        {name: "Акмолинская область", code: "29403"},
                        {name: "Восточно-Казахстанская область", code: "29408"},
                        {name: "Павлодарская область", code: "29415"},
                        {name: "Костанайская область", code: "29412"},
                        {name: "Западно-Казахстанская область", code: "29410"},
                        {name: "Северо-Казахстанская область", code: "29416"},
                        {name: "Южно-Казахстанская область", code: "29417"},
                        {name: "Актюбинская область", code: "29404"},
                        {name: "Атырауская область", code: "29407"},
                        {name: "Мангистауская область", code: "29414"},
                        {name: "Жамбылская область", code: "29409"},
                        {name: "Кызылординская область", code: "29413"},
                        {name: "Туркмения", code: "170"},
                        {name: "Узбекистан", code: "171"},
                        {name: "Украина", code: "187"},
                        {name: "Киргизия", code: "207"},
                        {name: "Молдова", code: "208"},
                        {name: "Таджикистан", code: "209"},
                        {name: "Универсальное", code: "958"},
                        {name: "Прочее", code: "957"},
                        {name: "Беларусь", code: "149"},
                        {name: "Казахстан", code: "159"},
                        {name: "Азербайджан", code: "167"},
                        {name: "Армения", code: "168"},
                        {name: "Абхазия", code: "29386"},
                        {name: "Южная Осетия", code: "29387"},
                        {name: "Беер-Шева", code: "129"},
                        {name: "Иерусалим", code: "130"},
                        {name: "Тель-Авив", code: "131"},
                        {name: "Хайфа", code: "132"},
                        {name: "Прочее", code: "765"},
                        {name: "Универсальное", code: "766"},
                        {name: "Индия", code: "994"},
                        {name: "Таиланд", code: "995"},
                        {name: "Ближний Восток", code: "1004"},
                        {name: "Китай", code: "134"},
                        {name: "Корея", code: "135"},
                        {name: "Япония", code: "137"},
                        {name: "Прочее", code: "797"},
                        {name: "Универсальное", code: "798"},
                        {name: "Грузия", code: "169"},
                        {name: "Прочее", code: "861"},
                        {name: "Универсальное", code: "862"},
                        {name: "Киевская область", code: "20544"},
                        {name: "Полтавская область", code: "20549"},
                        {name: "Черкасская область", code: "20546"},
                        {name: "Винницкая область", code: "20545"},
                        {name: "Кировоградская область", code: "20548"},
                        {name: "Житомирская область", code: "20547"},
                        {name: "Харьковская область", code: "20538"},
                        {name: "Донецкая область", code: "20536"},
                        {name: "Днепропетровская область", code: "20537"},
                        {name: "Луганская область", code: "20540"},
                        {name: "Запорожская область", code: "20539"},
                        {name: "Одесская область", code: "20541"},
                        {name: "Николаевская область", code: "20543"},
                        {name: "Херсонская область", code: "20542"},
                        {name: "Львовская область", code: "20529"},
                        {name: "Хмельницкая область", code: "20535"},
                        {name: "Тернопольская область", code: "20531"},
                        {name: "Ровенская область", code: "20534"},
                        {name: "Черновицкая область", code: "20533"},
                        {name: "Волынская область", code: "20550"},
                        {name: "Закарпатская область", code: "20530"},
                        {name: "Ивано-Франковская область", code: "20532"},
                        {name: "Сумская область", code: "20552"},
                        {name: "Черниговская область", code: "20551"},
                        {name: "Кишинев", code: "10313"},
                        {name: "Тирасполь", code: "10317"},
                        {name: "Бельцы", code: "10314"},
                        {name: "Бендеры", code: "10315"},
                        {name: "Комрат", code: "33883"},
                        {name: "Универсальное", code: "115675"},
                        {name: "Прочее", code: "115674"},
                        {name: "Северо-Запад", code: "17"},
                        {name: "Юг", code: "26"},
                        {name: "Поволжье", code: "40"},
                        {name: "Урал", code: "52"},
                        {name: "Сибирь", code: "59"},
                        {name: "Дальний Восток", code: "73"},
                        {name: "Прочее", code: "381"},
                        {name: "Общероссийские", code: "382"},
                        {name: "Центр", code: "3"},
                        {name: "Северный Кавказ", code: "102444"},
                        {name: "Крымский федеральный округ", code: "115092"},
                        {name: "Другие города региона", code: "978"},
                        {name: "Универсальное", code: "979"},
                        {name: "Симферополь", code: "146"},
                        {name: "Севастополь", code: "959"},
                        {name: "Ялта", code: "11470"},
                        {name: "Керчь", code: "11464"},
                        {name: "Феодосия", code: "11469"},
                        {name: "Евпатория", code: "11463"},
                        {name: "Алушта", code: "11471"},
                        {name: "Прочее", code: "981"},
                        {name: "Универсальное", code: "982"},
                        {name: "Латвия", code: "206"},
                        {name: "Литва", code: "117"},
                        {name: "Эстония", code: "179"},
                        {name: "Прочее", code: "1054"},
                        {name: "Универсальное", code: "1055"},
                        {name: "Израиль", code: "181"},
                        {name: "Объединенные Арабские Эмираты", code: "210"},
                        {name: "Египет", code: "1056"},
                        {name: "Магадан", code: "79"},
                        {name: "Прочее", code: "21782"},
                        {name: "Универсальное", code: "21781"},
                        {name: "Петропавловск-Камчатский", code: "78"},
                        {name: "Универсальное", code: "21793"},
                        {name: "Прочее", code: "21794"},
                        {name: "Биробиджан", code: "11393"},
                        {name: "Универсальное", code: "21783"},
                        {name: "Прочее", code: "21784"},
                        {name: "Анадырь", code: "11458"},
                        {name: "Универсальное", code: "21785"},
                        {name: "Прочее", code: "21786"},
                        {name: "Хабаровск", code: "76"},
                        {name: "Комсомольск-на-Амуре", code: "11453"},
                        {name: "Универсальное", code: "21789"},
                        {name: "Прочее", code: "21790"},
                        {name: "Владивосток", code: "75"},
                        {name: "Находка", code: "974"},
                        {name: "Уссурийск", code: "11426"},
                        {name: "Прочее", code: "21780"},
                        {name: "Универсальное", code: "21779"},
                        {name: "Благовещенск", code: "77"},
                        {name: "Универсальное", code: "21791"},
                        {name: "Прочее", code: "21792"},
                        {name: "Белогорск", code: "11374"},
                        {name: "Тында", code: "11391"},
                        {name: "Якутск", code: "74"},
                        {name: "Универсальное", code: "21787"},
                        {name: "Прочее", code: "21788"},
                        {name: "Южно-Сахалинск", code: "80"},
                        {name: "Универсальное", code: "21777"},
                        {name: "Прочее", code: "21778"},
                        {name: "Барнаул", code: "197"},
                        {name: "Бийск", code: "975"},
                        {name: "Рубцовск", code: "11251"},
                        {name: "Универсальное", code: "21796"},
                        {name: "Прочее", code: "21797"},
                        {name: "Ангарск", code: "11256"},
                        {name: "Братск", code: "976"},
                        {name: "Иркутск", code: "63"},
                        {name: "Усть-Илимск", code: "11273"},
                        {name: "Универсальное", code: "21798"},
                        {name: "Прочее", code: "21799"},
                        {name: "Кемерово", code: "64"},
                        {name: "Междуреченск", code: "11287"},
                        {name: "Новокузнецк", code: "237"},
                        {name: "Прокопьевск", code: "11291"},
                        {name: "Универсальное", code: "21800"},
                        {name: "Прочее", code: "21801"},
                        {name: "Ачинск", code: "11302"},
                        {name: "Красноярск", code: "62"},
                        {name: "Норильск", code: "11311"},
                        {name: "Железногорск", code: "20086"},
                        {name: "Универсальное", code: "21802"},
                        {name: "Прочее", code: "21803"},
                        {name: "Кайеркан", code: "11306"},
                        {name: "Бердск", code: "11314"},
                        {name: "Новосибирск", code: "65"},
                        {name: "Универсальное", code: "21804"},
                        {name: "Прочее", code: "21805"},
                        {name: "Омск", code: "66"},
                        {name: "Прочее", code: "21807"},
                        {name: "Универсальное", code: "21806"},
                        {name: "Горно-Алтайск", code: "11319"},
                        {name: "Универсальное", code: "21808"},
                        {name: "Прочее", code: "21809"},
                        {name: "Улан-Удэ", code: "198"},
                        {name: "Универсальное", code: "21810"},
                        {name: "Прочее", code: "21811"},
                        {name: "Кызыл", code: "11333"},
                        {name: "Универсальное", code: "21812"},
                        {name: "Прочее", code: "21813"},
                        {name: "Абакан", code: "1095"},
                        {name: "Саяногорск", code: "11341"},
                        {name: "Универсальное", code: "21814"},
                        {name: "Прочее", code: "21815"},
                        {name: "Томск", code: "67"},
                        {name: "Универсальное", code: "21816"},
                        {name: "Прочее", code: "21817"},
                        {name: "Северск", code: "11351"},
                        {name: "Курган", code: "53"},
                        {name: "Универсальное", code: "21825"},
                        {name: "Прочее", code: "21826"},
                        {name: "Екатеринбург", code: "54"},
                        {name: "Каменск-Уральский", code: "11164"},
                        {name: "Нижний Тагил", code: "11168"},
                        {name: "Новоуральск", code: "11170"},
                        {name: "Первоуральск", code: "11171"},
                        {name: "Прочее", code: "21828"},
                        {name: "Универсальное", code: "21827"},
                        {name: "Тюмень", code: "55"},
                        {name: "Тобольск", code: "11175"},
                        {name: "Универсальное", code: "21829"},
                        {name: "Прочее", code: "21830"},
                        {name: "Ишим", code: "11173"},
                        {name: "Ханты-Мансийск", code: "57"},
                        {name: "Сургут", code: "973"},
                        {name: "Нижневартовск", code: "1091"},
                        {name: "Универсальное", code: "21831"},
                        {name: "Прочее", code: "21832"},
                        {name: "Челябинск", code: "56"},
                        {name: "Магнитогорск", code: "235"},
                        {name: "Миасс", code: "11212"},
                        {name: "Златоуст", code: "11202"},
                        {name: "Сатка", code: "11217"},
                        {name: "Озерск", code: "11214"},
                        {name: "Снежинск", code: "11218"},
                        {name: "Универсальное", code: "21833"},
                        {name: "Прочее", code: "21834"},
                        {name: "Салехард", code: "58"},
                        {name: "Универсальное", code: "21835"},
                        {name: "Прочее", code: "21836"},
                        {name: "Киров", code: "46"},
                        {name: "Универсальное", code: "21837"},
                        {name: "Прочее", code: "21838"},
                        {name: "Кирово-Чепецк", code: "11071"},
                        {name: "Йошкар-Ола", code: "41"},
                        {name: "Универсальное", code: "21839"},
                        {name: "Прочее", code: "21840"},
                        {name: "Арзамас", code: "11080"},
                        {name: "Нижний Новгород", code: "47"},
                        {name: "Саров", code: "11083"},
                        {name: "Универсальное", code: "21841"},
                        {name: "Прочее", code: "21842"},
                        {name: "Дзержинск", code: "972"},
                        {name: "Сатис", code: "20258"},
                        {name: "Кстово", code: "20044"},
                        {name: "Выкса", code: "20040"},
                        {name: "Оренбург", code: "48"},
                        {name: "Орск", code: "11091"},
                        {name: "Универсальное", code: "21843"},
                        {name: "Прочее", code: "21844"},
                        {name: "Пенза", code: "49"},
                        {name: "Универсальное", code: "21845"},
                        {name: "Прочее", code: "21846"},
                        {name: "Пермь", code: "50"},
                        {name: "Соликамск", code: "11110"},
                        {name: "Универсальное", code: "21847"},
                        {name: "Прочее", code: "21848"},
                        {name: "Уфа", code: "172"},
                        {name: "Нефтекамск", code: "11114"},
                        {name: "Салават", code: "11115"},
                        {name: "Стерлитамак", code: "11116"},
                        {name: "Универсальное", code: "21849"},
                        {name: "Прочее", code: "21850"},
                        {name: "Саранск", code: "42"},
                        {name: "Универсальное", code: "21852"},
                        {name: "Прочее", code: "21853"},
                        {name: "Казань", code: "43"},
                        {name: "Набережные Челны", code: "236"},
                        {name: "Нижнекамск", code: "11127"},
                        {name: "Универсальное", code: "21854"},
                        {name: "Прочее", code: "21855"},
                        {name: "Елабуга", code: "11123"},
                        {name: "Альметьевск", code: "11121"},
                        {name: "Бугульма", code: "11122"},
                        {name: "Зеленодольск", code: "11125"},
                        {name: "Чистополь", code: "11129"},
                        {name: "Самара", code: "51"},
                        {name: "Тольятти", code: "240"},
                        {name: "Сызрань", code: "11139"},
                        {name: "Универсальное", code: "21856"},
                        {name: "Прочее", code: "21857"},
                        {name: "Жигулевск", code: "11132"},
                        {name: "Саратов", code: "194"},
                        {name: "Балаково", code: "11143"},
                        {name: "Универсальное", code: "21858"},
                        {name: "Прочее", code: "21859"},
                        {name: "Энгельс", code: "11147"},
                        {name: "Ижевск", code: "44"},
                        {name: "Глазов", code: "11150"},
                        {name: "Универсальное", code: "21860"},
                        {name: "Прочее", code: "21861"},
                        {name: "Сарапул", code: "11152"},
                        {name: "Ульяновск", code: "195"},
                        {name: "Димитровград", code: "11155"},
                        {name: "Универсальное", code: "21862"},
                        {name: "Прочее", code: "21863"},
                        {name: "Чебоксары", code: "45"},
                        {name: "Универсальное", code: "21864"},
                        {name: "Прочее", code: "21865"},
                        {name: "Астрахань", code: "37"},
                        {name: "Универсальное", code: "21866"},
                        {name: "Прочее", code: "21867"},
                        {name: "Волгоград", code: "38"},
                        {name: "Волжский", code: "10951"},
                        {name: "Универсальное", code: "21868"},
                        {name: "Прочее", code: "21869"},
                        {name: "Анапа", code: "1107"},
                        {name: "Краснодар", code: "35"},
                        {name: "Новороссийск", code: "970"},
                        {name: "Сочи", code: "239"},
                        {name: "Туапсе", code: "1058"},
                        {name: "Геленджик", code: "10990"},
                        {name: "Армавир", code: "10987"},
                        {name: "Ейск", code: "10993"},
                        {name: "Универсальное", code: "21870"},
                        {name: "Прочее", code: "21871"},
                        {name: "Майкоп", code: "1093"},
                        {name: "Универсальное", code: "21872"},
                        {name: "Прочее", code: "21873"},
                        {name: "Махачкала", code: "28"},
                        {name: "Универсальное", code: "21874"},
                        {name: "Прочее", code: "21875"},
                        {name: "Назрань", code: "1092"},
                        {name: "Универсальное", code: "21876"},
                        {name: "Прочее", code: "21877"},
                        {name: "Нальчик", code: "30"},
                        {name: "Универсальное", code: "21878"},
                        {name: "Прочее", code: "21879"},
                        {name: "Элиста", code: "1094"},
                        {name: "Универсальное", code: "21880"},
                        {name: "Прочее", code: "21881"},
                        {name: "Черкесск", code: "1104"},
                        {name: "Универсальное", code: "21882"},
                        {name: "Прочее", code: "21883"},
                        {name: "Владикавказ", code: "33"},
                        {name: "Универсальное", code: "21884"},
                        {name: "Прочее", code: "21885"},
                        {name: "Ростов-на-Дону", code: "39"},
                        {name: "Шахты", code: "11053"},
                        {name: "Таганрог", code: "971"},
                        {name: "Новочеркасск", code: "238"},
                        {name: "Волгодонск", code: "11036"},
                        {name: "Универсальное", code: "21886"},
                        {name: "Прочее", code: "21887"},
                        {name: "Каменск-Шахтинский", code: "11043"},
                        {name: "Ставрополь", code: "36"},
                        {name: "Пятигорск", code: "11067"},
                        {name: "Минеральные Воды", code: "11063"},
                        {name: "Ессентуки", code: "11057"},
                        {name: "Кисловодск", code: "11062"},
                        {name: "Универсальное", code: "21888"},
                        {name: "Прочее", code: "21889"},
                        {name: "Невинномысск", code: "11064"},
                        {name: "Грозный", code: "1106"},
                        {name: "Универсальное", code: "21890"},
                        {name: "Прочее", code: "21891"},
                        {name: "Санкт-Петербург", code: "2"},
                        {name: "Выборг", code: "969"},
                        {name: "Гатчина", code: "10867"},
                        {name: "Универсальное", code: "21892"},
                        {name: "Прочее", code: "21893"},
                        {name: "Архангельск", code: "20"},
                        {name: "Северодвинск", code: "10849"},
                        {name: "Универсальное", code: "21894"},
                        {name: "Прочее", code: "21895"},
                        {name: "Вологда", code: "21"},
                        {name: "Универсальное", code: "21896"},
                        {name: "Прочее", code: "21897"},
                        {name: "Череповец", code: "968"},
                        {name: "Калининград", code: "22"},
                        {name: "Универсальное", code: "21898"},
                        {name: "Прочее", code: "21899"},
                        {name: "Апатиты", code: "10894"},
                        {name: "Мурманск", code: "23"},
                        {name: "Универсальное", code: "21900"},
                        {name: "Прочее", code: "21901"},
                        {name: "Великий Новгород", code: "24"},
                        {name: "Универсальное", code: "21902"},
                        {name: "Прочее", code: "21903"},
                        {name: "Псков", code: "25"},
                        {name: "Великие Луки", code: "10928"},
                        {name: "Универсальное", code: "21904"},
                        {name: "Прочее", code: "21905"},
                        {name: "Петрозаводск", code: "18"},
                        {name: "Универсальное", code: "21906"},
                        {name: "Прочее", code: "21907"},
                        {name: "Сортавала", code: "10937"},
                        {name: "Сыктывкар", code: "19"},
                        {name: "Ухта", code: "10945"},
                        {name: "Универсальное", code: "21908"},
                        {name: "Прочее", code: "21909"},
                        {name: "Белгород", code: "4"},
                        {name: "Старый Оскол", code: "10649"},
                        {name: "Универсальное", code: "21910"},
                        {name: "Прочее", code: "21911"},
                        {name: "Брянск", code: "191"},
                        {name: "Универсальное", code: "21912"},
                        {name: "Прочее", code: "21913"},
                        {name: "Владимир", code: "192"},
                        {name: "Александров", code: "10656"},
                        {name: "Гусь-Хрустальный", code: "10661"},
                        {name: "Муром", code: "10668"},
                        {name: "Универсальное", code: "21914"},
                        {name: "Прочее", code: "21915"},
                        {name: "Ковров", code: "10664"},
                        {name: "Суздаль", code: "10671"},
                        {name: "Воронеж", code: "193"},
                        {name: "Универсальное", code: "21916"},
                        {name: "Прочее", code: "21917"},
                        {name: "Иваново", code: "5"},
                        {name: "Универсальное", code: "21918"},
                        {name: "Прочее", code: "21919"},
                        {name: "Калуга", code: "6"},
                        {name: "Обнинск", code: "967"},
                        {name: "Универсальное", code: "21920"},
                        {name: "Прочее", code: "21921"},
                        {name: "Кострома", code: "7"},
                        {name: "Универсальное", code: "21922"},
                        {name: "Прочее", code: "21923"},
                        {name: "Курск", code: "8"},
                        {name: "Универсальное", code: "21924"},
                        {name: "Прочее", code: "21925"},
                        {name: "Липецк", code: "9"},
                        {name: "Универсальное", code: "21926"},
                        {name: "Прочее", code: "21927"},
                        {name: "Орел", code: "10"},
                        {name: "Универсальное", code: "21928"},
                        {name: "Прочее", code: "21929"},
                        {name: "Рязань", code: "11"},
                        {name: "Универсальное", code: "21930"},
                        {name: "Прочее", code: "21931"},
                        {name: "Смоленск", code: "12"},
                        {name: "Универсальное", code: "21932"},
                        {name: "Прочее", code: "21933"},
                        {name: "Тамбов", code: "13"},
                        {name: "Универсальное", code: "21934"},
                        {name: "Прочее", code: "21935"},
                        {name: "Тверь", code: "14"},
                        {name: "Универсальное", code: "21936"},
                        {name: "Прочее", code: "21937"},
                        {name: "Ржев", code: "10820"},
                        {name: "Тула", code: "15"},
                        {name: "Универсальное", code: "21938"},
                        {name: "Прочее", code: "21939"},
                        {name: "Новомосковск", code: "10830"},
                        {name: "Ярославль", code: "16"},
                        {name: "Рыбинск", code: "10839"},
                        {name: "Переславль", code: "10837"},
                        {name: "Универсальное", code: "21940"},
                        {name: "Прочее", code: "21941"},
                        {name: "Ростов", code: "10838"},
                        {name: "Углич", code: "10840"},
                        {name: "Канада", code: "95"},
                        {name: "США", code: "84"},
                        {name: "Мексика", code: "20271"},
                        {name: "Универсальное", code: "21942"},
                        {name: "Прочее", code: "21943"},
                        {name: "Аргентина", code: "93"},
                        {name: "Бразилия", code: "94"},
                        {name: "Прочее", code: "669"},
                        {name: "Универсальное", code: "670"},
                        {name: "Чита", code: "68"},
                        {name: "Универсальное", code: "21818"},
                        {name: "Прочее", code: "21819"},
                        {name: "Минск", code: "157"},
                        {name: "Жодино", code: "26034"},
                        {name: "Универсальное", code: "101852"},
                        {name: "Прочее", code: "101853"},
                        {name: "Гомель", code: "155"},
                        {name: "Универсальное", code: "101854"},
                        {name: "Прочее", code: "101855"},
                        {name: "Витебск", code: "154"},
                        {name: "Универсальное", code: "101856"},
                        {name: "Прочее", code: "101857"},
                        {name: "Брест", code: "153"},
                        {name: "Универсальное", code: "101858"},
                        {name: "Прочее", code: "101859"},
                        {name: "Гродно", code: "10274"},
                        {name: "Универсальное", code: "101860"},
                        {name: "Прочее", code: "101861"},
                        {name: "Могилев", code: "158"},
                        {name: "Универсальное", code: "101862"},
                        {name: "Прочее", code: "101863"},
                        {name: "Алматы", code: "162"},
                        {name: "Талдыкорган", code: "10303"},
                        {name: "Прочее", code: "102499"},
                        {name: "Универсальное", code: "102513"},
                        {name: "Караганда", code: "164"},
                        {name: "Прочее", code: "102500"},
                        {name: "Универсальное", code: "102514"},
                        {name: "Астана", code: "163"},
                        {name: "Кокшетау", code: "20809"},
                        {name: "Прочее", code: "102501"},
                        {name: "Универсальное", code: "102515"},
                        {name: "Семей", code: "165"},
                        {name: "Усть-Каменогорск", code: "10306"},
                        {name: "Прочее", code: "102502"},
                        {name: "Универсальное", code: "102516"},
                        {name: "Павлодар", code: "190"},
                        {name: "Прочее", code: "102503"},
                        {name: "Универсальное", code: "102517"},
                        {name: "Прочее", code: "102504"},
                        {name: "Универсальное", code: "102518"},
                        {name: "Прочее", code: "102505"},
                        {name: "Универсальное", code: "102519"},
                        {name: "Прочее", code: "102506"},
                        {name: "Универсальное", code: "102520"},
                        {name: "Чимкент", code: "221"},
                        {name: "Прочее", code: "102507"},
                        {name: "Универсальное", code: "102521"},
                        {name: "Актобе", code: "20273"},
                        {name: "Прочее", code: "102508"},
                        {name: "Универсальное", code: "102522"},
                        {name: "Прочее", code: "102509"},
                        {name: "Универсальное", code: "102523"},
                        {name: "Прочее", code: "102510"},
                        {name: "Универсальное", code: "102524"},
                        {name: "Прочее", code: "102511"},
                        {name: "Универсальное", code: "102525"},
                        {name: "Прочее", code: "102512"},
                        {name: "Универсальное", code: "102526"},
                        {name: "Киев", code: "143"},
                        {name: "Белая Церковь", code: "10369"},
                        {name: "Прочее", code: "101864"},
                        {name: "Универсальное", code: "101865"},
                        {name: "Кременчуг", code: "21609"},
                        {name: "Полтава", code: "964"},
                        {name: "Прочее", code: "102450"},
                        {name: "Универсальное", code: "102475"},
                        {name: "Черкассы", code: "10363"},
                        {name: "Прочее", code: "102451"},
                        {name: "Универсальное", code: "102476"},
                        {name: "Винница", code: "963"},
                        {name: "Прочее", code: "102452"},
                        {name: "Универсальное", code: "102477"},
                        {name: "Кировоград", code: "20221"},
                        {name: "Прочее", code: "102453"},
                        {name: "Универсальное", code: "102478"},
                        {name: "Житомир", code: "10343"},
                        {name: "Прочее", code: "102454"},
                        {name: "Универсальное", code: "102479"},
                        {name: "Харьков", code: "147"},
                        {name: "Прочее", code: "102455"},
                        {name: "Универсальное", code: "102480"},
                        {name: "Донецк", code: "142"},
                        {name: "Краматорск", code: "20554"},
                        {name: "Мариуполь", code: "10366"},
                        {name: "Макеевка", code: "24876"},
                        {name: "Прочее", code: "102456"},
                        {name: "Универсальное", code: "102481"},
                        {name: "Днепропетровск", code: "141"},
                        {name: "Кривой Рог", code: "10347"},
                        {name: "Прочее", code: "102457"},
                        {name: "Универсальное", code: "102482"},
                        {name: "Луганск", code: "222"},
                        {name: "Прочее", code: "102458"},
                        {name: "Универсальное", code: "102483"},
                        {name: "Запорожье", code: "960"},
                        {name: "Мелитополь", code: "10367"},
                        {name: "Прочее", code: "102459"},
                        {name: "Универсальное", code: "102484"},
                        {name: "Одесса", code: "145"},
                        {name: "Прочее", code: "102460"},
                        {name: "Универсальное", code: "102485"},
                        {name: "Николаев", code: "148"},
                        {name: "Прочее", code: "102461"},
                        {name: "Универсальное", code: "102486"},
                        {name: "Херсон", code: "962"},
                        {name: "Прочее", code: "102462"},
                        {name: "Универсальное", code: "102487"},
                        {name: "Львов", code: "144"},
                        {name: "Прочее", code: "102464"},
                        {name: "Универсальное", code: "102489"},
                        {name: "Хмельницкий", code: "961"},
                        {name: "Прочее", code: "102465"},
                        {name: "Универсальное", code: "102490"},
                        {name: "Тернополь", code: "10357"},
                        {name: "Прочее", code: "102466"},
                        {name: "Универсальное", code: "102491"},
                        {name: "Ровно", code: "10355"},
                        {name: "Прочее", code: "102467"},
                        {name: "Универсальное", code: "102492"},
                        {name: "Черновцы", code: "10365"},
                        {name: "Прочее", code: "102468"},
                        {name: "Универсальное", code: "102493"},
                        {name: "Луцк", code: "20222"},
                        {name: "Прочее", code: "102469"},
                        {name: "Универсальное", code: "102494"},
                        {name: "Ужгород", code: "10358"},
                        {name: "Прочее", code: "102470"},
                        {name: "Универсальное", code: "102495"},
                        {name: "Ивано-Франковск", code: "10345"},
                        {name: "Прочее", code: "102471"},
                        {name: "Универсальное", code: "102496"},
                        {name: "Сумы", code: "965"},
                        {name: "Прочее", code: "102472"},
                        {name: "Универсальное", code: "102497"},
                        {name: "Чернигов", code: "966"},
                        {name: "Прочее", code: "102473"},
                        {name: "Универсальное", code: "102498"},
                        {name: "Республика Дагестан", code: "11010"},
                        {name: "Республика Ингушетия", code: "11012"},
                        {name: "Республика Кабардино-Балкария", code: "11013"},
                        {name: "Республика Северная Осетия-Алания", code: "11021"},
                        {name: "Ставропольский край", code: "11069"},
                        {name: "Карачаево-Черкесская Республика", code: "11020"},
                        {name: "Чеченская Республика", code: "11024"},
                        {name: "Универсальное", code: "102446"},
                        {name: "Другие города региона", code: "102445"},
                        {name: "Крым", code: "977"}
                    ];
                    $scope.predicate = 'name';

                }
            </script>




            <!-- реализовано на следующем этапе

            <button class="btn btn-default contaner-btn-send-keywords" data-toggle="modal" data-target="#help_geo"
                    id="step4">
                Справка
            </button>
            <div class="modal fade" id="help_geo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Список городов</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table">

                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ок</button>
                        </div>
                    </div>
                </div>
            </div>
            -->
            <div id="step5">
                <input type="submit" onclick="function_status_bar()"
                       class="btn btn-default pull-right contaner-btn-send-keywords" value="Собрать с Wordstat"
                       id="get_new_report" form="new_phrase">
            </div>

            <!-- реализовано на следующем этапе
              <div class="btn-group pull-right contaner-btn-send-keywords">
                <button type="button" class="btn btn-default">Wordstat</button>
                <button type="button" class="btn btn-default">Оба сервиса </button>
                <button type="button" class="btn btn-default">KeyWordsPlanner</button>
              </div>
              -->


        </div>
        <!-- реализовано на следующем этапе-->
        <div class="progress" style="display: none;" id="progress_staus_ws">
            <div class="progress-bar" id="status_get_ws" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100" style="width: 0%;">
                0%
            </div>
        </div>
        <script>
            function_status_bar = function () {

                $("#progress_staus_ws").fadeIn();
                var timerId = setInterval(function () {
                    var pros_status = parseInt(status_get_ws.getAttribute("aria-valuenow"), 10) + 1;
                    document.getElementById('status_get_ws').style.width = pros_status + '%';
                    status_get_ws.setAttribute("aria-valuenow", pros_status);
                    document.getElementById('status_get_ws').innerHTML = pros_status + '%';

                }, 70);
                // через 5 сек остановить повторы
                setTimeout(function () {
                    clearInterval(timerId);
                    document.getElementById('status_get_ws').style.width = '100%';
                    status_get_ws.setAttribute("aria-valuenow", "100");
                    document.getElementById('status_get_ws').innerHTML = '100%';
                    document.getElementById('status_get_ws').innerHTML = "Осталось совсем немножечко.";
                }, 7000);
            }
            var keynum, lines = 1;
            function limitLines(obj, e) {
                var regWhite = /[" "]/g; //remove whitespace
                var regCrLf = /[\n\r\l]{2,}/g; //remove \r\n
                var obj = document.getElementById("textarea_limited");
                obj.value = obj.value.replace(regCrLf, '\r\n');


                // IE
                if (window.event) {
                    keynum = e.keyCode;
                    // Netscape/Firefox/Opera
                } else if (e.which) {
                    keynum = e.which;
                }

                if (keynum == 13) {
                    if (obj.value.split("\n").length == obj.rows) {
                        e = e || window.event;
                        var target = e.target || e.srcElement;
                        var code = e.keyCode ? e.keyCode : (e.which ? e.which : e.charCode)


                        return false;
                    }
                }
            }
        </script>
        <?
        if (isset($_POST[request_new_get_ws])) {
        if ($_POST[request_new_get_ws] != "") {
            $stack = array();
        if ($data == "56") {
            ?>

            <div class="contaner " id="result_banner_ws_error56">
                <div class="alert alert-danger alert-good">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <a href="#" class="alert-link">Ошибка, достигнут лимит в 1000 запросов в день.</a>
                </div>
            </div>

            <script>
                setTimeout(function () {
                    yaCounter32865650.reachGoal('get_new_report_error56');
                    $(ga('send', 'event', 'get_new_report', 'get_new_report_error_56');
                    "#result_banner_ws_error56"
                    ).
                    fadeOut();
                }, 5000);

            </script>
        <?
        }else{
        ?>
            <div class="contaner " id="result_banner_ws_all_right">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <a href="#" class="alert-link">Списки запросов собраны</a>
                </div>
                <script>
                    setTimeout(function () {
                        yaCounter32865650.reachGoal('get_new_report_all_right');
                        ga('send', 'event', 'get_new_report', 'get_new_report_allright');
                        $("#result_banner_ws_all_right").fadeOut();
                    }, 5000);

                </script>
            </div>
        <?
        }
        }
        else { ?>

            <div class="contaner " id="result_banner_ws">
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <a href="#" class="alert-link">Введите хотя бы один ключевой запрос</a>
                </div>
            </div>
            <script>

                setTimeout(function () {
                    yaCounter32865650.reachGoal('get_new_report_empty');
                    ga('send', 'event', 'get_new_report', 'get_new_report_empty');
                    $("#result_banner_ws").fadeOut();
                }, 5000);
            </script>
        <?
        }
        }
        else { ?>
            <div class="contaner " id="result_banner_ws">
                <div class="alert alert-warning alert-good">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <a href="#" class="alert-link">Введите список запросов для парсинга</a>
                </div>
            </div>
            <script>
                setTimeout(function () {
                    $("#result_banner_ws").fadeOut();
                }, 5000);
            </script>

        <? }

        ?>
    </div>

    <div class="col-md-6" id="coolect_kw_pre">
        <h3>
            Список запросов
            <?
            if ((isset($_POST[request_new_get_ws])) && ($_POST[request_new_get_ws] != ""))
                echo '<span class="glyphicon glyphicon_h3 glyphicon-question-sign" aria-hidden="true" onclick="tip_collect_2();"></span>';
            ?>
        </h3>
        <script type="text/javascript">
            // Instance the tour

            var tour2 = new Tour({
                name: 'текст',
                debug: true,
                storage: false,
                backdrop: true,
                backdropContainer: 'body',
                backdropPadding: 0,
                template: '<div class="popover" role="tooltip">' +
                '<div class="arrow"></div> ' +
                '<h3 class="popover-title"></h3> ' +
                '<div class="popover-content"></div> ' +
                '<div class="popover-navigation"> ' +
                '<div class="btn-group"> ' +
                '<button class="btn btn-sm btn-default" data-role="prev">Назад</button> ' +
                '<button class="btn btn-sm btn-default" data-role="next">Далее</button> ' +
                '<button class="btn btn-sm btn-default" data-role="pause-resume" data-pause-text="Pause" data-resume-text="Resume">Pause</button> </div> ' +
                '<button class="btn btn-sm btn-default" data-role="end">Закрыть</button> </div> ' +
                '</div>',
                steps: [
                    {
                        element: ".panel-group",
                        title: "Помощь",
                        content: "Список найденных вложенных запросов откроется при нажатии на группу",
                        placement: "top"
                    },
                    {
                        element: "#step22",
                        title: "Помощь",
                        content: "Как только список запросов будет полный переходите к планированию",
                        placement: "right"
                    },
                    {
                        element: "#step33",
                        title: "Помощь",
                        content: "Вы можете скачать список запросов в .xlsx формате",
                        placement: "left"
                    },
                    {
                        element: "#step44",
                        title: "Помощь",
                        content: "Нажмите для добавления объявлений к запросам.",
                        placement: "top"
                    }
                ]
            });

            function tip_collect_2() {
                if (tour2.ended()) {
                    tour2.restart();
                } else {
                    tour2.init();
                    tour2.start();
                }
            }

        </script>
        <div class="panel-group" id="accordion" >
            <?
            if ((isset($_POST[request_new_get_ws])) && ($_POST[request_new_get_ws] != ""))

                if ($data != "56") {

                    if ((isset($_POST[request_new_get_ws_freq])) && ($_POST[request_new_get_ws_freq] != "")) {
                        $freq = $_POST[request_new_get_ws_freq];
                    } else {
                        $freq = 0;
                    }
                    $i_N=0;
                    foreach ($data as $data1) {
                        foreach ($data1 as $keywords) {
                            $j = 1;
                            ?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseOne<? echo $i_N; ?>">
                                                        <div class="row">
                                                            <div class="col-md-6"><? echo $keywords[Phrase] ?></div>
                                                            <?
                                                            $kw = $keywords[SearchedWith];
                                                            $i_kw_n = 0;
                                                            foreach ($kw as $i_kw) {
                                                                if ($i_kw[Shows] > $freq) {
                                                                    $i_kw_n++;
                                                                }
                                                            }
                                                            ?>
                                                            <div class="col-md-4 text-right"><? echo $i_kw_n; ?> запросов</div>
                                                            <div class="col-md-2 text-right"><? echo $kw[0][Shows]; ?></div>
                                                        </div>

                                                    </h4>
                                                </div>
                                                <div class="col-md-1">

                                                    <!-- Button trigger modal -->
                                                    <a data-toggle="modal" data-target="#KW_Modal<? echo $i_N; ?>">
                                                        <span class="glyphicon glyphicon_s glyphicon-plus"></span>
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="KW_Modal<? echo $i_N; ?>" tabindex="-1"
                                                         role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">C запросом
                                                                        "<? echo $keywords[Phrase] ?>" также ищут:</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Номер</th>
                                                                            <th>Запрос</th>
                                                                            <th>Показов</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?
                                                                        $j_1 = 1;
                                                                        foreach ($keywords[SearchedAlso] as $keywords_one) { ?>
                                                                            <tr>
                                                                                <td><? echo $j_1++; ?></td>
                                                                                <td><? echo $keywords_one[Phrase]; ?></td>
                                                                                <td><? echo $keywords_one[Shows]; ?></td>
                                                                                <td><a><span class="glyphicon glyphicon_s glyphicon-plus"></span></a></td>
                                                                            </tr>
                                                                            <?
                                                                        } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Закрыть
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div id="collapseOne<? echo $i_N; ?>" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <table class="table table_s">
                                                        <thead>
                                                        <tr>
                                                            <th>Номер</th>
                                                            <th>Запрос</th>
                                                            <th>Показов</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?
                                                        foreach ($keywords[SearchedWith] as $keywords_one) {
                                                            if ($keywords_one[Shows] > $freq) {
                                                                ?>
                                                                <tr>
                                                                    <td><? echo $j++; ?></td>
                                                                    <td><? echo $keywords_one[Phrase]; ?></td>
                                                                    <td><? echo $keywords_one[Shows]; ?></td>
                                                                </tr>
                                                                <? array_push($stack, $keywords_one[Phrase]);
                                                            }
                                                        }
                                                        $i_N++; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                    </div>


                            <?
                        }
                    }
                } else echo "Было Весело! Приходи завтра!"; ?>
        </div>

        <div class="btn-group pull-right" role="group" >

            <!--
            <ul class="pagination">
                <li><a href="#">&laquo; туда</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"> сюда &raquo;</a></li>
            </ul>
            -->

            <?
            if ($data != "56") {
                if ((isset($_POST[request_new_get_ws])) && ($_POST[request_new_get_ws] != "")) {?>
                    <a type="button" id="step33" href = "/temp.csv" class="btn btn-default pull-left">Скачать .csv</a>
                    <a type="button" class="btn btn-default" id="toggler" id="step44">Объявления <span class = "glyphicon glyphicon-arrow-right"></span></a>

                    <form action="/planning" method="post" name="form_ads" class="pull-left">
                        <textarea class="form-control" name="go_to_planing_from_collect" style="display:none;"><?
                            foreach ($stack as $value) {
                                echo "$value \n";
                            }
                        ?></textarea>
                        <input type="submit" class="btn btn-default " value="Перейти к планированию" id="step22">
                    </form>

                    <?
                }

            }
            ?>
            <!-- реализовано на следующем этапе
            <button type="button" class="btn btn-default">Создать объявления</button>
            -->



        </div>

    </div>

    <div class="col-md-6" id="coolect_ad" style="display: none;">
        <h3>
            Объявления
            <?
            if ((isset($_POST[request_new_get_ws])) && ($_POST[request_new_get_ws] != ""))
                echo '<span class="glyphicon glyphicon_h3 glyphicon-question-sign" aria-hidden="true" onclick="tip_collect_2();"></span>';
            ?>
        </h3>

        <div class="panel-group" id="accordion1" >
            <?
            if ((isset($_POST[request_new_get_ws])) && ($_POST[request_new_get_ws] != ""))

                if ($data != "56") {

                    if ((isset($_POST[request_new_get_ws_freq])) && ($_POST[request_new_get_ws_freq] != "")) {
                        $freq = $_POST[request_new_get_ws_freq];
                    } else {
                        $freq = 0;
                    }
                    $i_N_new =$i_N;
                    foreach ($data as $data1) {
                        foreach ($data1 as $keywords) {
                            $j = 1;
                            ?>

                            <div class="panel panel-default" ng-controller="TextAdController as textAd">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion1"
                                                href="#collapseOne<? echo $i_N; ?>" id="name_item<? echo $i_N_new; ?>" >
                                                <div class="row">
                                                    <div class="col-md-6" id="DivAmmount<? echo $i_N; ?>"><? echo $keywords[Phrase] ?></div>
                                                </div>

                                            </h4>
                                        </div>
                                        <div class="col-md-1">
                                            <!-- Button trigger modal -->
                                            <a data-toggle="modal" data-target="#KW_Modal<? echo $i_N; ?>">
                                                <span class="glyphicon glyphicon_s glyphicon-plus"></span>
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="KW_Modal<? echo $i_N; ?>" tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">C запросом
                                                                "<? echo $keywords[Phrase] ?>" также ищут:</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Номер</th>
                                                                    <th>Запрос</th>
                                                                    <th>Показов</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?
                                                                $j_1 = 1;
                                                                foreach ($keywords[SearchedAlso] as $keywords_one) { ?>
                                                                    <tr>
                                                                        <td><? echo $j_1++; ?></td>
                                                                        <td><? echo $keywords_one[Phrase]; ?></td>
                                                                        <td><? echo $keywords_one[Shows]; ?></td>
                                                                        <td><a><span class="glyphicon glyphicon_s glyphicon-plus"></span></a></td>
                                                                    </tr>
                                                                    <?
                                                                } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Закрыть
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapseOne<? echo $i_N; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <div class="input-group"  style="width:100%;">
                                                    <div class="input-group-addon" style="width:100px;">Заголовок</div>
                                                    <input type="text" class="form-control" id="InputAmount<? echo $i_N; ?>" placeholder="Заголовок" data-field="item<? echo $i_N; ?>">
                                                    <div class="input-group-addon" style="width:50px;" data-field="target<? echo $i_N; ?>">0</div>

                                                </div>
                                                <div class="input-group"  style="width:100%;">
                                                    <div class="input-group-addon"style="width:100px;">Текст</div>
                                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Текст" data-field="item_text<? echo $i_N; ?>">
                                                    <div class="input-group-addon"style="width:50px;" data-field="target_text<? echo $i_N; ?>">0</div>
                                                </div>
                                                <div class="input-group"  style="width:100%;">
                                                    <div class="input-group-addon" style="width:100px;">Ссылка</div>
                                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Ссылка">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <?
                            $i_N++;
                        }
                    }
                    /*
                     * Так быть не должно
                     * Это временная настройка, влияющая на переизбыток памяти
                     * Нужно сделать все средствами Angular JS
                     * Возможно должны быть динамические настройки jqeery
                    */
                    foreach ($data as $data1) {
                        foreach ($data1 as $keywords) {
                            ?>

                            <script>
                                $(function () {
                                    var target = $('[data-field="target<? echo $i_N_new; ?>"]');
                                    $(document).on('input', '[data-field="item<? echo $i_N_new; ?>"]', function () {
                                        var item = $(this);
                                        target.html(item.val().length);
                                        if (item.val().length>35) {
                                            alert("ppc");
                                            document.getElementById('name_item<? echo $i_N_new; ?>"]').style.color = '#ff0000';
                                        }
                                    });
                                });
                                $(function () {
                                    var target = $('[data-field="target_text<? echo $i_N_new; ?>"]');
                                    $(document).on('input', '[data-field="item_text<? echo $i_N_new; ?>"]', function () {
                                        var item = $(this);
                                        target.html(item.val().length);
                                    });
                                });
                            </script>

                            <script>
                                function TextAdController($scope) {
                                    //$scope.TextAd =
                                }
                            </script>

                            <?
                            $i_N_new++;
                        }
                    }

                } else echo "Было Весело! Приходи завтра!";
            ?>
        </div>

    </div>

</div>


<script type="text/javascript">
    window.onload= function() {
        document.getElementById('toggler').onclick = function() {
            openbox('coolect_kw','coolect_kw_pre', 'coolect_ad',  this);
            return false;
        };
    };
    function openbox(id1, id3, id2, toggler) {
        var ad = document.getElementById(id1);
        var kw = document.getElementById(id2);
        if(kw.style.display == 'block') {
            kw.style.display = 'none';
            ad.style.display = 'block';
            toggler.innerHTML = 'Объявления <span class = "glyphicon glyphicon-arrow-right"></span>';
        }
        else {
            kw.style.display = 'block';
            ad.style.display = 'none';
            toggler.innerHTML = ' <span class = "glyphicon glyphicon-arrow-left"></span> Объявления';
        }
    }
</script>