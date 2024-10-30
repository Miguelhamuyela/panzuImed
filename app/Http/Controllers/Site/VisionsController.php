<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionsController extends Controller
{

    public function index()
    {
        //
        $response['visions'] = Vision::where([['state', 'Autorizada']])->orderBy('id', 'desc')->paginate(9);
        return view('site.visions.all.index', $response);
    }



    public function show($title)
    {
        //
        try {
            $response['visions'] = Vision::where([['state', 'Autorizada'], ['title', urldecode($title)]])->first();
            $response['lasted'] = Vision::where([['state', 'Autorizada'], ['title', '!=', urldecode($title)]])->orderBy('id', 'desc')->limit(5)->get();
            return view('site.visions.single.index', $response);
        } catch (\Throwable $th) {
            return redirect()->route('site.visions');
        }
    }
}
