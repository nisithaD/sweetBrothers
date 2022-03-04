<div>
    <style>
        .form-group{
            margin-bottom: 20px;
        }
    </style>
    <h1>Edit partner</h1>
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <h5>Profile Details</h5>
            <div class="form-group">
                {!! Form::label('title','Company name:') !!}
                <input type="text" name="title" wire:model.defer="title" placeholder="Company name" class="form-control">
            </div>

            <div class="form-group">
                {!! Form::label('fulladdress', 'Full Address:') !!}
                <textarea name="address" class="form-control" wire:model.defer="address"></textarea>
            </div>

            <div class="form-group">
                {!! Form::label('phone_number', 'Phone Number:') !!}
                <input type="text" name="phone_number" wire:model.defer="phone_number" placeholder="Phone Number" class="form-control">
            </div>

            <div class="form-group">
                {!! Form::label('contacts', 'Contacts Full Name:') !!}
                <input type="text" name="contacts_full_name" wire:model.defer="contacts_full_name" placeholder="Contacts full name" class="form-control">
            </div>


            <div class="form-group">
                {!! Form::label('email_id', 'Email Address:') !!}
                <input type="email" name="email" wire:model.defer="email" placeholder="Email" class="form-control">
            </div>

            <div class="form-group">
                {!! Form::label('pass', 'Password:') !!}
                <input type="password" name="password" wire:model.defer="password" id="passwords" class="form-control" value=""
                       placeholder="**************" autocomplete="new-password">
                <input type="hidden" name="old_password" id="old_password" class="form-control"
                       value="@if(isset($password) && $password != ''){{$password }}@endif">
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Promo code:') !!}
                <input type="text" name="promo_code" wire:model.defer="promo_code" placeholder="Promo code" class="form-control">
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Image Upload:') !!}
                @if (isset($image))
                    Photo Preview:
                    <img width="10%" src="{{ $image->temporaryUrl() }}">
                @endif
                <br>
                <input type="file" wire:model.lazy="image">
                <br>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <h5>Payout Details</h5>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::label('image', 'No payout required:') !!}
                    <input type="checkbox" name="noPayOut" wire:model="noPayOut" id="noPayOut"
                           @if(isset($nopayOut) && $nopayOut == "1") checked="checked" @endif>
                </div>
            </div>
            <div class="col-sm-6 col-md-6" id="payout" @if(isset($noPayOut) && $noPayOut == "1") style="display:none;" @endif>
                <div class="form-group">
                    {!! Form::label('bank_name', 'Bank Name:') !!}
                    <input type="text" name="bank_name" wire:model.defer="bank_name" placeholder="Bank name" class="form-control">
                </div>

                <div class="form-group">
                    {!! Form::label('accountname', 'Name of Account:') !!}
                    <input type="text" name="account_name" wire:model.defer="account_name" placeholder="Account Name" class="form-control">
                </div>

                <div class="form-group">
                    {!! Form::label('sort_code', 'Sort Code:') !!}
                    <input type="text" name="sort_code" wire:model.defer="sort_code" placeholder="Sort code" class="form-control">
                </div>

                <div class="form-group">
                    {!! Form::label('account_number', 'Account Number:') !!}
                    <input type="text" name="account_number" wire:model.defer="account_number" placeholder="Account Number" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" wire:click="editPartner">Update</button>
</div>
