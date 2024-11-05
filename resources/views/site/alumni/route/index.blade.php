@extends('layouts.merge.site')
@section('titulo', 'Percurso')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2>Percurso</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ======= routes Section ======= -->
        <section id="routes" class="routes ">
            <div class="container">


                @isset($aboutRoute)
                    <div class="mt-5" style="text-align: justify;">
                        {!! html_entity_decode($aboutRoute->description) !!}
                    </div>
                @endisset

                <div class="row" data-aos="fade-up" data-aos-delay="200">

                    @isset($route)
                    @foreach ($route as $item)

                        <div class="col-md-4 shadow-lg border-dark mt-3 rounded" data-bs-toggle="modal" data-bs-target="#route-{{$item->id}}">

                            @if (isset($item->image))
                            <div
                                style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:195px;border-radius:5px;'>
                            </div>

                            @else
                            <div
                                style='background-image:url("/site/img/user.png");background-position:center;background-size:cover;height:195px;'>
                            </div>

                            @endif

                            <div class="p-4">

                                <h4>{{ $item->name }}</h4>
                                <div>

                                    {!! html_entity_decode(mb_substr($item->description, 0, 50, 'UTF-8')) !!}...

                                </div>

                            </div>
                        </div>







                        {{----Modal----}}


                        <div class="modal fade" id="route-{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl  modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">

                <h5 style="color:#fc1406;" class="modal-title" id="staticBackdropLabel">Percurso</h5>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div  class="card-body text-center">

                    @if (isset($item->image))
                    <img style="border-radius:4%!important; " src="/storage/{{ $item->image }}" class="mb-3"
                        alt="..." width="150" height="150">
                @else
                <img style="border-radius:4%!important; "  src="/site/img/user.png" class="route-img bg-white"
                        alt="..." width="150" height="150">

                @endif


                    </div>

                    <h6 style="color:#fc1406;" class="">Nome: {{ $item->name }}</h6>

                    <h6 style="color:#fc1406;" class="">Curso: {{ $item->course }}</h6>

                    <h6 style="color:#fc1406;" class="">Ano: {{ $item->class }} </h6>

                    <h6 style="color:#fc1406;" class="">Descrição:  </h6>
                    <div class="text-align: justify;">

                        {!! html_entity_decode($item->description) !!}

                    </div>




            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




                        {{----Modal End-----}}
                    @endforeach
                    @endisset
                </div>

                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 py-5">
                            <b>{{ $route->links() }}</b>
                        </div>
                    </div>
                </div>



            </div>
        </section>
        <!-- End routes Section -->





    </main>

@endsection
