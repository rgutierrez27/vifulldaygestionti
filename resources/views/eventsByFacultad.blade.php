@extends('layouts.layout')

@section('SectionSwiperSlider')
    <!-- Section Swiper Slider-->
    <section class="breadcrumbs-custom bg-image context-dark"
        style="background-image: url(../../images/bg-breadcrumbs-01-1894x424.jpg);">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Inicio</a></li>
                {{-- <li><a href="#">Pages</a></li>
            <li class="active">Pricing</li> --}}
            </ul>
            <h3 class="breadcrumbs-custom-title">{{ $events[0]->descripcion_estructura ?? '' }} </h3>
        </div>
    </section>
@endsection

@section('SectionWhoIsSpeaking')
    @if (count($events) == 0)
        <section class="section section-lg bg-default">
            <div class="container">
                <div class="row row-30 justify-content-center">
                    <div class="col-md-10 col-lg-6">

                        <h3>No se encontraron eventos</h3>
                        <p class="paragraph-inset-right-25">De momento no se encontraron eventos, puedes regresar a la pagina principal y ver otos eventos disponibles</p>

                    </div>
                    <div class="col-md-10 col-lg-6">
                        <div class="img-separated"><img src="{{asset('images/about-01-562x588.jpg')}}" alt="" width="562"
                                height="588" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="parallax-container section" data-parallax-img="https://i.imgur.com/kjrVXyM.jpg">
            <div class="parallax-content section-lg context-dark text-center">
                <div class="container">
                    <h4 class="text-secondary">Congresos</h4>
                    {{-- <h3>Conoce nuestros próximos eventos.</h3> --}}
                    <div class="row row-30">
                        @foreach ($events as $event)
                        @php
                        // generar aleatorio de 3 digitos
                            $aleatorio = rand(100, 999);
                        @endphp
                            <div class="col-md-6 col-lg-3">
                                <div>
                                    <div class="speaker" style="min-height:140px;">
                                        <h5 class="speaker-title"><a
                                                href="/{{$aleatorio.$event->estructura}}/{{ $event->url_name }}">{{ $event->descripcion_capacitacion }}</a>
                                        </h5>
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
    @endif








@endsection



@section('scripts')
@endsection
