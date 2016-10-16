require('../../bootstrap');


let router = window.router || laroute || window.laroute


import UploadImage from './components/UploadImage.vue'
import Wysiwyg from './components/Wysiwyg.vue'

new Vue({
    el: 'body',
    components: {
        'upload-image': UploadImage,
        'wysiwyg': Wysiwyg,
    }
});
