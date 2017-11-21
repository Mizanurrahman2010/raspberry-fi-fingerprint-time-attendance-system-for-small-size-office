<?php
/**
 * Created by PhpStorm.
 * User: Mizan
 * Date: 6/30/2017
 * Time: 12:07 PM
 */

shell_exec("testv = 'mizan'");
$output = shell_exec('print testv');
echo $output;

$output = shell_exec('ls -lart');
echo "<pre>$output</pre>";