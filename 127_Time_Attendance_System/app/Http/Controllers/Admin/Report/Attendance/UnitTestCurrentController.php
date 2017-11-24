<?php

namespace App\Http\Controllers\Admin\Report\Attendance;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class UnitTestCurrentController extends Controller
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
    * Settings Controller.
    *
    * @return \Illuminate\Http\Response
    */
    public function currentView()
    {
        $staffs = DB::table('staffs')->get();

        return view('admin.report.attendance.current', ['staffs' => $staffs]);
    }

    /**
    * Settings Controller.
    *
    * @return \Illuminate\Http\Response
    */

    public function current(Request $request)
    {

        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token     = $data['_token'];

        // $date_start = $data['date_start'];
        // $date_end   = $data['date_end'];
        // $staff_id   = $data['staff_id'];

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        // if (empty($date_start))
        // {
        //     ResponseAjax::set('Message.text', 'Select Start Date');
        //     $ErrorCount++;
        // }

        // if (empty($date_end))
        // {
        //     ResponseAjax::set('Message.text', 'Select End Date');
        //     $ErrorCount++;
        // }

        // if ($staff_id < 0)
        // {
        //     ResponseAjax::set('Message.text', 'Select Staff');
        //     $ErrorCount++; 
        // }
        /*
         * End : Incoming data check
         * */

        /*
         * Start : running rule check
         * */
        date_default_timezone_set('Asia/Dhaka');

        $rules_id = [] ;

        if($ErrorCount == 0)
        {
            $attendance_rules_staff = DB::table('attendance_rules_staff')->get();
            
            foreach ($attendance_rules_staff as $key1 => $rule)
            {
                $cycle = $rule->cycle ;

                $days = json_decode($rule->days);
                //var_dump($days);

                $today = $days[date( 'w' )] ;

                // var_dump($today);

                $weekend                    = $today->weekend;
                $count_as_early_come_from   = $today->count_as_early_come_from;
                $normal_in_time_from        = $today->normal_in_time_from;
                $on_duty_time               = $today->on_duty_time;
                $normal_in_time_to          = $today->normal_in_time_to;
                $late_count_untill          = $today->late_count_untill;

                $count_as_early_leave_from  = $today->count_as_early_leave_from;
                $normal_out_time_from       = $today->normal_out_time_from;
                $off_duty_time              = $today->off_duty_time;
                $normal_out_time_to         = $today->normal_out_time_to;
                $late_leave_count_untill    = $today->late_leave_count_untill;

                $datetime = strtotime($count_as_early_come_from);
                // echo date('H:i:s', $datetime);
                // echo '<br>';

                //echo $count_as_early_come_from;
                //$current_time = strtotime('12:49');
                $current_time = date('H:i:s');

                // echo '<br>';
                // echo $count_as_early_come_from;echo '<br>';
                // echo $current_time;echo '<br>';
                // echo $late_leave_count_untill;echo '<br>';

                if( !$weekend and ($count_as_early_come_from <= $current_time) and ($current_time <= $late_leave_count_untill) )
                {
                    $rules_id[] = $rule->id;
                    //echo 'true'.'<br>';
                }
                else
                {
                    //echo 'false<br>';
                }
            }

            //var_dump($rules_id);
        }
        /*
         * End : running rule check
         * */




        /*
         * Start : Get running staffs's duty
         * */
        //var_dump($rules_id);
        
        $attendance_staffs = [];

        if ($ErrorCount ==0 )
        {
            foreach ($rules_id as $rule_key => $rule_id)
            {
                //echo $rule_id;




                $staffs_id = [];

                $staffs = DB::table('staffs')->get();
                //var_dump($staffs);
                foreach ($staffs as $staff)
                {
                    //var_dump(json_decode($staff->rules_id));
                    if($staff->rules_id)
                    {
                        $staff_rules_id = json_decode($staff->rules_id);

                        foreach($staff_rules_id as $staff_rule_id)
                        {

                            if($staff_rule_id == $rule_id)
                            {
                                //echo 'rule_id : '.$staff_rule_id;
                                //echo '<br>';

                                //var_dump($staff);
                                //$staff_list[] = json_decode(json_encode($staff), true);
                                $staffs_id[] = $staff->id;
                            }
                        }
                    }
                }


                $attendance_staffss[] = DB::table('staffs')
                                        ->whereIn('staffs.id', $staffs_id)
                                        ->get();

                // $attendance_staffss[] = DB::table('staffs')
                //                         ->whereIn('staffs.id', $staffs_id)
                //                         ->leftJoin('attendance_staffs as a', 'staffs.id', '=', 'a.staff_id')
                //                         ->where('a.date', date("Y/m/d"))
                //                         ->leftJoin('attendance_rules_staff as r', 'a.rule_id', '=', 'r.id')
                //                         ->where('r.id', $rule_id)
                //                         ->select('a.id','staffs.name as staff_name', 'a.staff_id', 'a.rule_id', 'a.date', 'a.entry_time', 'a.out_time', 'a.attened', 'a.entry_status', 'a.entry_status_comment', 'a.entry_delay_or_advanced_duration', 'a.out_status', 'a.out_status_comment', 'a.out_delay_or_advanced_duration', 'a.work_duration', 'a.status', 'r.name as rule_name')
                //                         ->get();

                // $attendance_staffs[] = DB::table('staffs')
                //                         ->leftJoin('attendance_staffs as a', 'staffs.id', '=', 'a.staff_id')
                //                         ->leftJoin('attendance_rules_staff as r', 'a.rule_id', '=', 'r.id')
                //                         ->whereIn('staffs.id', $staffs_id)
                //                         ->where('a.date', date("Y/m/d"))
                //                         ->where('r.id', $rule_id)
                //                         ->select('a.id','staffs.name as staff_name', 'a.staff_id', 'a.rule_id', 'a.date', 'a.entry_time', 'a.out_time', 'a.attened', 'a.entry_status', 'a.entry_status_comment', 'a.entry_delay_or_advanced_duration', 'a.out_status', 'a.out_status_comment', 'a.out_delay_or_advanced_duration', 'a.work_duration', 'a.status', 'r.name as rule_name')
                //                         ->get();
                //var_dump($staffs_id);
               //$rules_id[$rule_key] = { 'staffs' : $staff }
                var_dump($attendance_staffss);
            }
        }

        //$rules_id->$rule_key->staffs = $staff ;
        //var_dump($rules_id); 
        //var_dump($attendance_staffs); 

        /*
         * End : Get running staffs's duty 
         * */

        /*
         * Start : insert in database
         * */

        if($ErrorCount ==0 )
        {
            // $attendance_staffs = DB::table('attendance_staffs as a')
            //                     ->leftJoin('attendance_rules_staff as r', 'a.rule_id', '=', 'r.id')
            //                     ->leftJoin('staffs', 'a.staff_id', '=', 'staffs.id')
            //                     ->where('date', date("Y/m/d"))
            //                     ->select('a.id','staffs.name as staff_name', 'a.staff_id', 'a.rule_id', 'a.date', 'a.entry_time', 'a.out_time', 'a.attened', 'a.entry_status', 'a.entry_status_comment', 'a.entry_delay_or_advanced_duration', 'a.out_status', 'a.out_status_comment', 'a.out_delay_or_advanced_duration', 'a.work_duration', 'a.status', 'r.name as rule_name')
            //                     ->get();
        }
        /*
         * End : Get running staffs's duty 
         * */

        /*
         * Start : insert in database
         * */
        if($ErrorCount == 0)
        {
            // $attendance_staffs = DB::table('attendance_staffs as a')
            //                     ->leftJoin('attendance_rules_staff as r', 'a.rule_id', '=', 'r.id')
            //                     ->leftJoin('staffs', 'a.staff_id', '=', 'staffs.id')
            //                     ->where('date', date("Y/m/d"))
            //                     ->select('a.id','staffs.name as staff_name', 'a.staff_id', 'a.rule_id', 'a.date', 'a.entry_time', 'a.out_time', 'a.attened', 'a.entry_status', 'a.entry_status_comment', 'a.entry_delay_or_advanced_duration', 'a.out_status', 'a.out_status_comment', 'a.out_delay_or_advanced_duration', 'a.work_duration', 'a.status', 'r.name as rule_name')
            //                     ->get();
                                
            // $attendance_staffs = DB::table('attendance_staffs as a')
            //                     ->leftJoin('attendance_rules_staff as r', 'a.rule_id', '=', 'r.id')
            //                     ->leftJoin('staffs', 'a.staff_id', '=', 'staffs.id')
            //                     ->where('date', date("Y/m/d"))
            //                     ->select('a.id','staffs.name as staff_name', 'a.staff_id', 'a.rule_id', 'a.date', 'a.entry_time', 'a.out_time', 'a.attened', 'a.entry_status', 'a.entry_status_comment', 'a.entry_delay_or_advanced_duration', 'a.out_status', 'a.out_status_comment', 'a.out_delay_or_advanced_duration', 'a.work_duration', 'a.status', 'r.name as rule_name')
            //                     ->get();

            // if($attendance_staffs)
            // {
            //     ResponseAjax::set('SuccessStatus', 1);
            //     ResponseAjax::set('ResponseData', $attendance_staffs);
            //     ResponseAjax::set('Message.text', '<h3 style="color:#fff">Successfully today report retrived</h3>');
            // }
            // else
            // {
            //     ResponseAjax::set('Message.text', 'Database error');
            // }
        }
        /*
         * End : insert in database
         * */

        //ResponseAjax::Response();
    }
}
