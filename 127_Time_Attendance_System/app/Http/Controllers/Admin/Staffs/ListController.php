<?php

namespace App\Http\Controllers\Admin\Staffs;

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

    public function staffslist()
    {

        $staffs = DB::table('staffs')->get();

        return view('admin.staffs.list', ['staffs' => $staffs]);
    }
}
