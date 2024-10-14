<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\SubCourse;
use Illuminate\Http\Request;

class SubCourseController extends Controller
{

    public function show($title)
    {
        try {
           $response['subcourse'] = SubCourse::where('courseName', urldecode($title))->first();

            $response['lasted'] = SubCourse::where('courseName','!=', urldecode($title))->orderBy('id', 'desc')->limit(4)->get();
            return view('site.subcourse.single.index',$response);
        } catch (\Throwable $th) {
            return redirect()->route('site.home');
        }
    }
   
}
