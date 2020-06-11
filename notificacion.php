<?php
require_once __DIR__ . '/includes/ErrorLog.php'; 

ErrorLog::log('compra', '', '', $_POST);

http_response_code(200);