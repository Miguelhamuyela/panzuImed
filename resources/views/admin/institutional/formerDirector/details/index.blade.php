@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes sobre Ex-Directores')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.formerDirector.index') }}"><u>Listar Ex-Directores</u></a> > {{ $formerDirector->name }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="h5 m-4 page-title"><b>Nome:</b> {{ $formerDirector->name }}</h2>
                        <h2 class="h5 m-4 page-title"><b>Tempo do Mandato:</b> {{ date('Y', strtotime($formerDirector->startDate))}} - {{ date('Y', strtotime($formerDirector->endDate))}}</h2>
                        <div class="row m-5 align-items-center">

                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-12">
                                        <div class="row align-items-center my-4">
                                            <div class="col">
                                                <h2 class="page-title">Foto</h2>
                                            </div>

                                        </div>
                                        <div class="card-deck mb-4">

                                            <div class="card border-0 bg-transparent">
                                                <img src="/storage/{{ $formerDirector->image }}" width="50%">
                                            </div> <!-- .card -->
                                        </div> <!-- .card-deck -->
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-12 mb-2">
                                        <hr>
                                        <p class="mb-1 text-dark"><b>Data de Cadastro:</b> {{ $formerDirector->created_at }}
                                        </p>
                                        <p class="mb-1 text-dark"><b>Última Actualização:</b> {{ $formerDirector->updated_at }}
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