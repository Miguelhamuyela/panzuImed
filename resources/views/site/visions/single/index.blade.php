@extends('layouts.merge.site')
@section('titulo', 'Detalhes da Visão')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <a href="{{ route('site.visions') }}">
                                    <h2>Visão</h2>
                                </a>
                                <h4 class="text-white">{{ $visions->title }}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog_area single-post-area section-padding pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="/storage/{{ $visions->path }}" alt="" width="300">
                            </div>
                            <div class="blog_details">

                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><i class="fa fa-date"></i>Postado em:
                                        {{ date('d/m/Y', strtotime($visions->date)) }}
                                    </li>
                                </ul>

                                <div style="text-align: justify;">
                                   <p>{!!html_entity_decode($visions->body)!!}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title text-primary">Outras Visões</h3>
                                @foreach ($lasted as $item)
                                    <div class="media post_item">

                                        <img src="/storage/{{ $item->path }}" alt="post" class="img-fluid"
                                            style="max-width: 150px;">
                                        <div class="media-body">
                                            <a href="{!! url('/noticia/' . urlencode($item->title)) !!}">
                                                <h3 class="text-primary">{{ $item->title }}</h3>
                                            </a>
                                            <p>
                                                {{ date('d-m-Y', strtotime($item->date)) }}</p>
                                        </div>
                                    </div>
                                @endforeach



                            </aside>



                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

@endsection
