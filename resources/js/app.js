/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Config from './config';

import Echo from "laravel-echo";
window.io = require('socket.io-client');
window.socket = io(Config.host + ':' + Config.port);
window.eventApp = new Vue();

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: Config.host + ':' + Config.port
});

//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"

const store = new Vuex.Store(
   storeData
)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('orderr', require('./components/ExampleComponent.vue').default);
Vue.component('paypal', require('./components/Paypal.vue').default);
Vue.component('chat-app', require('./components/ChatApp.vue').default);
Vue.component('message-notification', require('./components/MessageNotification.vue').default);


Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store, //vuex
});

const notification = new Vue({
    el: '#notification',
    store, //vuex
});
