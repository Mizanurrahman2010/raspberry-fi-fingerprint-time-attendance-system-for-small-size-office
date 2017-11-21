<?php


function __EnrollAll()
{
    $command = "python ".dirname(__FILE__)."/EnrollAll.py";
    return exec($command);
}

__EnrollAll();

?>