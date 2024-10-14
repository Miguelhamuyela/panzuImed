<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutRoute;
use Illuminate\Http\Request;

class AboutRoutesController extends Controller
{

    public function show()
    {
        $response['aboutRoute'] = AboutRoute::find(1);
        return view('admin.aboutRoute.details.index', $response);
    }

    public function edit($id)

    {
        $response['aboutRoute'] = AboutRoute::find($id);
        return view('admin.aboutRoute.edit.index',  $response);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|min:5',
        ]);


        $AboutRoute =  AboutRoute::find($id)->update([
            'description' => $request->description
        ]);

        return redirect("admin/sobre-o-percurso/show")->with('edit', '1');
    }
}
