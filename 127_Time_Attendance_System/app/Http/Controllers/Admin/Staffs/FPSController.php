<?php

namespace App\Http\Controllers\Admin\Staffs;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class FPSController extends Controller
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
    public function TakeFingerPrint($id)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if (strlen($id) < 1  AND is_numeric($id)){
            ResponseAjax::set('Message.text', 'Warning : Wrong staff id (Error Code -2)');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */

        
        if($ErrorCount == 0)
        {

            // $str = exec("systemctl stop fps");
            // ResponseAjax::set('Message.text', 'Yes i am with - '.$str);
            // $command = "python ".base_path()."/GT511C3/EnrollAll.py";
            //ResponseAjax::set('Message.text', exec("whoami"));

            $command = "python ".base_path()."/PyFingerprint-1.4/example_enroll_ajax.py";
            $FPS_Status = exec($command);

            if(strlen($FPS_Status)<3 AND strlen($FPS_Status)>0 AND (int)$FPS_Status >= 0 AND (int)$FPS_Status <= 254)
            {
                $LastEnrolledID = (int)$FPS_Status;

               /* 
               $FPS_Directory = '/var/www/html/GT511C3/';

               $myfile = fopen($FPS_Directory."LastEnrolledID.json", "r") or die("Unable to open LastEnrolledID file!");
               $LastEnrolledID = fread($myfile,filesize($FPS_Directory."LastEnrolledID.json"));
               fclose($myfile);*/

                DB::table('staffs')
                    ->where('id', $id)
                    ->update([
                        'fps_id' => $LastEnrolledID,
                    ]);

                ResponseAjax::set('SuccessStatus', 1);
                ResponseAjax::set('ResponseData', $LastEnrolledID);
                ResponseAjax::set('Message.text', '<h3 style="color:#fff">Successfully Staff\'s Finger Print Taken. Finger print ID : '.$LastEnrolledID.'</h3>');
            }
            else
            {
                ResponseAjax::set('Message.text', 'FPSErrorPHP - '.$FPS_Status);
            }
        }

        ResponseAjax::Response();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ManualUpdate(Request $request, $id)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token = $data['_token'];
        $fps_id = $data['fps_id'];

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if (strlen($id) < 1  AND is_numeric($id)){
            ResponseAjax::set('Message.text', 'Warning : Wrong staff id');
            $ErrorCount++;
        }

        if(empty($fps_id) || !is_numeric($fps_id))
        {
            ResponseAjax::set('Message.text', 'Invalid Finger Print ID');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */

        
        if($ErrorCount == 0)
        {

            DB::table('staffs')
                ->where('id', $id)
                ->update([
                    'fps_id' => $fps_id,
                ]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('ResponseData', $fps_id);
            ResponseAjax::set('Message.text', '<h3 style="color:#fff">Successfully Staff\'s Finger Print Manually Updated. Finger print ID : '.$fps_id.'</h3>');
        }

        ResponseAjax::Response();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ScanStop()
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        /*
         * End : Incoming data check
         * */

        
        if($ErrorCount == 0)
        {
            $command = "python ".base_path()."/PyFingerprint-1.4/fps_service_stop.py";
            $FPS_Status = exec($command);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', 'Stopped'.$FPS_Status);
        }

        ResponseAjax::Response();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ScanStart()
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        /*
         * End : Incoming data check
         * */

        
        if($ErrorCount == 0)
        {
            $command = "python ".base_path()."/PyFingerprint-1.4/fps_service_start.py";
            $FPS_Status = exec($command);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', 'Started '.$FPS_Status);
        }

        ResponseAjax::Response();
    }
}
