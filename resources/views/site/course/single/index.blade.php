@extends('layouts.merge.site')
@section('titulo', 'Detalhes do Curso')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg3 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">

                                <h2>Área de Formação</h2>

                                <h4 class="text-white">{{ $course->courseName }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">

                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="/storage/{{ $course->image }}" alt="">
                            </div>
                            <div class="blog_details">
                                <div style="text-align: justify;">
                                    {!! html_entity_decode($course->body) !!}
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Outras Áreas de Formação</h4>
                                <ul class="list cat-list">
                                    @foreach ($lasted as $item)
                                        <li>
                                            <a href="{!! url('/curso/' . urlencode($item->courseName)) !!}" class="d-flex">
                                                <p>{{ $item->courseName }}</p>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </aside>


                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

@endsection
