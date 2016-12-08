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
        <label for="heading_size">Heading font size (px)</label>
        <input type="number" name="heading_size" class="form-control" value="{{ isset($slider) ? $slider->heading_size : old('heading_size') }}"></input>
    </div>

    <div class="form-group">
        <label for="heading_color">Heading font color</label>
        <div id="heading_color" class="input-group colorpicker-component">
            <input type="text" name="heading_color" value="{{ isset($slider) ? $slider->heading_color : old('heading_color') }}" class="form-control" />
            <span class="input-group-addon"><i></i></span>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ isset($slider) ? $slider->description : old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="description_size">Description font size (px)</label>
        <input type="number" name="description_size" class="form-control" value="{{ isset($slider) ? $slider->description_size : old('description_size') }}"></input>
    </div>

    <div class="form-group">
        <label for="description_color">Description font color</label>
        <div id="description_color" class="input-group colorpicker-component">
            <input type="text" name="description_color" value="{{ isset($slider) ? $slider->description_color : old('description_color') }}" class="form-control" />
            <span class="input-group-addon"><i></i></span>
        </div>
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

@push('pre-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endpush

@push('pre-scripts')
<script src="{{ asset('assets/vendor/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
@endpush

@push('post-scripts')
<script src="{{ asset('assets/js/backend/form.js') }}"></script>
<script>
    $(function() {
        $('#heading_color').colorpicker();
        $('#description_color').colorpicker();
    });
</script>
@endpush
