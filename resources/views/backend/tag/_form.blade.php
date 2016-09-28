<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Tên <span required="required">*</span></label>
        <input type="name" name="name" required="required" class="form-control" placeholder="Tên..." value="{{ isset($tag) ? $tag->name : old('name') }}">
    </div>
</div>
