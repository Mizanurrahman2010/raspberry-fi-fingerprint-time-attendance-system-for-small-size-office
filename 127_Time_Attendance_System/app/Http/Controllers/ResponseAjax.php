<?php

/**
 * Created by PhpStorm.
 * User: Mizan
 * Date: 11/29/2016
 * Time: 2:49 AM
 */
namespace App\Http\Controllers;

class ResponseAjax
{
    public static $LoginStatus = 0;
    public static $SuccessStatus = 0;
    public static $ResponseData;
    public static $Message = ['text' => array(), 'audio' => ''];//['audio] => 1=success / 2=info / 3=warning / 4=danger

    public static function error_handler($code, $message, $file, $line) {

        // error suppressed with @
        if (error_reporting() === 0) {
            return false;
        }

        switch ($code) {
            case E_NOTICE:
            case E_USER_NOTICE:
                $error = 'Notice';
                break;
            case E_WARNING:
            case E_USER_WARNING:
                $error = 'Warning';
                break;
            case E_ERROR:
            case E_USER_ERROR:
                $error = 'Fatal Error';
                break;
            default:
                $error = 'Unknown';
                break;
        }

        $error = '<b>' . $error . '</b>: ' . $message . ' in <b>' . $file . '</b> on line <b>' . $line . '</b>';

        //ResponseAjax::set('Message.text',$error);

        return true;
    }

    public static function set($n,$d)
    {
        switch($n)
        {
            case 'LoginStatus':
                self::$LoginStatus=$d;
                break;
            case 'SuccessStatus':
                self::$SuccessStatus=$d;
                break;
            case 'ResponseData':
                self::$ResponseData=$d;
                break;
            case 'Message.text':
                if(!empty($d))
                {
                    self::$Message['text'][(count(self::$Message['text']))+1]=$d;
                }
                break;
            case 'Message.audio':
                self::$Message['audio']=$d;
                break;
        }
    }
    public static function get($n)
    {
        switch($n)
        {
            case 'LoginStatus':
                return self::$LoginStatus;
                break;
            case 'SuccessStatus':
                return self::$SuccessStatus;
                break;
            case 'ResponseData':
                return self::$ResponseData;
                break;
            case 'Message.text':
                return self::$Message['text'];
                break;
            case 'Message.audio':
                return self::$Message['audio'];
                break;
        }
    }
    public static function Response()
    {
        // Output
        $res= array();

        $res['LoginStatus']=ResponseAjax::$LoginStatus;// 1=login / 0=not login
        $res['SuccessStatus']=ResponseAjax::$SuccessStatus;// 1=success / 0=failed
        $res['ResponseData']=ResponseAjax::$ResponseData;
        $res['Message']=ResponseAjax::$Message;// ['text]=>(error+success+others), ['audio']=>(success.mp3)

        echo json_encode($res);
    }
}