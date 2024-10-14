<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\AffiliatedSchool;
use Illuminate\Http\Request;

class AffiliatedSchoolsController extends Controller
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
        $response['affliated'] = AffiliatedSchool::orderBy('id', 'desc')->get();
        //Logger
        $this->Logger->log('info', 'Listou Escolas Filiadas');
        return view('admin.affiliatedSchools.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Logger
        $this->Logger->log('info', 'Entrou em Criar Escolas Filiadas');
        return view('admin.affiliatedSchools.create.index');
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
            'tel' => 'max:50',
            'email' => 'max:50',
            'address' => 'max:255',
            'site' => 'max:50'
        ]);

        $affliated = AffiliatedSchool::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'address' => $request->address,
            'site' => $request->site
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou Escolas Filiadas com o nome' . $affliated->name);
        return redirect("admin/escolas-filiadas/show/$affliated->id")->with('create', '1');
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
        $response['affiliated'] = AffiliatedSchool::find($id);
        //Logger
        $this->Logger->log('info', 'Visualizou uma Escola Filiada com o identificador ' . $id);
        return view('admin.affiliatedSchools.details.index', $response);
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
        $response['affiliated'] = AffiliatedSchool::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar uma  Escola Filiada com o identificador' . $id);
        return view('admin.affiliatedSchools.edit.index', $response);
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
            'tel' => 'max:50',
            'email' => 'max:50',
            'address' => 'max:255',
            'site' => 'max:50'
        ]);

        AffiliatedSchool::find($id)->update([
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'address' => $request->address,
            'site' => $request->site
        ]);
        //Logger
        $this->Logger->log('info', 'Editou uma Escola Filiada com o identificador ' . $id);
        return redirect("admin/escolas-filiadas/show/$id")->with('edit', '1');
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
        $this->Logger->log('info', 'Eliminou uma Escola Filiada com o identificador ' . $id);
        AffiliatedSchool::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
