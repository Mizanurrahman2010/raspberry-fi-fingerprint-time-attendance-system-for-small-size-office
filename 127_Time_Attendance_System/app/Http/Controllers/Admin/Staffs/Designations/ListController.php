<?php

namespace App\Http\Controllers\Admin\Staffs\Designations;

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

    /**
    * Settings Controller.
    *
    * @return \Illuminate\Http\Response
    */
    public function listView()
    {
        $staff_designations = DB::table('staff_designations')->get();

        return view('admin.staffs.designations.list', ['staff_designations' => $staff_designations]);
    }
}
