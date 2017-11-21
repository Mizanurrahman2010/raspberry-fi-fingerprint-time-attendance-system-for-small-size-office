<?php

namespace App\Http\Controllers\Admin\Attendance\Specialgroup;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class DeleteController extends Controller
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
    * Delete Controller.
    *
    * @return \Illuminate\Http\Response
    */

    public function delete($id)
    {

        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        /*
         * Start : existence check in database
         * */

        $ErrorCount = 0;

        $attendance_specialgroup = DB::table('attendance_specialgroups')->where('id', $id)->first();
        if ($attendance_specialgroup == null)
        {
            ResponseAjax::set('Message.text', 'Attendance Specialgroup not exist <br> Attendance Specialgroup Already Deleted <br> Reload Page');
            $ErrorCount++;
        }

        $attendance_specialgroup_staffs = DB::table('attendance_specialgroup_staffs')->where('attendance_specialgroup_id', $id)->first();
        if ($attendance_specialgroup_staffs != null)
        {
            ResponseAjax::set('Message.text', 'Already Attendance Specialgroup is allocated to the staffs');
            $ErrorCount++;
        }

        /*
         * End : existence check in database
         * */


        /*
         * Start : Delete in database
         * */
        if($ErrorCount == 0)
        {
            $rows = DB::table('attendance_specialgroups')->where('id', $id)->delete();

            if($rows)
            {
                ResponseAjax::set('SuccessStatus', 1);
                ResponseAjax::set('Message.text', "Successfully Attendance Specialgroup Deleted");
            }
            else
            {
                ResponseAjax::set('SuccessStatus', 0);
                ResponseAjax::set('Message.text', "Database Query error");
            }

        }
        /*
         * End : Delete in database
         * */

        ResponseAjax::Response();
    }
}
