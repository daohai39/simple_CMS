<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name <span required="required">*</span></label>
        <input type="name" name="name" required="required" class="form-control" placeholder="Name..." value="{{ isset($tag) ? $tag->name : old('name') }}">
    </div>
</div>
