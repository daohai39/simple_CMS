<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Tên <span required="required">*</span> </label>
        <input type="name" name="name" required="required" class="form-control"  value="{{ isset($setting) ? $setting->name : old('name') }}">
    </div>

     <div class="form-group">
        <label for="type">Loai<span required="required">*</span> </label>
         <select name="type" class="form-control select2">
            <option selected="selected" value="{{ $setting->type }}">{{ $setting->type }}</option>
        </select>
    </div>

    <div class="form-group" id="setting-value">
        <label for="value">Miêu tả</label>
    </div>
</div>

@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/summernote/summernote.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/i18n/vi.js') }}"></script>
    <script src="{{ asset('assets/vendor/summernote/summernote.min.js') }}"></script>
@endpush

@push('post-scripts')
<script>
    // $('#summernote').summernote({
    //     height: 300,                 // set editor height
    //     minHeight: null,             // set minimum height of editor
    //     maxHeight: null,             // set maximum height of editor
    // });
    // new Select2("select", {
    //     placeholder: "Chọn loai du lieu",
    //     ajax: {
    //         url: laroute.route("admin.setting.index"),
    //         data: function (params) {
    //             return {
    //                 q: params.term,
    //                 page: params.page,
    //             }
    //         }
    //     }
    // });
    // $(document).on('change', '#setting_id', function() {
    //   var target = $(this).data('target');
    //   var show = $("option:selected", this).data('show');
    //   $(target).children().addClass('hide');
    //   $(show).removeClass('hide');
    // });
</script>
@endpush
