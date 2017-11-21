<?php

namespace App\Http\Controllers\Admin\Staffs\Designations;

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

    public function delete(Request $request, $id)
    {

        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token  = $data['_token'];

        /*
         * Start : existence check in database
         * */

        $ErrorCount = 0;

        $user = DB::table('staff_designations')->where('id', $id)->first();
        if ($user == null)
        {
            ResponseAjax::set('Message.text', 'Designation not exist');
            $ErrorCount++;
        }

        $user = DB::table('staffs')->where('designation_id', $id)->first();
        if ($user != null)
        {
            ResponseAjax::set('Message.text', 'Designation already allocated to the Staff\'s');
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
            DB::table('staff_designations')->where('id', $id)->delete();

            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('Message.text', "Successfully Designation Deleted");
        }
        /*
         * End : Delete in database
         * */

        ResponseAjax::Response();
    }
}