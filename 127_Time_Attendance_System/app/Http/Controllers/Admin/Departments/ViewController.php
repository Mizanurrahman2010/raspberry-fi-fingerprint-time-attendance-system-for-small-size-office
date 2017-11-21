<?php

namespace App\Http\Controllers\Admin\Departments;

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
        $department = DB::table('departments')->where('id', $id)->first();

        return view('admin.departments.view', ['department' => $department]);
    }
}
