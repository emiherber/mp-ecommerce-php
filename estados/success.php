<?php
require_once 'constantes.php';
echo '<br> <pre>';
print_r($_GET);
echo '</pre>';

$urlNoti = __PathUrl__ . 'notificacion.php?id='.$_GET['collection_id'];
?>

<a href="<?=$urlNoti?>">Ver notificacion</a>