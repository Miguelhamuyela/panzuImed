<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\GoverningBodie;
use Illuminate\Http\Request;

class GoverningBodieController extends Controller
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
        $response['governingBodies'] = GoverningBodie::orderBy('id', 'desc')->get();
        //Logger
        $this->Logger->log('info', 'Listou os Órgãos da Imed em Institucional');
        return view('admin.institutional.governingBodies.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em Criar Órgão Directivo em Institucional');
        return view('admin.institutional.governingBodies.create.index');
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
            'function' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);


        $file = $request->file('image')->store('governingBodie');
        $governingBodie = GoverningBodie::create([
            'image' => $file,
            'name' => $request->name,
            'function' => $request->function
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou um Órgão Directivo com o nome ' . $governingBodie->name);
        return redirect("admin/orgaos-directivos/show/$governingBodie->id")->with('create', '1');
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
        $response['governingBodies'] = GoverningBodie::find($id);
        //Logger
        $this->Logger->log('info', 'Visualizou um Órgão Directivo com o identificador ' . $id);
        return view('admin.institutional.governingBodies.details.index', $response);
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
        $response['governingBodie'] = GoverningBodie::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar um Órgão Directivo com o identificador ' . $id);
        return view('admin.institutional.governingBodies.edit.index', $response);
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
            'function' => 'required|max:255',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('governingBodie');
        } else {
            $file = GoverningBodie::find($id)->image;
        }

        GoverningBodie::find($id)->update([
            'image' => $file,
            'name' => $request->name,
            'function' => $request->function
        ]);
        //Logger
        $this->Logger->log('info', 'Editou um Órgão Directivo com o identificador ' . $id);
        return redirect("admin/orgaos-directivos/show/$id")->with('edit', '1');
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
        $this->Logger->log('info', 'Eliminou um Órgão Directivo com o identificador ' . $id);
        GoverningBodie::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
