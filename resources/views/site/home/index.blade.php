@extends('layouts.merge.site')
@section('titulo', 'Oficial')
@section('content')
    <main>

        <!-- ====== Slideshow Start ====== -->
        <div class="carousel">
            @if ($slideshows)
                @foreach ($slideshows as $item)
                    <div class="col-md-10"
                        style='background-position:center;background-size:cover;  height:650px; width:100%;background-image: url("/storage/{{ $item->path }}"); box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.2);'>
                        <div class="col-lg-6" style="margin:300px 10px 5px 100px;">
                            @if ($item->title)
                                <h2 class="text-white mb-3  text-left" style="text-shadow: 1px 1px #000; font-size:40px;">
                                    {{ $item->title }}
                                </h2>
                            @endif
                            {{--
                            @if ($item->link)
                                <a href="{{ $item->link }}" class="btn_01 btn_wnat">
                                    {{ $item->button }}
                                </a>
                            @endif
                            --}}
                        </div>


                    </div>
                @endforeach
            @endif
        </div>
        <!-- ====== Slideshow End ====== -->


        {{--
        <section class="brand-area ">
            <div class="container">
                <div class="row wrapper-brand justify-content-center py-5">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50">
                            <h2>Cursos Ministrados</h2>
                        </div>
                    </div>
                    <section class="wrappers">
                        <div class="row">
                            <div class="card-slider">
                                @foreach ($courses as $item)
                                    <div class="card">
                                        <a href="{!! url('/subcurso/' . urlencode($item->courseName)) !!}">
                                            <div class=""
                                                style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:350px;box-shadow: inset 0 0 0 1000px rgba(3, 26, 57, 0.45);'>

                                                <h4 class=" text-light" style="padding: 250px 0 0 20px;">
                                                    {{ $item->courseName }}

                                                </h4>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </section>

--}}



        {{-- news --}}
        <section class="brand-area" style="background-color: #F3F8FF;">
            <div class="container">
                <div class="row wrapper-brand justify-content-center py-5">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50">
                            <h2> Notícias e Eventos</h2>
                        </div>
                    </div>
                    <section class="wrappers ">
                        <div class="row">
                            @foreach ($news as $item)
                                <div class="col-lg-4 col-md-6 px-1 my-1">
                                    <a href="{!! url('/noticia/' . urlencode($item->title)) !!}">
                                        <div
                                            style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:250px;'>
                                        </div>
                                        <h5 class="py-2"> {{ $item->title }}</h5>
                                    </a>

                                </div>
                            @endforeach

                            <div class="col-lg-12 mx-auto text-center">
                                <a href="{{ route('site.news') }}" class="btn btn-primary col-lg-2 mt-2 mb-5">Ver
                                    Mais</a>

                            </div>
                        </div>

                    </section>

                </div>
            </div>
        </section>

        {{-- study in IMED --}}
        <section class="about-area py-5 ">
            <div class="container">
                <div class="row align-items-center wrapper-border">
                    <div class="offset-xxl-1 offset-xl-1 col-xxl-4 col-xl-5 col-lg-6 col-md-9">
                        <div class="about-caption">

                            <div class="mb-25 py-4">
                                <h2>Faça Parte do Nosso Movimento "IMED"</h2>
                                <p class="pt-20 pb-20 text-justify">O pentecostalismo é um movimento do cristão protestante que dá ênfase especial numa experiência direta e pessoal de Deus através do Batismo no Espírito Santo.<br>O termo pentecostal é derivado de Pentecostes, um termo grego que descreve a festa judaica das semanas. Para os cristãos, este evento comemora a descida do Espírito Santo sobre os seguidores de Jesus Cristo, conforme descrito no Atos 2</p>
                                <a href="{{ route('site.about') }}" class="btn_01 btn_wnat">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="offset-xxl-1 offset-xl-1 col-xxl-6 col-xl-5 col-lg-6 col-md-12 p-0">
                        <div class="about-img">
                            <img src="/site/img/gallery/about1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- ======= filiateds Section ======= -->

        <section id="filiateds" class="filiateds">
            <div class="section-tittle text-center mb-50 ">

                <span></span>
                <h3>Paróquia/Centro</h3>
            </div>
            <div class="container">

                <div class="slides-1 swiper" data-aos="fade-up">
                    <div class="swiper-wrapper">


                        @if ($affiliated)
                            @foreach ($affiliated as $item)
                                <div class="swiper-slide">
                                    <div class="filiated-item border-primary">
                                        <h3>{{ $item->name }}</h3>
                                        <h4>
                                            @isset($item->tel)
                                                {{ $item->tel }} |
                                            @endisset


                                            @isset($item->email)
                                                {{ $item->email }}
                                            @endisset
                                        </h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            @isset($item->address)
                                                {{ $item->address }} |
                                            @endisset

                                            @isset($item->site)
                                                {{ $item->site }}
                                            @endisset
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div><!-- End filiated item -->
                            @endforeach
                        @endif


                    </div>

                </div>
                <div class="col-lg-12 mx-auto text-center">
                    <a href="{{ route('site.affiliatedSchools') }}" class="btn btn-primary col-lg-2 mt-2 mb-5">Ver
                        Mais</a>

                </div>

            </div>

        </section><!-- End filiateds Section -->




    </main>


@endsection
@section('CSS')

    <link rel="stylesheet" href="/site/css/card-slide.css">
@endsection
@section('JS')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" />




    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
    <script>
        $(document).ready(function() {
            $('.card-slider').slick({
                dots: false,
                arrows: true,
                slidesToShow: 4,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 1500,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>
    <script>
        $('.carousel').slick({
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',

        });
    </script>
@endsection
