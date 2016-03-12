<?php

class Model_Planning extends Model
{
    public function get_data()
    {

        function split_mas_100($newzapros)
        {
            $newzapros1 = array_unique(explode("\n",$newzapros));
            for ($i = 1; $i <= count($newzapros1); $i++){
                if (is_int($i/10)){
                    $j=floor($i/10);
                    $text[$j] =array($newzapros1[$j*10-10],$newzapros1[$j*10-9],$newzapros1[$j*10-8],$newzapros1[$j*10-7],$newzapros1[$j*10-6],$newzapros1[$j*10-5],$newzapros1[$j*10-4],$newzapros1[$j*10-3],$newzapros1[$j*10-2],$newzapros1[$j*10-1]);
                }
            }
            $i = count($newzapros1);
            $j=ceil($i/10);
            if ($j==1) {
                $j=0;
                $text[$j] =array($newzapros1[0],$newzapros1[1],$newzapros1[2],$newzapros1[3],$newzapros1[4],$newzapros1[5],$newzapros1[6],$newzapros1[7],$newzapros1[8],$newzapros1[9]);
            }
            else{
                $text[$j] =array($newzapros1[$j*10-10],$newzapros1[$j*10-9],$newzapros1[$j*10-8],$newzapros1[$j*10-7],$newzapros1[$j*10-6],$newzapros1[$j*10-5],$newzapros1[$j*10-4],$newzapros1[$j*10-3],$newzapros1[$j*10-2],$newzapros1[$j*10-1]);
            }
            foreach ($text as $key => $array){
                $array_empty = array(null);
                $array = array_diff($array, $array_empty);
                $text[$key]=$array;
            }
            return $text;
        }

        require 'application/models/lib/autorization_yandex.php';


        if (isset($_POST[request_new_get_ws])&&($_POST[request_new_get_ws]!="")) {

            $newzapros = $_POST[request_new_get_ws];
            $newtext = split_mas_100($newzapros);


            //print_r($newtext[0]);




            require 'application/models/lib/autorization_yandex.php';

            $create_report_params = array(
                'Phrases' => $newtext[0],
                'GeoID' => array(225),
                "Currency"=> "RUB",
                "AuctionBids"=> "Yes"
            );

            //print_r($create_report_params);


            $id_report = $client->call("CreateNewForecast", array("params" => $create_report_params));

            //Получение списка отчетов
            $report_list = $client->call("GetForecastList");


            $test_delete = $client->call("DeleteForecastReport", array("params" => 123445));
            //print_r($test_delete);
            if ($report_list[faultcode]=="SOAP-ENV:58"){
                echo "<pre>";
                print_r($report_list);
                echo "</pre>";
            } else {

                $z = false;
                while ($z == false) {
                    foreach ($report_list as $value1) {
                        if ($value1[ForecastID] == $id_report) {

                            if ($value1[StatusForecast] == "Done") {
                                $value_ReportID = $value1[ForecastID];
                                $z = true;
                            } else {
                                $report_list = $client->call("GetForecastList");
                                sleep(1);
                            }
                        } else {
                            $client->call("DeleteForecastReport", array("params" => $value1[ForecastID]));
                        }
                    }
                }
            }




            //Получение списка отчетов
            $report_list = $client->call("GetForecastList");
            //print_r($report_list);

            //Получение информации по отчету
            $text_report = $client->call("GetForecast", array("params" => $id_report));
            $phrases = $text_report["Phrases"];


            //print_r($text_report);
            //print_r($phrases);



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


            $bid = array (1,2,3,4,5,7,9,11,14,17,20,25,30,40,50,60,70,80,90, 100, 125, 150, 175, 200, 250,300,350,400,500,600,700,800,900,1000,1500,2000,3000);


            $data_bid_sum = array(array(0), array(0), array(0), array(0));
            foreach ($bid as $bid_min) {
                $my_click_sum = 0;
                $my_budget_sum = 0;

                foreach ($data_bid as $phrase_bid) {
                    //$phrase_bid = $data_bid[0];
                    $my_cpc = 0;
                    $my_click = 0;
                    for ($i_num_pos = 0; $i_num_pos++ < 5;) {
                        if ($phrase_bid[price][$i_num_pos]<$bid_min&&$my_cpc==0) {
                            $my_cpc = $phrase_bid[price][$i_num_pos];
                            $my_click = $phrase_bid[clicks][$i_num_pos];
                        }
                    }
                    $my_click_sum += $my_click;
                    $my_budget_sum += $my_cpc*$my_click;
                    $bid_cpc_click = array(
                        "bid"  => $bid_min,
                        "cpc"  => $my_cpc,
                        "click"  => $my_click
                    );
                }
                if ($my_click_sum==0) $my_cpc_sum = 0; else $my_cpc_sum = round($my_budget_sum/$my_click_sum,2);

                $data_bid_sum = array(
                    array_merge($data_bid_sum[0],array($bid_min)),
                    array_merge($data_bid_sum[1],array($my_click_sum)),
                    array_merge($data_bid_sum[2],array($my_budget_sum)),
                    array_merge($data_bid_sum[3],array($my_cpc_sum))
                );
            }

            return array(
                'phrases' => $newtext[0],
                'data_bid_sum' => $data_bid_sum,
                'data_bid' => $data_bid,
                'bid' => $bid
            );
        }
        //print_r($data);



    }
}
