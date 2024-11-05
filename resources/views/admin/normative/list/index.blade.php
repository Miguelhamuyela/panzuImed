@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Normativo')

@section('content')

    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Lista de Normativos
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
                        <th>TITULO</th>
                        <th>DOCUMENTO</th>
                        <th>ACÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($normative as $item)
                        <tr class="text-center text-dark">
                            <td>{{ $item->id }}</td>
                            @if ($item->title)
                                <td>{{ $item->title }}</td>
                            @else
                                <td>-</td>
                            @endif
                            @if ($item->file)
                                <td> <a target="_blank" href="/storage/{{ $item->file }}">Documento</a></td>
                            @else
                                <td>-</td>
                            @endif

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href='{{ url("admin/normativos/show/{$item->id}") }}'
                                            class="dropdown-item">Detalhes</a>

                                        <a href='{{ url("admin/normativos/edit/{$item->id}") }}'
                                            class="dropdown-item">Editar</a>
                                        <a href='{{ url("admin/normativos/delete/{$item->id}") }}'
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
