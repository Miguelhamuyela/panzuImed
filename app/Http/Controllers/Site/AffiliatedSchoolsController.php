<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AffiliatedSchool;
use Illuminate\Http\Request;

class AffiliatedSchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['affiliated'] = AffiliatedSchool::get();
        return view('site.affiliatedSchools.index', $response);
    }

    
}
