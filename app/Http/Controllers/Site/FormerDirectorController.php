<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FormerDirector;
use Illuminate\Http\Request;

class FormerDirectorController extends Controller
{
    public function index()
    {
        $response['formerDirector'] = FormerDirector::get();
        return view('site.institutional.formerDirectors.index', $response);
    }
}
