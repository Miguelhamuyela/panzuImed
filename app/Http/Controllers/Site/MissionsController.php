<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Missions;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    public function index()
    {
        //
        $response['missions'] = Missions::where([['state', 'Autorizada']])->orderBy('id', 'desc')->paginate(9);
        return view('site.missions.all.index', $response);
    }



    public function show($title)
    {
        //
        try {
            $response['missions'] = Missions::where([['state', 'Autorizada'], ['title', urldecode($title)]])->first();
            $response['lasted'] = Missions::where([['state', 'Autorizada'], ['title', '!=', urldecode($title)]])->orderBy('id', 'desc')->limit(5)->get();
            return view('site.missions.single.index', $response);
        } catch (\Throwable $th) {
            return redirect()->route('site.missions');
        }
    }
}
