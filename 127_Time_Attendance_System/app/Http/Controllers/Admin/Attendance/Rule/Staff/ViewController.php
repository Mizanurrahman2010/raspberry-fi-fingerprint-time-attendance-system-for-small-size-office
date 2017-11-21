<?php

namespace App\Http\Controllers\Admin\Attendance\Rule\Staff;

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

        return view('admin.attendance.rule.staff.view', ['departments' => $departments, 'rule' => $rule]);
    }

}
