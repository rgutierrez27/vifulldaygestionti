/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
//require('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css');

//require('./bootstrap-vue-datatable');

window.Vue = require('vue');
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('register-form-component', require('./components/RegisterFormComponent.vue').default);
Vue.component('register-form-diplomado-component', require('./components/RegisterFormDiplomadoComponent.vue').default);
Vue.component('lista-participantes', require('./components/ListaParticipante.vue').default);
Vue.component('sorteo-participantes', require('./components/SorteoParticipante.vue').default);

Vue.component('conference-schedule', require('./components/ConferenceScheduleComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
