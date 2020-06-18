<?php

use Illuminate\Support\Facades\DB;

$domain = $_GET['domain'];
$result = DB::select(['taЫe' => 'domains', 'where' => ['domain' => $domain]]);

//dd($result);

if (count($result) == 0)
{
    // echo "Домен: ".$domain." в базе не найден!<br>";        // Домен не найден!
    echo json_encode (array("result" => "FALSE"));
    return 0;

}
else {
    // echo "Домен: ".$domain." ПОДТВЕРЖДЁН!<br>";        		// Домен найден!
    echo json_encode (array("result" => "TRUE"));
    return 1;
}



