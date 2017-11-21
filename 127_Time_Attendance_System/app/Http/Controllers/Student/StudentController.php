<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseAjax;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.student');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetProfileLink()
    {
        $command = "python ".base_path()."/../GT511C3/Identify1_N.py";
        $FPS_Status = exec($command);

        if(strlen($FPS_Status)<3 AND strlen($FPS_Status)>0 AND (int)$FPS_Status <200)
        {
            $fps_id = (int)$FPS_Status;

            $user = DB::table('students')->where('fps_id', $fps_id)->first();

            $id = $user->id;
            $name = $user->name;
            $email = $user->email;

            $profile = route('profile', ['id' => $id]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('ResponseData', $profile);
            ResponseAjax::set('Message.text', '<h4 style="color:#fff">Student Name :'.$name.' <br>ID : '.$id.' <br>FPSID : '.$fps_id.'</h4>');

        }
        else
        {
            ResponseAjax::set('Message.text', 'Error Code :'.$FPS_Status);
        }

        ResponseAjax::Response();

    }

    public function GetStudentByFPS()
    {
        $command = "python ".base_path()."/../GT511C3/Identify1_N_ajax.py";
        $FPS_Status = exec($command);

        if(strlen($FPS_Status)<3 AND strlen($FPS_Status)>0 AND (int)$FPS_Status <200)
        {
            $fps_id = (int)$FPS_Status;

            $student = DB::table('students')->where('fps_id', $fps_id)->first();

            $student_id = $student->student_id;

            $student = DB::table('demo_student_information')->where('student_id', $student_id)->first();

            $photo = 'public/200x200.svg';

            if($student->photo)
            {
                $photo = $student->photo;
            }

            $student->photo = url('/').'/local/storage/app/'.$photo;

            $academic = DB::table('demo_academic_information')->where('student_id', $student_id)->orderBy('year', 'asc')->get();
            ($academic) ? $student->academic = $academic : '' ;

            $current_semester = DB::table('demo_current_semester')->where('student_id', $student_id)->orderBy('year', 'asc')->get();
            ($current_semester) ? $student->current_semester = $current_semester : '' ;

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('ResponseData', $student);
            ResponseAjax::set('Message.text', '<h4 style="color:#fff">Student Name :'.$student->name.' <br>ID : '.$student_id.' <br>FPSID : '.$fps_id.'</h4>');

        }
        else
        {
            ResponseAjax::set('Message.text', 'Error Code : '.$FPS_Status);
        }

        ResponseAjax::Response();

    }

    public function profile($id)
    {
        $user = DB::table('students')->where('id', $id)->first();

        if($user)
        {
            return view('student.profile', ['user' => $user]);
        }
        else
        {
            return('User not found');
        }
    }
}
