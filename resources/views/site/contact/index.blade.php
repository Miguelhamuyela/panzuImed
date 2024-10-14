@extends('layouts.merge.site')
@section('titulo', 'Contactos')
@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-bg2  hero-overly slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="hero-caption hero-caption2">
                                <h2>Contactos</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="contact-section">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Entrar em Contacto</h2>
                    </div>
                    <div class="col-lg-7">
                        <form class="form-contact contact_form" action="{{ route('site.help.email') }}" method="post"
                            id="contactForm">
                            @csrf
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escreva o seu nome'"
                                            placeholder="Escreva o seu nome">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira o seu Email'"
                                            placeholder="Insira o seu Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira o Assunto'"
                                            placeholder="Insira o Assunto">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="msg" id="message" cols="30" rows="9"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escrever Mensagem'" placeholder=" Escrever Mensagem"></textarea>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                         {!! RecaptchaV3::field('register') !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="form-group ">
                                <button type="submit" class="button button-contactForm boxed-btn">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Localização</h3>

                                @isset($configuration->address)
                                <p>{{ $configuration->address }}</p>
                                @endisset

                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                @isset($configuration->telefone)
                                <h3>{{ $configuration->telefone }}</h3>
                                @endisset

                                <p class="mt-3">
                                    - Aulas: Das 7h-18h <br>
                                    - Área Administrativa: Das 8h – 15h30min
                                </p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                @isset($configuration->email)
                                <h3>{{ $configuration->email }}</h3>
                                @endisset
                                <p>Correio Institucional!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.7717618506163!2d13.218389815385098!3d-8.900799193609814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f5315b67e029%3A0x304b39704e48481d!2sInstituto%20polit%C3%A9cnico%20Industrial%20Kilamba%20Kiaxi%20N%C2%BA%208056%20%22Nova%20Vida%22!5e0!3m2!1spt-PT!2sao!4v1655809100055!5m2!1spt-PT!2sao"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

    </main>

@endsection
