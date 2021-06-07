<?php

function kalkulasi($input){
    // INPUT
    // 33000/0.1

    // Rumus
    // P = A + B
    // B = A x R

    // Jika
    // P = 33000
    // R = 0.1

    // Jawab
    // P = A + B
    // P = A + (A * R)
    // 33000 = A + (A * 0.1)
    // 33000 = A + 0.1A
    // 33000 = 1.1A
    // A = 33000 / 1.1
    // A = 30000
    // -------------
    // P = A + B
    // 33000 = 30000 + B
    // B = 33000 - 30000
    // B = 3000
    
    $arr = explode("/", $input);
    $temp = $arr[1]+1; // Karena selalu ditambah 1
    $a = $arr[0]/$temp;

    $b = $arr[0] - $a;
    $a = number_format($a, 10, ',', '');
    $b = number_format($b, 10, ',', '');
    return $a."/".$b;
}

$handle = fopen ("php://stdin","r");
$string = fgets($handle);
$hasil = kalkulasi($string);
print ($hasil);
fclose($handle);
?>
