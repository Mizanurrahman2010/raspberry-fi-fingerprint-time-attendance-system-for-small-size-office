<?php

namespace App\Http\Controllers\Admin\Attendance\Specialgroup;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponseAjax;

class StaffsController extends Controller
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

    public function search(Request $request)
    {
        ResponseAjax::set('LoginStatus', 1);
        ResponseAjax::set('SuccessStatus', 0);

        $data = $request->input('data');

        $_token   = $data['_token'];
        $keyword  = $data['keyword'];

        /*
         * Start : Incoming data check
         * */

        $ErrorCount = 0;

        /*if (strlen($name) < 3 || strlen($name) > 255) {
            ResponseAjax::set('Message.text', 'Name between 3 to 255 characters');
            $ErrorCount++;
        }*/

        if (strlen($keyword) < 1)
        {
            ResponseAjax::set('Message.text', 'Keyword Empty');
            $ErrorCount++;
        }

        /*
         * End : Incoming data check
         * */


        if($ErrorCount == 0)
        {
            $staffs = DB::table('staffs')->select('id', 'name', 'mobile_number', 'email', 'status')
                                         ->where('name', 'like', "%$keyword%")
                                         ->orWhere('mobile_number', 'like', "%$keyword%")
                                         ->get();

            if ($staffs != null)
            {

                //ResponseAjax::set('Message.text', ' Found');
                ResponseAjax::set('SuccessStatus', 1);
                ResponseAjax::set('ResponseData', $staffs);
            }
            else
            {
                ResponseAjax::set('Message.text', 'No result Found');
                ResponseAjax::set('SuccessStatus', 0);
            }
        }

        ResponseAjax::Response();
    }
}
