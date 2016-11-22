@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/select2/select2.full.min.js') }}"></script>
@endpush

<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name<span required="required">*</span></label>
        <input type="name" name="name" required="required" class="form-control" placeholder="" value="{{ isset($category) ? $category->name : old('name') }}">
    </div>

    <div class="form-group">
        <label for="parent">Parent</label>
        <select name="parent" class="form-control select2">
            @if(isset($category) && $category->parent)
            <option selected="selected" value="{{ $category->parent->name }}">
                {{ $category->parent->name }}
            </option>
            @elseif(old('parent'))
            <option selected="selected" value="{{ old('parent') }}">
                {{ old('parent') }}
            </option>
            @endif
        </select>
    </div>
</div>

@push('post-scripts')
<script>
    select2 = new Select2("select", {
        placeholder: "Become Root Category",
        allowClear: true,
        ajax: {
            url: laroute.route("admin.category.create"),
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page,
                    type: 'root',
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
