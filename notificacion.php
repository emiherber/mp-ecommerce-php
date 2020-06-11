<?php
require_once __DIR__ . '/includes/ErrorLog.php'; 
http_response_code(200);
$input = file_get_contents("php://input");
ErrorLog::log('notificacionPOST', $input, '', $input);