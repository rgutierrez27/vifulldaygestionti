@extends('layouts.layout')

@section('SectionSwiperSlider')
    <!-- Section Swiper Slider-->
    <section class="section section-swiper-absoulte context-dark text-center" data-triangle=".section-swiper-content-overlay">
        <!-- Swiper Content-->
        <div class="section-swiper-content section-swiper-content-sm">
            <div class="container">
                <div class="block-promo block-center">
                    {{-- <h4 class="text-spacing-200 wow fadeScale"><span class="text-underline">4 days</span> - <span class="text-underline">12 talk</span> - <span class="text-underline">2 parties</span> --}}
                    </h4>
                    <h2 class="wow" data-splitting>Congresos y Talleres <br> Universidad Católica de Trujillo</h2>
                    <ul class="list-inline list-inline-md">
                        <li>
                            <div class="unit unit-spacing-xs align-items-center wow" data-splitting>
                                <div class="unit-left line-height-reset">
                                    <svg class="svg-icon-sm svg-icon-primary" role="img">
                                        <use xlink:href="images/svg/sprite.svg#earth-globe"></use>
                                    </svg>
                                </div>
                                <div class="unit-body">
                                    <h5 class="text-spacing-100"><span class="big">Trujillo</span></h5>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-xs align-items-center wow" data-splitting>
                                <div class="unit-left line-height-reset">
                                    <svg class="svg-icon-sm svg-icon-primary" role="img">
                                        <use xlink:href="images/svg/sprite.svg#small-calendar"></use>
                                    </svg>
                                </div>

                                @php
                                    $meses_espanol = [
                                        1 => 'Enero',
                                        2 => 'Febrero',
                                        3 => 'Marzo',
                                        4 => 'Abril',
                                        5 => 'Mayo',
                                        6 => 'Junio',
                                        7 => 'Julio',
                                        8 => 'Agosto',
                                        9 => 'Septiembre',
                                        10 => 'Octubre',
                                        11 => 'Noviembre',
                                        12 => 'Diciembre',
                                    ];

                                    $fecha_actual = date('n d, Y'); // Obtiene el número del mes, día y año
                                    $fecha_actual = strtoupper($meses_espanol[intval(date('n'))]) . date(' d, Y');
                                @endphp
                                <div class="unit-body">
                                    <h5 class="text-spacing-100"><span class="big">
                                            <time datetime="2019-01-05">{{ $fecha_actual }}</time></span></h5>
                                </div>
                            </div>
                        </li>
                    </ul>
                    {{-- <div class="group"><a class="button button-secondary box-with-triangle-right wow fadeScale"
                            href="https://youtu.be/nbfFDnKkMvw" data-lightgallery="item"
                            data-triangle=".button-overlay"><span>Como Inscribirse ?</span><span
                                class="button-overlay"></span></a><a class="button button-primary wow fadeScale"
                            href="#" data-triangle=".button-overlay"><span>Ver Eventos</span><span
                                class="button-overlay"></span></a>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Swiper Slider Absolute-->
        <div class="swiper-container swiper-slider swiper-slider-1" data-loop="true" data-simulate-touch="false"
            data-autoplay="8500" data-direction="horizontal" data-effect="fade">
            <div class="swiper-wrapper">
                <!-- Swiper Slide 01-->
                <div class="swiper-slide" data-slide-bg="images/slide-01.jpg"></div>
                <!-- Swiper Slide 02-->
                <div class="swiper-slide" data-slide-bg="images/slide-02.jpg"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="section-swiper-content-overlay"></div>
        <div class="parallax-js-moderm">
            <div class="layer layer-01">
                <svg width="126" height="126" viewbox="0 0 126 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask00" maskunits="userSpaceOnUse" x="0" y="0" width="126"
                        height="126">
                        <path
                            d="M126 63C126 97.7939 97.7939 126 63 126C28.2061 126 0 97.7939 0 63C0 28.2061 28.2061 0 63 0C97.7939 0 126 28.2061 126 63Z">
                        </path>
                    </mask>
                    <g mask="url(#mask00)">
                        <path d="M61.2694 -27.0047L-26.9917 61.2563L-22.5793 65.6687L65.6817 -22.5924L61.2694 -27.0047Z">
                        </path>
                        <path d="M71.0589 -17.2147L-17.2021 71.0464L-12.7898 75.4587L75.4712 -12.8023L71.0589 -17.2147Z">
                        </path>
                        <path d="M80.8724 -7.39484L-7.38867 80.8662L-2.97632 85.2786L85.2847 -2.98249L80.8724 -7.39484Z">
                        </path>
                        <path d="M90.6785 2.42205L2.41748 90.6831L6.82983 95.0955L95.0909 6.83441L90.6785 2.42205Z"></path>
                        <path d="M100.485 12.215L12.2236 100.476L16.636 104.888L104.897 16.6274L100.485 12.215Z"></path>
                        <path d="M110.298 22.0353L22.0371 110.296L26.4495 114.709L114.711 26.4476L110.298 22.0353Z"></path>
                        <path d="M120.095 31.8322L31.8335 120.093L36.2458 124.506L124.507 36.2445L120.095 31.8322Z"></path>
                        <path d="M129.901 41.6452L41.6401 129.906L46.0525 134.319L134.314 46.0575L129.901 41.6452Z"></path>
                        <path d="M139.698 51.4421L51.4365 139.703L55.8489 144.115L144.11 55.8544L139.698 51.4421Z"></path>
                        <path d="M149.521 61.2721L61.2598 149.533L65.6721 153.946L153.933 65.6845L149.521 61.2721Z"></path>
                    </g>
                </svg>
            </div>
            <div class="layer layer-02">
                <svg width="95" height="65" viewbox="0 0 95 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="2.50049" cy="62.5005" r="2.5"></circle>
                    <circle cx="20.5005" cy="62.5005" r="2.5"></circle>
                    <circle cx="38.5005" cy="62.5005" r="2.5"></circle>
                    <circle cx="56.5005" cy="62.5005" r="2.5"></circle>
                    <circle cx="74.5005" cy="62.5005" r="2.5"></circle>
                    <circle cx="92.5005" cy="62.5005" r="2.5"></circle>
                    <circle cx="2.50049" cy="42.5005" r="2.5"></circle>
                    <circle cx="20.5005" cy="42.5005" r="2.5"></circle>
                    <circle cx="38.5005" cy="42.5005" r="2.5"></circle>
                    <circle cx="56.5005" cy="42.5005" r="2.5"></circle>
                    <circle cx="74.5005" cy="42.5005" r="2.5"></circle>
                    <circle cx="92.5005" cy="42.5005" r="2.5"></circle>
                    <circle cx="2.50049" cy="22.5005" r="2.5"></circle>
                    <circle cx="20.5005" cy="22.5005" r="2.5"></circle>
                    <circle cx="38.5005" cy="22.5005" r="2.5"></circle>
                    <circle cx="56.5005" cy="22.5005" r="2.5"></circle>
                    <circle cx="74.5005" cy="22.5005" r="2.5"></circle>
                    <circle cx="92.5005" cy="22.5005" r="2.5"></circle>
                    <circle cx="2.50049" cy="2.50049" r="2.5"></circle>
                    <circle cx="20.5005" cy="2.50049" r="2.5"></circle>
                    <circle cx="38.5005" cy="2.50049" r="2.5"></circle>
                    <circle cx="56.5005" cy="2.50049" r="2.5"></circle>
                    <circle cx="74.5005" cy="2.50049" r="2.5"></circle>
                    <circle cx="92.5005" cy="2.50049" r="2.5"></circle>
                </svg>
            </div>
            <div class="layer layer-03">
                <svg width="26" height="18" viewbox="0 0 26 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 0L25.1244 18H0.875645L13 0Z"></path>
                </svg>
            </div>
            <div class="layer layer-04">
                <svg width="83" height="83" viewbox="0 0 83 83" xmlns="http://www.w3.org/2000/svg">
                    <rect y="41.0122" width="58" height="58" transform="rotate(-45 0 41.0122)"></rect>
                </svg>
            </div>
            <div class="layer layer-05">
                <svg width="103" height="103" viewbox="0 0 103 103" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="60.9647" cy="98.604" r="2.5" transform="rotate(-45 60.9647 98.604)">
                    </circle>
                    <circle cx="73.6928" cy="85.876" r="2.5" transform="rotate(-45 73.6928 85.876)">
                    </circle>
                    <circle cx="86.4208" cy="73.1479" r="2.5" transform="rotate(-45 86.4208 73.1479)">
                    </circle>
                    <circle cx="99.1483" cy="60.4204" r="2.5" transform="rotate(-45 99.1483 60.4204)">
                    </circle>
                    <circle cx="46.8226" cy="84.4619" r="2.5" transform="rotate(-45 46.8226 84.4619)">
                    </circle>
                    <circle cx="59.5507" cy="71.7339" r="2.5" transform="rotate(-45 59.5507 71.7339)">
                    </circle>
                    <circle cx="72.2787" cy="59.0059" r="2.5" transform="rotate(-45 72.2787 59.0059)">
                    </circle>
                    <circle cx="85.0062" cy="46.2783" r="2.5" transform="rotate(-45 85.0062 46.2783)">
                    </circle>
                    <circle cx="32.6806" cy="70.3198" r="2.5" transform="rotate(-45 32.6806 70.3198)">
                    </circle>
                    <circle cx="45.4086" cy="57.5918" r="2.5" transform="rotate(-45 45.4086 57.5918)">
                    </circle>
                    <circle cx="58.1366" cy="44.8638" r="2.5" transform="rotate(-45 58.1366 44.8638)">
                    </circle>
                    <circle cx="18.5385" cy="56.1777" r="2.5" transform="rotate(-45 18.5385 56.1777)">
                    </circle>
                    <circle cx="31.2665" cy="43.4497" r="2.5" transform="rotate(-45 31.2665 43.4497)">
                    </circle>
                    <circle cx="4.39637" cy="42.0356" r="2.5" transform="rotate(-45 4.39637 42.0356)">
                    </circle>
                </svg>
            </div>
            <div class="layer layer-06">
                <div class="layer-06-inner">
                    <svg width="18" height="18" viewbox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="9"></circle>
                    </svg>
                </div>
            </div>
            <div class="layer layer-07">
                <div class="layer-07-inner">
                    <svg width="18" height="18" viewbox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="9"></circle>
                    </svg>
                </div>
            </div>
            <div class="layer layer-08">
                <svg width="198" height="141" viewbox="0 0 198 141" xmlns="http://www.w3.org/2000/svg">
                    <line x1="38.3619" y1="0.646447" x2="178.35" y2="140.634"></line>
                    <line x1="57.3658" y1="0.646447" x2="197.353" y2="140.634"></line>
                    <line x1="0.353553" y1="0.646447" x2="140.341" y2="140.634"></line>
                    <line x1="19.3575" y1="0.646447" x2="159.345" y2="140.634"></line>
                </svg>
            </div>
            <div class="layer layer-09">
                <svg width="122" height="122" viewbox="0 0 122 122" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask11" maskunits="userSpaceOnUse" x="17" y="17" width="87"
                        height="87">
                        <path
                            d="M91.2168 30.4054C108.009 47.198 108.009 74.4241 91.2168 91.2166C74.4242 108.009 47.1981 108.009 30.4056 91.2166C13.613 74.4241 13.613 47.198 30.4056 30.4054C47.1981 13.6129 74.4242 13.6129 91.2168 30.4054Z">
                        </path>
                    </mask>
                    <g mask="url(#mask11)">
                        <path d="M16.5371 18.2077V103.402H20.7962V18.2077H16.5371Z"></path>
                        <path d="M25.9868 18.2078V103.402H30.2459V18.2078H25.9868Z"></path>
                        <path d="M35.4624 18.2107V103.405H39.7215V18.2107H35.4624Z"></path>
                        <path d="M44.9331 18.2161V103.411H49.1922V18.2161H44.9331Z"></path>
                        <path d="M54.3921 18.2097V103.404H58.6511V18.2097H54.3921Z"></path>
                        <path d="M63.8677 18.2126V103.407H68.1267V18.2126H63.8677Z"></path>
                        <path d="M73.3242 18.2131V103.408H77.5833V18.2131H73.3242Z"></path>
                        <path d="M82.7935 18.216V103.411H87.0525V18.216H82.7935Z"></path>
                        <path d="M92.2495 18.2165V103.411H96.5086V18.2165H92.2495Z"></path>
                        <path d="M101.735 18.2199V103.415H105.994V18.2199H101.735Z"></path>
                    </g>
                </svg>
            </div>
            <div class="layer layer-10">
                <svg width="53" height="48" viewbox="0 0 53 48" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.5295 5.85179L52.1481 36.4704L10.3223 47.6776L21.5295 5.85179Z"></path>
                </svg>
            </div>
            <div class="layer layer-11">
                <svg width="26" height="18" viewbox="0 0 26 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 0L25.1244 18H0.875645L13 0Z"></path>
                </svg>
            </div>
        </div>
    </section>
@endsection

{{-- @section('SectionWhoIsSpeaking')
    <section class="parallax-container section" data-parallax-img="https://i.imgur.com/kjrVXyM.jpg">
        <div class="parallax-content section-lg context-dark text-center">
            <div class="container">
                <h6 class="text-secondary">Próximos eventos</h6>
                <h3>Conoce nuestros próximos eventos.</h3>
                <div class="row row-30">
                    @foreach ($events as $event)
                        <div class="col-md-6 col-lg-3">
                            <div>
                                <div class="speaker" style="min-height:140px;">
                                    <h5 class="speaker-title"><a
                                            href="/{{ $event->url_name }}">{{ $event->descripcion }}</a></h5>
                                    <p class="speaker-position">Desde {{ $event->fechainicio }} hasta
                                        {{ $event->fechatermino }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>
@endsection --}}

@section('SectionConferenceSchedule')
    <section class="section section-lg bg-default text-center">
        <div class="container">
            <h6>Cronograma</h6>
            <h3>Facultades</h3>

            <div class="row">



                @foreach ($facultades as $item)
                    @php
                        // generar aleatorio de 3 digitos
                        $aleatorio = rand(100, 999);
                    @endphp
                    <div class="col-md-6">
                        <article class="card card-custom card-corporate">
                            <div class="card-header" role="tab">
                                <div class="card-title"><a class="collapsed" id="accordion1-card-head-hxapwahb"
                                        data-toggle="collapse" data-parent="#accordion1"
                                        href="/{{$aleatorio}}{{$item->estructura}}" aria-controls="accordion1-card-body-onwkttkd"
                                        aria-expanded="false" role="button">
                                        <span class="schedule-classic"><span
                                                class="unit unit-spacing-md align-items-center d-block d-md-flex">
                                                <span class="unit-left">
                                                    <span class="schedule-classic-img">
                                                        <img src="images/icon_facultad.png" alt=""
                                                            width="122" height="122" />
                                                    </span>
                                                </span>
                                                <span class="unit-body">
                                                    <span class="schedule-classic-content">

                                                        <span class="schedule-classic-title heading-4">{{$item->descripcion_estructura}}</span><span class="schedule-classic-author">Por
                                                            <span class="schedule-classic-author-name">Universidad Católica de trujillo</span> </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse" id="accordion1-card-body-onwkttkd"
                                aria-labelledby="accordion1-card-head-hxapwahb" data-parent="#accordion1" role="tabpanel">
                                <div class="card-body">
                                    <p>Ubi est nobilis cobaltum? Domesticus capios ducunt ad demissio. Torquiss favere,
                                        tanquam bassus glos. Vae, hippotoxota! Superbus, mirabilis poetas vix aperto de
                                        teres, germanus amicitia. Vae. Fortis nixs ducunt ad acipenser. A falsis, musa
                                        nobilis gabalium. Cum decor ire, omnes fraticinidaes.</p>
                                    <div class="unit unit-spacing-xxs">
                                        <div class="unit-left">
                                            <svg class="svg-icon-sm svg-icon-primary" role="img">
                                                <use xlink:href="images/svg/sprite.svg#earth-globe"></use>
                                            </svg>
                                        </div>
                                        <div class="unit-body">
                                            <h5>Where</h5>
                                            <p class="font-secondary">Hall 22, Building 2, New York, United States of
                                                America</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach



            </div>









        </div>
    </section>
@endsection

@section('scripts')
@endsection
