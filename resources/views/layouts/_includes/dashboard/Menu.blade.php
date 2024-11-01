<nav class="topnav navbar navbar-light bg-white">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fe fe-user fe-16"></span>

            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('admin.user.show', Auth::User()->id) }}">Perfil</a>
                <a class="dropdown-item" href="{{ route('admin.user.edit', Auth::user()->id) }}">Configurações</a>
                <a class="nav-link text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Terminar a Sessão
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </ul>

    @if (null !== Auth::user())
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
                data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <!-- nav bar -->
                <div class="w-100  d-flex">
                    <a class="navbar-brand mx-auto  flex-fill text-center" href="{{ route('admin.home') }}">
                        <img src="/site/img/hero/logo.png" height="125" style="width:50%; margin:auto" />

                    </a>
                </div>

                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Painel</span>
                    </p>
                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="{{ route('admin.home') }}">
                                <i class="fe fe-home fe-16"></i>
                                <span class="ml-3 item-text">Painel</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="{{ route('site.home') }}" target="_blank">
                                <i class="fe fe-globe fe-16"></i>
                                <span class="ml-3 item-text">Site</span>
                            </a>
                        </li>
                    </ul>


                    @if ('Editor' == Auth::user()->level || 'Administrador' == Auth::user()->level)
                        {{-- Menu de Utilizadores --}}
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Sobre </span>
                        </p>
                        <ul class="navbar-nav flex-fill w-100 mb-2">
                            <li class="nav-item w-100">
                                <a class="nav-link" href="{{ route('admin.about.show') }}">

                                    <i class="fe fe-message-square "></i>
                                    <span class="ml-3 item-text">Sobre Nós</span>
                                </a>
                            </li>
                            {{-- Menu Institucional --}}
                            <li class="nav-item dropdown">
                                <a href="#institutional" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle nav-link">
                                    <i class="fe fe-layers"></i>
                                    <span class="ml-3 item-text">Instrutura da imed</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="institutional">

                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.perfilDirector.show') }}">
                                            <span class="ml-1 item-text">Pastor Geral</span>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a href="#governingBodie" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle pl-3 nav-link">
                                            <span class="ml-1 item-text">Órgãos da Imed</span>
                                        </a>

                                        <ul class="collapse list-unstyled pl-4 w-100" id="governingBodie">

                                            <li class="nav-item">
                                                <a class="nav-link pl-3"
                                                    href="{{ route('admin.governingBodie.create') }}">
                                                    <span class="ml-1 item-text">Cadastrar Órgão da Imed</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link pl-3"
                                                    href="{{ route('admin.governingBodie.index') }}">
                                                    <span class="ml-1 item-text">Listar Órgão da Imed</span>
                                                </a>
                                            </li>

                                        </ul>

                                    </li>

                                    <li class="nav-item dropdown">
                                        <a href="#formerDirector" data-toggle="collapse" aria-expanded="false"
                                            class="dropdown-toggle pl-3 nav-link">
                                            <span class="ml-1 item-text">Ex-Órgão</span>
                                        </a>

                                        <ul class="collapse list-unstyled pl-4 w-100" id="formerDirector">

                                            <li class="nav-item">
                                                <a class="nav-link pl-3"
                                                    href="{{ route('admin.formerDirector.create') }}">
                                                    <span class="ml-1 item-text">Cadastrar Ex-Órgão</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link pl-3"
                                                    href="{{ route('admin.formerDirector.index') }}">
                                                    <span class="ml-1 item-text">Listar Ex-Órgão</span>
                                                </a>
                                            </li>

                                        </ul>

                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#normative" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle nav-link">
                                    <i class="fe fe-layers"></i>
                                    <span class="ml-3 item-text"> Documento</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="normative">

                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.normative.create') }}">
                                            <span class="ml-1 item-text">Cadastrar Novo Documento </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.normative.index') }}">
                                            <span class="ml-1 item-text">Listar Documento </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{--

                            <li class="nav-item dropdown">
                                <a href="#registration" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle nav-link">
                                    <i class="fe fe-layers"></i>
                                    <span class="ml-3 item-text"> Informações da Matrícula</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="registration">

                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.registration.create') }}">
                                            <span class="ml-1 item-text">Cadastrar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.registration.index') }}">
                                            <span class="ml-1 item-text">Listar </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                           news --}}

                            <li class="nav-item dropdown">
                                <a href="#affiliateSchools" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle nav-link">
                                    <i class="fe fe-layers"></i>
                                    <span class="ml-3 item-text"> Paróquia/Centro </span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="affiliateSchools">

                                    <li class="nav-item">
                                        <a class="nav-link pl-3"
                                            href="{{ route('admin.affiliatedSchools.create') }}">
                                            <span class="ml-1 item-text">Nova Paróquia/Centro </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.affiliatedSchools.index') }}">
                                            <span class="ml-1 item-text">Listar Paróquia/Centro </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        </ul>

                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Alumni</span>
                        </p>
                        <ul class="navbar-nav flex-fill w-100 mb-2">
                            <li class="nav-item dropdown">
                                <a href="#route" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle nav-link">
                                    <i class="fe fe-layers"></i>
                                    <span class="ml-3 item-text"> Percurso</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="route">

                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.route.create') }}">
                                            <span class="ml-1 item-text">Cadastrar Percurso </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.route.index') }}">
                                            <span class="ml-1 item-text">Listar Percurso </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#alumniGallery" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle nav-link">
                                    <i class="fe fe-instagram"></i>
                                    <span class="ml-3 item-text"> Galeria de Alumni</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="alumniGallery">

                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.alumniGallery.create') }}">
                                            <span class="ml-1 item-text">Cadastrar Galerias </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="{{ route('admin.alumniGallery.index') }}">
                                            <span class="ml-1 item-text">Listar Galerias </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>





                        {{-- Menu de slideshow --}}
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Slideshow </span>
                        </p>
                        <li class="nav-item dropdown">
                            <a href="#slideshow" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-layers"></i>
                                <span class="ml-3 item-text"> Slideshows</span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="slideshow">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.slideshow.create') }}">
                                        <span class="ml-1 item-text">Cadastrar Slideshow </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.slideshow.index') }}">
                                        <span class="ml-1 item-text">Listar Slideshows </span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        {{-- Menu de Oferta Formativa --}}
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Oferta Formativa </span>
                        </p>
                        <li class="nav-item dropdown">
                            <a href="#cursos" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-book"></i>
                                <span class="ml-3 item-text"> Oferta Formativa</span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="cursos">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.course.create') }}">
                                        <span class="ml-1 item-text">Cadastrar Oferta Formativa</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.course.index') }}">
                                        <span class="ml-1 item-text">Listar Oferta Formativa</span>
                                    </a>
                                </li>

                            </ul>
                        </li>



                        {{-- Menu de Quadro de Honra --}}


                        {{--
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Quadro de Honra </span>
                        </p>
                        <li class="nav-item dropdown">
                            <a href="#honorBoard" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-users"></i>
                                <span class="ml-3 item-text"> Quadro de Honra</span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="honorBoard">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.honorBoard.create') }}">
                                        <span class="ml-1 item-text">Cadastrar Quadro </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.honorBoard.index') }}">
                                        <span class="ml-1 item-text">Listar Quadro </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        --}}



                        {{-- Menu de Galeria --}}
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Galeria </span>
                        </p>
                        <li class="nav-item dropdown">
                            <a href="#gallery" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-instagram"></i>
                                <span class="ml-3 item-text"> Galerias</span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="gallery">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.gallery.create') }}">
                                        <span class="ml-1 item-text">Cadastrar Galerias </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.gallery.index') }}">
                                        <span class="ml-1 item-text">Listar Galerias </span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        {{-- Menu de Notícias --}}
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Notícias </span>
                        </p>
                        <li class="nav-item dropdown">
                            <a href="#news" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-rss fe-16"></i>
                                <span class="ml-3 item-text"> Notícias </span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="news">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.news.create') }}">
                                        <span class="ml-1 item-text">Cadastrar Notícia</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.news.index') }}">
                                        <span class="ml-1 item-text">Listar Notícias</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        {{-- Menu de Visão --}}
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Visão </span>
                        </p>
                        <li class="nav-item dropdown">
                            <a href="#visions" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-rss fe-16"></i>
                                <span class="ml-3 item-text"> Visão </span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="visions">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.visions.create') }}">
                                        <span class="ml-1 item-text">Cadastrar a Visão</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.visions.index') }}">
                                        <span class="ml-1 item-text">Listar a Visão</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a href="#missions" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-rss fe-16"></i>
                                <span class="ml-3 item-text"> Missão </span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="missions">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.missions.create') }}">
                                        <span class="ml-1 item-text">Cadastrar a Missão</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.visions.index') }}">
                                        <span class="ml-1 item-text">Listar a Missão</span>
                                    </a>
                                </li>
                            </ul>
                        </li>




                        {{-- Menu de Parceiros --}}
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Parceiros </span>
                        </p>
                        <li class="nav-item dropdown">
                            <a href="#parceiro" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-instagram"></i>
                                <span class="ml-3 item-text"> Parceiros</span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="parceiro">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.partner.create') }}">
                                        <span class="ml-1 item-text">Cadastrar Parceiros </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.partner.index') }}">
                                        <span class="ml-1 item-text">Listar Parceiros </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif



                    @if ('Administrador' == Auth::user()->level)
                        {{-- Menu de Utilizadores --}}
                        <p class="text-muted nav-heading mt-2 mb-1">
                            <span> Utilizadores</span>
                        </p>
                        <li class="nav-item dropdown">
                            <a href="#user" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle nav-link">
                                <i class="fe fe-user-plus fe-16"></i>
                                <span class="ml-3 item-text"> Utilizadores</span>
                            </a>
                            <ul class="collapse list-unstyled pl-4 w-100" id="user">

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('register') }}">
                                        <span class="ml-1 item-text">Cadastrar Utilizador</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('admin.user.index') }}">
                                        <span class="ml-1 item-text">Listar Utilizadores</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif


                    @if ('Editor' == Auth::user()->level || 'Administrador' == Auth::user()->level)
                        {{-- Menu de Configurações --}}
                        <p class="text-muted nav-heading mt-4 mb-1">
                            <span>Configurações</span>
                        </p>
                        <ul class="navbar-nav flex-fill w-100 mb-2">
                            <li class="nav-item w-100">
                                <a class="nav-link" href="{{ route('admin.configuration.show') }}">

                                    <i class="fe fe-settings fe-16"></i>
                                    <span class="ml-3 item-text">Configurações</span>
                                </a>
                            </li>
                        </ul>
                    @endif

                </ul>

            </nav>
        </aside>

    @endif

</nav>
