<?php
var_dump( phpinfo());
$SaveData ='ok' ;
$fp = fopen('ServerReceiver.json', 'w+');
fwrite($fp, json_encode($SaveData));
fclose($fp);
echo 'ok';
?>