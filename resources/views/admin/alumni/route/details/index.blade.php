@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes Sobre Percurso')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.route.index') }}"><u>Listar Percursos</u></a> > {{ $route->name }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h5 m-4 page-title"><b>Nome:</b> {{ $route->name }}</h2>
                        <h2 class="h5 m-4 page-title"><b>Curso:</b> {{ $route->course }}</h2>
                        <h2 class="h5 m-4 page-title"><b>Ano:</b> {{ $route->class }}</h2>



                        <h3 class="m-4">Descrição sobre o percurso do aluno:</h3>
                        <div class="m-4">
                            <p class="text-dark text-justify">{!! html_entity_decode($route->description) !!}</p>
                        </div>


                        <div class="row m-5 align-items-center">

                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-12">
                                        <div class="row align-items-center my-4">
                                            <div class="col">
                                                <h2 class="page-title">Foto</h2>
                                            </div>

                                        </div>

                                        @if (isset($route->image))
                                        <div class="card-deck mb-4">

                                            <div class="card border-0 bg-transparent">
                                                <img class="img-fluid" src="/storage/{{ $route->image }}">
                                            </div> <!-- .card -->
                                        </div> <!-- .card-deck -->

                                        @else

                                        <div class="card-deck mb-4">

                                            <div class="card border-0 bg-transparent">
                                                <img width="300px" class="img-fluid" src="/site/img/user.png">
                                            </div> <!-- .card -->
                                        </div> <!-- .card-deck -->

                                        @endif

                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-12 mb-2">
                                        <hr>
                                        <p class="mb-1 text-dark"><b>Data de Cadastro:</b> {{ $route->created_at }}
                                        </p>
                                        <p class="mb-1 text-dark"><b>Última Actualização:</b> {{ $route->updated_at }}
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



@endsection
