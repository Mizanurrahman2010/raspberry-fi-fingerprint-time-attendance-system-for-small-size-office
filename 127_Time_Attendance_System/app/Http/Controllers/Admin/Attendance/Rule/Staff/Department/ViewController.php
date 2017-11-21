<?php

namespace App\Http\Controllers\Admin\Attendance\Rule\Staff\Department;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class ViewController extends Controller
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
    public function view($id)
    {
        $departments = DB::table('departments')->get();
        $rule        = DB::table('attendance_rules_staff')->where('id', $id)->first();

        // $staff->joining_date_day   = date('d', strtotime($staff->joining_date));
        // $staff->joining_date_month = date('m', strtotime($staff->joining_date));
        // $staff->joining_date_year  = date('Y', strtotime($staff->joining_date));

        // $staff->birthday_day   = date('d', strtotime($staff->birthday));
        // $staff->birthday_month = date('m', strtotime($staff->birthday));
        // $staff->birthday_year  = date('Y', strtotime($staff->birthday));

        return view('admin.attendance.rule.staff.department.view', ['departments' => $departments, 'rule' => $rule]);
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

        $entry_time_from_hour       =   $data['entry_time_from_hour'];
        $entry_time_from_minute     =   $data['entry_time_from_minute'];
        $entry_time_from_am_pm      =   $data['entry_time_from_am_pm'];
        $entry_time_from            =   $entry_time_from_hour.':'.$entry_time_from_minute.':00 '.$entry_time_from_am_pm;
        $entry_time_from            =   date("H:i:s", strtotime($entry_time_from));

        $entry_time_to_hour         =   $data['entry_time_to_hour'];
        $entry_time_to_minute       =   $data['entry_time_to_minute'];
        $entry_time_to_am_pm        =   $data['entry_time_to_am_pm'];
        $entry_time_to              =   $entry_time_to_hour.':'.$entry_time_to_minute.':00 '.$entry_time_to_am_pm;
        $entry_time_to              =   date("H:i:s", strtotime($entry_time_to));

        $out_time_from_hour         =   $data['out_time_from_hour'];
        $out_time_from_minute       =   $data['out_time_from_minute'];
        $out_time_from_am_pm        =   $data['out_time_from_am_pm'];
        $out_time_from              =   $out_time_from_hour.':'.$out_time_from_minute.':00 '.$out_time_from_am_pm;
        $out_time_from              =   date("H:i:s", strtotime($out_time_from));

        $out_time_to_hour           =   $data['out_time_to_hour'];
        $out_time_to_minute         =   $data['out_time_to_minute'];
        $out_time_to_am_pm          =   $data['out_time_to_am_pm'];
        $out_time_to                =   $out_time_to_hour.':'.$out_time_to_minute.':00 '.$out_time_to_am_pm;
        $out_time_to                =   date("H:i:s", strtotime($out_time_to));

        $validate_from_day          =   $data['validate_from_day'];
        $validate_from_month        =   $data['validate_from_month'];
        $validate_from_year         =   $data['validate_from_year'];
        $validate_from              =   $validate_from_year.'-'.$validate_from_month.'-'.$validate_from_day;

        $validate_to_day            =   $data['validate_to_day'];
        $validate_to_month          =   $data['validate_to_month'];
        $validate_to_year           =   $data['validate_to_year'];
        $validate_to                =   $validate_to_year.'-'.$validate_to_month.'-'.$validate_to_day;

        $department                 =   $data['department'];
        $priority                   =   $data['priority'];
        $status                     =   $data['status'];


        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if (strlen($name) < 3 || strlen($name) > 100) {
            ResponseAjax::set('Message.text', 'Rule Name between 3 to 100 characters');
            $ErrorCount++;
        }



        if($entry_time_from_hour == -1)
        {
            ResponseAjax::set('Message.text', 'Select Entry Time : from ( Hour )');
            $ErrorCount++;
        }

        if($entry_time_from_minute == -1)
        {
            ResponseAjax::set('Message.text', 'Select Entry Time : from ( Minute )');
            $ErrorCount++;
        }

        if($entry_time_to_hour == -1)
        {
            ResponseAjax::set('Message.text', 'Select Entry Time : to ( Hour )');
            $ErrorCount++;
        }

        if($entry_time_to_minute == -1)
        {
            ResponseAjax::set('Message.text', 'Select Entry Time : to ( Minute )');
            $ErrorCount++;
        }



        if($out_time_from_hour == -1)
        {
            ResponseAjax::set('Message.text', 'Select Out Time : from ( Hour )');
            $ErrorCount++;
        }

        if($out_time_from_minute == -1)
        {
            ResponseAjax::set('Message.text', 'Select Out Time : from ( Minute ) ');
            $ErrorCount++;
        }

        if($out_time_to_hour == -1)
        {
            ResponseAjax::set('Message.text', 'Select Out Time : to ( Hour)  ');
            $ErrorCount++;
        }

        if($out_time_to_minute == -1)
        {
            ResponseAjax::set('Message.text', 'Select Out Time : to ( Minute ) ');
            $ErrorCount++;
        }



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

        if(empty($priority))
        {
            ResponseAjax::set('Message.text', 'Select priority can not empty');
            $ErrorCount++;
        }
        elseif(!is_numeric($priority) || strlen($priority)>100)
        {
            esponseAjax::set('Message.text', 'Priority should be numeric value and max 100');
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

                    'entry_time_from'   => $entry_time_from,
                    'entry_time_to'     => $entry_time_to,

                    'out_time_from'     => $out_time_from,
                    'out_time_to'       => $out_time_to,

                    'validate_from'     => $validate_from,
                    'validate_to'       => $validate_to,

                    'department_id'     => $department,
                    'priority'          => $priority,
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
