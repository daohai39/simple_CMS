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
                if (this.single && !this.item.images[0]) {
                    return []
                }

                var data = this.item.images;
                if(this.item.thumbnail) {
                    data.push(this.item.thumbnail);
                }
                return data;
            }
        },
        props: {
            resource: {
                type: String,
            },
            item: {
                type: Object
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
                        paramName: 'images',
                        acceptedFiles: 'image/*',
                        addRemoveLinks: true,
                        dictRemoveFile: 'Delete',
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
                        url: router.route('admin.media.destroy', {id: file.data.id}),
                        method: 'DELETE',
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
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'))
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
                        var file = { name: image.filename, size: image.size, src: image.url }
                        file.data = image;
                        resolve(self.dzMockImage(file, image))
                    })
                    promises.push(promise)
                })
                return Promise.all(promises)

            },
            dzOnSuccess: function (file, data) {
                var input = document.createElement('input')
                input.setAttribute('type', 'hidden')
                input.setAttribute('name', 'images_id[]')
                input.setAttribute('value', data.id)
                file.data = data
                file.previewElement.appendChild(input)
            },
            imagesRendering: function (images) {
                var self = this

                images.forEach(function (image, index) {
                    Array.prototype.forEach.call( image.file.previewElement.querySelectorAll('[data-featured-btn]'), function( node ) {
                        node.parentNode.removeChild( node )
                    })

                    var e = document.createElement('a')
                    e.setAttribute('data-featured-btn', true)

                    if (image.isThumbnail) {
                        e.innerHTML = '<i class="fa fa-check-square"></i> Thumbnail'
                        e.setAttribute('class', 'btn btn-xs btn-success btn-block')
                    } else {
                        e.innerHTML = '<i class="fa fa-circle"></i> Set thumbnail'
                        e.setAttribute('class', 'btn btn-xs btn-info btn-block')
                    }
                    e.addEventListener("click", function (e) {
                        e.preventDefault()
                        self.setThumbnailImage(image.id).then(function (response) {
                            image.isThumbnail = response.data.isThumbnail
                            self.dataset.$set(index, image)
                            self.imagesRendering(self.dataset)
                        })
                        location.reload();
                    })
                    image.file.previewElement.appendChild(e)
                })
            },
            setThumbnailImage: function(image_id) {
                var self = this;

                return self.$parent.$http.post(
                    router.route('admin.media.image.thumbnail', {resource: self.resource, item_id: self.item.id, image_id: image_id})
                )
            }
        },
        ready: function () {
            this.initDz()
            this.dzMockImages().then(!this.single ? this.imagesRendering : null)
        }
    }
</script>
