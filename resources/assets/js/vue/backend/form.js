require('../../bootstrap');


let router = window.router || laroute || window.laroute


import Dropzone from './components/Dropzone.vue'
new Vue({
    el: 'body',
    components: {
        'dropzone': Dropzone,
    }
});
