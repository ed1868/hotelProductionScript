<?php

/**
 * Created by PhpStorm.
 * User: Eddie AI Nomads
 * Date: 06/23/2021
 * Time: 4:46 PM
 */

//ALL
//$file = fopen('items.csv',"r");

//2018-2019


//2019-2020
//$file = fopen('2019to2020.csv',"r");

//2020-NOW
//$file = fopen('2020-2021prod.csv',"r");



//IHG PRODUCTION LIST BY HOTEL CHAIN

//INTERCONTINENTAL FROM 2019 - 2020
$file = fopen('');
$fullList = array();

$result['reservation_id'] = "reservation_id";
$result['reseller_id'] = 'reseller_id';
$result['quote_id'] = 'quote_id';
$result['hotel_name'] = 'hotel_name';
$result['created_by'] = 'created_by';
$result['creation_date'] = 'creation_date';
$result['reservation_type'] = 'reservation_type';
$result['confirmation_status'] = 'confirmation_status';
$result['cancellation_due'] = 'cancellation_due';
$result['confirmation_number'] = 'confirmation_number';
//$result['reservation'] = 'reservation';
$result['modification_date'] = 'modification_date';
$result['department'] = 'department';
$result['invoice_item_id'] = 'invoice_item_id';
$result['hotel_id'] = 'hotel_id';
$result['check_in'] = 'check_in';
$result['check_out'] = 'check_out';
$result['total'] = 'total';




$fullList[] = $result;
$count = 0;

while($array = fgetcsv($file,0,',',"'")){
    $count++;



    $ser = $array['10'];
    $ser = unserialize($ser);


//    var_dump($ser['rates_data']['total']);exit;
    if(!$ser || !is_array($ser)){

        continue;
    }

    //"check_in_date","quote_number","agent_name","quote_data","agency_address","agency_zip_code","agency_city","agency_state",<-7
    //8->"agency_country","agency_tel","agency_id","agency_website","agency_level","agency_name"<-13


    $result['reservation_id'] = $array['0'];
    $result['reseller_id'] = $array['2'];
    $result['quote_id'] = $array['3'];
    $result['hotel_name'] = $ser['request']['hotel_name'];
    $result['created_by'] = $array['4'];
    $result['creation_date'] = $array['5'];
    $result['reservation_type'] = $array['6'];
    $result['confirmation_status'] = $array['7'];
    $result['cancellation_due'] = $array['8'];
    $result['confirmation_number'] = $array['9'];
    $result['modification_date'] = $array['12'];
    $result['department'] = $array['17'];
    $result['invoice_item_id'] = $array['18'];
    $result['hotel_id'] = $array['20'];
    $result['check_in'] = $ser['request']['check_in_date'];
    $result['check_out'] = $ser['request']['check_out_date'];
    $result['total'] = $ser['rates_data']['total']['rate_net'] + $ser['rates_data']['total']['rate_tax'];


    $fullList[] = $result;
}


;
echo "<table>";
//$emailList = array();
foreach ($fullList as $list){
//    var_dump($list['confirmation_number']);
//    $compVal = trim($list['agency_id']);
//    if(!$list['agency_name'] || in_array($compVal,$emailList)){
//        continue;
//    }
//    echo $list['agent_email']."<br>";continue;
//    $emailList[] = $compVal;
    echo "<tr>";
    echo "<td>".$list['hotel_name']."</td>";
//    echo "<td>".$list['hbsi_stay_data']."</td>";
//    echo "<td>".$list['reseller_id']."</td>";
    echo "<td>".$list['quote_id']."</td>";
    echo "<td>".$list['created_by']."</td>";
//    echo "<td>".$list['creation_date']."</td>";
//    echo "<td>".$list['reservation_type']."</td>";
//    echo "<td>".$list['confirmation_status']."</td>";
//    echo "<td>".$list['cancellation_due']."</td>";
//    echo "<td>".$list['confirmation_number']."</td>";
//    echo "<td>".$list['reservation_update_token']."</td>";
//    echo "<td>".$list['modification_date']."</td>";
//    echo "<td>".$list['department']."</td>";
//    echo "<td>".$list['invoice_item_id']."</td>";
//    echo "<td>".$list['supplier_id']."</td>";
//    echo "<td>".$list['hotel_id']."</td>";
//    echo "<td>".$list['check_in']."</td>";
//    echo "<td>".$list['check_out']."</td>";
//    echo "<td>".$list['total']."</td>";
//    echo "<td>".substr($list['check_in'],0,10)."</td>";
    echo "</tr>";

}
echo "</table>";


