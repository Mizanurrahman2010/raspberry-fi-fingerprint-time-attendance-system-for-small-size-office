<?php

namespace App\Http\Controllers\Admin\Attendance\Rule\Staff;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class CreateController extends Controller
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
    * Attendance/Rule/cREATE Controller.
    *
    * @return \Illuminate\Http\Response
    */
    public function createForm()
    {
        $departments = DB::table('departments')->get();

        return view('admin.attendance.rule.staff.create', ['departments' => $departments]);
    }

    /**
    * Attendance/Rule/cREATE Controller.
    *
    * @return \Illuminate\Http\Response
    */

    public function create(Request $request)
    {

        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token                     =   $data['_token'];
        $name                       =   $data['name'];

        // $duty_on_time_hour          =   $data['duty_on_time_hour'];
        // $duty_on_time_minute        =   $data['duty_on_time_minute'];
        // $duty_on_time_am_pm         =   $data['duty_on_time_am_pm'];
        // $duty_on_time               =   $duty_on_time_hour.':'.$duty_on_time_minute.':00 '.$duty_on_time_am_pm;
        // $duty_on_time               =   date("H:i:s", strtotime($duty_on_time));

        // $duty_off_time_hour         =   $data['duty_off_time_hour'];
        // $duty_off_time_minute       =   $data['duty_off_time_minute'];
        // $duty_off_time_am_pm        =   $data['duty_off_time_am_pm'];
        // $duty_off_time              =   $duty_off_time_hour.':'.$duty_off_time_minute.':00 '.$duty_off_time_am_pm;
        // $duty_off_time              =   date("H:i:s", strtotime($duty_off_time));

        // $entry_time_from_hour       =   $data['entry_time_from_hour'];
        // $entry_time_from_minute     =   $data['entry_time_from_minute'];
        // $entry_time_from_am_pm      =   $data['entry_time_from_am_pm'];
        // $entry_time_from            =   $entry_time_from_hour.':'.$entry_time_from_minute.':00 '.$entry_time_from_am_pm;
        // $entry_time_from            =   date("H:i:s", strtotime($entry_time_from));

        // $entry_time_to_hour         =   $data['entry_time_to_hour'];
        // $entry_time_to_minute       =   $data['entry_time_to_minute'];
        // $entry_time_to_am_pm        =   $data['entry_time_to_am_pm'];
        // $entry_time_to              =   $entry_time_to_hour.':'.$entry_time_to_minute.':00 '.$entry_time_to_am_pm;
        // $entry_time_to              =   date("H:i:s", strtotime($entry_time_to));

        // $out_time_from_hour         =   $data['out_time_from_hour'];
        // $out_time_from_minute       =   $data['out_time_from_minute'];
        // $out_time_from_am_pm        =   $data['out_time_from_am_pm'];
        // $out_time_from              =   $out_time_from_hour.':'.$out_time_from_minute.':00 '.$out_time_from_am_pm;
        // $out_time_from              =   date("H:i:s", strtotime($out_time_from));

        // $out_time_to_hour           =   $data['out_time_to_hour'];
        // $out_time_to_minute         =   $data['out_time_to_minute'];
        // $out_time_to_am_pm          =   $data['out_time_to_am_pm'];
        // $out_time_to                =   $out_time_to_hour.':'.$out_time_to_minute.':00 '.$out_time_to_am_pm;
        // $out_time_to                =   date("H:i:s", strtotime($out_time_to));

        // $duty_on_time               =   $data["duty_on_time"];
        // $duty_off_time              =   $data["duty_off_time"];
        // $entry_time_from            =   $data["entry_time_from"];
        // $entry_time_to              =   $data["entry_time_to"];
        // $out_time_from              =   $data["out_time_from"];
        // $out_time_to                =   $data["out_time_to"];

        // $duty_on_time               =   date("H:i:s", strtotime($duty_on_time));
        // $duty_off_time              =   date("H:i:s", strtotime($duty_off_time));
        // $entry_time_from            =   date("H:i:s", strtotime($entry_time_from));
        // $entry_time_to              =   date("H:i:s", strtotime($entry_time_to));
        // $out_time_from              =   date("H:i:s", strtotime($out_time_from));
        // $out_time_to                =   date("H:i:s", strtotime($out_time_to));

        // $late_duration_hour         =   $data['late_duration_hour'];
        // $late_duration_minute       =   $data['late_duration_minute'];
        // $late_duration              =   $late_duration_hour.':'.$late_duration_minute.':00';
        // $late_duration              =   date("H:i:s", strtotime($late_duration));

        // $early_leave_duration_hour  =   $data['early_leave_duration_hour'];
        // $early_leave_duration_minute=   $data['early_leave_duration_minute'];
        // $early_leave_duration       =   $early_leave_duration_hour.':'.$early_leave_duration_minute.':00';
        // $early_leave_duration       =   date("H:i:s", strtotime($early_leave_duration));

        // $early_come_duration_hour   =   $data['early_come_duration_hour'];
        // $early_come_duration_minute =   $data['early_come_duration_minute'];
        // $early_come_duration        =   $early_come_duration_hour.':'.$early_come_duration_minute.':00';
        // $early_come_duration        =   date("H:i:s", strtotime($early_come_duration));

        // $late_leave_duration_hour   =   $data['late_leave_duration_hour'];
        // $late_leave_duration_minute =   $data['late_leave_duration_minute'];
        // $late_leave_duration        =   $late_leave_duration_hour.':'.$late_leave_duration_minute.':00';
        // $late_leave_duration        =   date("H:i:s", strtotime($late_leave_duration));

        $days                       =   $data['days'];

        $validate_from_day          =   $data['validate_from_day'];
        $validate_from_month        =   $data['validate_from_month'];
        $validate_from_year         =   $data['validate_from_year'];
        $validate_from              =   $validate_from_year.'-'.$validate_from_month.'-'.$validate_from_day;

        $validate_to_day            =   $data['validate_to_day'];
        $validate_to_month          =   $data['validate_to_month'];
        $validate_to_year           =   $data['validate_to_year'];
        $validate_to                =   $validate_to_year.'-'.$validate_to_month.'-'.$validate_to_day;

        $department                 =   $data['department'];
        $status                     =   $data['status'];


        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if (strlen($name) < 3 || strlen($name) > 100) {
            ResponseAjax::set('Message.text', 'Rule Name between 3 to 100 characters');
            $ErrorCount++;
        }

        // start : days validatiy
        foreach ($days as $key1 => $day)
        {
            foreach ($day as $key2 => $value)
            {
                if(!isset($value))
                {
                    $ErrorCount += 1;
                    ResponseAjax::set('Message.text', $key2.' can not be empty');
                }
            }
        }
        // end : days validatiy

        // if($duty_on_time_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Duty On Time ( Hour )');
        //     $ErrorCount++;
        // }
        // if($duty_on_time_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Duty On Time ( Munute )');
        //     $ErrorCount++;
        // }

        // if($duty_off_time_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Duty Off Time ( Hour )');
        //     $ErrorCount++;
        // }
        // if($duty_off_time_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Duty Off Time ( Munute )');
        //     $ErrorCount++;
        // }



        // if($entry_time_from_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Entry Time : from ( Hour )');
        //     $ErrorCount++;
        // }

        // if($entry_time_from_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Entry Time : from ( Minute )');
        //     $ErrorCount++;
        // }

        // if($entry_time_to_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Entry Time : to ( Hour )');
        //     $ErrorCount++;
        // }

        // if($entry_time_to_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Entry Time : to ( Minute )');
        //     $ErrorCount++;
        // }



        // if($out_time_from_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Out Time : from ( Hour )');
        //     $ErrorCount++;
        // }

        // if($out_time_from_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Out Time : from ( Minute ) ');
        //     $ErrorCount++;
        // }

        // if($out_time_to_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Out Time : to ( Hour)  ');
        //     $ErrorCount++;
        // }

        // if($out_time_to_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select Out Time : to ( Minute ) ');
        //     $ErrorCount++;
        // }



        // if($late_duration_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select "Late Duration (for fine)" ( Hour ) ');
        //     $ErrorCount++;
        // }
        // if($late_duration_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select "Late Duration (for fine)" ( Minute ) ');
        //     $ErrorCount++;
        // }
        // if($early_leave_duration_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select "Early leave Duration (for fine)" ( Hour ) ');
        //     $ErrorCount++;
        // }
        // if($early_leave_duration_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select "Early Leave Duration (for fine)" ( Minute ) ');
        //     $ErrorCount++;
        // }


        // if($early_come_duration_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select "Early Come Duration (for bonus)" ( Hour ) ');
        //     $ErrorCount++;
        // }
        // if($early_come_duration_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select "Early Come Duration (for bonus)" ( Minute ) ');
        //     $ErrorCount++;
        // }

        // if($late_leave_duration_hour == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select "Late Leave Duration (for bonus)" ( Hour ) ');
        //     $ErrorCount++;
        // }
        // if($late_leave_duration_minute == -1)
        // {
        //     ResponseAjax::set('Message.text', 'Select "Late Leave Duration (for bonus)" ( Minute ) ');
        //     $ErrorCount++;
        // }



        if(!$validate_from_day || !$validate_from_month || !$validate_from_year)
        {
            ResponseAjax::set('Message.text', 'Select "Validate From" properly');
            $ErrorCount++;
        }
        elseif(!checkdate($validate_from_month, $validate_from_day, $validate_from_year))
        {
            ResponseAjax::set('Message.text', 'Invalid "Validate from" Date');
            $ErrorCount++;
        }



        if(!$validate_to_day || !$validate_to_month || !$validate_to_year)
        {
            ResponseAjax::set('Message.text', 'Select "Validate To" properly');
            $ErrorCount++;
        }
        elseif(!checkdate($validate_to_month, $validate_to_day, $validate_to_year))
        {
            ResponseAjax::set('Message.text', 'Invalid "Validate To" Date');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */


        /*
        * Start : existance check
        *
        * */
        if($ErrorCount == 0)
        {
            $num_row = DB::table('attendance_rules_staff')->where('name', $name)->first();
            if ($num_row != null)
            {
                ResponseAjax::set('Message.text', 'Rule Already exist under this name in the system');
                $ErrorCount++;
            }
        }
        /*
        * End : existance check
        *
        * */


        /*
         * Start : insert in database
         * */
        // var_dump(unserialize(serialize($days)));
        
        if($ErrorCount == 0)
        {
            $id = DB::table('attendance_rules_staff')->insertGetId(
                [

                    'name'                  => $name,

                    // 'duty_on_time'          => $duty_on_time,
                    // 'duty_off_time'         => $duty_off_time,

                    // 'entry_time_from'       => $entry_time_from,
                    // 'entry_time_to'         => $entry_time_to,

                    // 'out_time_from'         => $out_time_from,
                    // 'out_time_to'           => $out_time_to,

                    // 'late_duration'         => $late_duration,
                    // 'early_leave_duration'  => $early_leave_duration,
                    // 'early_come_duration'   => $early_come_duration,
                    // 'late_leave_duration'   => $late_leave_duration,
                    'cycle'                 => 'weekly',
                    'days'                  => json_encode($days),

                    'validate_from'         => $validate_from,
                    'validate_to'           => $validate_to,

                    'department_id'         => $department,
                    'status'                => $status,
                    'created_at'            => DB::raw('NOW()')

                ]
            );


            if($id)
            {
                ResponseAjax::set('SuccessStatus', 1);
                ResponseAjax::set('ResponseData', $id);
                ResponseAjax::set('Message.text', '<h4 style="color:#fff">Successfully Attendance rule "'.$name.'" Created, <br> ID : '.$id.'</h4>');
            }
            else
            {
                ResponseAjax::set('Message.text', 'Error - Insert Data execution error (Error - 1)');
            }
        }
        /*
         * End : insert in database
         * */

        ResponseAjax::Response();
    }

    private function TimeAdd($time1, $time2)
    {
        $time = strtotime($time1) + strtotime($time2) - strtotime('00:00:00');
        return date('H:i:s', $time);
    }
}
