<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\PerfilDirector;
use Illuminate\Http\Request;

class PerfilDirectorController extends Controller
{

    public function index()
    {
        $response['director'] = PerfilDirector::first();
        return view('site.institutional.directorProfile.index', $response);
    }
}
