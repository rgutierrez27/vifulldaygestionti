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
            <div class="video-link-wrapper d-none">
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
                        las temáticas y se llevará a cabo los días 25, 26, 27 y 28 de octubre de 2022.
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
                                    <p>• 02 Conversatorios <br> • 03 taller <br> • Concurso de Gregorio Mendel <br> • Jornada de investigación</p>
                                    {{-- <p>03 Talleres</p> --}}
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
                    </ul>
                    <div class="row">
                        <div class="col-12">
                            <a class="button button-primary" href="/regitroform"
                        data-triangle=".button-overlay"><span>Inscribete</span><span class="button-overlay"></span>
                            </a>
                            <a class="button button-primary" href="https://drive.google.com/drive/folders/13R-E2KVxkT3KI7vc1oSh8ptNQFadxYQZ" target="_blank" style="margin-top: 0px !important; margin-left: 10px !important;"
                                data-triangle=".button-overlay"><span>Descargar Programa</span><span class="button-overlay"></span>
                            </a>
                        </div>
                    </div>

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

                    <?php
$ponentes[] = new stdClass();
                        $ponentes[0]->name = 'Dr. Jardelino Menegat';
                        $ponentes[0]->role = 'Investigador';
                        $ponentes[0]->image = 'images/ponentes/2.jpg';
                        $ponentes[0]->description = 'Brasil - Universidad La Salle, Canoas - RS';
                        $ponentes[0]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[1]->name = 'Dr. Carlos Alberto Gallego Monsalve';
                        $ponentes[1]->role = 'Investigador';
                        $ponentes[1]->image = 'images/ponentes/Carlos-Alberto-Gallego-Monsalve.jpg';
                        $ponentes[1]->description = 'Colombia - Universidad Católica del Oriente';
                        $ponentes[1]->facebook = '#';


                        $ponentes[] = new stdClass();
                        $ponentes[2]->name = 'Dr. Domingo de Jesús Ríos Giraldot';
                        $ponentes[2]->role = 'Investigador';
                        $ponentes[2]->image = 'images/ponentes/Domingo-Ríos.jpg';
                        $ponentes[2]->description = 'Colombia - Universidad Católica del Oriente';
                        $ponentes[2]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[3]->name = 'Dr. Julio Zurita';
                        $ponentes[3]->role = 'Investigador';
                        $ponentes[3]->image = 'images/ponentes/Dr.-Julio-Zurita.jpg';
                        $ponentes[3]->description = 'Ecuador - Universidad Católica del Ecuador';
                        $ponentes[3]->facebook = '#';


                        $ponentes[] = new stdClass();
                        $ponentes[4]->name = 'Dra. Judith Pino';
                        $ponentes[4]->role = 'Investigador';
                        $ponentes[4]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[4]->description = 'Ecuador - Universidad Católica del Ecuador';
                        $ponentes[4]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[5]->name = 'Dr. José Luis Retolaza Avalos';
                        $ponentes[5]->role = 'Investigador';
                        $ponentes[5]->image = 'images/ponentes/5.jpg';
                        $ponentes[5]->description = 'España - Universidad de Deusto';
                        $ponentes[5]->facebook = '#';


                        $ponentes[] = new stdClass();
                        $ponentes[6]->name = 'Sra. Marina Bustamante';
                        $ponentes[6]->role = 'Investigador';
                        $ponentes[6]->image = 'images/ponentes/Sra-Marina-Bustamante.png';
                        $ponentes[6]->description = 'Fundadora Renzo Costa';
                        $ponentes[6]->facebook = '#';


                        $ponentes[] = new stdClass();
                        $ponentes[7]->name = 'Lic. Hernán Alonso Gonzales Valdivia';
                        $ponentes[7]->role = 'Investigador';
                        $ponentes[7]->image = 'images/ponentes/Alonso-Gonzales.jpg';
                        $ponentes[7]->description = 'Gerente General NPG';
                        $ponentes[7]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[8]->name = 'Dr. José Raymundo Reyes Rodríguez';
                        $ponentes[8]->role = 'Investigador';
                        $ponentes[8]->image = 'images/ponentes/4.jpg';
                        $ponentes[8]->description = '';
                        $ponentes[8]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[9]->name = 'Dr. Oscar Humberto Moreno Rubiños';
                        $ponentes[9]->role = 'Investigador';
                        $ponentes[9]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[9]->description = '';
                        $ponentes[9]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[10]->name = 'Ing. Luis Fernando Rodríguez Salvador';
                        $ponentes[10]->role = 'Investigador';
                        $ponentes[10]->image = 'images/ponentes/Luis-Fernando-Rodriguez-Salvador.jpg';
                        $ponentes[10]->description = '';
                        $ponentes[10]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[11]->name = 'Dra. Haydee Maricela Mora Amezcua';
                        $ponentes[11]->role = 'Investigador';
                        $ponentes[11]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[11]->description = '';
                        $ponentes[11]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[12]->name = 'Dr. Hernán Vera Rodríguez';
                        $ponentes[12]->role = 'Investigador';
                        $ponentes[12]->image = 'images/ponentes/Dr-Hernan-A-Vera.jpg';
                        $ponentes[12]->description = 'Puerto Rico - Pontificia Universidad Católica de Puerto Rico';
                        $ponentes[12]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[13]->name = 'Dra. Delia Izaguirre';
                        $ponentes[13]->role = 'Investigador';
                        $ponentes[13]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[13]->description = '';
                        $ponentes[13]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[14]->name = 'Ing. Fernando Saldaña Mila';
                        $ponentes[14]->role = 'Investigador';
                        $ponentes[14]->image = 'images/ponentes/7.jpg';
                        $ponentes[14]->description = '';
                        $ponentes[14]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[15]->name = 'Mg. Andrea Machain';
                        $ponentes[15]->role = 'Investigador';
                        $ponentes[15]->image = 'images/ponentes/10.jpg';
                        $ponentes[15]->description = '';
                        $ponentes[15]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[16]->name = 'MSc. Mónica Ximena Guzmán Rojo';
                        $ponentes[16]->role = 'Investigador';
                        $ponentes[16]->image = 'images/ponentes/8.jpg';
                        $ponentes[16]->description = 'Bolivia - Universidad Católica Boliviana San Pablo';
                        $ponentes[16]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[17]->name = 'Dr. Marco Antonio Quesada Chaves';
                        $ponentes[17]->role = 'Investigador';
                        $ponentes[17]->image = 'images/ponentes/3.jpg';
                        $ponentes[17]->description = 'Costa Rica - Universidad Católica de Costa Rica';
                        $ponentes[17]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[18]->name = 'Dra. Delia Margarita Izaguirre Torres.';
                        $ponentes[18]->role = 'Investigador';
                        $ponentes[18]->image = 'images/ponentes/11.jpg';
                        $ponentes[18]->description = '';
                        $ponentes[18]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[19]->name = 'Dra PhD Lola Rojas Infantas.';
                        $ponentes[19]->role = 'Investigador';
                        $ponentes[19]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[19]->description = '';
                        $ponentes[19]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[20]->name = 'Mg Ing. Fernando Arístides Saldaña Milla.';
                        $ponentes[20]->role = 'Investigador';
                        $ponentes[20]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[20]->description = '';
                        $ponentes[20]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[21]->name = 'MSc. María Pilar Ruiz Santillán.';
                        $ponentes[21]->role = 'Investigador';
                        $ponentes[21]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[21]->description = '';
                        $ponentes[21]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[22]->name = 'Mg Genara Antonia Castillo Contreras';
                        $ponentes[22]->role = 'Investigador';
                        $ponentes[22]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[22]->description = '';
                        $ponentes[22]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[23]->name = 'Dr. José Joaquín Piña Mondragón';
                        $ponentes[23]->role = 'Investigador';
                        $ponentes[23]->image = 'images/ponentes/Dr.-José-Joaquín-Piña-Mondragón.png';
                        $ponentes[23]->description = 'México - Universidad Marista de Querétaro';
                        $ponentes[23]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[24]->name = 'Mg. Amado Abdías Solano Sare';
                        $ponentes[24]->role = 'Investigador';
                        $ponentes[24]->image = 'images/ponentes/FOTO-AMADO-SOLANO.png';
                        $ponentes[24]->description = '';
                        $ponentes[24]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[25]->name = 'Dra. Yesenia Coronel Huamán';
                        $ponentes[25]->role = 'Investigador';
                        $ponentes[25]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[25]->description = '';
                        $ponentes[25]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[26]->name = 'Ing. Roger Rodríguez Rojas';
                        $ponentes[26]->role = 'Investigador';
                        $ponentes[26]->image = 'images/ponentes/Ing.-Roger-Rodríguez-Rojas.jpg';
                        $ponentes[26]->description = 'Gerente General de Sedalid';
                        $ponentes[26]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[27]->name = 'Mg. Angel Francisco Polo Campos';
                        $ponentes[27]->role = 'Investigador';
                        $ponentes[27]->image = 'images/ponentes/Mg.--Angel-Polo-CELL.jpg';
                        $ponentes[27]->description = '';
                        $ponentes[27]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[28]->name = 'Dra. Vania Elisabete Schneider';
                        $ponentes[28]->role = 'Investigador';
                        $ponentes[28]->image = 'images/ponentes/Dra-Vania-Elisabete-Schneider.jpg';
                        $ponentes[28]->description = 'Brasil - Universidad de Caxias Do Sul';
                        $ponentes[28]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[29]->name = 'Arq. Horacio Cangelosi';
                        $ponentes[29]->role = 'Investigador';
                        $ponentes[29]->image = 'images/ponentes/1.jpg';
                        $ponentes[29]->description = 'Argentina - Federación Internacional de Sociedades Científicas';
                        $ponentes[29]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[30]->name = 'Dr. Ing. Paul Sharratt PhD';
                        $ponentes[30]->role = 'Investigador';
                        $ponentes[30]->image = 'images/ponentes/9.jpg';
                        $ponentes[30]->description = 'Inglaterra - Instituto de Investigaciones Singapur';
                        $ponentes[30]->facebook = '#';

                        $ponentes[] = new stdClass();
                        $ponentes[31]->name = 'Dr. Francisco Alejandro Espinoza Polo';
                        $ponentes[31]->role = 'Investigador';
                        $ponentes[31]->image = 'images/ponentes/ponente-default.jpg';
                        $ponentes[31]->description = '';
                        $ponentes[31]->facebook = '#';

                    ?>

                    @foreach ($ponentes as $ponente)
                        @if ($ponente->image != 'images/ponentes/ponente-default.jpg')
                        <div class="col-md-6 col-lg-3">
                            <div>
                                <!-- Speaker-->
                                <div class="speaker">
                                    <div class="speaker-img" data-triangle=".speaker-overlay">
                                        <div class="speaker-overlay"></div><a href="javascript:void(0);"><img src="{{$ponente->image}}"
                                                alt="" width="330" height="354" /></a>
                                        <ul class="speaker-social-list">
                                            <li><a class="icon icon-xs fa-linkedin"
                                                    href="javascript:void(0);"></a></li>
                                        </ul>
                                    </div>
                                    <h5 class="speaker-title"><a href="#">{{$ponente->name}}</a></h5>
                                    <p class="speaker-position">{{$ponente->description}}</p>
                                </div>
                            </div>
                        </div>

                        @endif

                    @endforeach

                </div>

            </div>
        </div>
    </section>
@endsection

@section('SectionConferenceSchedule')
    @include('pages.shedule.cronograma')
    {{-- <conference-schedule></conference-schedule> --}}
@endsection

@section('SectionOfficialSponsors')
    <section class="parallax-container section" data-parallax-img="images/bg-parallax-04-1894x1170.jpg">
        <div class="parallax-content section-lg context-dark text-center">
            <div class="container">
                <h6>Nuestros Sponsor</h6>
                <h3>Sponsor Oficiales</h3>
                <div class="row row-30 row-lg-50 justify-content-center">
                    @for ($i = 1; $i < 8; $i++)
                    <div class="col-sm-5 col-lg-3">
                        <div class="wow">
                            <div>
                                <!-- Sponsor--><a class="sponsor" href="#" data-triangle=".sponsor-overlay">
                                    <div class="sponsor-overlay"></div>
                                    <div class="sponsor-img"><img src="images/sponsors/{{$i}}.png" alt=""
                                            width="300" height="70" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
{{-- <script src="/js/app.js" async defer></script> --}}
@endsection
