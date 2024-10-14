<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\AlumniGalleryImage;
use Illuminate\Http\Request;

class AlumniGalleryImageController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function create($id)
    {
        //
        $response['alumniGalleryImage'] = AlumniGalleryImage::with(['images'])->find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em Adicionar Imagens da Galeria Alumni com o Identificador ' . $id);
        return view('admin.alumniGalleryImage.create.index', $response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validation = $request->validate([
            'images' => 'required|min:1',
        ]);
        for ($i = 0; $i < count($request->allFiles()['images']); $i++) {
            $file = $request->allFiles()['images'][$i];
            $ImageGallery = AlumniGalleryImage::create([
                'path' => $file->store("alumniGalleryImages/$id"),
                'fk_idGallery' => $id
            ]);
        }
        //Logger
        $this->Logger->log('info', 'Cadastrou Imagens da Galeria em Alumni com o Identificador ' . $id);
        return redirect("admin/galeria-alumni-imagem/show/$id")->with('create_image', '1');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageGallery  $ImageGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Logger
        $this->Logger->log('info', 'Eliminou uma Imagem da Galeria em ALumni com o identificador ' . $id);
        AlumniGalleryImage::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
