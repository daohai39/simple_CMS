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
        <label for="parent_id">Parent</label>
        <select name="parent_id" class="form-control select2">
            <option selected="selected" value="{{ isset($category->parent) ? $category->parent->id : old('parent_id') }}">
                {{ isset($category->parent) ? $category->parent->name : '' }}
            </option>
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
            }
        }
    });
</script>
@endpush
