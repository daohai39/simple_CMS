<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Tiêu đề *</label>
        <input type="text" name="title" required="required" class="form-control" value="{{ isset($post) ? $post->title : old('title') }}">
    </div>

    <div class="form-group">
        <label for="description">Miêu tả</label>
        <textarea name="description" class="form-control">{{ isset($post) ? $post->description : old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="content">Nội dung *</label>
        <textarea id="summernote" name="content" required="required" class="form-control">{{ isset($post) ? $post->content : old('content') }}</textarea>
    </div>

    <div class="form-group">
        <label for="meta_title">Meta_title</label>
        <input type="text" name="meta_title" required="required" class="form-control" value="{{ isset($post) ? $post->meta_title : old('meta_title') }}">
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
</div>

@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/summernote/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>
@endpush

@push('post-scripts')
<script>
    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
    });
</script>
@endpush
