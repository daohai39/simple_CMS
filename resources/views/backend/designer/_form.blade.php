<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name<span required="required">*</span></label>
        <input type="name" name="name" required="required" class="form-control" placeholder="" value="{{ isset($designer) ? $designer->name : old('name') }}">
    </div>

    <div class="form-group">
        <label for="facebook">Facebook</label>
        <input type="facebook" name="facebook" class="form-control" placeholder="" value="{{ isset($designer) ? $designer->facebook : old('facebook') }}">
    </div>

    <div class="form-group">
        <label for="name">Email</label>
        <input type="email" name="email" class="form-control" placeholder="" value="{{ isset($designer) ? $designer->email : old('email') }}">
    </div>

    <div class="form-group">
        <label for="name">Phone</label>
        <input type="phone" name="phone" class="form-control" placeholder="" value="{{ isset($designer) ? $designer->phone : old('phone') }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"> {!! $designer->description or old('description')  !!} </textarea>
    </div>

    <div class="form-group">
        <label for="images_id[]">Images</label>
        <upload-image
            resource = "designer"
            @if(isset($designer))
                :item = "{{ $designer }}"
            @endif
        ></upload-image>
    </div>
</div>

@push('post-scripts')
    <script src="{{ asset('assets/js/backend/form.js') }}"></script>
@endpush
