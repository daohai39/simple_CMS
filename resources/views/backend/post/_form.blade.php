<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title *</label>
        <input type="text" name="title" required="required" class="form-control" value="{{ isset($post) ? $post->title : old('title') }}">
    </div>



    <div class="form-group">
        <label for="content">Content *</label>
        <wysiwyg>
            <textarea name="content" required="required" class="form-control" slot="textarea">{{ isset($post) ? $post->content : old('content') }}</textarea>
        </wysiwyg>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ isset($post) ? $post->description : old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="meta_title">Meta_title</label>
        <input type="text" name="meta_title" class="form-control" value="{{ isset($post) ? $post->meta_title : old('meta_title') }}">
    </div>

    <div class="form-group">
        <label for="meta_description">Meta_description</label>
        <textarea name="meta_description" class="form-control">{{ isset($post) ? $post->meta_description : old('meta_description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="featured">Featured</label>
        <div class="checkbox">
            <input type="hidden" name="featured" value="off">
            <input type="checkbox" name="featured" <?php if(isset($post) && $post->featured == true) echo "checked"?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success">
        </div>
    </div>

    <div class="form-group">
        <label for="featured">Draft/Public</label>
        <div class="checkbox">
            <input type="hidden" name="status" value="off">
            <input type="checkbox" name="status" <?php if(isset($post) && $post->status == 'PUBLISH') echo "checked"?> data-toggle="toggle" data-off="Draft" data-on="Public" data-onstyle="success">
        </div>
    </div>

    <div class="form-group">
        <label for="tags">Tags</label>
        <select name="tags[]" multiple="multiple" class="form-control select2" id="select2-post-tags">
                @if(isset($post))
                    @foreach($post->tags as $tag)
                        <option value="{{ $tag->name }}" selected="selected">{{ $tag->name }}</option>
                    @endforeach
                @endif
            </select>
    </div>

    <div class="form-group">
        <label for="images_id[]">Images</label>
        <upload-image
            resource = "post"
            @if(isset($post))
                :item = "{{ $post }}"
            @endif
        ></upload-image>
    </div>
</div>

@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/summernote/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>
@endpush

@push('post-scripts')
<script src="{{ asset('assets/js/backend/form.js') }}"></script>
<script>
    new Select2("#select2-post-tags", {
        placeholder: "#hashtag...",
        tags: true,
        ajax: {
            url: laroute.route("admin.tag.create"),
            processResults: function (response, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(response.data, function (item) {
                        return {
                            text: item['name'],
                            id: item['name']
                        }
                    }),
                    pagination: {
                        more: response.to < response.total
                    }
                };
            },
        }
    });
</script>
@endpush
