<?php
$input = "P01/2200/40/10#P03/1100/30/1#P99/3300/40/100#P66/3300/30/20";
$product = explode("#",$input);
$array = [];
// unique product
foreach($product as $key => $val):
    $tes = explode("/", $val);
    $array[$tes[0]] = [
        "product" => $tes[0],
        "hargaDasar" => $tes[1],
        "margin" => $tes[2],
        "kuantitas" => $tes[3]
    ];
endforeach;
// kalkulasi
$gross = $netto = $diskon = $margin = 0;
$totalGross = $totalNetto = $totalDiskon = $totalMargin = 0;
foreach($array as $key => $val):
    if($val["kuantitas"] <= 10)
        $rateDiskon = 0;
    else if($val["kuantitas"] >= 11 && $val["kuantitas"] <= 50)
        $rateDiskon = 1;
    else
        $rateDiskon = 2;

    $margin = ($val["hargaDasar"]*$val["kuantitas"]*$val["margin"])/100;
    $gross = ($val["hargaDasar"]*$val["kuantitas"])+$margin;
    $diskon = ($gross*$rateDiskon)/100;
    $netto = $gross-$diskon;
    $totalGross += $gross;
    $totalNetto += $netto;
    $totalDiskon += $diskon;
    $totalMargin += ($margin-$diskon);
endforeach;

echo count($array). " Product : ". $totalGross . "/". $totalNetto . "/". $totalDiskon ."/". $totalMargin;
?>