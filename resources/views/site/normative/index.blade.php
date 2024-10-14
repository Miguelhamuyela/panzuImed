@extends('layouts.merge.site')
@section('titulo', 'Normativos')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg4 hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="hero-caption hero-caption2">
                                <h2 class="text-white">Normativos</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="wrappers py-5">
            <div class="container">
                <div class="row">
                    @if ($normative)
                        @foreach ($normative as $item)
                            <div class="col-md-4">
                                <div style="text-align:justify;" class=" mt-2 text-justify">
                                    <h5 style="cursor: pointer;" class="text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item->id}}">
                                        {{ $item->title }}
                                    </h5>

                                    <p><a class="text-muted" target="_blank" href="/storage/{{ $item->file }}">Baixar
                                            documento</a></p>
                                </div>

                            </div>


                            <div class="modal fade" id="exampleModal-{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content" style="width: 900px; margin-left: -200px;">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Normativos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



            <div style="height:600px;width:100%;">


                @if (pathinfo($item->file, PATHINFO_EXTENSION) !== 'pdf' )

               @if (  pathinfo($item->file, PATHINFO_EXTENSION) !== 'docx' || pathinfo($item->file, PATHINFO_EXTENSION) !== 'xlsx' )

               <div
                     style='background-image:url("/storage/{{$item->file}}");background-position:;background-size:cover;height:400px;border-radius:5px;'>
                            </div>

               @endif

                @else

                @if (pathinfo($item->file, PATHINFO_EXTENSION) === 'pdf' )
                <embed src="/storage/{{ $item->file}}" type="application/pdf" height="100%" width="100%" >
                @endif
                @endif



                @if (pathinfo($item->file, PATHINFO_EXTENSION) === 'docx' || pathinfo($item->file, PATHINFO_EXTENSION) === 'xlsx' || pathinfo($item->file, PATHINFO_EXTENSION) === 'jpeg' )

                    <div class="text-center">
                        <a  class="text-muted" target="_blank" href="/storage/{{ $item->file }}">

                            <img style="margin-top: -300px;" class="justify-content-center" src="/site/img/RI5kM8Fn9jhxLpjXAgXEmOVMWDuw5OgHBq7hqEJ7.jpg" alt="">
                            <small>Clique no icon para baixar o arquivo</small>
                        </a>
                    </div>


                @endif



            </div>



            </div>

        </div>
    </div>
</div>


                        @endforeach
                    @endif

                </div>

                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 py-5">
                            <b>{{ $normative->links() }}</b>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </main>



@endsection
