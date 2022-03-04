<div>
    <h1>Edit Coupon</h1>

    <div class="form-group mb-3">
        {!! Form::label('title', 'Coupon Code:') !!}
        <input type="text" name="title" wire:model="title" placeholder="Enter Title" class="form-control">
    </div>

    <div class="form-group">
        {!! Form::label('discount', '% Discount:') !!}
        <input type="number" step="1" name="discount" wire:model="discount" placeholder="Enter Discount" class="form-control">
    </div>
    <input type="button" class="btn btn-primary mt-5" value="Update" wire:click="updateCoupon({{$coupon->id}})">
</div>
