<div>
    <h1>Edit Orders</h1>
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <style>
        .form-group {
            margin-bottom: 25px;
        }
    </style>
    <form wire:submit.prevent="updateData">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::label('title', 'Order Name:') !!}
                    <input class="form-control" wire:model="input.ordername" id="orderName" type="text" name="orderName"
                           placeholder="Order Name"/>
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Customer Name:') !!}
                    <input class="form-control" wire:model="input.customername" id="customerName" type="text"
                           name="customerName"
                           placeholder="Customer Name"/>
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Booking Date:') !!}
                    <input class="form-control form-control-solid" wire:model.lazy="input.bookingdate"
                           placeholder="Pick a booking date" id="bookingDate" name="bookingDate"/>
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Commission %:') !!}
                    <input class="form-control" wire:model="input.commission" id="commission" type="text" name="commission"
                           placeholder="Commission"/>
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Total Commission Payable:') !!}
                    <input class="form-control" wire:model="input.totalcommissionpayable" id="totalCommissionPayable"
                           type="text"
                           name="totalCommissionPayable"
                           placeholder="Total Commission Payable"/>
                </div>

                <div class="form-group">
                    {!! Form::label('title', '1st 50% Payable date show amount (14 days after booking date):') !!}
                    <input type="checkbox" wire:model.defer="input.first50" class="form-check-input" name="first50" id="first50"
                           @if(isset($first50) && $first50 =="1") checked="checked" @endif {{(old('first50') == "on") ? 'checked': ''}}>
                </div>

                <div id="firstpayment"
                     @if(isset($first50) && $first50 =="1") style="display:block;"
                @else
                    {{(old('first50') == "on") ? 'style=display:block;': 'style=display:none;'}}
                    @endif >
                    <div class="form-group">
                        {!! Form::label('title', '1st Payment date:') !!}
                        <input class="form-control form-control-solid" placeholder="Pick a first payment date"
                               id="firstpaymentdate" wire:model.lazy="input.firstpaymentdate" name="firstpaymentdate"/>
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', '1st Payment amount:') !!}
                        <input class="form-control" wire:model.defer="input.firstpaymentamount" id="firstpaymentamount" type="text"
                               name="firstpaymentamount"
                               placeholder="First payment amount"/>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('title', '2nd 50% Payable date show amount (7 days after delivery date):') !!}
                    <input type="checkbox" wire:model.defer="input.second50" class="form-check-input" name="second50" id="second50"
                           @if(isset($second50) && $second50 == "1") checked="checked" @endif {{(old('second50') == "on") ? 'checked': ''}}>
                </div>

                <div id="secondpayment"
                     @if(isset($second50) && $second50 =="1") style="display:block;"
                @else
                    {{(old('second50') == "on") ? 'style=display:block;': 'style=display:none;'}}
                    @endif >
                    <div class="form-group">
                        {!! Form::label('title', '2nd Payment date:') !!}
                        <input class="form-control form-control-solid" placeholder="Pick a second payment date"
                               id="secondpaymentdate" wire:model.lazy="input.secondpaymentdate" name="secondpaymentdate"/>
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', '2nd Payment amount:') !!}
                        <input class="form-control" wire:model.defer="input.secondpaymentamount" id="secondpaymentamount"
                               type="text"
                               name="secondpaymentamount"
                               placeholder="Second payment amount"/>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('title', 'Order cancelled by customer:') !!}
                    <input type="checkbox" class="form-check-input" wire:model.defer="input.cancelorder" name="cancelorder"
                           id="cancelorder"
                           @if(isset($cancle) && $cancle == "1") checked="checked" @endif {{(old('cancelorder') == "on") ? 'checked': ''}}>
                </div>

                <div id="cancelorderpayment"
                     @if(isset($cancle) && $cancle =="1") style="display:block;"
                @else
                    {{(old('cancelorder') == "on") ? 'style=display:block;': 'style=display:none;'}}
                    @endif >
                    <div class="form-group">
                        {!! Form::label('title', 'Before first payment:') !!}
                        <input type="radio" class="form-check-input mb-3" wire:model.defer="input.canceledBeforeFirstPayment"
                               name="beforeAfter" id="beforeAfter" value="1"
                               @if(isset($beforAfter) && $beforAfter == "0") checked="checked" @endif>
                        <br>
                        {!! Form::label('title', 'After first payment:') !!}
                        <input type="radio" class="form-check-input" wire:model.defer="input.canceledBeforeFirstPayment"
                               name="beforeAfter" id="beforeAfter" value="0"
                               @if(isset($beforAfter) && $beforAfter == "1") checked="checked" @endif>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    {!! Form::label('title', 'Partner Name:') !!}
                    <select id="partners_id" name="partners_id" wire:model.defer="input.partners_id" class="form-select">
                        <option value="">Select Partner Name</option>
                        @if(isset($partners))
                            @foreach($partners as $partner)
                                <option value="{{$partner->id}}"
                                        @if(isset($partners_id) && $partners_id == $partner->id) selected @endif>{{$partner->title}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('title', 'Venues Name:') !!}
                    <input class="form-control" wire:model="input.venuesname" id="venuesname" type="text" name="venuesname"
                           placeholder="Venues name"/>
                </div>

                <div class="form-group">
                    {!! Form::label('title', 'Delivery Date:') !!}
                    <input class="form-control form-control-solid" placeholder="Pick a delivery date" id="deliverydate"
                           wire:model.lazy="input.deliverydate" name="deliverydate"/>
                </div>

                <div class="form-group">
                    {!! Form::label('title', 'Total Hire (excludes VAT, Travel & Damage Deposit):') !!}
                    <input class="form-control" wire:model="input.totalhire" id="totalhire" type="text" name="totalhire"
                           placeholder="Total Hire"/>
                </div>
                <div class="form-group">
                    {!! Form::label('pdfFile', 'PDF File Upload:') !!}
                    {!! Form::file('pdfFile'); !!}
                    <input type="hidden" name="old_pdfFile" id="old_pdfFile" class="form-control"
                           value="@if(isset($pdfFile) && $pdfFile != ''){{$pdfFile}}@endif">
                    <a href="{{ asset('Pdffiles')}}/@if(isset($pdfFile) && $pdfFile != ''){{$pdfFile}}@endif"
                       target="_blank">@if(isset($pdfFile) && $pdfFile != ''){{$pdfFile}}@endif</a>
                </div>

                <div class="form-group">
                    {!! Form::label('firstcommission', '1st Commission Paid:') !!}
                    <input type="checkbox" class="form-check-input" wire:model="input.firstcommission" name="firstcommission"
                           id="firstcommission"
                           @if(isset($firstcommission) && $firstcommission == "1") checked="checked" @endif {{(old('firstcommission') == "on") ? 'checked': ''}}>
                </div>

                <div class="form-group">
                    {!! Form::label('secondcommission', '2nd Commission Paid:') !!}
                    <input type="checkbox" class="form-check-input" wire:model="input.secondcommission"
                           name="secondcommission"
                           id="secondcommission"
                           @if(isset($secondcommission) && $secondcommission == "1") checked="checked" @endif {{(old('secondcommission') == "on") ? 'checked': ''}}>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/documentation/forms/daterangepicker.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>

    </script>
    <script>
        new Pikaday({ field: document.getElementById('bookingDate') });
        new Pikaday({ field: document.getElementById('firstpaymentdate') });
        new Pikaday({ field: document.getElementById('secondpaymentdate') });
        new Pikaday({ field: document.getElementById('deliverydate') });

        $('#first50').click(function () {
            if ($(this).is(":checked")) {
                $("#firstpayment").css('display', 'block');
                $("#firstpayment").show();
            } else {
                $("#firstpayment").hide();
            }
        });

        $('#second50').click(function () {
            if ($(this).is(":checked")) {
                $("#secondpayment").css('display', 'block');
                $("#secondpayment").show();
            } else {
                $("#secondpayment").hide();
            }
        });

        $('#cancelorder').click(function () {
            if ($(this).is(":checked")) {
                $("#cancelorderpayment").css('display', 'block');
                $("#cancelorderpayment").show();
            } else {
                $("#cancelorderpayment").hide();
            }
        });
    </script>
</div>
