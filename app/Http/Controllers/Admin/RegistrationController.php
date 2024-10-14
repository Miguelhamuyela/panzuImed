<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
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
        $response['registration'] = Registration::orderBy('id', 'desc')->get();
        //Logger
        $this->Logger->log('info', 'Listou Informações para a Matrícula');
        return view('admin.registrations.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em Criar Informaçãoes para a Matrícula');
        return view('admin.registrations.create.index');
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
        $file = $request->file('file')->store('registration');
        $registration = Registration::create([
            'title' => $request->title,
            'file' => $file
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou Informações para a matrícula com o Titulo' . $registration->title);
        return redirect("admin/matricula/show/$registration->id")->with('create', '1');
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
        $response['registration'] = Registration::find($id);
        //Logger
        $this->Logger->log('info', 'Visualizou Informaçãoes sobre a matrícula com o identificador ' . $id);
        return view('admin.registrations.details.index', $response);
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
        $response['registration'] = Registration::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar Informações sobre a matrícula com o identificador ' . $id);
        return view('admin.registrations.edit.index', $response);
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
            $file = Registration::find($id)->file;
        }

        Registration::find($id)->update([
            'title' => $request->title,
            'file' => $file
        ]);
        //Logger
        $this->Logger->log('info', 'Editou Informações sobre a Matrícula com o identificador ' . $id);
        return redirect("admin/matricula/show/$id")->with('edit', '1');
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
        $this->Logger->log('info', 'Eliminou Informações sobre a Matricula com o identificador ' . $id);
        Registration::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
