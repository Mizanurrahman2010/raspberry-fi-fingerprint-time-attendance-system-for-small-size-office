<?php

namespace App\Http\Controllers\Admin\Staffs\Designations;

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
    * Update Controller.
    *
    * @return \Illuminate\Http\Response
    */
    public function view($id)
    {
        $staff_designation = DB::table('staff_designations')->where('id', $id)->first();

        return view('admin.staffs.designations.view', ['staff_designation' => $staff_designation]);
    }
}
