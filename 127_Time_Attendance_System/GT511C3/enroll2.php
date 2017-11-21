<?php

function __Enroll2()
{
    $command = "python ".dirname(__FILE__)."/Enroll2.py";
    return exec($command);
}

$RetVal = __Enroll2() ;
if($RetVal == 'Enrolled')
{
    echo 'Success Enroll 2 '.$RetVal;
}
elseif($RetVal == 'NotEnrolled')
{
    echo 'Enroll 2 Failed';
}
elseif($RetVal == 'CaptureFailed')
{
    echo 'Finger Print can not captured';
}
else
{
    echo 'Error Unknown! - May be Debug on'.$RetVal;
}

?>