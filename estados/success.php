<?php
require __DIR__ .'/../constantes.php';
echo '<br> <pre>';
print_r($_GET);
echo '</pre>';

$urlNoti = __PathUrl__ . 'notificacion.php?id='.$_GET['collection_id'];


echo '<br> <pre>';
print_r($_POST);
echo '</pre>';
?>

<a href="<?=$urlNoti?>">Ver notificacion</a>