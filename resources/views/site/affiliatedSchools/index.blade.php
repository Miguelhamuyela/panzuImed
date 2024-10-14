@extends('layouts.merge.site')
@section('titulo', 'Escolas Filiadas')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="hero-caption hero-caption2">
                                <h2 class="text-white">Escolas Filiadas</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog_area single-post-area section-padding pt-3">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="col-md-12">

                            @isset($affiliated)
                            <div class="accordion" id="accordionExample">
                                @foreach ($affiliated as $item)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $item->id }}">
                                            <button class="accordion-button text-dark bg-white" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                                                {{ $item->name }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $item->id }}" class="accordion-collapse collapse "
                                            aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Nome da Escola: {{ $item->name }} <br>

                                                Email: {{ $item->email }} <br>

                                                Telefone: {{ $item->tel }} <br>

                                                Endereço: {{ $item->address }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            @endisset

                        </div>

                    </div>
                </div>
        </section>

    </main>

@endsection
