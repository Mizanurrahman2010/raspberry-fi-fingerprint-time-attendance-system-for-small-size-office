<?php

namespace App\Http\Controllers\Admin\Attendance\Rule\Staff\Department;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class ListController extends Controller
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

    public function listView()
    {

        $attendance_rules_staff = DB::table('attendance_rules_staff as arsd')

                                                ->select(   'arsd.id',
                                                            'arsd.name',
                                                            'arsd.entry_time_from',
                                                            'arsd.entry_time_to',
                                                            'arsd.out_time_from',
                                                            'arsd.out_time_to',
                                                            'arsd.validate_from',
                                                            'arsd.validate_to',
                                                            'arsd.department_id',
                                                            'departments.name as department_name',
                                                            'arsd.status',
                                                            'arsd.created_at',
                                                            'arsd.updated_at')

                                                ->leftJoin('departments', 'arsd.department_id', '=', 'departments.id')
                                                ->get();

        return view('admin.attendance.rule.staff.department.list', ['attendance_rules_staff' => $attendance_rules_staff]);
    }
}
