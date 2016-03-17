<h1>ads</h1>

<?php

require('application/models/lib/autorization_yandex.php');


$create_report_params = array(
    'Phrases' => array(
        "квартиры",
        "купить квартиру",
        "снять квартиру",
        "снят квартира",
        "продажа квартир",
        "квартиры без",
        "авито квартиры",
        "квартиры без посредников",
        "квартиры +в москве",
        "аренда квартир",
        "квартиры посуточно",
        "квартира 1",
        "ремонт квартир",
        "фото квартир",
        "недорогие квартиры",
        "снять квартиру без",
        "однокомнатная квартира",
        "посредник снять квартиру",
        "снять квартиру без посредников",
        "снят квартира без посредников",
        "квартира дом",
        "покупка квартиры",
        "квартиры вторичное",
        "квартира годом",
        "квартира жилья",
        "квартира +на длительный",
        "квартиры +в новостройках",
        "квартиры +на длительный срок",
        "квартиры ли",
        "квартиры вторичное жилье",
        "квартира 3",
        "купить жилье квартиру",
        "купить квартиру вторичное жилье",
        "дизайн квартир",
        "купить квартиру +на авито",
        "купить квартиру недорого",
        "квартира +на сутки",
        "купить квартиру +в москве",
        "квартиру х",
        "недвижимость квартиры",
        "квартиры +в области",
        "стоимость квартир",
        "квартиры без хозяев",
        "квартиры вторичка",
        "сколько квартир",
        "снять квартиру +от хозяина",
        "снят квартира +от хозяина",
        "квартиру без посредников длительно",
        "квартира +на срок без посредников",
        "квартира без посредников +от хозяина",
        "квартиры +на длительный срок без посредников",
        "х комнатные квартиры",
        "бывшая квартира",
        "снять квартиру недорого",
        "недорогие квартиры без посредников",
        "купить квартиру +в новостройке",
        "квартиры +в минске",
        "двухкомнатная квартира"
    ),
    'GeoID' => array(225),
    "Currency" => "RUB",
    "AuctionBids" => "Yes"
);
$id_report = $client->call("CreateNewForecast", array("params" => $create_report_params));
echo "1)" . $id_report . "<br>";

//Получение списка отчетов
$report_list = $client->call("GetForecastList");


//Информация по отчету

$z = 0;
while ($z != 1) {
    foreach ($report_list as $value1) {
        if ($value1[ForecastID] == $id_report) {
            if ($value1[StatusForecast] == "Done") {
                $z = 1;
                $value_ReportID = $value1[ForecastID];
            } else {
                $report_list = $client->call("GetForecastList");
                sleep(1);
            }
        } else {
            $client->call("DeleteForecastReport", array("params" => $value1[ForecastID]));
        }
    }
}
//Получение списка отчетов
$report_list = $client->call("GetForecastList");
print_r($report_list);


/*
//Получение списка отчетов
$report_list = $client->call("GetForecastList");
print_r($report_list);

foreach ($report_list as $key1 => $value1) {
if ($value1[ForecastID] <> "36545")
     $text_delete_report = $client->call("DeleteForecastReport", array("params" => $value1[ForecastID]));
    echo "<pre>";
    print_r($value1[ForecastID]) ;
    print_r( $text_delete_report);
    echo "</pre>";

}
*/

//Получение информации по отчету
$text_report = $client->call("GetForecast", array("params" => $id_report));

$phrases = $text_report["Phrases"];
?>

<div class="panel-group" id="accordion">
    <?

    foreach ($phrases as $key => $phrase) {
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<? echo $key ?>">
                        <? echo "Phrase =" . $phrase[Phrase] . "<br>"; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse<? echo $key ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <?
                    echo "Phrase =" . $phrase[Phrase] . "<br>";
                    echo "IsRubric =" . $phrase[IsRubric] . "<br>";
                    echo "Min =" . $phrase[Min] . "<br>";
                    echo "Max =" . $phrase[Max] . "<br>";
                    echo "PremiumMin =" . $phrase[PremiumMin] . "<br>";
                    echo "PremiumMax =" . $phrase[PremiumMax] . "<br>";
                    echo "<br>";

                    echo "Shows =" . $phrase[Shows] . "<br>";
                    echo "<br>";

                    echo "Clicks =" . $phrase[Clicks] . "<br>";
                    echo "FirstPlaceClicks =" . $phrase[FirstPlaceClicks] . "<br>";
                    echo "PremiumClicks =" . $phrase[PremiumClicks] . "<br>";
                    echo "<br>";

                    echo "CTR =" . $phrase[CTR] . "<br>";
                    echo "FirstPlaceCTR =" . $phrase[FirstPlaceCTR] . "<br>";
                    echo "PremiumCTR =" . $phrase[PremiumCTR] . "<br>";

                    echo "AuctionBids =" . $phrase[AuctionBids] . "<br>";
                    echo "Currency =" . $phrase[Currency] . "<br>";
                    echo "<br>";

                    $AuctionBids = $phrase[AuctionBids];

                    //print_r($AuctionBids);
                    echo "Position =" . $AuctionBids[Position] . "<br>";
                    echo "Bid =" . $AuctionBids[0][Bid] . " " . $AuctionBids[1][Bid] . " " . $AuctionBids[2][Bid] . " " . $AuctionBids[3][Bid] . "<br>";
                    echo "Price =" . $AuctionBids[0][Price] . " " . $AuctionBids[1][Price] . " " . $AuctionBids[2][Price] . " " . $AuctionBids[3][Price] . "<br>";


                    $common = $text_report["Common"];
                    echo "<br>";

                    echo "Geo =" . $common[Geo] . "<br>";
                    echo "<br>";

                    echo "Min =" . $common[Min] . "<br>";
                    echo "Max =" . $common[Max] . "<br>";
                    echo "PremiumMin =" . $common[PremiumMin] . "<br>";
                    echo "<br>";

                    echo "Shows =" . $common[Shows] . "<br>";
                    echo "<br>";

                    echo "Clicks =" . $common[Clicks] . "<br>";
                    echo "FirstPlaceClicks =" . $common[FirstPlaceClicks] . "<br>";
                    echo "PremiumClicks =" . $common[PremiumClicks] . "<br>";

                    ?>

                </div>
            </div>
        </div>
        <?
    }
    ?>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th rowspan="2">Запрос</th>
            <!--<th colspan="5">Ставка</th>-->
            <th colspan="5">Цена за клик</th>
            <th colspan="5">Количество кликов</th>
        </tr>
        <tr>
            <!-- для ставки
            <th>1-й спец</th>
            <th>2-й спец</th>
            <th>3-й спец</th>
            <th>1-я гар</th>
            <th>гар</th>
            -->
            <th>1-й спец</th>
            <th>2-й спец</th>
            <th>3-й спец</th>
            <th>1-я гар</th>
            <th>гар</th>
            <th>1-й спец</th>
            <th>2-й спец</th>
            <th>3-й спец</th>
            <th>1-я гар</th>
            <th>гар</th>
        </tr>
        </thead>
        <tbody>
        <?

        foreach ($phrases as $key => $phrase) {
            $AuctionBids = $phrase[AuctionBids];
            $data_bid[$key] = array(
                "phrase" => $phrase[Phrase],
                "bid" => array(
                    "1" => $AuctionBids[0][Bid],
                    "2" => $AuctionBids[1][Bid],
                    "3" => $AuctionBids[2][Bid],
                    "4" => $AuctionBids[3][Bid],
                    "5" => $AuctionBids[4][Bid]
                ),
                "price" => array(
                    "1" => $AuctionBids[0][Price],
                    "2" => $AuctionBids[1][Price],
                    "3" => $AuctionBids[2][Price],
                    "4" => $AuctionBids[3][Price],
                    "5" => $AuctionBids[4][Price]
                ),
                "clicks" => array(
                    "1" => $phrase[PremiumClicks],
                    "2" => ceil($phrase[PremiumClicks] * 0.85),
                    "3" => ceil($phrase[PremiumClicks] * 0.75),
                    "4" => $phrase[FirstPlaceClicks],
                    "5" => $phrase[Clicks]
                )
            );
        }
        ?>


        <?
        foreach ($data_bid as $value0) {
            echo '<tr>';
            echo '<td>' . $value0[phrase] . '</td>';
            //foreach ($value0[bid] as $bid)
            //    echo '<td>' . $bid. '</td>';

            foreach ($value0[price] as $price)
                echo '<td>' . $price . '</td>';
            foreach ($value0[clicks] as $clicks)
                echo '<td>' . $clicks . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <?


    $bid = array(1, 2, 3, 4, 5, 7, 9, 11, 14, 17, 20, 25, 30, 40, 50, 60, 70, 80, 90, 100, 125, 150, 175, 200, 250, 300, 350, 400, 500, 600, 700, 800, 900, 1000, 1500, 2000, 3000);

    $data_bid_sum = array(
        "bid" => array(0),
        "clicks" => array(0),
        "budget" => array(0),
        "cpc" => array(0)
    );
    foreach ($bid as $bid_min) {
        $my_click_sum = 0;
        $my_budget_sum = 0;

        foreach ($data_bid as $phrase_bid) {
            //$phrase_bid = $data_bid[0];
            $my_cpc = 0;
            $my_click = 0;
            for ($i_num_pos = 0; $i_num_pos++ < 5;) {
                if ($phrase_bid[price][$i_num_pos] < $bid_min && $my_cpc == 0) {
                    $my_cpc = $phrase_bid[price][$i_num_pos];
                    $my_click = $phrase_bid[clicks][$i_num_pos];
                }
            }
            $my_click_sum += $my_click;
            $my_budget_sum += $my_cpc * $my_click;
            $bid_cpc_click = array(
                "bid" => $bid_min,
                "cpc" => $my_cpc,
                "click" => $my_click
            );
        }
        if ($my_click_sum == 0) $my_cpc_sum = 0; else $my_cpc_sum = $my_budget_sum / $my_click_sum;
        //echo "<br> ________________________";
        //echo "<br>ставка равна ". $bid_min;
        //echo "<br>при cpc ".$my_cpc_sum;
        //echo "<br>получим ".$my_click_sum." кликов";
        //echo "<br>при бюджете ".$my_budget_sum." руб<br>";

        $data_bid_sum = array(
            "bid" => array_merge($data_bid_sum[bid], array($bid_min)),
            "clicks" => array_merge($data_bid_sum[clicks], array($my_click_sum)),
            "budget" => array_merge($data_bid_sum[budget], array($my_budget_sum)),
            "cpc" => array_merge($data_bid_sum[cpc], array($my_budget_sum / $my_click_sum))
        );
    }
    ?>
    <pre>
<?php
print_r($data_bid_sum);
?>
</pre>
</div>
<canvas id="canvas" height="450" width="600"></canvas>
<script>
    var randomScalingFactor = function () {
        return Math.round(Math.random() * 100)
    };
    var lineChartData = {
        labels: [
            <?
            echo '"0", ';
            foreach ($bid as $bid_min) {
                echo '"'.$bid_min.'",';
            }
            ?>

        ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [
                    <?   foreach ($data_bid_sum["clicks"] as $clicks_sum)
                            echo $clicks_sum.','; ?>
                ]
            }
            /*,
             {
             label: "My Second dataset",
             fillColor : "rgba(151,187,205,0.2)",
             strokeColor : "rgba(151,187,205,1)",
             pointColor : "rgba(151,187,205,1)",
             pointStrokeColor : "#fff",
             pointHighlightFill : "#fff",
             pointHighlightStroke : "rgba(151,187,205,1)",
             data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
             }
             */
        ]

    }

    window.onload = function () {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });
    }
</script>