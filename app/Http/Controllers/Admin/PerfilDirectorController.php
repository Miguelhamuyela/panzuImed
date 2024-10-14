<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerfilDirector;
use Illuminate\Http\Request;

class PerfilDirectorController extends Controller
{
    public function show()
    {
        //
        $response['director'] = PerfilDirector::first();
        return view('admin.institutional.directorProfile.details.index', $response);
    }

    public function edit($id)
    {
        $response['director'] = PerfilDirector::find($id);
        return view('admin.institutional.directorProfile.edit.index', $response);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|min:10|max:255',
            'description' => 'required|min:20|',
            'image' =>  'mimes:jpg,png,jpeg'
        ]);

        if($file = $request->file('image')){
            $file = $file->store('image');
        }else{
            $file = PerfilDirector::find($id)->image;
        }

        $director = PerfilDirector::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image'=>$file

        ]);
        //Logger
        return redirect()->back()->with('edit', '1');
    }
}
