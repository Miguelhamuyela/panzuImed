@extends('layouts.merge.site')
@section('titulo', 'Serviços')
@section('content')

    <main>

        <div class="slider-area">
            <div class="slider-bg3 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2> Serviços</h2>

                                <h4 class="text-white">Oferecemos os Melhores Serviços para a sua Educação.</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <section class="wrappers py-5">

            <div class="container">

                <div class="row">
                    @foreach ($services as $item)
                        <div class="col-lg-4 col-md-6 px-1 my-1">
                            <a href="#">
                                <div
                                    style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:250px;'>
                                </div>
                                <h5 class="py-2"> {{ $item->title }}</h5>
                                {!! html_entity_decode($item->body) !!}
                            </a>

                        </div>
                    @endforeach

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <h6>{{ $services->links() }}</h6>
                        </div>
                    </div>
                </div>
        </section>


    </main>
@endsection
