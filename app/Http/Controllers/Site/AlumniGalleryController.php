<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AlumniGallery;
use Illuminate\Http\Request;

class AlumniGalleryController extends Controller
{
    public function index()
    {
        //
        $response['galleries'] = AlumniGallery::orderBy('id', 'desc')->paginate(6);
        return view('site.galleryAlumi.image.all.index', $response);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $title
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {


        try {
           $response['titleGallery'] =AlumniGallery::where([['name', urldecode($name)]])->first();
            $response['gallery'] = AlumniGallery::with('images')->where([['name', urldecode($name)]])->first();
            return view('site.galleryAlumi.image.single.index', $response);
        } catch (\Throwable $th) {
            return redirect()->route('site.gallery');
        }
    }
}
