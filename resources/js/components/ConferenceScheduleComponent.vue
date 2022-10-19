<template>
    <div>
        <section class="section section-lg bg-default text-center">
            <div class="container">
                <h6>Plan de programación de eventos</h6>
                <h3>Calendario de conferencias</h3>
                <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
                    <!--Nav tabs-->
                    <ul class="nav nav-tabs">
                        <li class="nav-item" role="presentation" v-for="(value, key, index) in schedules[0].events" :key="index">
                             <!-- {{value.title}} -->
                             <!-- {{index}} -->
                             <!-- {{key}} -->

                            <a v-bind:class="'nav-link ' + value.clasx"
                                v-bind:href="'#tabs-1-'+ key" data-toggle="tab" data-triangle=".nav-link-overlay"><span
                                    class="nav-link-overlay"></span><span class="nav-link-cite">{{key==0?'Primer':(key==1?'Segundo':(key==2?'Tercer':'Cuarto'))}} Dia</span><span
                                    class="nav-link-title">{{value.date}}</span>
                            </a>
                        </li>

                    </ul>
                    <!--Tab panes-->
                    <div class="tab-content wow fadeIn">
                        <div v-for="(value, key, index) in schedules[0].events" :key="index" class="tab-pane fade" v-bind:id="'tabs-1-'+key">
                                <div class="card-group-custom card-group-corporate" id="accordion1" role="tablist"
                                    aria-multiselectable="false">
                                    <!--Bootstrap card-->
                                    <!-- {{value.ponentes}} -->
                                    <article class="card card-custom card-corporate" v-for="(element, index) in value.ponentes" :key="index">
                                        <div class="card-header" role="tab">
                                            <div class="card-title"><a class="collapsed" id="accordion1-card-head-hxapwahb"
                                                    data-toggle="collapse" data-parent="#accordion1"
                                                    href="#accordion1-card-body-onwkttkd"
                                                    aria-controls="accordion1-card-body-onwkttkd" aria-expanded="false"
                                                    role="button"><span class="schedule-classic"><span
                                                            class="unit unit-spacing-md align-items-center d-block d-md-flex"><span
                                                                class="unit-left"><span class="schedule-classic-img"><img
                                                                        v-bind:src="element.urlPhoto" alt=""
                                                                        width="122" height="122" /></span></span><span
                                                                class="unit-body"><span class="schedule-classic-content"><span
                                                                        class="schedule-classic-time">{{element.datew}}</span><span
                                                                        class="schedule-classic-title heading-4">{{element.titleExposicion}}</span><span
                                                                        class="schedule-classic-author">Ponente: <span
                                                                            class="schedule-classic-author-name">{{element.name}}</span> - {{element.university}}</span></span></span></span></span></a></div>
                                        </div>

                                    </article>
                                    <!-- Schedule Simple-->
                                    <div class="schedule-classic schedule-classic-simple d-none">
                                        <div class="schedule-classic-content">
                                            <div class="schedule-classic-img">
                                                <svg class="svg-icon-md svg-icon-primary" role="img">
                                                    <use xlink:href="images/svg/sprite.svg#clock"></use>
                                                </svg>
                                            </div><span class="schedule-classic-time">11:00 am to 12:00 pm</span><span
                                                class="schedule-classic-title heading-4">Enjoy the coffee break</span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default{
    data(){
        return{
            title: 'Schedule',
            subtitle: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            schedules: [
                {
                    time: '9:00 am to 10:00 am',
                    title: 'Registration',
                    img: 'images/schedule-01-58x58.jpg',
                    img2: 'images/schedule-02-58x58.jpg',
                    events: [
                        {
                            title: 'Digital Conference 2019 Introduction',
                            clasx: 'nav-link-secondary-darker',
                            date: 'Octubre 25, 2022',
                            datetime: '2022-10-25',
                            ponentes: [
                                {
                                    name: 'Dr. Jardelino Menegat',
                                    rol: 'Supporter',
                                    titleExposicion: 'La educación de calidad en tiempos complejos',
                                    datew: '17:00 - 18:00 pm',
                                    country: 'Brasil',
                                    university: 'Universidad La Salle, Canoas - RS',
                                    urlPhoto: 'images/ponentes/2.jpg'
                                },
                                {
                                    name: 'Dr. Carlos Alberto Gallego Monsalve - Dr. Domingo de Jesús Ríos Giraldo',
                                    rol: 'Supporter',
                                    titleExposicion: 'Del Humanismo, a la Acción gestora Social Comunitaria en la Universidad Católica del Oriente',
                                    datew: '18:05 – 19:00 pm',
                                    country: 'Colombia',
                                    university: 'Universidad Católica del Oriente',
                                    urlPhoto: 'images/ponentes/ponente-default.jpg'
                                }
                            ],
                            where: 'Hall 22, Building 2, New York, United States of America'
                        },
                        {
                            title: 'Digital Conference 2019 Introduction',
                            clasx: 'nav-link-purple-heart',
                            date: 'Octubre 26, 2022',
                            datetime: '2022-10-26',
                            ponentes: [
                                {
                                    name: 'Dr. Julio Zurita - Dra. Judith Pino',
                                    rol: 'Supporter',
                                    titleExposicion: 'Experiencias de la internacionalización en la educación superior',
                                    datew: '9:00 – 10:00 am',
                                    country: 'Ecuador',
                                    university: 'Universidad Católica del Ecuador',
                                    urlPhoto: 'images/ponentes/ponente-default.jpg'
                                },
                                {
                                    name: 'Dr. José Luis Retolaza Avalos',
                                    rol: 'Supporter',
                                    titleExposicion: 'La Quiebra del Modelo de Economía Clásico: A la Búsqueda de un Nuevo Paradigma',
                                    datew: '10:00 – 11:00 am',
                                    country: 'España',
                                    university: 'Universidad de Deusto',
                                    urlPhoto: 'images/ponentes/5.jpg'
                                },
                                {
                                    name: 'Dr. Hernán Vera Rodríguez',
                                    rol: 'Supporter',
                                    titleExposicion: '̈La situación de los trabajadores en Puerto Rico durante la pandemia provocada por el COVID-19: ¿Trabajo decente o precariedad laboral?',
                                    datew: '15:00 – 16:00 pm',
                                    country: 'Puerto Rico',
                                    university: 'Pontificia Universidad Católica de Puerto Rico',
                                    urlPhoto: 'images/ponentes/ponente-default.jpg'
                                }
                            ],
                            where: 'Hall 22, Building 2, New York, United States of America'
                        },
                        {
                            title: 'Digital Conference 2019 Introduction',
                            clasx: 'nav-link-primary',
                            date: 'Octubre 27, 2022',
                            datetime: '2022-10-27',
                            ponentes: [
                                {
                                    name: 'MSc. Mónica Ximena Guzmán Rojo',
                                    rol: 'Supporter',
                                    titleExposicion: 'Acción por el Clima',
                                    datew: '09:00 – 10:00 am',
                                    country: 'Bolivia',
                                    university: 'Universidad Católica Boliviana San Pablo',
                                    urlPhoto: 'images/ponentes/ponente-default.jpg'
                                },
                                {
                                    name: 'Dr. Marco Antonio Quesada Chaves',
                                    rol: 'Supporter',
                                    titleExposicion: 'El aporte de la investigación en Educación Religiosa para el desarrollo de una educación inclusiva, equitativa y de calidad',
                                    datew: '15:00 – 16:00 pm',
                                    country: 'Costa Rica',
                                    university: 'Universidad Católica de Costa Rica',
                                    urlPhoto: 'images/ponentes/3.jpg'
                                }
                            ],
                            where: 'Hall 22, Building 2, New York, United States of America'
                        },
                        {
                            title: 'Digital Conference 2019 Introduction',
                            clasx: 'nav-link-secodanry',
                            date: 'Octubre 28, 2022',
                            datetime: '2022-10-28',
                            ponentes: [
                                {
                                    name: 'Dr. José Joaquín Piña Mondragón',
                                    rol: 'Supporter',
                                    titleExposicion: 'Conservar y utilizar sosteniblemente los océanos, los mares y los recursos marinos para el desarrollo sostenible',
                                    datew: '09:00 – 10:00 am',
                                    country: 'México',
                                    university: 'Universidad de La Salle Querétaro',
                                    urlPhoto: 'images/ponentes/ponente-default.jpg'
                                },
                                {
                                    name: 'Dra. Vania Elisabete Schneider',
                                    rol: 'Supporter',
                                    titleExposicion: 'Agua, Saneamiento, Salud y Desafíos a la sustentabilidad planetaria',
                                    datew: '15:00 – 16:00 pm',
                                    country: 'Brasil',
                                    university: 'Universidad de Caxias Do Sul',
                                    urlPhoto: 'images/ponentes/ponente-default.jpg'
                                },
                                {
                                    name: 'Arq. Horacio Cangelosi',
                                    rol: 'Supporter',
                                    titleExposicion: 'Hábitat Saludable y Sustentable',
                                    datew: '16:00 – 17:00 pm',
                                    country: 'Argentina',
                                    university: 'Federación Internacional de Sociedades Científicas',
                                    urlPhoto: 'images/ponentes/1.jpg'
                                },
                                {
                                    name: 'Dr. Ing. Paul Sharratt PhD',
                                    rol: 'Supporter',
                                    titleExposicion: 'Precio del Medio Ambiente”',
                                    datew: '17:00 – 17:45 pm',
                                    country: 'Inglaterra',
                                    university: 'Instituto de Investigaciones Singapur',
                                    urlPhoto: 'images/ponentes/9.jpg'
                                }
                            ],
                            where: 'Hall 22, Building 2, New York, United States of America'
                        },

                    ]
                }
            ]
        }
    },
    methods:{

    },
    mounted(){

    }
}
</script>
