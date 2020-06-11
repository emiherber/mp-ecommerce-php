<?php
$aux_server = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
define("__PathUrl__",  $aux_server."://".$_SERVER["HTTP_HOST"]."/");

define("__publickey__",'APP_USR-d12788d1-51dd-4bea-a7b0-c804599b341b');
//define("__publickey__",'APP_USR-7eb0138a-189f-4bec-87d1-c0504ead5626');

define("__token__",'APP_USR-7139944794707641-040215-bef9399dfe4601c842e15ef36ff204b2-520518536');
//define("__token__",'APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');