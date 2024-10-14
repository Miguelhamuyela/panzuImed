<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function show($title)
    {
        try {
           $response['course'] = Course::where('courseName', urldecode($title))->first();

            $response['lasted'] = Course::where('courseName','!=', urldecode($title))->orderBy('id', 'desc')->limit(4)->get();
            return view('site.course.single.index',$response);
        } catch (\Throwable $th) {
            return redirect()->route('site.home');
        }
    }

}
