<?php


function EnrollIDCreate()
{
    $command = 'python '.dirname(__FILE__).'/EnrollIDCreate.py';
    return exec($command);
}

function __Enroll1($ID)
{
    $command = "python ".dirname(__FILE__)."/Enroll1.py $ID";
    return exec($command);
}


$ID = EnrollIDCreate();
if($ID != 'false')
{
    Enroll1($ID);
}
else
{
    echo 'ID Generator did not work perfectly';
}

function Enroll1($ID)
{
    $RetVal = __Enroll1($ID) ;
    if($RetVal == 'Enrolled')
    {
        echo 'enroll id : '.$ID.'<br>';
        echo 'Success Enroll 1 '.$RetVal;
    }
    elseif($RetVal == 'NotEnrolled')
    {
        echo 'Enroll 1 Failed';
    }
    elseif($RetVal == 'CaptureFailed')
    {
        echo 'Finger Print can not captured';
    }
    else
    {
        echo 'Error Unknown! - May be Debug on - '.$RetVal;
    }
}

?>