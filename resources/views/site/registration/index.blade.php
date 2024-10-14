@extends('layouts.merge.site')
@section('titulo', 'Matrícula')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="hero-caption hero-caption2">
                                <h2 class="text-white">Matrícula</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog_area single-post-area section-padding pt-3">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="col-md-12">

                            @foreach ($registration as $item)
                            <div class="col-md-4 col-12">
                                <a target="_blank" class="" href="storage/{{$item->file}}">Documento - <b class="text-dark">{{$item->title}}</b></a>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
        </section>

    </main>

@endsection
