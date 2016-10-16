<template>
    <div id="wysiwyg" class="editor">
        <div v-el:textarea>
            <slot name="textarea"></slot>
        </div>
    </div>
</template>
<script>
    var router = window.router || laroute || window.laroute;

    export default {
        computed: {
            rawNode () {
                return this.$els.textarea.querySelector('textarea')
            }
        },
        methods: {
            uploadImage: function(image) {
                var self = this;
                var data = new FormData();
                data.append("images", image);
                $.ajax({
                    url: router.route('admin.media.image.store'),
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "post",
                    success: function(image) {
                        var img = $('<img>').attr('src', image.url);
                        $(self.rawNode).summernote("insertNode", img[0]);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        },
        ready () {
            var self = this
            $(this.rawNode).summernote({
                minHeight: 300,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                callbacks: {
                    onImageUpload: function(image) {
                        self.uploadImage(image[0]);
                    }
                }
            })
        }
    };
</script>
