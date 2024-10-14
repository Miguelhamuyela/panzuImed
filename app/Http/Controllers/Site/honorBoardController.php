<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\HonorBoard;
use Illuminate\Http\Request;

class honorBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['honorBoard']=HonorBoard::paginate(12);
        return view('site.hoboard.index',$response);
    }


}
