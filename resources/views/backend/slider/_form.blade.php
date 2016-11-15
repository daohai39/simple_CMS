<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" name="url" class="form-control" value="{{ isset($slider) ? $slider->url : old('url') }}"></input>
    </div>

    <div class="form-group">
        <label for="heading">Heading</label>
        <input type="text" name="heading" class="form-control" value="{{ isset($slider) ? $slider->heading : old('heading') }}"></input>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ isset($slider) ? $slider->description : old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="images_id[]">Image</label>
        <upload-image
            resource = "slider"
            :thumbnailable = "false"
            :single = "true"
            @if(isset($slider))
                :item = "{{ $slider }}"
            @endif
        ></upload-image>
    </div>
</div>

@push('post-scripts')
<script src="{{ asset('assets/js/backend/form.js') }}"></script>
@endpush
