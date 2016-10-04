<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name <span required="required">*</span> </label>
        <input type="name" name="name" required="required" class="form-control"  value="{{ isset($setting) ? $setting->name : old('name') }}" disabled="true">
    </div>

    <div class="form-group" id="setting-value">
        <label for="value">Description</label>
        @if ($setting->type == 'textarea')
            <textarea id="summernote" name="value">{{ isset($setting) ? $setting->value : '' }}</textarea>
        @elseif ($setting->type == 'text')
            <input type="text" name="value" id="text" class="form-control"  value="{{ isset($setting) ? $setting->value : old('value') }}">
        @else
            <input type="number" name="value" id="number" class="form-control"  value="{{ isset($setting) ? $setting->value : old('value') }}">
        @endif
    </div>
</div>

@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/summernote/summernote.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/summernote/summernote.min.js') }}"></script>
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
