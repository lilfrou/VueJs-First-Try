

require('./bootstrap');

window.Vue = require('vue');
Vue.component('pagination', require('laravel-vue-pagination'));

// import VueRouter from 'vue-router';
// Vue.use(VueRouter);
// import Main from './components/main.vue';
// const routes = [

//     {
//         path: '/main',
//         component: Main

//     }
// ];
// const router = new VueRouter({routes});

Vue.component('compagnie', require('./components/compagnie.vue').default);
Vue.component('addCompagnie', require('./components/addCompagnie.vue').default);
Vue.component('editCompagnie', require('./components/editCompagnie.vue').default);
Vue.component('deleteCompagnie', require('./components/deleteCompagnie.vue').default);





const app = new Vue({
    el: '#app',
    // router: router
});
