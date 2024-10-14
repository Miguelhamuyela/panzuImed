<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\FormerDirector;
use Illuminate\Http\Request;

class FormerDirectorController extends Controller
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
        $response['formerDirector'] = FormerDirector::orderBy('id', 'desc')->get();
        //Logger
        $this->Logger->log('info', 'Listou Ex-Directores em Institucional');
        return view('admin.institutional.formerDirector.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em Criar Ex-Directores em Institucional');
        return view('admin.institutional.formerDirector.create.index');
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
            'startDate' => 'required|max:255',
            'endDate' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);


        $file = $request->file('image')->store('formerDirector');
        $formerDirector = FormerDirector::create([
            'image' => $file,
            'name' => $request->name,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou Ex Directore com o nome ' . $formerDirector->name);
        return redirect("admin/ex-directores/show/$formerDirector->id")->with('create', '1');
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
        $response['formerDirector'] = FormerDirector::find($id);
        //Logger
        $this->Logger->log('info', 'Visualizou um Ex Director com o identificador ' . $id);
        return view('admin.institutional.formerDirector.details.index', $response);
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
        $response['formerDirector'] = FormerDirector::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar um Ex Director com o identificador ' . $id);
        return view('admin.institutional.formerDirector.edit.index', $response);
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
            'startDate' => 'required|max:255',
            'endDate' => 'required|max:255',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('fromerDirector');
        } else {
            $file = FormerDirector::find($id)->image;
        }

        FormerDirector::find($id)->update([
            'image' => $file,
            'name' => $request->name,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate
        ]);
        //Logger
        $this->Logger->log('info', 'Editou um Ex-Directores com o identificador ' . $id);
        return redirect("admin/ex-directores/show/$id")->with('edit', '1');
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
        $this->Logger->log('info', 'Eliminou um Ex Director com o identificador ' . $id);
        FormerDirector::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
