<?php

namespace App\Http\Controllers\Admin\Departments;

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
        $department = DB::table('departments')->where('id', $id)->first();

        return view('admin.departments.update', ['department' => $department]);
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
         * Start : existence check in database
         * */

        if($ErrorCount == 0)
        {
            $user = DB::table('departments')->where('id', $id)->first();
            if ($user == null)
            {
                ResponseAjax::set('Message.text', 'Department not exist');
                $ErrorCount++;
            }

            $user = DB::table('departments')->where('name', $name)->first();
            if ($user != null)
            {
                ResponseAjax::set('Message.text', 'Department Already Exist');
                $ErrorCount++;
            }
        }

        /*
         * End : existence check in database
         * */


        /*
         * Start : insert in database
         * */
        if($ErrorCount == 0)
        {
            DB::table('departments')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'status' => $status,
                    'updated_at' => DB::raw('NOW()')
                ]);

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', "Successfully Department Updated");
        }
        /*
         * End : insert in database
         * */

        ResponseAjax::Response();
    }
}
