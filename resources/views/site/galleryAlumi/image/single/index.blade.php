@extends('layouts.merge.site')
@section('titulo', ' Galerias')
@section('content')

    <main>

        <div class="slider-area">
            <div class="slider-bg10 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <a href="{{ route('site.gallery') }}">
                                    <h2>Galerias de Alumni</h2>
                                </a>
                                <h4 class="text-white">{{ $titleGallery->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="wrappers py-4">

            <div class="container">
                <div class="row">
                    @foreach ($gallery->images as $item)
                        <div class="col-lg-4 col-md-6 px-1 my-1">
                            <a class="" data-fancybox="gallery" data-src="/storage/{{ $item->path }}">

                                <div
                                    style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:250px;;'>


                                </div>

                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


    </main>

@endsection
@section('CSSJS')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection
