<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubCourse;
use Illuminate\Http\Request;

class SubCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }

    public function create($id)
    {
        $response['course'] = Course::find($id);
        $this->Logger->log(
            'info',
            'Cadastrar Curso com o idenificador ' . $id
        );
        return view('admin.subcourses.create.index', $response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            /**Subcourse */
            'courseName' => 'required|min:5|max:255',
            'image' => 'mimes:jpg,png,jpeg',
            'body' => 'min:10',
        ]);

        if($file = $request->file('image')){
            $file = $file->store('subcourse');
        }else{
            $file = SubCourse::find($id)->image;
        }

        $subcourse = SubCourse::create([
            'image' => $file,
            'courseName' => $request->courseName,
            'body' => $request->body,
'fk_courses_id' => $id,

        ]);
        $this->Logger->log(
            'info',
            'Cadastrou Curso com identificador ' . $id
        );
        return redirect("admin/curso/show/$id")->with('create', '1');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['subCourse'] = SubCourse::find($id);
              //Logger
        $this->Logger->log('info', 'Visualizou Subcurso com o identificador ' . $id);
        return view('admin.subcourses.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['subCourse'] = SubCourse::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar Curso com o identificador ' . $id);
        return view('admin.subcourses.edit.index', $response);
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
            'courseName' => 'required|min:5|max:255',
            'image' => 'mimes:jpg,png,jpeg',
            'body' => 'min:10',
        ]);

        if($file = $request->file('image')){
            $file = $file->store('subcourse');
        }else{
            $file = SubCourse::find($id)->image;
        }

        SubCourse::find($id)->update([
            'image' => $file,
            'courseName' => $request->courseName,
            'body' => $request->body,

        ]);
          //Logger
          $this->Logger->log('info', 'Editou Imagem do Slideshow com o identificador ' . $id);

        return redirect("admin/oferta-formativa/show/$id")->with('edit', '1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->Logger->log(
            'info',
            'Eliminou Curso com identificador ' . $id
        );
        SubCourse::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
