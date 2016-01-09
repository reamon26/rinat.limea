<h1>ads</h1>

<?php
/*
$list = array (
    array('aaa', 'bbb', 'ccc', 'dddd'),
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
);

$fp = fopen('temp.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
*/


require_once('application/models/lib/autorization_yandex.php');

/*
$create_report_params = array(
    'Phrases' => array("купить квартиру","продать квартиру", "купить коттедж"),
    'GeoID' => array(225),
    "Currency"=> "RUB",
    "AuctionBids"=> "Yes"
);
$id_report = $client->call("CreateNewForecast", array("params" => $create_report_params));
echo "1)". $id_report."<br>";

//Получение списка отчетов
$report_list = $client->call("GetForecastList");
print_r($report_list);

//Информация по отчету
/*
$z = 0;
while ($z != 1) {
foreach ($report_list as $key1 => $value1) {
    //echo "$value1[StatusReport] = $value1[ReportID] или $id_report<br>";
    if ($value1[ReportID] == $id_report) {
        if ($value1[StatusReport] == "Done") {
            $z = 1;
            } else {
                $report_list = $client->call("GetForecastList");
                sleep(1);
            }
        } else {
            $client->call("DeleteForecastReport", array("params" => $value1[ReportID]));
        }
    }
}
*/

//Получение информации по отчету
$text_report = $client->call("GetForecast", array("params" => "12392"));

$phrases = $text_report["Phrases"];
//print_r($text_report);
?>

<div class="panel-group" id="accordion">
<?

foreach ($phrases as $key => $phrase) {
?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?echo $key?>">
<?
                  echo "Phrase =" . $phrase[Phrase] . "<br>";
    ?>
    </a>
            </h4>
    </div>
    <div id="collapse<?echo $key?>" class="panel-collapse collapse">
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

//          $test1 = $client->call("DeleteWordstatReport", array("params" => array("108896550")));
//          $test2 = $client->call("DeleteWordstatReport", array("params" => "108896663"));
//          $test3 = $client->call("DeleteWordstatReport", array("params" => "108896688"));

          $data_bid[$key]= array(
              "phrase" => $phrase[Phrase],
              "bid" => array(
                "1" => $AuctionBids[0][Bid],
                "2" => $AuctionBids[1][Bid],
                "3" => $AuctionBids[2][Bid],
                "4" => $AuctionBids[3][Bid],
                "5" => $AuctionBids[4][Bid],
              ),
              "price" => array(
                  "1" => $AuctionBids[0][Price],
                  "2" => $AuctionBids[1][Price],
                  "3" => $AuctionBids[2][Price],
                  "4" => $AuctionBids[3][Price],
                  "5" => $AuctionBids[4][Price],
            ),
            "clicks" => array(
              "1" => $phrase[PremiumClicks],
              "2" => ceil($phrase[PremiumClicks]*0.85),
              "3" => ceil($phrase[PremiumClicks]*0.75),
              "4" => $phrase[FirstPlaceClicks],
              "5" => $phrase[Clicks],
            ),
          );
    ?>

      </div>
    </div>
  </div>

<?
/*
    //$phrase = $phrases[0];

    Array ( [AuctionBids] => Array (
        [0] => Array ( [Bid] => 38.33 [Position] => P11 [Price] => 17.06)
        [1] => Array ( [Bid] => 13.41 [Position] => P12 [Price] => 13.41 )
        [2] => Array ( [Bid] => 13.41 [Position] => P13 [Price] => 13.41 )
        [3] => Array ( [Bid] => 21.82 [Position] => P21 [Price] => 11.85 )
        [4] => Array ( [Bid] => 8.01 [Position] => P22 [Price] => 8.01 )
        [5] => Array ( [Bid] => 8.01 [Position] => P23 [Price] => 8.01 )
        [6] => Array ( [Bid] => 8.01 [Position] => P24 [Price] => 8.01 )
    )
    [CTR] => 3
    [Clicks] => 63321
    [Currency] => RUB
    [FirstPlaceCTR] => 4.91
    [FirstPlaceClicks] => 103712
    [IsRubric] => No
    [Max] => 21.82
    [Min] => 8.01
    [Phrase] => купить квартиру
    [PremiumCTR] => 20
    [PremiumClicks] => 422143
    [PremiumMax] => 38.33
    [PremiumMin] => 13.41
    [Shows] => 2110715
    )
    Phrase =купить квартиру

    //print_r($phrase);


//$i_N = 1;
//print_r($text_report);
//$client->call("DeleteWordstatReport", array("params" => $value1[ReportID]));
*/
}

//print_r($data_bid);
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
    foreach ($data_bid as $value0) {
        echo '<tr>';
        echo '<td>' . $value0[phrase]. '</td>';
        //foreach ($value0[bid] as $bid)
        //    echo '<td>' . $bid. '</td>';

        foreach ($value0[price] as $price)
            echo '<td>' . $price. '</td>';
        foreach ($value0[clicks] as $clicks)
            echo '<td>' . $clicks. '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
    </table>
    <?
    $bid = array (
        5,
        10,
        15,
        20,
        25,
        30,
        40,
        50,
        60,
        70
    );

    //foreach ($data_bid[0] as $phrase_bid) {
    $phrase_bid = $data_bid[0];
        foreach ($bid as $bid_min) {
                $my_cpc = 0;
                $my_click = 0;
                for ($i_num_pos = 0; $i_num_pos++ < 5;) {
                    if ($phrase_bid[price][$i_num_pos]<$bid_min&&$my_cpc==0) {
                        $my_cpc = $phrase_bid[price][$i_num_pos]; //echo $phrase_bid[price][$i_num_pos]."  ";
                        $my_click = $phrase_bid[clicks][$i_num_pos];//echo $phrase_bid[clicks][$i_num_pos]."  ";
                    }
                }

            echo "<br>ставка равна ". $bid_min;
            echo "<br>при cpc ".$my_bid;
            echo "<br>получим ".$my_click." кликов<br>";
            $bid_cpc_click = array(
                "bid"  => $bid_min,
                "cpc"  => $my_cpc,
                "click"  => $my_click
            );
            //$data_bid_buf = array_merge($data_bid_buf, $bid_cpc_click);
        }
    //}

    //array_push($data_bid, )
?>

</div>