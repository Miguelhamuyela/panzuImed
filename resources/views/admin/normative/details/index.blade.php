@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes Sobre Normativos')

@section('content')
    <div class="card mb-2">
        <div class="card-body">

            <div class="col-md-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="h5 page-title">
                            <a href="{{ route('admin.normative.index') }}">
                                <u>Listar Normativos</u>
                            </a>
                            >Normativo com o Ticket
                            {{ $normative->id }}
                        </h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @isset($normative)


        <div class="card shadow">
            <div class="card-body">

                <div class="container-fluid">
                    <div class="row m-4">
                        <div class="col-md-12 mb-2">

                            <b>Título:</b>
                            <p class="mb-1 text-dark">
                                <h4> {{ $normative->title }}</h4>
                            </p>
                        </div>
                        <div class="col-md-12 mb-2">

                            <b>Baixar documento:</b><br>
                            <p class="mb-1 text-dark">
                                <a target="_blank" href="/storage/{{$normative->file}}">Arquivo</a>
                            </p>
                        </div>

                    </div> <!-- .row -->
                    <div class="row align-items-center">
                        <div class="col-md-7 mb-2">
                            <hr>
                            <p class="mb-1 text-dark"><b>Data de Cadastro:</b> {{ $normative->created_at }}
                            </p>
                            <p class="mb-1 text-dark"><b>Última Actualização:</b> {{ $normative->updated_at }}
                            </p>

                        </div>
                    </div>
                </div> <!-- .container-fluid -->
            </div>
        </div>
    @endisset


@endsection