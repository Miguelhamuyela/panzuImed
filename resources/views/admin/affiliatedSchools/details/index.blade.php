@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes Sobre Escolas Filiadas')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.affiliatedSchools.index') }}"><u>Paróquia/Centro</u></a> >
                {{ $affiliated->name }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="row m-5 align-items-center">

                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-12">
                                        <div class="row align-items-center my-4">
                                            @isset($affiliated->name)
                                            <h3 class="h5 m-4 page-title"><b>Nome do Centro/Paróquia:</b> {{ $affiliated->name }}</h3> <br>
                                            @endisset
                                            @isset($affiliated->email)
                                            <h3 class="h5 m-4 page-title"><b>Email:</b> {{ $affiliated->email }}</h3> <br>
                                            @endisset
                                            @isset($affiliated->tel)
                                            <h3 class="h5 m-4 page-title"><b>Telefone:</b> {{ $affiliated->tel }}</h3> <br>
                                            @endisset
                                            @isset($affiliated->address)
                                            <h3 class="h5 m-4 page-title"><b>Endereço:</b> {{ $affiliated->address }}</h3> <br>
                                            @endisset
                                            @isset($affiliated->site)
                                            <h3 class="h5 m-4 page-title"><b>Nome do Pastor:</b> {{ $affiliated->site }}</h3>
                                            @endisset

                                        </div>

                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-12 mb-2">
                                        <hr>
                                        <p class="mb-1 text-dark"><b>Data de Cadastro:</b> {{ $affiliated->created_at }}
                                        </p>
                                        <p class="mb-1 text-dark"><b>Última Actualização:</b>
                                            {{ $affiliated->updated_at }}
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
