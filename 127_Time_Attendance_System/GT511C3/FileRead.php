<?php
$string = file_get_contents("ServerTransmitter.json");
$jsonRS = json_decode ($string, true);

foreach ($jsonRS as $rs)
{
  echo $rs;
}
?>