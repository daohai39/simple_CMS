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
        <select name="category_id" required="required" class="form-control select2" id="select2-product-category">
            <option selected="selected" value="{{ isset($product->category) ? $product->category->id : old('category_id') }}">
                {{ isset($product->category) ? $product->category->name : '' }}
            </option>
        </select>
    </div>

    <div class="form-group">
        <label for="tags">Tag</label>
        <select name="tags[]" multiple="multiple" class="form-control select2" id="select2-product-tags">
                @if(isset($product))
                    @foreach($product->tags as $tag)
                        <option value="{{ $tag->id }}" selected="selected">{{ $tag->name }}</option>
                    @endforeach
                @endif
            </select>
    </div>

    <div class="form-group">
        <label for="content">Miêu tả</label>
        <textarea id="summernote" name="description">{{ isset($product) ? $product->description : '' }}</textarea>
    </div>

    <div class="form-group">
        <label for="meta_title">Meta_title</label>
        <input type="text" name="meta_title" required="required" class="form-control" value="{{ isset($product) ? $product->meta_title : old('meta_title') }}">
    </div>

    <div class="form-group">
        <label for="meta_description">Meta_description</label>
        <textarea name="meta_description" class="form-control">{{ isset($product) ? $product->meta_description : old('meta_description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="featured">Featured</label>
        <div class="checkbox">
            <input type="hidden" name="featured" value="off">
            <input type="checkbox" name="featured" <?php if(isset($product) && $product->featured == true) echo "checked"?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success">
        </div>
    </div>
</div>

@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/summernote/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/i18n/vi.js') }}"></script>
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

    new Select2("#select2-product-tags", {
        placeholder: "#hashtag...",
        tags: true,
        ajax: {
            url: laroute.route("admin.tag.create"),
            processResults: function (response, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(response.data, function (item) {
                        return {
                            text: item['name'],
                            id: item['name']
                        }
                    }),
                    pagination: {
                        more: response.to < response.total
                    }
                };
            },
        }
    });

    new Select2("#select2-product-category", {
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
