<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function show()
    {
        $response['donation'] = Donation::find(1);
        return view('admin.alumni.donation.details.index', $response);
    }



    public function create()
    {
        $response['donation'] = Donation::find(1);
        return view('admin.alumni.donation.create.index', $response);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'image' => 'mimes:jpg,png,jpeg,pdf,docx,doc',
            'body' => 'required|min:5',
        ]);

        if ($middle = $request->file('image')) {
            $file = $middle->storeAs('donation', 'IMED-donation-' . uniqid(rand(1, 5)) . "." . $middle->extension());
        } else {
            $file =  Donation::find($id)->image;
        }

        $Donation =  Donation::find($id)->update([
            'image' => $file,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect("admin/doacoes/show")->with('edit', '1');
    }
}
