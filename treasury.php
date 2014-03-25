<?php

function myTruncate($string, $limit) {
    // return with no change if string is shorter than $limit
    if (strlen($string) <= $limit)
        return $string;
    $string = substr($string, 0, $limit) . '...';
    return $string;
}

$treasury_id = $_POST['treasury_id'];
$size = $_POST['size'];
$columns = 4;
$columns = (int) $_POST['columns'];
if ($treasury_id != null) {
    $url = "http://openapi.etsy.com/v2/public/treasuries/$treasury_id?api_key=af5jz4ewjmsbcrpv7vh6qnkh";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_body = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (intval($status) != 200)
        echo("Error: $response_body");
    $response = json_decode($response_body);
    $result = $response->results[0];
}

include('treasury_page.php');
?>
