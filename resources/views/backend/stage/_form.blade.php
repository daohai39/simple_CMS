{{ csrf_field() }}
<input type="hidden" name="project_id" value="{{ isset($stage) ? $stage->project->id : $project_id }}">
<div class="col-md-6">
    <div class="box-body">
        <div class="form-group">
            <label for="name">Name<span required="required">*</span></label>
            <input type="text" name="name" required="required" class="form-control" placeholder="" value="{{ isset($stage) ? $stage->name : old('name') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="10" name="description" required="required" class="form-control">{{ isset($stage) ? $stage->description : old('description') }}</textarea>
        </div>

        <!-- <div class="form-group">
            <label for="images_id[]">Images</label>
            <upload-image
                resource = "stage"
                :thumbnailable = "false"
                @if(isset($stage))
                    :item = "{{ $stage }}"
                @endif
            ></upload-image>
        </div> -->

        <div class="form-group">
            <label for="documents_id[]">Documents</label>
            <upload-document
                resource = "stage"
                :thumbnailable = "false"
                @if(isset($stage))
                    :item = "{{ $stage }}"
                @endif
            ></upload-document>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="box-body">
        <div class="form-group">
            <label>Date Started</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="started_at" class="form-control pull-right" id="datepicker_started" value="{{ isset($stage) ? $stage->started_at : '' }}">
            </div>
        </div>

        <div class="form-group">
            <label>Date Finished</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="finished_at" class="form-control pull-right" id="datepicker_finished" value="{{ isset($stage) ? $stage->finished_at : '' }}">
            </div>
        </div>

        <div class="form-group">
            <label>Expected Cost</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="text" name="expected_cost" class="form-control" value="{{ isset($stage) ? $stage->expected_cost : '' }}">
            </div>
        </div>

        <div class="form-group">
            <label>Actual Cost</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="text" name="actual_cost" class="form-control" value="{{ isset($stage) ? $stage->actual_cost : '' }}">
            </div>
        </div>

        <div class="form-group">
            <label>Has Paid</label>
            <label>
                <input type="checkbox" name="paid" class="minimal" <?php echo (isset($stage) && $stage->paid == true) ? 'checked' : ( (old('paid') == 'on') ? 'checked' : '') ?>>
            </label>
        </div>
    </div>
</div>



@push('pre-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icheck/square/blue.css') }}">
@endpush

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/icheck/icheck.min.js') }}"></script>
@endpush

@push('post-scripts')
<script src="{{ asset('assets/js/backend/form.js') }}"></script>
<script>
    //Date picker
    $('#datepicker_started').datepicker({
      autoclose: true,
      format: "dd/mm/yyyy",
    });
    $('#datepicker_finished').datepicker({
      autoclose: true,
      format: "dd/mm/yyyy"
    });

    // iCheck
    $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
    });
</script>
@endpush
