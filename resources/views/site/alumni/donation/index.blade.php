@extends('layouts.merge.site')
@section('titulo', 'Doações')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <a href="{{ route('site.donation') }}">
                                    <h2>Doações</h2>
                                </a>
                                <h4 class="text-white">{{ $donation->title }}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog_area single-post-area section-padding pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="/storage/{{ $donation->image }}" alt="{{$donation->title}}"  style="width: 800px;max-width:800px;height:400px;">
                            </div>
                            <div class="blog_details">
                                <p class="text-justify">
                                    {!! html_entity_decode($donation->body) !!}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main>

@endsection
