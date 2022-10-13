@extends('layouts.layout')

@section('SectionSwiperSlider')
    <section class="section section-swiper-absoulte context-dark text-center wow fadeIn">
        <!-- Waves-->
        <canvas class="waves" data-speed="5" data-wave-width="150%" data-animation="SineInOut"></canvas>
        <!-- Swiper Content-->
        <div class="section-swiper-content">
            <div class="container">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10">
                        <div class="badge-promo wow fadeScale" data-wow-delay=".6s">
                            {{-- <span class="badge-promo-text">Próximo nuevo evento 2022</span> --}}
                            {{-- <svg class="badge-promo-icon" width="319" height="49" viewBox="0 0 319 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H319L299 25L319 49H0L20 25L0 0Z" fill="url( #svg-gradient-primary )"></path>
                    <path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd" d="M0 0H319L299 25L319 49L0 0Z" fill="white"></path>
                </svg> --}}
                        </div>
                        <h2 class="wow fadeScale" data-caption-animate="fadeInUp" data-caption-delay="100"
                            data-caption-duration="900">V Congreso Mundial de Investigación Científica</h2>
                        <h4 class="wow fadeInUp text-spacing-200" data-wow-delay=".8s" data-caption-animate="fadeInUp"
                            data-caption-delay="300" data-caption-duration="900">Economía, Sociedad y Ambiente</h4>
                        <!-- List Inline-->
                        <ul class="list-inline list-inline-md wow" data-splitting data-wow-delay="1.5s">
                            <li>
                                <div class="unit unit-spacing-xs align-items-center">
                                    <div class="unit-left line-height-reset">
                                        <svg class="svg-icon-sm svg-icon-primary" role="img">
                                            <use xlink:href="images/svg/sprite.svg#earth-globe"></use>
                                        </svg>
                                    </div>
                                    <div class="unit-body">
                                        <h5 class="text-spacing-100"><span class="big">V Jornada de Investigación
                                                Científica</span></h5>
                                        <h5 class="text-spacing-100"><span class="big">IV Exposición y Divulgación de
                                                Investigación Científica</span></h5>
                                        <h5 class="text-spacing-100"><span class="big">V Concurso "Gregorio
                                                Mendel"</span></h5>
                                    </div>
                                </div>
                            </li>
                            {{-- <li>
                    <div class="unit unit-spacing-xs align-items-center">
                    <div class="unit-left line-height-reset">
                        <svg class="svg-icon-sm svg-icon-primary" role="img">
                        <use xlink:href="images/svg/sprite.svg#small-calendar"></use>
                        </svg>
                    </div>
                    <div class="unit-body">
                        <h5 class="text-spacing-100"><span class="big">
                            <time datetime="2019-01-05">Febrero 20, 2021</time></span></h5>
                    </div>
                    </div>
                </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Thumbnail Video Link-->
            <div class="video-link-wrapper">
                <div class="unit align-items-center">
                    <div class="unit-body text-right">
                        <h5><span class="big">Ver Video<br> Promocional</span></h5>
                    </div>
                    <div class="unit-right"><a class="video-link" href="#" data-lightgallery="item">
                            <div class="video-link-bg" data-triangle=".video-link-overlay"><span
                                    class="video-link-overlay"></span></div><span class="icon fa-play"></span>
                        </a></div>
                </div>
            </div>
        </div>
        <!-- Swiper Slider Absolute-->
        <div class="swiper-container swiper-slider swiper-slider-1" data-loop="true" data-simulate-touch="false"
            data-autoplay="8500" data-direction="horizontal" data-effect="fade">
            <div class="swiper-wrapper">
                <!-- Swiper Slide 01-->
                <div class="swiper-slide" data-slide-bg="images/slide-01-1894x1042.jpg"></div>
                <!-- Swiper Slide 02-->
                <div class="swiper-slide" data-slide-bg="images/slide-02-1894x1042.jpg"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
@endsection

@section('SectionBookYourTicket')
    <section class="parallax-container section" data-parallax-img="images/bg-parallax-01-1894x778.jpg">
        <div class="parallax-content section-lg context-dark text-center parallax-overlay-gradient-primary">
            <div class="container wow fadeIn">
                <!-- Block with content-->
                <div class="block-lg block-center">
                    <h6>El tiempo se acaba</h6>
                    <h3>No esperes más!</h3>
                    <p>Registrate de manera gratuita, para participar de esta gran conferencia</p>
                    <!-- Countdown rectangle-->
                    <div class="countdown countdown-rect" data-countdown="data-countdown" data-to="2022-10-25 16:00:00">
                        <div class="countdown-block box-with-triangle-right wow fadeScale countdown-block-days"
                            data-wow-delay="0s" data-triangle=".countdown-block-overlay">
                            <div class="countdown-block-overlay"></div>
                            <svg class="countdown-circle" x="0" y="0" width="200" height="237"
                                viewbox="0 0 200 237" data-progress-days="">
                                <rect class="countdown-rect-bg" x="0" y="0" width="200" height="237">
                                </rect>
                                <rect class="countdown-rect-fg clipped" x="0" y="0" width="200"
                                    height="237"></rect>
                            </svg>
                            <div class="countdown-wrap">
                                <div class="countdown-counter" data-counter-days="">00</div>
                                <div class="countdown-title">DÍAS</div>
                            </div>
                        </div>
                        <div class="countdown-block box-with-triangle-right wow fadeScale countdown-block-hours"
                            data-wow-delay="0.125s" data-triangle=".countdown-block-overlay">
                            <div class="countdown-block-overlay"></div>
                            <svg class="countdown-circle" x="0" y="0" width="200" height="237"
                                viewbox="0 0 200 237" data-progress-hours="">
                                <rect class="countdown-rect-bg" x="0" y="0" width="200"
                                    height="237"></rect>
                                <rect class="countdown-rect-fg clipped" x="0" y="0" width="200"
                                    height="237"></rect>
                            </svg>
                            <div class="countdown-wrap">
                                <div class="countdown-counter" data-counter-hours="">00</div>
                                <div class="countdown-title">HORAS</div>
                            </div>
                        </div>
                        <div class="countdown-block box-with-triangle-right wow fadeScale countdown-block-minutes"
                            data-wow-delay="0.25s" data-triangle=".countdown-block-overlay">
                            <div class="countdown-block-overlay"></div>
                            <svg class="countdown-circle" x="0" y="0" width="200" height="237"
                                viewbox="0 0 200 237" data-progress-minutes="">
                                <rect class="countdown-rect-bg" x="0" y="0" width="200"
                                    height="237"></rect>
                                <rect class="countdown-rect-fg clipped" x="0" y="0" width="200"
                                    height="237"></rect>
                            </svg>
                            <div class="countdown-wrap">
                                <div class="countdown-counter" data-counter-minutes="">00</div>
                                <div class="countdown-title">MINUTOS</div>
                            </div>
                        </div>
                        <div class="countdown-block box-with-triangle-right wow fadeScale countdown-block-seconds"
                            data-wow-delay="0.375s" data-triangle=".countdown-block-overlay">
                            <div class="countdown-block-overlay"></div>
                            <svg class="countdown-circle" x="0" y="0" width="200" height="237"
                                viewbox="0 0 200 237" data-progress-seconds="">
                                <rect class="countdown-rect-bg" x="0" y="0" width="200"
                                    height="237"></rect>
                                <rect class="countdown-rect-fg clipped" x="0" y="0" width="200"
                                    height="237"></rect>
                            </svg>
                            <div class="countdown-wrap">
                                <div class="countdown-counter" data-counter-seconds="">00</div>
                                <div class="countdown-title">SEGUNDOS</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('SectionBiggest2021DigitalConference')
    <section class="section section-lg bg-default wow fadeIn">
        <div class="container">
            <div class="row row-30 justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <h6>acerca del evento</h6>
                    <h3 class="heading-lg-postfix-15">V Congreso</h3>
                    <p>
                        Se llevarán a cabo diversas ponencias por investigadores renombrados nacionales e internacionales en
                        las temáticas y se llevará a cabo los días 25, 26, 27 y 28 de octubre de 2022.👨‍💼👏
                    </p>
                    <!-- List Inline-->
                    <ul class="list-inline list-inline-xl">
                        <li>
                            <div class="unit">
                                <div class="unit-left">
                                    <svg class="svg-icon-sm svg-icon-primary" role="img">
                                        <use xlink:href="images/svg/sprite.svg#earth-globe"></use>
                                    </svg>
                                </div>
                                <div class="unit-body">
                                    <h5>Actividades</h5>
                                    <p>02 Conversatorios</p>
                                    <p>03 Talleres</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="unit">
                                <div class="unit-left">
                                    <svg class="svg-icon-sm svg-icon-primary" role="img">
                                        <use xlink:href="images/svg/sprite.svg#small-calendar"></use>
                                    </svg>
                                </div>
                                <div class="unit-body">
                                    <h5>Fechas </h5>
                                    <p>
                                        <time datetime="2019-01-05"> 25, 26, 27 y 28 de octubre de 2022</time>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul><a class="button button-primary" href="/regitroform"
                        data-triangle=".button-overlay"><span>Inscribete</span><span class="button-overlay"></span></a>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 text-md-right">
                    <!-- Image Box-->
                    <div class="images-box">
                        <div class="images-box-item images-box-item-right">
                            <div class="wow fadeScale"><img src="images/home-1-01-470x590.jpg" alt=""
                                    width="470" height="590" />
                            </div>
                        </div>
                        <div class="images-box-item images-box-item-left">
                            <div class="wow fadeScale"><img src="images/home-1-02-270x257.jpg" alt=""
                                    width="270" height="257" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('SectionWhoIsSpeaking')
    <section class="parallax-container section" data-parallax-img="images/bg-parallax-02-1894x1950.jpg">
        <div class="parallax-content section-lg context-dark text-center">
            <div class="container">
                <h6 class="text-secondary">Nuestros Ponentes</h6>
                <h3>Conoce a nuestros ponentes.</h3>
                <div class="row row-30">
                    <div class="col-md-6 col-lg-4">
                        <div>
                            <!-- Speaker-->
                            <div class="speaker">
                                <div class="speaker-img" data-triangle=".speaker-overlay">
                                    <div class="speaker-overlay"></div><a href="#"><img src="images/speaker01.jpg"
                                            alt="" width="330" height="354" /></a>
                                    <ul class="speaker-social-list">
                                        <li><a class="icon icon-xs fa-linkedin"
                                                href="https://www.linkedin.com/in/ricardoarbocco/"></a></li>
                                    </ul>
                                </div>
                                <h5 class="speaker-title"><a href="#">Ricardo Arboccó Illescas</a></h5>
                                <p class="speaker-position">Director Corporativo de Tecnología & Sistemas - CIO / CTO en
                                    Grupo Gloria & CEO @Centro</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div>
                            <!-- Speaker-->
                            <div class="speaker">
                                <div class="speaker-img" data-triangle=".speaker-overlay">
                                    <div class="speaker-overlay"></div><a href="#"><img src="images/speaker02.jpg"
                                            alt="" width="330" height="354" /></a>
                                    <ul class="speaker-social-list">
                                        <li><a class="icon icon-xs fa-linkedin"
                                                href="https://www.linkedin.com/in/patricia-fuentes-b8b0812a/"></a></li>
                                    </ul>
                                </div>
                                <h5 class="speaker-title"><a href="#">PATRICIA FUENTES</a></h5>
                                <p class="speaker-position">Gerente de Sistemas / Head of IT Perú en The Adecco Group</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div>
                            <!-- Speaker-->
                            <div class="speaker">
                                <div class="speaker-img" data-triangle=".speaker-overlay">
                                    <div class="speaker-overlay"></div><a href="#"><img
                                            src="images/speaker-05-330x354.jpg" alt="" width="330"
                                            height="354" /></a>
                                    <ul class="speaker-social-list">
                                        <li><a class="icon icon-xs fa-linkedin"
                                                href="https://www.linkedin.com/in/yolanda-cuzma-1a02b721/"></a></li>
                                    </ul>
                                </div>
                                <h5 class="speaker-title"><a href="#">ELIZABET YOLANDA CUZMA CACERES</a></h5>
                                <p class="speaker-position">Gerente de sistemas en Mibanco, banco de la Microempresa </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection

@section('SectionConferenceSchedule')
    <conference-schedule></conference-schedule>
@endsection

@section('SectionOfficialSponsors')
    <section class="parallax-container section" data-parallax-img="images/bg-parallax-04-1894x1170.jpg">
        <div class="parallax-content section-lg context-dark text-center">
            <div class="container">
                <h6>Nuestros Sponsor</h6>
                <h3>Sponsor Oficiales</h3>
                <div class="row row-30 row-lg-50 justify-content-center">
                    <div class="col-sm-5 col-lg-3">
                        <div class="wow">
                            <div>
                                <!-- Sponsor--><a class="sponsor" href="#" data-triangle=".sponsor-overlay">
                                    <div class="sponsor-overlay"></div>
                                    <div class="sponsor-img"><img src="images/sponsor01.png" alt=""
                                            width="117" height="70" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-3">
                        <div class="wow">
                            <div>
                                <!-- Sponsor--><a class="sponsor" target="blank"
                                    href="https://www.facebook.com/ISACAUNT" data-triangle=".sponsor-overlay">
                                    <div class="sponsor-overlay"></div>
                                    <div class="sponsor-img"><img src="images/sponsor02.png" alt=""
                                            width="120" height="83" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-3">
                        <div class="wow">
                            <div>
                                <!-- Sponsor--><a class="sponsor" target="blank"
                                    href="https://www.instagram.com/d_bambuu/" data-triangle=".sponsor-overlay">
                                    <div class="sponsor-overlay"></div>
                                    <div class="sponsor-img"><img src="images/sponsor03.png" alt=""
                                            width="119" height="33" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-3">
                        <div class="wow">
                            <div>
                                <!-- Sponsor--><a class="sponsor" target="blank"
                                    href="https://www.instagram.com/d_bambuu/" data-triangle=".sponsor-overlay">
                                    <div class="sponsor-overlay"></div>
                                    <div class="sponsor-img"><img src="images/sponsor04.png" alt=""
                                            width="119" height="33" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <p class="font-weight-sbold font-secondary"><span class="wow" data-splitting>
                                No lo dudes, contáctalos para obtener una mejor ayuda y servicio de calidad</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="/js/app.js" async defer></script>
@endsection
