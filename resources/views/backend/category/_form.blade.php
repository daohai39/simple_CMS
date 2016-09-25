<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên
    <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="name" class="form-control col-md-7 col-xs-12" name="name" required="required" minlength="3" type="text" value="{{ isset($category) ? $category->name : old('name') }}">
  </div>
</div>

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh mục gốc</label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <select name="parent_id" class="select2_single form-control" tabindex="-1">
        <option selected="selected" value="{{ isset($category->parent) ? $category->parent->id : old('parent_id') }}">
            {{ isset($category->parent) ? $category->parent->name : '' }}
        </option>
    </select>
  </div>
</div>
<div class="ln_solid"></div>


@push('pre-styles')
  <!-- Select2 -->
  <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('pre-scripts')
  <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('vendor/select2/js/i18n/vi.js') }}"></script>
@endpush

@push('post-scripts')
<!-- Select2 -->
<script>
  select2 = new Select2("select", {
    placeholder: "Trở thành danh mục gốc",
    ajax: {
      url: laroute.route("admin.category.create"),
    }
  });
</script>
<!-- /Select2 -->
@endpush
