<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.google.com/");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if(curl_error($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

echo $response;
?>