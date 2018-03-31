require('./bootstrap');

window.Vue = require('vue');

Vue.component('contacts', require('./components/Contact.vue'));

const app = new Vue({
    el: '#app'
});
