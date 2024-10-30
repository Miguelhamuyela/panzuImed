<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionsController extends Controller
{
     private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }


    public function index()
    {
        $response['visions'] = Vision::get();
        //Logger
        $this->Logger->log('info', 'Listou as Noticias');
        return view('admin.visions.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em Criar noticia');
        return view('admin.visions.create.index');
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

            'title' => 'required|min:5|max:255',
            'typewriter' => 'required|min:2|max:255',
            'body' => 'required|min:5',
            'image' => 'required|mimes:jpg,png,jpeg',
            'date' => 'required',

        ]);

        $file = $request->file('image')->store('visions');
        $visions = Vision::create([
            'path' => $file,
            'title' => $request->title,
            'typewriter' => $request->typewriter,
            'body' => $request->body,
            'date' => $request->date,
            'state' => 'Autorizada'
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou uma noticia com o titulo ' . $visions->title);

        return redirect("admin/visions/show/$visions->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $response['visions'] = Vision::find($id);

        //Logger
        $this->Logger->log('info', 'Visualizar uma noticia com o identificador ' . $id);
        return view('admin.visions.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $response['visions'] = Vision::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar uma noticia com o identificador ' . $id);
        return view('admin.visions.edit.index', $response);
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
            'title' => 'required|min:5|max:255',
            'typewriter' => 'required|min:2|max:255',
            'body' => 'required|min:5',
            'date' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('visions');
        } else {
            $file = Vision::find($id)->path;
        }
        Vision::find($id)->update([
            'path' => $file,
            'title' => $request->title,
            'typewriter' => $request->typewriter,
            'body' => $request->body,
            'date' => $request->date,
            'state' => 'Autorizada'

        ]);

        //Logger
        $this->Logger->log('info', 'Editou uma noticia com o identificador ' . $id);
        return redirect("admin/visions/show/$id")->with('edit', '1');
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
        $this->Logger->log('info', 'Eliminou uma noticia com o identificador ' . $id);
        Vision::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }

}
