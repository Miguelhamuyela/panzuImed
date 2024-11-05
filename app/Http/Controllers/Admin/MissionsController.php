<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Missions;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['missions'] = Missions::get();
        //Logger
        $this->Logger->log('info', 'Listou as Noticias');
        return view('admin.missions.list.index', $response);
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
        return view('admin.missions.create.index');
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
        $file = $request->file('image')->store('missions');
        $missions = Missions::create([
            'path' => $file,
            'title' => $request->title,
            'typewriter' => $request->typewriter,
            'body' => $request->body,
            'date' => $request->date,
            'state' => 'Autorizada'
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou uma noticia com o titulo ' . $missions->title);

        return redirect("admin/missions/show/$missions->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['missions'] = Missions::find($id);

        //Logger
        $this->Logger->log('info', 'Visualizar uma noticia com o identificador ' . $id);
        return view('admin.missions.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['missions'] = Missions::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar uma noticia com o identificador ' . $id);
        return view('admin.missions.edit.index', $response);
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
            $file = $file->store('missions');
        } else {
            $file = Missions::find($id)->path;
        }
        Missions::find($id)->update([
            'path' => $file,
            'title' => $request->title,
            'typewriter' => $request->typewriter,
            'body' => $request->body,
            'date' => $request->date,
            'state' => 'Autorizada'
        ]);
        //Logger
        $this->Logger->log('info', 'Editou uma noticia com o identificador ' . $id);
        return redirect("admin/missions/show/$id")->with('edit', '1');
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
        Missions::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
