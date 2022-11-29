@extends('layouts.layout')

@section('SectionWhoIsSpeaking')
    <section class="parallax-container section" data-parallax-img="images/bg-parallax-02-1894x1950.jpg">
        <div class="parallax-content section-lg context-dark text-center">
            <div class="container">
                <h6 class="text-secondary">Próximos eventos</h6>
                <h3>Conoce nuestros próximos eventos.</h3>
                <div class="row row-30">
                    @foreach ($events as $event)
                        <div class="col-md-6 col-lg-3">
                            <div>
                                <div class="speaker" style="min-height:140px;">
                                    <h5 class="speaker-title"><a href="/{{$event->url_name}}">{{$event->descripcion}}</a></h5>
                                    <p class="speaker-position">Desde {{$event->fechainicio}} hasta {{$event->fechatermino}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
