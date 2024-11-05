@extends('layouts.merge.dashboard')
@section('titulo', 'Pastor Geral')

@section('content')
    <div class="card mb-2">
        <div class="card-body">

            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="h5 page-title">
                            Pastor Geral
                        </h2>
                    </div>
                    <div class="col-auto">
                        @isset($director)
                            <a type="button" class="btn btn-sm btn-primary text-white"
                                href="{{ url("admin/perfil-do-director/edit/{$director->id}") }}">
                                <span class="fe fe-edit fe-16 mr-2"></span>Editar o Texto
                            </a>
                        @endisset
                    </div>
                </div>
            </div>

        </div>
    </div>
    @isset($director)
        <div class="card shadow">
            <div class="card-body">

                <div class="container-fluid">
                    <div class="row m-4">

                        @if ($director->image)
                        <div class="col-12 mb-4">
                            <div class="row">
                                <div class="col-md-12 text-left mt-2">
                                    <h4>Imagem</h4>
                                </div>
                                <div class="col-md-12 rounded"
                                    style='background-image:url("/storage/{{ $director->image }}");background-position:center;background-size:cover;height:400px;'>
                                </div>
                            </div>
                        </div>
                    @endif

                        <div class="col-md-12 mb-2">

                            <b>Nome:</b>
                            <p class="mb-1 text-dark">
                                <h4> {{ $director->name }}</h4>
                            </p>
                        </div>
                        <div class="col-md-12 mb-2">

                            <b>Corpo:</b><br>
                            <p class="mb-1 text-dark">
                                {!! html_entity_decode($director->description) !!}
                            </p>
                        </div>

                    </div> <!-- .row -->
                    <div class="row align-items-center">
                        <div class="col-md-7 mb-2">
                            <hr>
                            <p class="mb-1 text-dark"><b>Data de Cadastro:</b> {{ $director->created_at }}
                            </p>
                            <p class="mb-1 text-dark"><b>Última Actualização:</b> {{ $director->updated_at }}
                            </p>

                        </div>
                    </div>
                </div> <!-- .container-fluid -->
            </div>
        </div>
    @endisset


@endsection
