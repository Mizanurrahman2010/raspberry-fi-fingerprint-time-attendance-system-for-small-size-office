<?php


function LegacyEnroll()
{
    $command = 'python '.dirname(__FILE__).'/LegacyEnroll.py';
    return exec($command);
}

echo LegacyEnroll();
?>