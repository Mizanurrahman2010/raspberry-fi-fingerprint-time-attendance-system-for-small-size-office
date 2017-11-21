<?php

namespace App\Http\Controllers\Admin\Attendance\Specialgroup;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class UpdateController extends Controller
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
    public function updateForm($id)
    {
        $attendance_specialgroup = DB::table('attendance_specialgroups')->where('id', $id)->first();
        $attendance_specialgroup_staffs = DB::table('attendance_specialgroup_staffs as asgf')
                                                ->select('asgf.staff_id', 'staffs.name', 'departments.id as department_id', 'departments.name as department_name', 'staffs.mobile_number', 'staffs.email', 'asgf.status')
                                                ->leftJoin('staffs', 'asgf.staff_id', '=', 'staffs.id')
                                                ->leftJoin('departments', 'staffs.department_id', '=', 'departments.id')
                                                ->where('asgf.attendance_specialgroup_id', $id)->get();

        return view('admin.attendance.specialgroup.update', ['attendance_specialgroup' => $attendance_specialgroup, 'attendance_specialgroup_staffs' => $attendance_specialgroup_staffs]);
    }

    /**
    * Update Controller.
    *
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id)
    {

        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token             = $data['_token'];
        $name               = $data['name'];
        $status             = $data['status'];


        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        if (strlen($name) < 3 || strlen($name) > 255) {
            ResponseAjax::set('Message.text', 'Name between 3 to 255 characters');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */

        /*
         * Start : Student existence check in database
         * */

        if($ErrorCount == 0)
        {

            $user = DB::table('attendance_specialgroups')->where('id', $id)->first();
            if ($user = null)
            {
                ResponseAjax::set('Message.text', 'Attendance Specialgroup not exist');
                $ErrorCount++;
            }
        }

        /*
         * End : Student existence check in database
         * */


        /*
         * Start : insert in database
         * */
        if($ErrorCount == 0)
        {
            DB::table('attendance_specialgroups')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'status' => $status,
                    'updated_at' => DB::raw('NOW()')
                ]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', "Successfully Attendance Special Group Updated");
        }
        /*
         * End : insert in database
         * */

        ResponseAjax::Response();
    }
}
