@extends('layouts.merge.site')
@section('titulo', 'Sobre')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg2 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2>Sobre</h2>
                                <h4 class="text-white">{{ $about->title }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="wrappers py-5">

            <div class="container">
                <div class="row mb-50 mt-50">

                    <div class="col-lg-12">
                        <div style="text-align: justify;">{!! html_entity_decode($about->body) !!}</div>
                    </div>

                </div>

            </div>
        </section>

    </main>
@endsection
