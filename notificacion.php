<?php
require_once __DIR__ . '/includes/ErrorLog.php'; 
http_response_code(200);
echo '<br>inicio post <br>';
echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<br>fin post <br>';
echo '<br>inicio get <br>';
echo '<pre>';
print_r($_GET);
echo '</pre>';
echo '<br>fin get <br>';

$input = file_get_contents("php://input");


ErrorLog::log('notificacionPOST', '', '', $input);