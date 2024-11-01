@extends('layouts.merge.site')
@section('titulo', 'Órgãos do Imed')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2 class="text-white">Órgãos do Imed</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="wrappers py-5">

            <div class="container">
                <div class="row justify-content-center">


                    @foreach ($governieBodie as $item)
                        @if ($item->function == 'Director')

                            <h4 class="text-center">Instrutura  da Direcção</h4>
                            <hr>

                            <div class="col-md-4 shadow-lg border-dark mt-1 rounded" >

                                @if (isset($item->image))
                                <div
                                    style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                                </div>

                                @else
                                <div
                                    style='background-image:url("/site/img/user.png");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                                </div>

                                @endif

                                <div class="p-4">

                                    <h4>{{  $item->name  }}</h4>
                                    <h5>{{ $item->function }}</h5>

                                </div>
                            </div>

                        @endif
                    @endforeach

                </div>

            </div>


            <div class="container">
                <div class="row justify-content-center">


                    @foreach ($governieBodie as $item)
                        @if ($item->function == 'Subdirector Pedagógico' || $item->function == 'Subdirector(a) Administrativo(a)')
                        <div class="col-md-4 shadow-lg border-dark mt-1 rounded" >



                            @if (isset($item->image))
                            <div
                                style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @else
                            <div
                                style='background-image:url("/site/img/user.png");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @endif

                            <div class="p-4">

                                <h4>{{  $item->name  }}</h4>
                                <h5>{{ $item->function }}</h5>

                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>

            </div>

            <div class="container">
                <div class="row justify-content-center">

                    <h4 class="text-center mt-5">Coordenadores</h4>
                    <hr>


                    @foreach ($governieBodie as $item)
                        @if ( ($item->function == 'Coordenador(a) de Gestão de Sistemas Informáticos e Técnico de Informática') || ($item->function == 'Coordenador(a) do Curso de Mecânica e Frio')
                        || ($item->function == 'Coordenador(a) do Curso de Tecnologias de Móveis') || ($item->function == 'Coordenador(a) do Curso de Energia e Instalações Eléctricas')
                        || ($item->function == 'Coordenador do Curso de Desenhado Projectista') || ($item->function == 'Coordenador(a) do Curso de Construção Civil') )
                        <div class="col-md-4 shadow-lg border-dark mt-1 rounded" >



                            @if (isset($item->image))
                            <div
                                style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @else
                            <div
                                style='background-image:url("/site/img/user.png");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @endif

                            <div class="p-4">

                                <h4>{{  $item->name  }}</h4>
                                <h5>{{ $item->function }}</h5>

                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>

            </div>



            <div class="container">
                <div class="row justify-content-center">

                    <h4 class="text-center mt-5">Coordenadores das Actividades</h4>
                    <hr>


                    @foreach ($governieBodie as $item)
                        @if (($item->function == 'Coodenador(a) da Disciplina de Língua Portuguesa') || ($item->function == 'Coodenador(a) da Disciplina de Língua Inglesa')
                        || ($item->function == 'Coodenador(a) da Disciplina de Matemática') || ($item->function == 'Coodenador(a) da Disciplina de Desenho Técnico')
                        || ($item->function == 'Coodenador(a) da Disciplina de Física') || ($item->function == 'Coodenador(a) da Disciplina de Empreendedoriismo')
                        || ($item->function == 'Coodenador(a) da Disciplina de FAI') || ($item->function == 'Coodenador(a) da Disciplina de Química')
                        )
                        <div class="col-md-4 shadow-lg border-dark mt-1 rounded" >



                            @if (isset($item->image))
                            <div
                                style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @else
                            <div
                                style='background-image:url("/site/img/user.png");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @endif

                            <div class="p-4">

                                <h4>{{  $item->name  }}</h4>
                                <h5>{{ $item->function }}</h5>

                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>

            </div>










            <div class="container">
                <div class="row justify-content-center">

                    <h4 class="text-center mt-5">Líderes das Áreas</h4>
                    <hr>


                    @foreach ($governieBodie as $item)
                        @if (($item->function == 'Chefe da Área do Património') || ($item->function == 'Chefe de Secretária Pedagógica') || ($item->function == 'Chefe de Equipa de Segurança')
                        || ($item->function == 'Chefe de Secretaria Administrativa'))

                        <div class="col-md-4 shadow-lg border-dark mt-1 rounded" >



                            @if (isset($item->image))
                            <div
                                style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @else
                            <div
                                style='background-image:url("/site/img/user.png");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @endif

                            <div class="p-4">

                                <h4>{{  $item->name  }}</h4>
                                <h5>{{ $item->function }}</h5>

                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>

            </div>


            <div class="container">
                <div class="row justify-content-center">

                    <h4 class="text-center mt-5">Outros Líderes</h4>
                    <hr>





                    @foreach ($governieBodie as $item)
                        @if ( ($item->function == 'Coordenador(a) da Comissão Disciplinar') || ($item->function == 'Coordenador(a) do Turno da Manhã')
                        || ($item->function == 'Coordenador(a) do Turno da Tarde') || ($item->function == 'Coordenador(a) do Acção Social')
                        || ($item->function == 'Coordenador(a) do GIVA'))
                        <div class="col-md-4 shadow-lg border-dark mt-1 rounded" >



                            @if (isset($item->image))
                            <div
                                style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @else
                            <div
                                style='background-image:url("/site/img/user.png");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @endif

                            <div class="p-4">

                                <h4>{{  $item->name  }}</h4>
                                <h5>{{ $item->function }}</h5>

                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>

            </div>




        </section>

    </main>

@endsection
