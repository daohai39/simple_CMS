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
        <input type="name" name="name" required="required" class="form-control" placeholder="" value="{{ isset($project) ? $project->name : old('name') }}">
    </div>

    <div class="form-group">
        <label for="customer_id">Customer</label>
        <select name="customer_id" class="form-control select2" id="select2-project-customer">
            <option selected="selected" value="{{ isset($project->customer) ? $project->customer->id : old('customer_id') }}">
                {{ isset($project->customer) ? $project->customer->name : '' }}
            </option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea rows="10" name="description" required="required" class="form-control">{{ isset($project) ? $project->description : old('description') }}</textarea>
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
    select2 = new Select2("#select2-project-customer", {
        placeholder: "Customer ...",
        allowClear: true,
        ajax: {
            url: laroute.route("admin.customer.create"),
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
