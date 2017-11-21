<?php

namespace App\Http\Controllers\Admin\Staffs\Status;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class CreateController extends Controller
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
    public function createForm()
    {
        return view('admin.staffs.status.create');
    }

    /**
    * Settings Controller.
    *
    * @return \Illuminate\Http\Response
    */

    public function create(Request $request)
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
         * Start : insert in database
         * */
        if($ErrorCount == 0)
        {
            $id = DB::table('staff_status')->insertGetId(
                [

                    'name'              => $name,
                    'status'            => $status,
                    'created_at'        => DB::raw('NOW()')
                ]
            );

            if($id)
            {
                ResponseAjax::set('SuccessStatus', 1);
                ResponseAjax::set('ResponseData', $id);
                ResponseAjax::set('Message.text', '<h3 style="color:#fff">Successfully Staff\'s Status Created</h3>');
            }
            else
            {
                ResponseAjax::set('Message.text', 'Error - Insert Data execution error (Error - 1)');
            }
        }
        /*
         * End : insert in database
         * */

        ResponseAjax::Response();
    }
}
