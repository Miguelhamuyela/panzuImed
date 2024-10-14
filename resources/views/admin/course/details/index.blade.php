@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes da Galeria')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.course.index') }}"><u>Listar Áreas de Formação</u></a> > {{ $course->courseName }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h3 m-4 page-title">Área de Formação: {{ $course->courseName }}</h2>
                        <div class="row m-5 align-items-center">
                            <div class="col-md-12 mb-2">
                                <h5 class="mb-1">
                                    <b>Descrição:</b>
                                </h5>
                                <p class="text-dark text-justify">{!! html_entity_decode($course->body) !!}</p>

                            </div>
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-10">
                                        <div class="row align-items-center my-4">
                                            <div class="col">
                                                <h2 class="page-title">Capa</h2>
                                            </div>

                                        </div>
                                        <div class="card-deck mb-4">

                                            <div class="card border-0 bg-transparent">
                                                <div class="card-img-top img-fluid rounded"
                                                    style='background-image:url("/storage/{{ $course->image }}");background-position:center;background-size:cover;height:400px;'>
                                                </div>
                                            </div> <!-- .card -->
                                        </div> <!-- .card-deck -->
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-12 mb-2">
                                        <hr>
                                        <p class="mb-1 text-dark"><b>Data de Cadastro:</b> {{ $course->created_at }}
                                        </p>
                                        <p class="mb-1 text-dark"><b>Última Actualização:</b> {{ $course->updated_at }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div> <!-- /.col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->


        </div>
    </div>



    <div class="card mb-2 mt-5">
        <div class="card-body">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="page-title h4">Cursos</h2>
                </div>
                <div class="col-auto">
                    <a type="button" class="btn btn-lg btn-primary text-white"
                     href="{{ url("admin/oferta-formativa/create/{$course->id}") }}">
                        <span class="fa fa-plus fa-16 mr-3"></span>Novo Curso
                    </a>
                </div>
            </div>


            <div class="page-category pb-5">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable-1">
                        <thead class="bg-primary thead-dark">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>CURSO</th>
                                <th class="text-left">ACÇÕES</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">

                            @foreach ($course->subcourses as $item)
                            <tr class="text-center text-dark">
                                <td class="text-left">{{ $item->id }}</td>
                                <td class="text-left">{{ $item->courseName }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href='{{ url("admin/oferta-formativa/show/{$item->id}") }}'
                                                class="dropdown-item">Detalhes</a>

                                            <a href='{{ url("admin/oferta-formativa/edit/{$item->id}") }}'
                                                class="dropdown-item">Editar</a>
                                            <a href='{{ url("admin/oferta-formativa/delete/{$item->id}") }}'
                                                class="dropdown-item">Eliminar</a>


                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </div>




@endsection
