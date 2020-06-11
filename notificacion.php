<?php
require_once __DIR__ . '/includes/ErrorLog.php'; 
require_once 'constantes.php';


$url = 'https://api.mercadopago.com/v1/payments/'.$_GET["id"];

$url .= '?access_token='.__token__;

$ch = curl_init($url);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);
//close cURL resource
curl_close($ch);

ErrorLog::log('notificacion',$result);
http_response_code(200);
echo '<pre>';
print_r($result);
echo '</pre>';