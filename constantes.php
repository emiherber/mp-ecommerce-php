<?php
$aux_server = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
define("__PathUrl__",  $aux_server."://".$_SERVER["HTTP_HOST"]."/");


define("__publickey__",'APP_USR-7eb0138a-189f-4bec-87d1-c0504ead5626');


define("__token__",'APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');