<?php
require_once __DIR__ . '/includes/MercadoPago/MercadoPago.php';
require_once __DIR__ . '/includes/ErrorLog.php'; 
require_once 'constantes.php';

MercadoPago\SDK::setIntegratorId('dev_24c65fb163bf11ea96500242ac130004');
//        MercadoPago\SDK::setClientId('469485398');
        MercadoPago\SDK::setPublicKey(__publickey__);
        MercadoPago\SDK::setAccessToken(__token__);

//$url = 'https://api.mercadopago.com/v1/payments/7059869322';
//
//$url .= 'access_token='.__token__;
//
//$ch = curl_init($url);
//
////set the content type to application/json
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//
////return response instead of outputting
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
////execute the POST request
//$result = curl_exec($ch);
////close cURL resource
//curl_close($ch);
//
//ErrorLog::log('notificacion',$result);
$result = MercadoPago\Payment::find_by_id($_POST["id"]);
http_response_code(200);
echo '<pre>';
print_r($result);
echo '</pre>';