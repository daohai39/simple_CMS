<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name<span required="required">*</span></label>
        <input type="text" name="name" required="required" class="form-control" placeholder="" value="{{ isset($customer) ? $customer->name : old('name') }}">
    </div>
    <div class="form-group">
        <label for="name">Email<span required="required">*</span></label>
        <input type="email" name="email" required="required" class="form-control" placeholder="" value="{{ isset($customer) ? $customer->email : old('email') }}">
    </div>
    <div class="form-group">
        <label for="name">Phone Number<span required="required">*</span></label>
        <input type="text" name="phone" class="form-control" placeholder="" value="{{ isset($customer) ? $customer->phone : old('phone') }}">
    </div>
    <div class="form-group">
        <label for="name">Address</label>
        <input type="text" name="address" class="form-control" placeholder="" value="{{ isset($customer) ? $customer->address : old('address') }}">
    </div>
</div>
