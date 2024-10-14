<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Normative;
use Illuminate\Http\Request;

class NormativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['normative'] = Normative::orderBy('id', 'desc')->paginate(12);
        return view('site.normative.index', $response);
    }

}
