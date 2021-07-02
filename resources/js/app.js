require('./bootstrap');
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import vue from 'vue'
window.Vue = vue;

import App from './components/App.vue';
import VueRouter from 'vue-router';
import {routes} from './routes';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueRouter);

 
const router = new VueRouter({
    mode: 'history',
    routes: routes
});
 
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});