<?php

namespace App\Http\Controllers\Site;

use App\Models\News;
use App\Models\About;
use App\Models\Course;
use App\Models\Partner;
use App\Models\SlideShow;
use App\Http\Controllers\Controller;
use App\Models\AffiliatedSchool;
use App\Models\Configuration;
use App\Models\SubCourse;

class HomeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['affiliated']=AffiliatedSchool::get();
        $response['courses']=SubCourse::get();
        $response['about'] = About::find(1);
        $response['partners'] = Partner::all();
        $response['slideshows'] = SlideShow::orderBy('id', 'desc')->get();
        $response['news'] = News::where([['state', 'Autorizada']])->orderBy('id', 'desc')->limit(6)->get();
        $response['social'] = Configuration::all();

        return view('site.home.index', $response);
    }
}
