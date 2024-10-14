@extends('layouts.merge.site')
@section('titulo', 'Quadro de Honra')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg5 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2>Quadro de Honra</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="wrappers py-5">

            <div class="container">
                <div class="row">
                    @foreach ($honorBoard as $item)
                        <div class="col-lg-3 col-md-4 px-1 my-1">
                            <div
                                style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:250px;'>
                            </div>
                            <h5 class="py-2 text-center"> {{ $item->studentName }}</h5>
                            <p>
                                {!! html_entity_decode($item->body) !!}
                            </p>
                        </div>
                    @endforeach


                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <h6>{{ $honorBoard->links() }}</h6>
                        </div>
                    </div>

                </div>
            </div>

        </section>


    </main>

@endsection
