@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/i18n/vi.js') }}"></script>
@endpush

<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Tên <span required="required">*</span> </label>
        <input type="name" name="name" required="required" class="form-control"  value="{{ isset($product) ? $product->name : old('name') }}">
    </div>

    <div class="form-group">
        <label for="code">Mã <span required="required">*</span> </label>
        <input type="code" name="code" required="required" class="form-control"  value="{{ isset($product) ? $product->code : old('code') }}">
    </div>

    <div class="form-group">
        <label for="author">Tác giả <span required="required">*</span> </label>
        <input type="author" name="author" required="required" class="form-control"  value="{{ isset($product) ? $product->author : old('author') }}">
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục <span required="required">*</span> </label>
        <select name="category_id" required="required" class="form-control select2" id="select2-ajax-product">
            <option selected="selected" value="{{ isset($product->category) ? $product->category->id : old('category_id') }}">
                {{ isset($product->category) ? $product->category->name : '' }}
            </option>
        </select>
    </div>
</div>

@push('post-scripts')
<script>
    select2 = new Select2("select", {
        placeholder: "Chọn danh mục",
        ajax: {
            url: laroute.route("admin.category.create"),
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page,
                    type: 'children',
                }
            }
        }
    });
</script>
@endpush
