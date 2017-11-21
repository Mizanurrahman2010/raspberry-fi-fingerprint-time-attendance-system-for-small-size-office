<?php

namespace App\Http\Controllers\Admin\Student;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseAjax;

class StudentController extends Controller
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
        $user = DB::table('students')->where('id', $id)->first();
        if($user)
        {
            return view('admin.student.profile', ['user' => $user]);
        }
        else
        {
            return('User not found');
        }
    }

    public function deletes()
    {
        $user = DB::table('students');
        if($user)
        {
            return view('admin.student.profile', ['user' => $user]);
        }
        else
        {
            return('User not found');
        }
    }
}
