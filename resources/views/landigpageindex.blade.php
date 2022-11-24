@extends('layouts.layout')

@section('SectionWhoIsSpeaking')
    <section class="parallax-container section" data-parallax-img="images/bg-parallax-02-1894x1950.jpg">
        <div class="parallax-content section-lg context-dark text-center">
            <div class="container">
                <h6 class="text-secondary">Próximos eventos</h6>
                <h3>Conoce a nuestros próximos eventos.</h3>
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

                    ?>

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
