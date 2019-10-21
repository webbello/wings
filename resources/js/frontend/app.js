
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import '../bootstrap';
import '../plugins';
import './custom';
import Vue from 'vue';
// import VueRouter    from 'vue-router'
import GalleryComponent   from './components/GalleryComponent'
import AlbumComponent   from './components/AlbumComponent'
// Vue.use(VueRouter)

window.Vue = Vue;
// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path: '/photo_gallery',
//             name: 'Album',
//             component: AlbumComponent,
//             props: true
//         },
//         {
//             path: '/photo_gallery/2',
//             name: 'Gallery',
//             component: GalleryComponent,
//             props: true
//         },
        
//     ],
// });
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('quiz-component', require('./components/QuizComponent.vue').default);
Vue.component('gallery-component', require('./components/GalleryComponent.vue').default);
Vue.component('album-component', require('./components/AlbumComponent.vue').default);
Vue.component('blog-posts', require('./components/Read.vue').default);
Vue.component('event-calender', require('./components/EventCalender.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // components: { GalleryComponent },
    // router,
});