@extends('layouts.merge.site')
@section('titulo', 'Pastor Geral')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="hero-caption hero-caption2">
                                <h2 class="text-white">Pastor Geral</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if ($director)
            <section class="wrappers py-5">
                <div class="container">


                    <div class="row">
                        <!-- imed-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="card border-0 bg-transparent">
                                <div class="card-img-top rounded"
                                    style='background-image:url("/storage/{{ $director->image }}");background-position:center;background-size:cover;height:710px;'>
                                </div>
                            </div>
                        </div>

                        <!-- single-well end-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="well-middle">
                                <div class="single-well">
                                    <h4 class="sec-head">{{ $director->name }}</h4>
                                    <p>
                                    </p>
                                    <p style="text-align: justify;">
                                        {!! html_entity_decode($director->description) !!}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <!-- End col-->
                    </div>

                </div>
            </section>
        @endif

    </main>

@endsection
