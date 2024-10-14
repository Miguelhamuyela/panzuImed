<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $response['courses'] = Course::with('subcourses')->get();
        return view('admin.course.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create.index');
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
            'courseName' => 'required|min:5|max:255',
            'image' => 'required|mimes:jpg,png,jpeg',
            'body' => 'min:10',
        ]);


        $file = $request->file('image')->store('course');
        $course = Course::create([
            'image' => $file,
            'courseName' => $request->courseName,
            'body' => $request->body,
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou um Curso  com o nome ' . $course->name);
        return redirect("admin/curso/show/$course->id")->with('create', '1');
    }


    public function show($id)
    {
        $response['course'] = Course::with('subcourses')->find($id);
        return view('admin.course.details.index', $response);
    }


    public function edit($id)
    {

        $response['course'] =  Course::find($id);
        return view('admin.course.edit.index', $response);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'courseName' => 'required|min:5|max:255',
            'image' => 'mimes:jpg,png,jpeg',
            'body' => 'min:10',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('Course');
        } else {
            $file = Course::find($id)->image;
        }

        Course::find($id)->update([
            'image' => $file,
            'courseName' => $request->courseName,
            'body'=> $request->body,
        ]);
        //Logger
        $this->Logger->log('info', 'Editou  um curso com o identificador ' . $id);
        return redirect("admin/curso/show/$id")->with('edit', '1');
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
        $this->Logger->log('info', 'Eliminou um Curso com o identificador ' . $id);
        SubCourse::where('fk_courses_id', $id)->delete();
        Course::find($id)->delete();

        return redirect()->back()->with('destroy', '1');
    }
}
