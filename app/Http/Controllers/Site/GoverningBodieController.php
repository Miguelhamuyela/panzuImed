<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\GoverningBodie;
use Illuminate\Http\Request;

class GoverningBodieController extends Controller
{

    public function index()
    {
        $response['governieBodie'] = GoverningBodie::get();
        return view('site.institutional.governingBodies.index', $response);
    }

}
