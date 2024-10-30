@extends('layouts.merge.site')
@section('titulo', 'Visão')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2>Visão</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="wrappers py-5">

            <div class="container">
                <div class="row">
                    @foreach ($visions as $item)
                        <div class="col-lg-4 col-md-6 px-1 my-1">
                            <a href="{!! url('/visao/' . urlencode($item->title)) !!}">
                                <div
                                    style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:250px;'>
                                </div>
                                <h5 class="py-2"> {{ $item->title }}</h5>
                            </a>

                        </div>
                    @endforeach

                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <h6>{{ $visions->links() }}</h6>
                </div>
            </div>
        </section>

    </main>

@endsection
