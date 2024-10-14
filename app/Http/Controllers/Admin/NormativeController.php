<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Normative;
use Illuminate\Http\Request;

class NormativeController extends Controller
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
        $response['normative'] = Normative::orderBy('id', 'desc')->get();
        //Logger
        $this->Logger->log('info', 'Listou Normativos');
        return view('admin.normative.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em Criar Normativos');
        return view('admin.normative.create.index');
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
            'title' => 'required|min:6|max:255',
            'file' =>  'mimes:pdf,docx,xlsx,jpg,png,jpeg'
        ]);
        $file = $request->file('file')->store('Normative');
        $normative = Normative::create([
            'title' => $request->title,
            'file' => $file
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou Normativo com o Titulo' . $normative->title);
        return redirect("admin/normativos/show/$normative->id")->with('create', '1');
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
        $response['normative'] = Normative::find($id);
        //Logger
        $this->Logger->log('info', 'Visualizou Normativo com o identificador ' . $id);
        return view('admin.normative.details.index', $response);
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
        $response['normative'] = Normative::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar um Normativo com o identificador ' . $id);
        return view('admin.normative.edit.index', $response);
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
            'title' => 'required|min:6|max:255',
            'file' =>  'mimes:pdf,docx,xlsx,jpg,png,jpeg'
        ]);

        if ($file = $request->file('file')) {
            $file = $file->store('file');
        } else {
            $file = Normative::find($id)->file;
        }

        Normative::find($id)->update([
            'title' => $request->title,
            'file' => $file
        ]);
        //Logger
        $this->Logger->log('info', 'Editou um Normativo com o identificador ' . $id);
        return redirect("admin/normativos/show/$id")->with('edit', '1');
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
        $this->Logger->log('info', 'Eliminou um Normativo com o identificador ' . $id);
        Normative::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
