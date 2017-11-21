<?php

function __Enroll3()
{
    $command = "python ".dirname(__FILE__)."/Enroll3.py";
    return exec($command);
}

$RetVal = __Enroll3() ;
if($RetVal == 'Enrolled')
{
    echo 'Success Enroll 3 '.$RetVal;
}
elseif($RetVal == 'NotEnrolled')
{
    echo 'Enroll 3 Failed';
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