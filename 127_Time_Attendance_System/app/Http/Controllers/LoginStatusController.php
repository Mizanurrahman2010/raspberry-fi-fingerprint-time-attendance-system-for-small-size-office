<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ResponseAjax;

class LoginStatusController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            ResponseAjax::set('LoginStatus', 1);
            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('ResponseData', '');
            ResponseAjax::set('Message.text', 'You logged in');
        }
        else
        {
            ResponseAjax::set('LoginStatus', 0);
            ResponseAjax::set('SuccessStatus', 1);
            ResponseAjax::set('ResponseData', '');
            ResponseAjax::set('Message.text', 'You are not Logged in');
        }

        ResponseAjax::Response();
    }
}
