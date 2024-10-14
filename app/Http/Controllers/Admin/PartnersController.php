<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Logger;
use App\Models\Partner;

class PartnersController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['partners'] = Partner::all();
        //Logger
        $this->Logger->log('info', 'Listou os Parceiros');
        return view('admin.partner.list.index', $response); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create.index');
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
            'name' => 'required|min:5|max:255',
            'link' => 'max:255',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        $file = $request->file('image')->store('partner');
        $partner = Partner::create([
            'image' => $file,
            'name' => $request->name,
            'link' => $request->link,
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou um parceiro com o nome ' . $partner->name);

        return redirect("admin/parceiros/show/$partner->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['partners'] = Partner::find($id);

        //Logger
        $this->Logger->log('info', 'Visualizou  um parceiro com identificador ' . $id);
        return view('admin.partner.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['partners'] = Partner::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar um parceiro com o identificador ' . $id);
        return view('admin.partner.edit.index', $response);
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
            'name' => 'required|max:255',
            'link' => 'max:255',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('partner');
        } else {
            $file = Partner::find($id)->image;
        }
        Partner::find($id)->update([
            'image' => $file,
            'name' => $request->name,
            'link' => $request->link,
        ]);
        //Logger
        $this->Logger->log('info', 'Editou um parceiro com o identificador ' . $id);
        return redirect("admin/parceiros/show/$id")->with('edit', '1');
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
            $this->Logger->log('info', 'Eliminou um parceiro com o identificador ' . $id);
            Partner::find($id)->delete();
            return redirect()->back()->with('destroy', '1');
    }
}
