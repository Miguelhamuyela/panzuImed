@extends('layouts.merge.site')
@section('titulo', 'Detalhes Sobre Curso')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg3 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2>Curso</h2>
                                <h4 class="text-white">{{ $subcourse->courseName }}</h4>
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
                                <img class="img-fluid" src="/storage/{{ $subcourse->image }}" alt="">
                            </div>
                            <div class="blog_details">
                                <div style="text-align: justify;">
                                    {!! html_entity_decode($subcourse->body) !!}
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Outros Cursos</h4>
                                <ul class="list cat-list">
                                    @foreach ($lasted as $item)
                                        <li>
                                            <a href="{!! url('/subcurso/' . urlencode($item->courseName)) !!}" class="d-flex">
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
