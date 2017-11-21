<?php

namespace App\Http\Controllers\Admin\Staffs;

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
        $staff                  = DB::table('staffs')->where('id', $id)->first();
        $departments            = DB::table('departments')->get();
        $staff_designations     = DB::table('staff_designations')->get();
        $staff_status           = DB::table('staff_status')->get();
        $attendance_rules_staff = DB::table('attendance_rules_staff')
                                            ->where('department_id', $staff->department_id)
                                            ->where('status', 1)
                                            ->get();

        $staff->joining_date_day   = date('d', strtotime($staff->joining_date));
        $staff->joining_date_month = date('m', strtotime($staff->joining_date));
        $staff->joining_date_year  = date('Y', strtotime($staff->joining_date));

        $staff->birthday_day   = date('d', strtotime($staff->birthday));
        $staff->birthday_month = date('m', strtotime($staff->birthday));
        $staff->birthday_year  = date('Y', strtotime($staff->birthday));

        return view('admin.staffs.update', ['staff' => $staff, 'departments' => $departments, 'staff_designations' => $staff_designations, 'staff_status' => $staff_status, 'attendance_rules_staff' => $attendance_rules_staff]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token                = $data['_token'];
        $name                  = $data['name'];
        $department_id         = $data['department'];
        $designation           = $data['designation'];

        $joining_date_day      = $data['joining_date_day'];
        $joining_date_month    = $data['joining_date_month'];
        $joining_date_year     = $data['joining_date_year'];

        $joining_date          = $joining_date_year.'-'.$joining_date_month.'-'.$joining_date_day;
        //$joining_date          = date('Y-m-d',strtotime($joining_date));

        $current_status        = $data['current_status'];
        $username              = $data['username'];
        $password              = $data['password'];
        $mobile_number         = $data['mobile_number'];
        $email                 = $data['email'];

        $birthday_day          = $data['birthday_day'];
        $birthday_month        = $data['birthday_month'];
        $birthday_year         = $data['birthday_year'];

        $birthday              = $birthday_year.'-'.$birthday_month.'-'.$birthday_day;
        //$birthday              = date('Y-m-d',strtotime($birthday));

        $country_id            = $data['country'];
        $current_address       = $data['current_address'];
        $permanent_address     = $data['permanent_address'];
        $status                = $data['status'];

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if (strlen($name) < 3 || strlen($name) > 255) {
            ResponseAjax::set('Message.text', 'Name between 3 to 255 characters');
            $ErrorCount++;
        }

        if(!$joining_date_day || !$joining_date_month || !$joining_date_year)
        {
            ResponseAjax::set('Message.text', 'Select Joining Date properly');
            $ErrorCount++;
        }
        elseif(!checkdate($joining_date_month, $joining_date_day, $joining_date_year))
        {
            ResponseAjax::set('Message.text', 'Invalid Joining Date');
            $ErrorCount++;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ErrorCount++;
            ResponseAjax::set('Message.text', 'Invalid email format');
        }

        if(!(bool)strtotime($birthday))
        {
            ResponseAjax::set('Message.text', 'Invalid Birthday');
            $ErrorCount++;
        }

        if(!$birthday_day || !$birthday_month || !$birthday_year)
        {
            ResponseAjax::set('Message.text', 'Select Birthday properly');
            $ErrorCount++;
        }
        elseif(!checkdate($birthday_month, $birthday_day, $birthday_year))
        {
            ResponseAjax::set('Message.text', 'Invalid Birth Day');
            $ErrorCount++;
        }

        if(empty($mobile_number))
        {
            ResponseAjax::set('Message.text', 'Mobile Number required');
            $ErrorCount++;
        }
        elseif(!is_numeric($mobile_number))
        {
            ResponseAjax::set('Message.text', 'Invalid Mobile Number');
            $ErrorCount++;
        }

        if (strlen($username) < 5 || strlen($username) > 20) {
            ResponseAjax::set('Message.text', 'Username between 5 to 20 characters');
            $ErrorCount++;
        }

        if (strlen($password) < 6 AND strlen($password) > 20) {
            ResponseAjax::set('Message.text', 'Password length is 6 to 20 characters');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */
        

        /*
         * Start : existence check in database
         * */

        if($ErrorCount == 0)
        {
            $user = DB::table('staffs')->where('username', $username)->where('id', '<>', $id)->first();
            if ($user != null)
            {
                ResponseAjax::set('Message.text', 'Staff Already exist under this username');
                $ErrorCount++;
            }

            $user = DB::table('staffs')->where('email', $email)->where('id', '<>', $id)->first();
            if ($user != null)
            {
                ResponseAjax::set('Message.text', 'Staff Already exist under this email');
                $ErrorCount++;
            }

            $user = DB::table('staffs')->where('mobile_number', $mobile_number)
                                        ->where('mobile_number', '<>', null)
                                        ->where('id', '<>', $id)->first();

            if ($user != null)
            {
                ResponseAjax::set('Message.text', 'Staff Already exist under this Mobile Number');
                $ErrorCount++;
            }
        }

        /*
         * End : existence check in database
         * */


        /*
        if($ErrorCount == 0)
        {
            $command = "python ".base_path()."/../GT511C3/EnrollAll.py";
            $FPS_Status = exec($command);

            if(strlen($FPS_Status)<3 AND strlen($FPS_Status)>0 AND (int)$FPS_Status <200)
            {
                $LastEnrolledID = (int)$FPS_Status;

                /*
               $FPS_Directory = '/var/www/html/GT511C3/';

               $myfile = fopen($FPS_Directory."LastEnrolledID.json", "r") or die("Unable to open LastEnrolledID file!");
               $LastEnrolledID = fread($myfile,filesize($FPS_Directory."LastEnrolledID.json"));
               fclose($myfile);

                $id = DB::table('students')->insertGetId(
                    ['student_id' => $student_id, 'password' => $password, 'fps_id' => $LastEnrolledID]
                );

                ResponseAjax::set('SuccessStatus', 1);
                ResponseAjax::set('ResponseData', $id);
                ResponseAjax::set('Message.text', '<h3 style="color:#fff">Successfully Student Created <br> Student ID :'.$student_id.' <br>ID : '.$id.' <br>FPSID : '.$LastEnrolledID.'</h3>');
            }
            else
            {
                ResponseAjax::set('Message.text', 'FPS Error - 1 - Enroll execution error'.$FPS_Status);
            }
        }*/

        /*
         * Start : insert in database
         * */
        if($ErrorCount == 0)
        {
            if(strlen($password) > 5 AND !empty($password))
            {
                $password = Hash::make($password);

                $num_row1 = DB::table('staffs')
                    ->where('id', $id)
                    ->update([
                        'password'          => $password,
                        'updated_at'        => DB::raw('NOW()')
                    ]);

                if(!$num_row1)
                {
                    ResponseAjax::set('SuccessStatus', 0);
                    //ResponseAjax::set('ResponseData', $id);
                    ResponseAjax::set('Message.text', 'Password update not possible');
                }
            }

            $num_row = DB::table('staffs')
                ->where('id', $id)
                ->update([

                    'name'              => $name,
                    'department_id'     => $department_id,
                    'designation_id'    => $designation,
                    'joining_date'      => $joining_date,
                    'staff_status_id'   => $current_status,
                    'username'          => $username,
                    'mobile_number'     => $mobile_number,
                    'email'             => $email,
                    'birthday'          => $birthday,
                    'country_id'        => $country_id,
                    'current_address'   => $current_address,
                    'permanent_address' => $permanent_address,
                    'status'            => $status,
                    'updated_at'        => DB::raw('NOW()')
                ]);

            if($num_row)
            {
                ResponseAjax::set('SuccessStatus', 1);
                //ResponseAjax::set('ResponseData', $id);
                ResponseAjax::set('Message.text', '<h3 style="color:#fff">Successfully Staff "'.$name.'" updated, <br> Staff ID : '.$id.'</h3>');
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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function rule(Request $request, $id)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token  = $data['_token'];
        $rules_id = $data['rules_id'];

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if(count($rules_id)<1)
        {
            ResponseAjax::set('Message.text', 'Select Minumum One Rule');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */

        /*
         * Start : Valid Department rule existance check
         * */

        if($ErrorCount == 0)
        {

            $rule = DB::table('attendance_rules_staff as ars')
                        ->join('staffs' ,'ars.department_id' , '=', 'staffs.department_id')
                        ->where('staffs.id', $id)
                        ->where('ars.id', $rules_id[0])
                        ->first();

            if(!$rule)
            {
                ResponseAjax::set('Message.text', 'Invalid Role. Your Department Changes. Please reload the page');
                $ErrorCount++;
            }
        }

        /*
         * End : Valid Department rule existance check
         * */

        if($ErrorCount == 0)
        {

            DB::table('staffs')
                ->where('id', $id)
                ->update([
                    'rules_id' => json_encode($rules_id),
                ]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('ResponseData', $rules_id);
            ResponseAjax::set('Message.text', '<h4 style="color:#fff">Successfully Staff\'s Rule updated</h4>');
        }

        ResponseAjax::Response();
    }
}
