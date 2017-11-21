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

function __Enroll2()
{
    $command = "python ".dirname(__FILE__)."/Enroll2.py";
    return exec($command);
}

function __Enroll3()
{
    $command = "python ".dirname(__FILE__)."/Enroll3.py";
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
        echo 'Error Unknown! - May be Debug on'.$RetVal;
    }
}

function Enroll2()
{
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
}

function Enroll3()
{
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
}

?>