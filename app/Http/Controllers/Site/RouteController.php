<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AboutRoute;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $response['aboutRoute'] = AboutRoute::find(1);

        $response['route'] = Route::paginate(6);
        return view('site.alumni.route.index',$response);
    }
}
