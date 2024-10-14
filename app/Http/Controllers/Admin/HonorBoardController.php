<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\HonorBoard;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class HonorBoardController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $response['honorBoard'] = HonorBoard::get();
        //Logger
        $this->Logger->log('info', 'Listou Quadro de Honra');
        return view('admin.honrorBoard.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.honrorBoard.create.index');
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
            'studentName' => 'required|min:5|max:255',
            'body' => 'required|min:5',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        $file = $request->file('image')->store('news');
        $HonorBoard = HonorBoard::create([
            'image' => $file,
            'studentName' => $request->studentName,
            'body' => $request->body,
        ]);
        //Logger
        $this->Logger->log('info', 'Cadastrou um quadro de Honra com nome de estudante ' . $HonorBoard->studentName);

        return redirect("admin/quadro-honra/show/$HonorBoard->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['honorBoard'] =  HonorBoard::find($id);
        return view('admin.honrorBoard.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['honorBoard'] = HonorBoard::find($id);
        return view('admin.honrorBoard.edit.index', $response);
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
            'studentName' => 'required|min:5|max:255',
            'body' => 'required|min:5',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('honorBoard');
        } else {
            $file = HonorBoard::find($id)->image;
        }
        HonorBoard::find($id)->update([
            'image' => $file,
            'studentName' => $request->studentName,
            'body' => $request->body,
        ]);
        //Logger
        $this->Logger->log('info', 'Editou Quadro de honra  com o identificador ' . $id);
        return redirect("admin/quadro-honra/show/$id")->with('edit', '1');
    }


    public function destroy($id)
    {
        //Logger
        $this->Logger->log('info', 'Eliminou um quadro de honra com o identificador ' . $id);
        HonorBoard::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
