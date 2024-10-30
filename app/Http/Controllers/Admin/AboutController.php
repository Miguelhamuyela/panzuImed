<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function show()
    {
        $response['about'] = About::find(1);
        return view('admin.about.details.index', $response);
    }

    public function edit($id)

    {
        $response['about'] = About::find($id);
        return view('admin.about.edit.index',  $response);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'image' => 'mimes:jpg,png,jpeg,pdf,docx,doc',
            'body' => 'required|min:5',
        ]);

        if ($middle = $request->file('image')) {
            $file = $middle->storeAs('about', 'IMED-acerca-' . uniqid(rand(1, 5)) . "." . $middle->extension());
        } else {
            $file =  About::find($id)->image;
        }

        $About =  About::find($id)->update([
            'image' => $file,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect("admin/about/show")->with('edit', '1');
    }
}
