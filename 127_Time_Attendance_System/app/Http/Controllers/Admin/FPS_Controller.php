<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseAjax;

class FPS_Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ScanningStatus()
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $ST_File = base_path()."/../GT511C3/ServerTransmitter.json";

        $ServerTransmitter = fopen($ST_File, "r");
        if ( !$ServerTransmitter )
        {
            ResponseAjax::set('Message.text', 'ServerTransmitter - Unable to open file.');
        }
        else
        {
            $FPS_ScanningStatus = @fread($ServerTransmitter, filesize($ST_File));
            fclose($ServerTransmitter);
            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('ResponseData', $FPS_ScanningStatus);
        }

        ResponseAjax::Response();
    }

    public function ScanningStatusClear()
    {
        $ST_File = base_path()."/../GT511C3/ServerTransmitter.json";

        $fh = fopen($ST_File, 'w');
        if ( !$fh )
        {
            ResponseAjax::set('Message.text', 'ServerTransmitter - Unable to open file to empty buffer.');
        }
        else
        {
            fwrite($fh, "");
            fclose($fh);
            ResponseAjax::set('SuccessStatus',1);
            ResponseAjax::set('Message.text', 'ServerTransmitter - buffer clear.');
        }

        ResponseAjax::Response();

    }
}
