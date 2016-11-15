<template>
    <div id="dropzone-document" class="dropzone"></div>
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
                if (!this.item) {
                    return []
                }
                return this.item.documents;
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
                default: () => router.route('admin.media.document.store')
            },
            method: {
                type: String,
                default: () => 'POST'
            },
            thumbnailable: {
                type: Boolean,
                default: () => true,
            },
            previewable: {
                type: Boolean,
                default: () => true,
            }
        },
        methods: {
            initDz: function () {
                var self = this
                this.$set(
                    'dz',
                    new Dropzone("#dropzone-document", {
                        url: self.url,
                        paramName: 'document',
                        acceptedMimeTypes: '.xls,.xlsx,.doc,.docx,.txt,.text,.pdf',
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
                        }
                    })
                )
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
                    console.log(response);
                }
                file.previewElement.classList.add("dz-error")
                var _ref = file.previewElement.querySelector("[data-dz-errormessage]")
            },
            dzMockDocument: function (mockFile, data) {
                this.dz.emit("addedfile", mockFile)

                if(data.mime_type == 'application/pdf')
                    this.dz.createThumbnailFromUrl(mockFile, "/assets/images/pdf.png");
                else if(data.mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || data.mime_type == 'application/msword')
                    this.dz.createThumbnailFromUrl(mockFile, "/assets/images/msword.png");
                else if(data.mime_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || data.mime_type == 'application/vnd.ms-excel')
                    this.dz.createThumbnailFromUrl(mockFile, "/assets/images/msxls.png");

                this.dz.emit("complete", mockFile)
                this.dz.emit("success", mockFile, data)
                data.file = mockFile
                return data
            },
            dzMockDocuments: function () {
                var self = this
                var promises = []

                self.dataset.forEach(function(doc) {
                    var promise = new Promise(function(resolve, reject) {
                        var file = { name: doc.filename, size: doc.size, src: doc.url }
                        file.data = doc;
                        resolve(self.dzMockDocument(file, doc))
                    })
                    promises.push(promise)
                })
                return Promise.all(promises)

            },
            dzOnSuccess: function (file, data) {
                var input = document.createElement('input')
                input.setAttribute('type', 'hidden')
                input.setAttribute('name', 'documents_id[]')
                input.setAttribute('value', data.id)
                file.data = data
                file.previewElement.appendChild(input)
            },
            documentsRendering: function (documents) {
                var self = this
                documents.forEach(function (doc, index) {
                    Array.prototype.forEach.call( doc.file.previewElement.querySelectorAll('[data-featured-btn]'), function( node ) {
                        node.parentNode.removeChild( node )
                    })

                    if(self.previewable) {
                        self.documentPreviewable(doc, index);
                    }
                })
            },
            documentPreviewable: function(doc, index) {
                var self = this;

                var e = document.createElement('a')
                e.setAttribute('data-featured-btn', true)

                e.innerHTML = '<i class="fa fa-eye"></i> Preview';
                e.setAttribute('class', 'btn btn-xs btn-primary btn-block');
                e.setAttribute('href', router.route('admin.media.preview', {id: doc.id}));

                doc.file.previewElement.appendChild(e)
            }
        },
        ready: function () {
            this.initDz()
            this.dzMockDocuments().then(this.documentsRendering)
        }
    }
</script>
