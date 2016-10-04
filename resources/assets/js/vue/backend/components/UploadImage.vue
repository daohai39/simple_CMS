<template>
    <div id="dropzone" class="dropzone"></div>
</template>

<script>
    var Dropzone = require("dropzone")
    Dropzone.autoDiscover = false
    var router = window.router || laroute || window.laroute
    export default {
        data () {
            return {
                dz: {
                    on: () => {},
                    emit: () => {}
                }
            }
        },
        computed: {
            dataset () {
                if (this.single && !this.images[0]) {
                    return []
                }
                return this.images
            }
        },
        props: {
            images: {
                type: Array,
                default: () => []
            },
            url: {
                type: String,
                default: () => router.route('admin.media.image.store')
            },
            method: {
                type: String,
                default: () => 'POST'
            },
            single: {
                type: Boolean,
                default: () => false
            }
        },
        methods: {
            initDz: function () {
                var self = this
                this.$set(
                    'dz',
                    new Dropzone("#dropzone", {
                        url: self.url,
                        paramName: 'source',
                        acceptedFiles: 'image/*',
                        addRemoveLinks: true,
                        dictRemoveFile: 'Xóa',
                        init: function () {
                            this.on('sending', self.dzOnSending)
                            this.on('error', self.dzOnError)
                            this.on('complete', self.dzOnComplete)
                            this.on('removedfile', self.dzOnFileRemoved)
                            this.on('success', self.dzOnSuccess)
                            this.on('maxfilesexceeded', function(file) {
                                this.removeAllFiles();
                                this.addFile(file);
                            });
                            if (self.single) {
                                this.element.className += " single";
                            }
                        }
                    })
                )
                if (self.single) {
                    this.dz.options.maxFiles = 1;
                }
            },
            dzOnComplete: function(file) {
                if (file._removeLink) {
                    if (file.data) {
                        var id = file.data.id
                        file._removeLink.href = '#'+id
                    }
                    file._removeLink.textContent = this.dz.options.dictRemoveFile
                }
                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-complete")
                }
            },
            dzOnFileRemoved: function (file) {
                if (file.data) {
                    this.$http({
                        url: router.route('admin.media.destroy', {image: file.data.id}),
                        method: 'DELETE',
                        // data: {_method:'DELETE'}
                    }).then(function (response) {
                        console.log(response)
                    }, function (response) {
                    // error callback
                    })
                }
            },
            dzOnSending: function(file, xhr, formData) {
                var self = this
                formData.append('_method', self.method)
                formData.append('_token', window._token)
            },
            dzOnError: function(file, response, xhr) {
                if (xhr && xhr.status == 422) {
                    // Validation
                }
                file.previewElement.classList.add("dz-error")
                var _ref = file.previewElement.querySelector("[data-dz-errormessage]")
            },
            dzMockImage: function (mockFile, data) {
                this.dz.emit("addedfile", mockFile)
                this.dz.createThumbnailFromUrl(mockFile, mockFile.src)
                this.dz.emit("complete", mockFile)
                this.dz.emit("success", mockFile, data)
                data.file = mockFile
                return data
            },
            dzMockImages: function () {
                var self = this
                var promises = []
                this.dataset.forEach(function(image) {
                    var promise = new Promise(function(resolve, reject) {
                        var file = { name: image.title, size: image.size, src: image.public_path }
                        file.data = image
                        resolve(self.dzMockImage(file, image))
                    })
                    promises.push(promise)
                })
                return Promise.all(promises)

            },
            dzOnSuccess: function (file, data) {
                var input = document.createElement('input')
                input.setAttribute('type', 'hidden')
                input.setAttribute('name', 'image_id[]')
                input.setAttribute('value', data.id)
                file.data = data
                file.previewElement.appendChild(input)
            },
            featuredRendering: function (images) {
                var self = this
                // this.images = images
                images.forEach(function (image, index) {
                    Array.prototype.forEach.call( image.file.previewElement.querySelectorAll('[data-featured-btn]'), function( node ) {
                        node.parentNode.removeChild( node )
                    })

                    var e = document.createElement('a')
                    e.setAttribute('data-featured-btn', true)
                    if (image.featured) {
                        e.innerHTML = '<i class="fa fa-check-square"></i> Ảnh chính'
                        e.setAttribute('class', 'btn btn-xs btn-success btn-block')
                    } else {
                        e.innerHTML = '<i class="fa fa-circle"></i> Đặt làm ảnh chính'
                        e.setAttribute('class', 'btn btn-xs btn-info btn-block')
                    }
                    e.addEventListener("click", function (e) {
                        e.preventDefault()
                        self.$parent.setFeaturedImage(image.id).then(function (response) {
                            image.featured = response.data.featured
                            self.images.$set(index, image)
                            self.featuredRendering(self.images)
                        })
                    })
                    image.file.previewElement.appendChild(e)
                })
            }
        },
        ready: function () {
            this.initDz()
            this.dzMockImages().then(!this.single ? this.featuredRendering : null)
        }
    }
</script>
