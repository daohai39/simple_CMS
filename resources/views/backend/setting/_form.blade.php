<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name <span required="required">*</span> </label>
        <input type="name" name="name" required="required" class="form-control"  value="{{ isset($setting) ? $setting->name : old('name') }}" disabled="true">
    </div>

    <div class="form-group" id="setting-value">
        <label for="value">Description</label>
        @if (isset($setting) && $setting->type == 'image')
            <upload-image
                resource = "setting"
                :thumbnailable = "false"
                :single = "true"
                @if(isset($setting))
                    :item = "{{ $setting }}"
                @endif
            ></upload-image>
        @else
            <input type="text" name="value" id="text" class="form-control"  value="{{ isset($setting) ? $setting->value : old('value') }}">
        @endif
    </div>
</div>

@push('pre-styles')

@endpush

@push('pre-scripts')

@endpush

@push('post-scripts')
<script src="{{ asset('assets/js/backend/form.js') }}"></script>
@endpush
