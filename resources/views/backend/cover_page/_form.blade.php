<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="heading">Heading</label>
        <input type="text" name="heading" class="form-control" value="{{ isset($coverPage) ? $coverPage->heading : old('heading') }}"></input>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control">{{ isset($coverPage) ? $coverPage->content : old('content') }}</textarea>
    </div>

    <div class="form-group">
        <label for="heading">URL</label>
        <input type="text" name="url" class="form-control" value="{{ isset($coverPage) ? $coverPage->url : old('url') }}"></input>
    </div>

    <div class="form-group">
        <label for="images_id[]">Image</label>
        <upload-image
            resource = "coverPage"
            :thumbnailable = "false"
            :single = "true"
            @if(isset($coverPage))
                :item = "{{ $coverPage }}"
            @endif
        ></upload-image>
    </div>
</div>

@push('post-scripts')
<script src="{{ asset('assets/js/backend/form.js') }}"></script>
@endpush
