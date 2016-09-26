@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
@endpush

@push('pre-scripts')
    <script type="text/javascript" src="{{ asset('assets/vendor/select2/select2.full.min.js') }}"></script>
@endpush

<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="parent_id">Danh mục cha</label>
        <select name="parent_id" class="form-control select2" id="select2-ajax-category">
            <option selected="selected" value="{{ isset($category->parent) ? $category->parent->id : old('parent_id') }}">
                {{ isset($category->parent) ? $category->parent->name : '' }}
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Tên</label>
        <input type="name" name="name" class="form-control" placeholder="Tên danh mục..." value="{{ isset($category) ? $category->name : old('name') }}">
    </div>
</div>

@push('post-scripts')
<script>
  select2 = new Select2("select", {
    placeholder: "Trở thành danh mục gốc",
    allowClear: true,
    ajax: {
      url: laroute.route("admin.category.create"),
    }
  });
</script>
@endpush
