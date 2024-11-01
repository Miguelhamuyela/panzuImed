@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Paróquia/Centro')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Lista de Paróquia/Centro
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table  datatables table-hover table-bordered" id="dataTable-1">
                    <thead class="bg-primary">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>PARÓQUIA/CENTRO</th>
                            <th>TELEFONE</th>
                            <th>EMAIL</th>
                            <th>ENDEREÇO</th>
                            <th>PASTOR</th>
                            <th>ACÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @foreach ($affliated as $item)
                            <tr class="text-center text-dark">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->tel }} </td>
                                <td>{{ $item->email }} </td>
                                <td>{{ $item->address }} </td>
                                <td>{{ $item->site }} </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href='{{ url("admin/escolas-filiadas/show/{$item->id}") }}'
                                                class="dropdown-item">Detalhes</a>

                                            <a href='{{ url("admin/escolas-filiadas/edit/{$item->id}") }}'
                                                class="dropdown-item">Editar</a>
                                            <a href='{{ url("admin/escolas-filiadas/delete/{$item->id}") }}'
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
@endsection
