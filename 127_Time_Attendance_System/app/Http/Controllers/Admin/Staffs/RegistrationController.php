<?php

namespace App\Http\Controllers\Admin\Staffs;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class RegistrationController extends Controller
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
    public function registrationForm()
    {
        $departments        = DB::table('departments')->get();
        $staff_designations = DB::table('staff_designations')->get();
        $staff_status       = DB::table('staff_status')->get();

        return view('admin.staffs.registration', ['departments' => $departments, 'staff_designations' => $staff_designations, 'staff_status' => $staff_status]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request)
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

        if (strlen($username) < 3 || strlen($username) > 255) {
            ResponseAjax::set('Message.text', 'Username between 8 to 15 characters');
            $ErrorCount++;
        }

        if (strlen($password) < 6) {
            ResponseAjax::set('Message.text', 'Minimum password length is 6 characters');
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
            $password = Hash::make($password);

            $user = DB::table('staffs')->where('username', $username)->first();
            if ($user != null)
            {
                ResponseAjax::set('Message.text', 'Staff Already exist under this username');
                $ErrorCount++;
            }

            $user = DB::table('staffs')->where('email', $email)->first();
            if ($user != null)
            {
                ResponseAjax::set('Message.text', 'Staff Already exist under this email');
                $ErrorCount++;
            }

            $user = DB::table('staffs')->where([
                    ['mobile_number', '=', $mobile_number],
                    ['mobile_number', '<>', null],
                ])->first();

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
            $id = DB::table('staffs')->insertGetId(
                [

                    'name'              => $name,
                    'department_id'     => $department_id,
                    'designation_id'    => $designation,
                    'joining_date'      => $joining_date,
                    'staff_status_id'   => $current_status,
                    'username'          => $username,
                    'password'          => $password,
                    'mobile_number'     => $mobile_number,
                    'email'             => $email,
                    'birthday'          => $birthday,
                    'country_id'        => $country_id,
                    'current_address'   => $current_address,
                    'permanent_address' => $permanent_address,
                    'status'            => $status

                ]
            );


            if($id)
            {
                ResponseAjax::set('SuccessStatus', 1);
                ResponseAjax::set('ResponseData', $id);
                ResponseAjax::set('Message.text', '<h3 style="color:#fff">Successfully Staff "'.$name.'" Created, <br> Staff ID : '.$id.'</h3>');
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

    public function search(Request $request)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token             = $data['_token'];
        $student_id         = $data['student_id'];

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        /*if (strlen($name) < 3 || strlen($name) > 255) {
            ResponseAjax::set('Message.text', 'Name between 3 to 255 characters');
            $ErrorCount++;
        }*/

        if (strlen($student_id) < 1)
        {
            ResponseAjax::set('Message.text', 'Give the Student ID');
            $ErrorCount++;
        }
        elseif(strlen($student_id) != 8)
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - Invalid Length');
            $ErrorCount++;
        }
        elseif(!is_numeric($student_id))
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - please give numeric value');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */


        if($ErrorCount == 0)
        {
            $student = DB::table('students')->where('student_id', $student_id)->first();

            if ($student != null)
            {
                $student = DB::table('demo_student_information')->where('student_id', $student_id)->first();

                /*
                 * strat : get academic information
                 * */
                $academic = DB::table('demo_academic_information')->where('student_id', $student_id)->orderBy('year', 'asc')->get();

                if ($academic->count())
                {
                    $student->academic = $academic ;
                }
                else
                {
                    //$student->academic =  [];
                }
                /*
                 * end : get academic information
                 * */


                /*
                 * strat : get current semester
                 * */
                $current_semester = DB::table('demo_current_semester')->where('student_id', $student_id)->orderBy('year', 'asc')->get();

                if ($current_semester->count())
                {
                    $student->current_semester = $current_semester ;
                }
                else
                {
                    //$student->current_semester = '' ;
                }
                /*
                 * end : get current semester
                 * */



                if($student == null)
                {
                    $student = 'information_empty';
                }

                ResponseAjax::set('Message.text', 'Student Found');
                ResponseAjax::set('SuccessStatus', 1);
                ResponseAjax::set('ResponseData', $student);
            }
            else
            {
                ResponseAjax::set('Message.text', 'Student not Found');
                ResponseAjax::set('SuccessStatus', 0);
            }
        }

        ResponseAjax::Response();
    }

    public function update(Request $request)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token             = $data['_token'];
        $student_id         = $data['student_id'];
        $name               = $data['name']                 ? $data['name'] : '' ;
        $fathers_name       = $data['fathers_name']         ? $data['fathers_name'] : '' ;
        $mothers_name       = $data['mothers_name']         ? $data['mothers_name'] : '' ;
        $date_of_birth      = $data['date_of_birth']        ? $data['date_of_birth'] : '' ;
        $marital_status     = $data['marital_status']       ? $data['marital_status'] : '' ;
        $gender             = $data['gender']               ? $data['gender'] : '' ;
        $permanent_address  = $data['permanent_address']    ? $data['permanent_address'] : '' ;
        $presemt_address    = $data['presemt_address']      ? $data['presemt_address'] : '' ;
        $country            = $data['country']              ? $data['country'] : '' ;
        $cell_number        = $data['cell_number']          ? $data['cell_number'] : '' ;
        $alternet_number    = $data['alternet_number']      ? $data['alternet_number'] : '' ;
        $email              = $data['email']                ? $data['email'] : '' ;

        $date_of_birth = date('Y-m-d',strtotime($date_of_birth));
        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        /*if (strlen($name) < 3 || strlen($name) > 255) {
            ResponseAjax::set('Message.text', 'Name between 3 to 255 characters');
            $ErrorCount++;
        }*/

        if (strlen($student_id) < 1)
        {
            ResponseAjax::set('Message.text', 'Give the Student ID');
            $ErrorCount++;
        }
        elseif(strlen($student_id) != 8)
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - Invalid Length');
            $ErrorCount++;
        }
        elseif(!is_numeric($student_id))
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - please give numeric value');
            $ErrorCount++;
        }

        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ErrorCount++;
            ResponseAjax::set('Message.text', 'Invalid email format');
        }*/


        /*
         * End : Incoming data check
         * */



        /*
         * Start : Student existence check in database
         * */

        if($ErrorCount == 0)
        {
            $user = DB::table('students')->where('student_id', $student_id)->first();
            if ($user == null)
            {
                ResponseAjax::set('Message.text', 'Student not exist');
                $ErrorCount++;
            }
        }

        /*
         * End : Student existence check in database
         * */



        if($ErrorCount == 0)
        {
            $user = DB::table('demo_student_information')->where('student_id', $student_id)->first();
            if ($user)
            {
                DB::table('demo_student_information')
                    ->where('student_id', $student_id)
                    ->update([
                        'name' => $name,
                        'fathers_name' => $fathers_name,
                        'mothers_name' => $mothers_name,
                        'date_of_birth' => $date_of_birth,
                        'marital_status' => $marital_status,
                        'gender' => $gender,
                        'permanent_address' => $permanent_address,
                        'present_address' => $presemt_address,
                        'country' => $country,
                        'cell_number' => $cell_number,
                        'alternet_number' => $alternet_number,
                        'email' => $email
                    ]);

            }
            else
            {
                DB::table('demo_student_information')
                    ->insert([
                        'student_id'        => $student_id,
                        'name'              => $name,
                        'fathers_name'      => $fathers_name,
                        'mothers_name'      => $mothers_name,
                        'date_of_birth'     => $date_of_birth,
                        'marital_status'    => $marital_status,
                        'gender'            => $gender,
                        'permanent_address' => $permanent_address,
                        'present_address'   => $presemt_address,
                        'country'           => $country,
                        'cell_number'       => $cell_number,
                        'alternet_number'   => $alternet_number,
                        'email'             => $email
                    ]);

            }

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', "Successfully Student ($student_id) Updated");
        }
        else
        {
            ResponseAjax::set('SuccessStatus', 0);
            ResponseAjax::set('Message.text', "Student ($student_id) not Updated");
        }

        ResponseAjax::Response();
    }

    public function updatePhoto(Request $request)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $student_id = $request->input('student_id');
        $photo = $request->file('imgfile');

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if (strlen($student_id) < 1)
        {
            ResponseAjax::set('Message.text', 'Give the Student ID ');
            $ErrorCount++;
        }
        elseif(strlen($student_id) != 8)
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - Invalid Length');
            $ErrorCount++;
        }
        elseif(!is_numeric($student_id))
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - please give numeric value');
            $ErrorCount++;
        }




        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["imgfile"]["name"]);
        $extension = end($temp);

        if(!(
            ($_FILES["imgfile"]["type"] == "image/gif")
            || ($_FILES["imgfile"]["type"] == "image/jpeg")
            || ($_FILES["imgfile"]["type"] == "image/jpg")
            || ($_FILES["imgfile"]["type"] == "image/pjpeg")
            || ($_FILES["imgfile"]["type"] == "image/x-png")
            || ($_FILES["imgfile"]["type"] == "image/png")
        ))
        {
            ResponseAjax::set('Message.text', 'File is not image file');
            $ErrorCount++;
        }

        if($_FILES["imgfile"]["size"] > 150000)
        {
            ResponseAjax::set('Message.text', 'File size can not more than 150KB');
            $ErrorCount++;
        }
        if(!in_array($extension, $allowedExts))
        {
            ResponseAjax::set('Message.text', 'File formate is not permitted');
            $ErrorCount++;
        }

        if ($_FILES["imgfile"]["error"] > 0)
        {
            ResponseAjax::set('Message.text', 'File Error - (Error : F1)');
            $ErrorCount++;
        }
        /*
         * End : Incoming data check
         * */



        /*
         * Start : Student existence check in database
         * */

        if($ErrorCount == 0)
        {
            $user = DB::table('students')->where('student_id', $student_id)->first();
            if ($user == null)
            {
                ResponseAjax::set('Message.text', 'Student not exist');
                $ErrorCount++;
            }
        }

        /*
         * End : Student existence check in database
         * */



        if($ErrorCount == 0)
        {
            /*
             * start : check file existance to delete
             * */

            foreach($allowedExts as $imgExts)
            {
                $imageName =$student_id.$imgExts ;

                $exists = Storage::disk('public')->exists($imageName);
                if($exists)
                {
                    Storage::delete($imageName);
                    break;
                }
            }
            /*
             * end : check file existance to delete
             * */
            $ext = $photo->guessClientExtension();

            //$path = $request->file('imgfile')->storeAs('public', $student_id.".$ext");

            $path = $request->file('imgfile')->store('public');

            ResponseAjax::set('ResponseData', url('/').'/local/storage/app/'.$path);

            //Storage::setVisibility('public/'.$student_id.'.'.$ext, 'public');

            DB::table('demo_student_information')
                ->where('student_id', $student_id)
                ->update(['photo' => $path]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', "Successfully Student's Photo ($student_id) Updated");
        }
        else
        {
            ResponseAjax::set('SuccessStatus', 0);
            ResponseAjax::set('Message.text', "Student's Photo ($student_id) not Updated");
        }

        ResponseAjax::Response();
    }

    public function AcademicInsert(Request $request)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $student_id       = $data['student_id'];
        $course_name      = $data['course_name'];
        $course_code      = $data['course_code'];
        $course_credit    = $data['course_credit'];
        $semester         = $data['semester'];
        $year             = $data['year'];
        $grade_point      = (float)$data['grade_point'];


        /*
         * start : grade letter
         * */
        $ErrorCount = 0;

        $letter_grade = '' ;
        switch($grade_point)
        {
            case 4:
                $letter_grade = 'A+' ;
                break;
            case 3.75:
                $letter_grade = 'A' ;
                break;
            case 3.5:
                $letter_grade = 'A-' ;
                break;
            case 3.25:
                $letter_grade = 'B+' ;
                break;
            case 3.0:
                $letter_grade = 'B' ;
                break;
            case 2.75:
                $letter_grade = 'B-' ;
                break;
            case 2.5:
                $letter_grade = 'C+' ;
                break;
            case 2.25:
                $letter_grade = 'C' ;
                break;
            case 2.0:
                $letter_grade = 'D' ;
                break;
            case 0:
                $letter_grade = 'F' ;
                break;
            default:
                ResponseAjax::set('Message.text', 'Invalid Grade Point - Permitted Grade Points are 4, 3.75, 3.5, 3.25, 3.0, 2.75, 2.5, 2.25, 2.0, 0');
                $ErrorCount++;
        }
        /*
         * start : grade letter
         * */


        /*
         * Start : Incoming data check
         * */

        /*if (strlen($name) < 3 || strlen($name) > 255) {
            ResponseAjax::set('Message.text', 'Name between 3 to 255 characters');
            $ErrorCount++;
        }*/

        if (strlen($student_id) < 1)
        {
            ResponseAjax::set('Message.text', 'Give the Student ID');
            $ErrorCount++;
        }
        elseif(strlen($student_id) != 8)
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - Invalid Length');
            $ErrorCount++;
        }
        elseif(!is_numeric($student_id))
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - please give numeric value');
            $ErrorCount++;
        }

        if(empty($course_code))
        {
            ResponseAjax::set('Message.text', 'Select Course');
            $ErrorCount++;
        }

        if(empty($semester))
        {
            ResponseAjax::set('Message.text', 'Select Semister');
            $ErrorCount++;
        }

        if(empty($year))
        {
            ResponseAjax::set('Message.text', 'Select Year');
            $ErrorCount++;
        }

        if(empty($grade_point))
        {
            ResponseAjax::set('Message.text', 'Enter Grade Point');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */



        /*
         * Start : Student existence check in database
         * */

        if($ErrorCount == 0)
        {
            $user = DB::table('students')->where('student_id', $student_id)->first();
            if ($user == null)
            {
                ResponseAjax::set('Message.text', 'Student not exist');
                $ErrorCount++;
            }
        }

        /*
         * End : Student existence check in database
         * */



        if($ErrorCount == 0)
        {
            $user = DB::table('demo_academic_information')->where([['student_id', $student_id],['course_code', $course_code]])->first();
            if ($user)
            {
                ResponseAjax::set('Message.text', "May be same course already taken");
            }

            DB::table('demo_academic_information')
                ->insert([
                    'student_id' => $student_id,
                    'course_name' => $course_name,
                    'course_code' => $course_code,
                    'course_credit' => $course_credit,
                    'semester' => $semester,
                    'year' => $year,
                    'grade_point' => $grade_point,
                    'letter_grade' => $letter_grade
                ]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', "Successfully Student ($student_id) Updated");
        }
        else
        {
            ResponseAjax::set('SuccessStatus', 0);
            ResponseAjax::set('Message.text', "Academic Information ($student_id) not inserted");
        }

        ResponseAjax::Response();
    }

    public function CurrentSemesterInsert(Request $request)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $student_id       = $data['student_id'];
        $course_name      = $data['course_name'];
        $course_code      = $data['course_code'];
        $course_credit    = $data['course_credit'];
        $semester         = $data['semester'];
        $year             = $data['year'];


        $ErrorCount = 0;

        /*
         * Start : Incoming data check
         * */

        if (strlen($student_id) < 1)
        {
            ResponseAjax::set('Message.text', 'Give the Student ID');
            $ErrorCount++;
        }
        elseif(strlen($student_id) != 8)
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - Invalid Length');
            $ErrorCount++;
        }
        elseif(!is_numeric($student_id))
        {
            ResponseAjax::set('Message.text', 'Wrong Student ID - please give numeric value');
            $ErrorCount++;
        }

        if(empty($course_code))
        {
            ResponseAjax::set('Message.text', 'Select Course');
            $ErrorCount++;
        }

        if(empty($semester))
        {
            ResponseAjax::set('Message.text', 'Select Semister');
            $ErrorCount++;
        }

        if(empty($year))
        {
            ResponseAjax::set('Message.text', 'Select Year');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */



        /*
         * Start : Student existence check in database
         * */

        if($ErrorCount == 0)
        {
            $user = DB::table('students')->where('student_id', $student_id)->first();
            if ($user == null)
            {
                ResponseAjax::set('Message.text', 'Student not exist');
                $ErrorCount++;
            }
        }

        /*
         * End : Student existence check in database
         * */



        if($ErrorCount == 0)
        {
            $user = DB::table('demo_current_semester')->where([['student_id', $student_id],['course_code', $course_code]])->first();
            if ($user)
            {
                ResponseAjax::set('Message.text', "May be same course already taken");
            }

            DB::table('demo_current_semester')
                ->insert([
                    'student_id' => $student_id,
                    'course_name' => $course_name,
                    'course_code' => $course_code,
                    'course_credit' => $course_credit,
                    'semester' => $semester,
                    'year' => $year
                ]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', "Successfully Student Updated - $student_id");
        }
        else
        {
            ResponseAjax::set('SuccessStatus', 0);
            ResponseAjax::set('Message.text', "Current Semester Information not inserted - $student_id");
        }

        ResponseAjax::Response();
    }
}
