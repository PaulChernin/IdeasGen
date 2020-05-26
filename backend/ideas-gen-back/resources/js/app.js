require('./bootstrap');

window.Vue = require('vue');


Vue.component('idea-form', require('./frontend/ideas-gen-front/src/components/IdeaForm.vue'));

const app = new Vue({
    el: '#app'
});