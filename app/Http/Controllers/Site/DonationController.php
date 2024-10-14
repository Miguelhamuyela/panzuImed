<?php

namespace App\Http\Controllers\Site;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
     public function index()
    {
        $response['donation'] = Donation::find(1);
        return view('site.alumni.donation.index',$response);
    }
}
