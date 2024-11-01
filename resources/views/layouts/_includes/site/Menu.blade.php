<header>
    <div class="header-area">
        <div class="main-header" style="background-color: #fc1406;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="header-top d-none d-sm-block">
                            <div class="d-flex justify-content-between flex-wrap align-items-center">


                                <div class="header-info-right">
                                    <p class="text-light p-0"><marquee> Portal da Igreja Missionária do Evangelho do Desenvolvimento "Sede Bairro do Camama"</marquee>
                                     </p>
                                </div>

                                <div class="header-info-right ">
                                    <ul class="header-social">
                                        <li> @isset($configuration->facebook)
                                                <a href="{{ $configuration->facebook }}" target="_blank"><i
                                                        class="fab fa-facebook text-light"></i></a>
                                            @endisset
                                        </li>
                                        <li>
                                            @isset($configuration->instagram)
                                                <a href="{{ $configuration->instagram }}" target="_blank"><i
                                                        class="fab fa-instagram text-light"></i></a>
                                            @endisset
                                        </li>
                                        <li class="text-light">|</li>
                                        @include('extra._translateButton.index')

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div style="z-index:7;" class="header-bottom  header-sticky">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between flex-wrap position-relative">

                    <div class="left-side d-flex align-items-center">


                        <div class="logo">
                            <a href="{{ route('site.home') }}">
                                <img src="/site/img/hero/logo.png" alt="" width="90px" height="110px">
                            </a>
                        </div>




                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ route('site.home') }}">Início</a></li>


                                     {{--
                                    <li><a href="{{ route('site.home') }}">Oferta Formativa</a>
                                        @if (isset($courseMenus))
                                            <ul class="submenu">
                                                @foreach ($courseMenus as $item)
                                                    <li>
                                                        <a href="{!! url('/curso/' . urlencode($item->courseName)) !!}">{{ $item->courseName }}</a>

                                                        @if (isset($item->subcourses))
                                                            <ul class="submenu" style="margin:-15px 160px;">
                                                                @foreach ($item->subcourses as $item2)
                                                                    @if ($item->id === $item2->fk_courses_id)
                                                                        <li><a
                                                                                href="{!! url('/subcurso/' . urlencode($item2->courseName)) !!}">{{ $item2->courseName }}</a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach

                                            </ul>
                                        @endif
                                    </li>
                                      --}}
                                    <li><a href="{{ route('site.about') }}">Imed</a>

                                        <ul class="submenu">
                                            <li><a href="{{ route('site.about') }}">Quem Somos</a></li>
                                            <li><a href="#">Organigrama</a>
                                                <ul class="submenu" style="margin:-15px 160px;">
                                                    <li><a href="{{ route('site.perfilDirector') }}">
                                                            Pastor Geral</a></li>
                                                    <li><a href="{{ route('site.governingBodie') }}">Outros
                                                            Orgãos</a></li>
                                                    <li><a href="{{ route('site.formerDirector') }}">Ex-Dirigentes</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('site.normative') }}">Documentos </a> </li>
                                            <li><a href="{{ route('site.route') }}">Percurso</a> </li>

                                            </li>



                                        </ul>

                                    </li>
                                    <li><a href="{{ route('site.visions') }}">Visão</a></li>
                                    <li><a href="{{ route('site.missions') }}">Missão</a></li>
                                    <li><a href="{{ route('site.affiliatedSchools') }}">Paróquia/Centro</a></li>
                                    <li><a href="{{ route('site.news') }}">Notícias</a></li>
                                    <li><a href="{{ route('site.gallery') }}">Galerias</a></li>
                                    <li><a href="{{ route('site.contact') }}">Contactos</a></li>


   {{--

                                    <a href="{{ route('admin.home') }}">
                                        <li class="boxed-btn">
                                            Àrea Restrita
                                        </li>
                                    </a>
 --}}
                                </ul>

                            </nav>
                        </div>


                    </div>
                    <div class="col-12">
                        <div class="mobile_menu bg-white d-block d-lg-none">

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</header>
