<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['servicos'] = Services::get();
        //Logger
        $this->Logger->log('info', 'Listou os Serviços');
        return view('admin.service.list.index', $response); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create.index');
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
            'body' => 'required|min:5',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        $file = $request->file('image')->store('services');
        $servicos = Services::create([
            'image' => $file,
            'title' => $request->title,
            'body' => $request->body,
            'state' => 'Autorizada'
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou um serviço com o titulo ' . $servicos->title);

        return redirect("admin/serviços/show/$servicos->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['services'] = Services::find($id);

        //Logger
        $this->Logger->log('info', 'Visualizou  um serviço com identificador ' . $id);
        return view('admin.service.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['services'] = Services::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar um serviço com o identificador ' . $id);
        return view('admin.service.edit.index', $response);
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
            'body' => 'required|min:5',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('services');
        } else {
            $file = Services::find($id)->image;
        }
        Services::find($id)->update([
            'image' => $file,
            'title' => $request->title,
            'body' => $request->body,
            'state' => 'Autorizada'
        ]);
        //Logger
        $this->Logger->log('info', 'Editou um serviço com o identificador ' . $id);
        return redirect("admin/serviços/show/$id")->with('edit', '1');
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
            $this->Logger->log('info', 'Eliminou um serviço com o identificador ' . $id);
            Services::find($id)->delete();
            return redirect()->back()->with('destroy', '1');
    }
}
