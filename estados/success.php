<?php
echo 'payment_method_id: '. $_GET['collection_id'];
echo '<br> external_reference: '. $_GET['external_reference'];
echo '<br> payment_id: '. $_GET['payment_id'];
echo '<br> collection_id: '. $_GET['collection_id'];

echo '<br> <pre>';
print_r($_GET);
echo '</pre>';