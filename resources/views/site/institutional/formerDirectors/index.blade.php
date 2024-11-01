@extends('layouts.merge.site')
@section('titulo', 'Os Antigo Membros')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2 class="text-white">Os Antigo Membros</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <section class="wrappers py-5">

                <div class="container">
                    <div class="row justify-content-center">


                        @foreach ($formerDirector as $item)
                                <div class="col-md-3 m-1">
                                    <div class="card shadow">
                                        <div class="card-body text-center">
                                            <img src="/storage/{{$item->image}}"
                                                class="mb-3 rounded-circle" alt="..." width="90" height="90">
                                            <h6>{{$item->name}}</h6>
                                            <h6>
                                                <small>
                                                    {{date('Y', strtotime($item->startDate))}} - {{date('Y', strtotime($item->endDate))}}
                                                </small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                    </div>

                </div>



                </div>
            </section>

    </main>

@endsection
