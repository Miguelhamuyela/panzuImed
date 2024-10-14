<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $response['route'] = Route::orderBy('id', 'desc')->get();
        //Logger
        $this->Logger->log('info', 'Listou Route em Alumni');
        return view('admin.alumni.route.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em Criar Route em Alumni');
        return view('admin.alumni.route.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|min:2|max:255',
            'course' => 'required|min:2|max:255',
            'class' => 'required|min:2|max:255',
            'description' => 'required|min:5',
            'image' => 'mimes:jpg,png,jpeg'
        ]);


        if ($file = $request->file('image')) {
            $file = $request->file('image')->store('Route');
        } else {
            $file = null;
        }

        $route = Route::create([
            'image' => $file,
            'name' => $request->name,
            'class' => $request->class,
            'course' => $request->course,
            'description' => $request->description
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou Percurso com nome de aluno ' . $route->name);
        return redirect("admin/percurso/show/$route->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $response['route'] = Route::find($id);
        //Logger
        $this->Logger->log('info', 'Visualizou um percurso de aluno com identificador ' . $id);
        return view('admin.alumni.route.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $response['route'] = Route::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar um Aluno com identificador' . $id);
        return view('admin.alumni.route.edit.index', $response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|min:2|max:255',
            'course' => 'required|min:2|max:255',
            'class' => 'required|min:2|max:255',
            'description' => 'min:5',
            'image' => 'mimes:jpg,png,jpeg'
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('Route');
        } else {
            $file = Route::find($id)->image;
        }

        Route::find($id)->update([
            'image' => $file,
            'name' => $request->name,
            'class' => $request->class,
            'course' => $request->course,
            'description' => $request->description
        ]);
        //Logger
        $this->Logger->log('info', 'Editou um Aluno com o identificador ' . $id);
        return redirect("admin/percurso/show/$id")->with('edit', '1');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Logger
        $this->Logger->log('info', 'Eliminou um Aluno com o identificador ' . $id);
        Route::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
