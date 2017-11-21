<?php

namespace App\Http\Controllers\Admin\Attendance\Rule\Staff;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class UpdateController extends Controller
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
    public function updateForm($id)
    {
        $departments = DB::table('departments')->get();
        $rule        = DB::table('attendance_rules_staff')->where('id', $id)->first();
        // var_dump($rule->days);

        // $staff->joining_date_day   = date('d', strtotime($staff->joining_date));
        // $staff->joining_date_month = date('m', strtotime($staff->joining_date));
        // $staff->joining_date_year  = date('Y', strtotime($staff->joining_date));

        // $staff->birthday_day   = date('d', strtotime($staff->birthday));
        // $staff->birthday_month = date('m', strtotime($staff->birthday));
        // $staff->birthday_year  = date('Y', strtotime($staff->birthday));

        return view('admin.attendance.rule.staff.update', ['departments' => $departments, 'rule' => $rule]);
    }

    /**
    * Attendance/Rule/cREATE Controller.
    *
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id)
    {

        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token                     =   $data['_token'];
        $name                       =   $data['name'];

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

        if (strlen($name) < 2 || strlen($name) > 100) {
            ResponseAjax::set('Message.text', 'Rule Name between 2 to 100 characters');
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



        if(!$validate_from_day || !$validate_from_month || !$validate_from_year)
        {
            ResponseAjax::set('Message.text', 'Select Validate From properly');
            $ErrorCount++;
        }
        elseif(!checkdate($validate_from_month, $validate_from_day, $validate_from_year))
        {
            ResponseAjax::set('Message.text', 'Invalid Validate from Date');
            $ErrorCount++;
        }



        if(!$validate_to_day || !$validate_to_month || !$validate_to_year)
        {
            ResponseAjax::set('Message.text', 'Select Validate To properly');
            $ErrorCount++;
        }
        elseif(!checkdate($validate_to_month, $validate_to_day, $validate_to_year))
        {
            ResponseAjax::set('Message.text', 'Invalid Validate To Date');
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
            $num_row = DB::table('attendance_rules_staff')->where('name', $name)->where('id', '<>', $id)->first();
            if ($num_row != null)
            {
                ResponseAjax::set('Message.text', 'Rule Already exist under this name');
                $ErrorCount++;
            }

            $num_row1 = DB::table('attendance_rules_staff')->where('id', $id)->first();
            if ($num_row1 == null)
            {
                ResponseAjax::set('Message.text', 'Rule already deleted');
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
        if($ErrorCount == 0)
        {

            $num_row = DB::table('attendance_rules_staff')
                ->where('id', $id)
                ->update([

                    'name'              => $name,

                    // 'duty_on_time'      => $duty_on_time,
                    // 'duty_off_time'     => $duty_off_time,

                    // 'entry_time_from'   => $entry_time_from,
                    // 'entry_time_to'     => $entry_time_to,

                    // 'out_time_from'     => $out_time_from,
                    // 'out_time_to'       => $out_time_to,

                    'cycle'             => 'weekly',
                    'days'              => json_encode($days),

                    'validate_from'     => $validate_from,
                    'validate_to'       => $validate_to,

                    // 'late_duration'         => $late_duration,
                    // 'early_leave_duration'  => $early_leave_duration,
                    // 'early_come_duration'   => $early_come_duration,
                    // 'late_leave_duration'   => $late_leave_duration,

                    'department_id'     => $department,
                    'status'            => $status,
                    'updated_at'        => DB::raw('NOW()')
                ]);

            if($num_row)
            {
                ResponseAjax::set('SuccessStatus', 1);
                //ResponseAjax::set('ResponseData', $id);
                ResponseAjax::set('Message.text', '<h4 style="color:#fff">Successfully Rule "'.$name.'" updated, <br> Rule ID : '.$id.'</h4>');
            }
            else
            {
                ResponseAjax::set('Message.text', 'Not Updated - May be same data exist');
            }
        }
        /*
         * End : insert in database
         * */

        ResponseAjax::Response();
    }
}
