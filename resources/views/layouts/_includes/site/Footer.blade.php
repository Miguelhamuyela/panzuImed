@if (session('help'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Mensagem Enviada com Sucesso!',
            showConfirmButton: true
        })
    </script>
@endif


<footer>
    <div class="footer-wrapper">
        <div class="footer-area footer-padding ">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6 col-12" style="margin-top: -40px">
                        <a href="{{ route('site.home') }}">
                            <img src="/site/img/hero/logo.png" alt="logo IMED" width="105px" height="130px">
                        </a>
                        <p class="text-white">
                            Igreja Missionária Evangelica do Desenvolvimento
                            <br>
                            Bairro Camama 1 , "Cidade Universitária (Angola)"
                            <br>
                            Email:geral@imed.ao
                        </p>
                        <div class="single-footer-caption">

                            <ul class="footer-social">
                                <li>
                                    @isset($configuration->facebook)
                                        <a class="fb" target="_blank" href="{{ $configuration->facebook }}"><i
                                                class="fab fa-facebook"></i></a>
                                    @endisset
                                </li>
                                <li>
                                    @isset($configuration->instagram)
                                        <a class="ins" target="_blank" href="{{ $configuration->instagram }}"><i
                                                class="fab fa-instagram"></i></a>
                                    @endisset

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>IMED</h4>
                                <ul>

                                    <li><a href="{{ route('site.about') }}">Sobre Imed</a></li>
                                    <li><a href="{{ route('site.missions') }}">Missão</a></li>
                                    <li><a href="{{ route('site.contact') }}"> Contacto</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Oferta Formativa</h4>
                                <ul>

                                    @if (isset($courseMenus))
                                        @foreach ($courseMenus as $item)
                                            <li><a href="{!! url('/curso/' . urlencode($item->courseName)) !!}">{{ $item->courseName }}</a></li>
                                        @endforeach
                                    @endif

                            </div>
                        </div>
                    </div>




                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>OUTROS LINKS</h4>
                                <ul>

                                    <li><a href="{{ route('site.news') }}">Noticia</a></li>
                                    <li><a href="{{ route('site.gallery') }}">Galeria</a></li>
                                    <li><a href="{{ route('site.visions') }}">Visão </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>







                    {{--

   <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Links Rápidos</h4>
                                <ul>
                                    <li><a href="https://governo.gov.ao/" target="_blank">Governo de Angola</a></li>
                                    <li><a href="https://luanda.gov.ao/ao/" target="_blank">Governo Provincial de
                                            Luanda</a></li>
                                    <li><a href="https://med.gov.ao/ao/" target="_blank">Ministério da Educação</a></li>
                                    <li><a href="https://itel.gov.ao/" target="_blank">Instituto de Telecomunicações</a>
                                    </li>
                                    <li><a href="https://webmail.IMED.ao/" target="_blank">Webmail</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>







--}}



                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12 ">
                        <div class="footer-copy-right text-center">
                            <p>
                                IMED © {{ DATE('Y') }} - Todos Direitos Reservados.
                                by
                                <a href="https://imed.gov.ao/" target="_blank">IMED</a>

                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>


<div id="back-top">
    <a class="wrapper" title="Go to Top" href="#">
        <div class="arrows-container">
            <div class="arrow arrow-one">
            </div>

        </div>
    </a>
</div>



<script src="/site/js/vendor/modernizr-3.5.0.min.js"></script>


<script src="/site/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/site/js/popper.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>

<script src="/site/js/owl.carousel.min.js"></script>
<script src="/site/js/slick.min.js"></script>

<script src="/site/js/jquery.slicknav.min.js"></script>
<script src="/site/js/wow.min.js"></script>
<script src="/site/js/jquery.magnific-popup.js"></script>

<script src="/site/js/jquery.counterup.min.js"></script>
<script src="/site/js/waypoints.min.js"></script>
<script src="/site/js/swiper-bundle.min.js"></script>

<script src="/site/js/jquery.form.js"></script>
<script src="/site/js/jquery.validate.min.js"></script>
<script src="/site/js/jquery.ajaxchimp.min.js"></script>
<script src="/site/js/plugins.js"></script>

<script src="/site/js/main.js"></script>


@yield('JS')


</body>

</html>
