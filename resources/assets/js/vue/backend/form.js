require('../../bootstrap');


let router = window.router || laroute || window.laroute
import UploadImage from './components/UploadImage.vue'
new Vue({
    el: 'body',
    components: {
        'dropzone': UploadImage,
    }
});
