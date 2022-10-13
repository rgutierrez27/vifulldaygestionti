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
                                    class="nav-link-overlay"></span><span class="nav-link-cite">{{key==0?'Primer':(key==1?'Segundo':(key==3?'Tercer':'Cuarto'))}} Dia</span><span
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
                                    {{value.ponentes}}
                                    <article class="card card-custom card-corporate" v-for="(element, index) in value.ponentes" :key="index">
                                        <div class="card-header" role="tab">
                                            <div class="card-title"><a class="collapsed" id="accordion1-card-head-hxapwahb"
                                                    data-toggle="collapse" data-parent="#accordion1"
                                                    href="#accordion1-card-body-onwkttkd"
                                                    aria-controls="accordion1-card-body-onwkttkd" aria-expanded="false"
                                                    role="button"><span class="schedule-classic"><span
                                                            class="unit unit-spacing-md align-items-center d-block d-md-flex"><span
                                                                class="unit-left"><span class="schedule-classic-img"><img
                                                                        src="images/schedule-01-122x122.jpg" alt=""
                                                                        width="122" height="122" /></span></span><span
                                                                class="unit-body"><span class="schedule-classic-content"><span
                                                                        class="schedule-classic-time">9:00 am to 10:00
                                                                        am</span><span
                                                                        class="schedule-classic-title heading-4">{{element.titleExposicion}}</span><span
                                                                        class="schedule-classic-author">by <span
                                                                            class="schedule-classic-author-name">{{element.name}}</span> - Co
                                                                        Founder</span></span></span></span></span></a></div>
                                        </div>

                                    </article>
                                    <!-- Schedule Simple-->
                                    <div class="schedule-classic schedule-classic-simple">
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
                                    name: 'Kevin Carlos Vargas',
                                    rol: 'Supporter',
                                    titleExposicion: 'Digital Conference 2019 Introduction',
                                    datew: 'Octubre 25, 2022',
                                    country: 'United States of America',
                                    university: 'University of California'
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
                                    name: 'Robert Martin',
                                    rol: 'Supporter',
                                    titleExposicion: 'Digital Conference 2019 Introduction',
                                    datew: 'Octubre 25, 2022',
                                    country: 'United States of America',
                                    university: 'University of California'
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
                                    name: 'Nelson Martin',
                                    rol: 'Supporter',
                                    titleExposicion: 'Digital Conference 2019 Introduction',
                                    datew: 'Octubre 25, 2022',
                                    country: 'United States of America',
                                    university: 'University of California'
                                }
                            ],
                            where: 'Hall 22, Building 2, New York, United States of America'
                        },
                        {
                            title: 'Digital Conference 2019 Introduction',
                            clasx: 'nav-link-secodanry',
                            date: 'Octubre 28, 2022',
                            datetime: '2022-10-27',
                            ponentes: [
                                {
                                    name: 'Kevin Martin',
                                    rol: 'Supporter',
                                    titleExposicion: 'Digital Conference 2019 Introduction',
                                    datew: 'Octubre 25, 2022',
                                    country: 'United States of America',
                                    university: 'University of California'
                                }
                            ],
                            where: 'Hall 22, Building 2, New York, United States of America'
                        }
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
