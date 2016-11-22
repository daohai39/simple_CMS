<div class="box-body">
    {{ csrf_field() }}
    <div class="col-md-5">
        <div class="box-body">
            <div class="form-group">
            <label for="name">Name <span required="required">*</span> </label>
            <input type="text" name="name" required="required" class="form-control"  value="{{ isset($product) ? $product->name : old('name') }}">
        </div>
        </div>
    </div>

    <div class="col-md-1"></div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="code">Code <span required="required">*</span> </label>
            <input type="text" name="code" required="required" class="form-control"  value="{{ isset($product) ? $product->code : old('code') }}">
        </div>

        <div class="form-group">
            <label for="designer">Designer <span required="required">*</span> </label>
            <select name="designer" multiple="multiple" required="required" class="form-control select2" id="select2-product-designer">
                @if(isset($product) && $product->designer)
                <option selected="selected" value="{{ $product->designer->name }}">
                    {{ $product->designer->name }}
                </option>
                @elseif(old('designer'))
                <option selected="selected" value="{{ old('designer') }}">
                    {{ old('designer') }}
                </option>
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="category">Category <span required="required">*</span> </label>
            <select name="category" required="required" class="form-control select2" id="select2-product-category">
                @if(isset($product) && $product->category)
                <option selected="selected" value="{{ $product->category->name }}">
                    {{ $product->category->name }}
                </option>
                @elseif(old('category'))
                <option selected="selected" value="{{ old('category') }}">
                    {{ old('category') }}
                </option>
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select name="tags[]" multiple="multiple" class="form-control select2" id="select2-product-tags">
                @if(isset($product))
                    @foreach($product->tags as $tag)
                        <option value="{{ $tag->name }}" selected="selected">{{ $tag->name }}</option>
                    @endforeach
                @elseif(old('tags') && is_array(old('tags')))
                    @foreach(old('tags') as $tag)
                        <option value="{{ $tag }}" selected="selected">{{ $tag }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <wysiwyg>
                <textarea class="form-control" name="description" slot="textarea">{!! isset($product) ? $product->description : old('description') !!}</textarea>
            </wysiwyg>
        </div>

        <div class="form-group">
            <label for="featured">Featured</label>
            <div class="checkbox">
                <input type="hidden" name="featured" value="off">
                <input type="checkbox" name="featured" <?php if(isset($product) && $product->featured == true) echo "checked"?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success">
            </div>
        </div>

        <div class="form-group">
            <label for="images_id[]">Images</label>
            <upload-image
                resource="product"
                @if(isset($product))
                    :item="{{ $product }}"
                @endif
            ></upload-image>
        </div>

        <div class="form-group">
            <label for="meta_title">Meta_title</label>
            <input type="text" name="meta_title" class="form-control" value="{{ isset($product) ? $product->meta_title : old('meta_title') }}">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta_description</label>
            <textarea name="meta_description" class="form-control"> {!! $product->meta_description or old('meta_description')  !!} </textarea>
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
    <script src="{{ asset('assets/vendor/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>
@endpush

@push('post-scripts')
<script src="{{ asset('assets/js/backend/form.js') }}"></script>
<script>
    new Select2("#select2-product-tags", {
        placeholder: "#tag...",
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
            }
        }
    });

    new Select2("#select2-product-category", {
        placeholder: "Choose Category",
        ajax: {
            url: laroute.route("admin.category.create"),
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page,
                }
            },
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

    new Select2("#select2-product-designer", {
        placeholder: "Designer",
        tags: true,
        maximumSelectionLength: 1,
        ajax: {
            url: laroute.route("admin.designer.create"),
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page,
                }
            },
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
</script>
@endpush
