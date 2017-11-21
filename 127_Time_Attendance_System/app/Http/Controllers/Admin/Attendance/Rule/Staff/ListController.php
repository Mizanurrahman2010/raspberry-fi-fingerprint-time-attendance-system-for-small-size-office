<?php

namespace App\Http\Controllers\Admin\Attendance\Rule\Staff;

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
                                                            'arsd.cycle',
                                                            'arsd.days',
                                                            'arsd.validate_from',
                                                            'arsd.validate_to',
                                                            'arsd.department_id',
                                                            'departments.name as department_name',
                                                            'arsd.status',
                                                            'arsd.created_at',
                                                            'arsd.updated_at')

                                                ->leftJoin('departments', 'arsd.department_id', '=', 'departments.id')
                                                ->get();

        return view('admin.attendance.rule.staff.list', ['attendance_rules_staff' => $attendance_rules_staff]);
    }
}
