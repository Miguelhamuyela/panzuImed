<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //

    public function index(){

        $response['registration'] = Registration::get();
        return view('site.registration.index',$response);

    }
}
