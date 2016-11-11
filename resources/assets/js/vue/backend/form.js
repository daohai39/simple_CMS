require('../../bootstrap');


let router = window.router || laroute || window.laroute


import UploadImage from './components/UploadImage.vue'
import UploadDocument from './components/UploadDocument.vue'
import Wysiwyg from './components/Wysiwyg.vue'

new Vue({
    el: 'body',
    components: {
        'upload-image': UploadImage,
        'upload-document': UploadDocument,
        'wysiwyg': Wysiwyg,
    }
});
