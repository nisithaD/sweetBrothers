<div>
    <h1>Website Settings</h1>

    <style>
        .form-group{
            margin-bottom: 18px;
        }
    </style>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('facebook', 'Facebook:') !!}
                <input type="text" class="form-control" name="facebook" wire:model.defer="facebook">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('twitter', 'Twitter:') !!}
                <input type="text" class="form-control" name="twitter" wire:model.defer="twitter">

            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('instagram', 'Instagram:') !!}
                <input type="text" class="form-control" name="instagram" wire:model.defer="instagram">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('vimeo', 'Vimeo:') !!}
                <input type="text" class="form-control" name="vimeo" wire:model.defer="vimeo">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('youtube', 'Youtube:') !!}
                <input type="text" class="form-control" name="youtube" wire:model.defer="youtube">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('address', 'Leeds Address:') !!}
                <textarea name="address" wire:model="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                {!! Form::label('map_link', 'Leeds Google Map Url:') !!}
                <input type="text" class="form-control" name="map_link" wire:model.defer="map_link">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('address_two', 'London Address:') !!}
                <textarea name="address_two" wire:model="address_two" class="form-control"></textarea>
            </div>
            <div class="form-group">
                {!! Form::label('map_link_two', 'London Google Map Url:') !!}
                <input type="text" class="form-control" name="map_link_two" wire:model.defer="map_link_two">
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('phone', 'Phone:') !!}
        <input type="text" class="form-control" name="phone" wire:model.defer="phone">

    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        <input type="email" class="form-control" name="email" wire:model.defer="email">
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('setupFee', 'Set-up Fee:') !!}
                <input type="email" class="form-control" name="setupFee" wire:model.defer="setupFee">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('travelCost', 'Travel Cost:') !!}
                <input type="text" class="form-control" name="travelCost" wire:model.defer="travelCost">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('damageDeposit', 'Damage deposit:') !!}
                <input type="text" class="form-control" name="damageDeposit" wire:model.defer="damageDeposit">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('vat', 'VAT (%) :') !!}
                <input type="number" class="form-control" name="vat" wire:model.defer="vat">
            </div>
        </div>
    </div>
    <button class="btn btn-primary" wire:click="updateData">Update</button>
</div>
