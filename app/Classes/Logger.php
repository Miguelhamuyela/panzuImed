<?php

namespace App\Classes;

use App\Models\Log as ModelsLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class Logger
{

    public function log($level, $message)
    {

        ModelsLog::create([
            'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'],
            'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
            'PATH_INFO' =>  URL::current(),
            'REQUEST_TIME' =>  $_SERVER['REQUEST_TIME'],
            'USER_ID' => isset(Auth::user()->id) ? Auth::user()->id : 'N/A' ,
            'USER_NAME' =>  isset(Auth::user()->name) ? Auth::user()->name : 'N/A',
            'message' => $message,
            'level' => $level,
        ]);

    }
}
