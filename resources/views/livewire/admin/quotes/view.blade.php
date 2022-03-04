<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <style>
        .ui-state-active h4,
        .ui-state-active h4:visited {
            color: #3c8dbc;
        }

        .ui-menu-item {
            height: 80px;
            border: 1px solid #ececf9;
        }

        .ui-widget-content .ui-state-active {
            background-color: white !important;
            border: wave !important;
        }

        .list_item_container {
            width: 740px;
            height: 80px;
            margin-left: 9%;
        }

        .ui-widget-content .ui-state-active .list_item_container {
            background-color: #f5f5f5;
        }

        .image {
            width: 15%;
            float: left;
            padding: 10px;
        }

        .image img {
            width: 80px;
            height: 60px;
        }

        .label {
            width: 85%;
            float: right;
            white-space: nowrap;
            overflow: hidden;
            color: rgb(60, 141, 188);
            text-align: left;
        }

        input:focus {
            background-color: #f5f5f5;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css"
          media="all"/>
    <!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">
        <!-- begin::Invoice 1-->
        <div class="card">
            <!-- begin::Body-->
            <div class="card-body py-20">
                <!-- begin::Wrapper-->
                <div class="mx-auto w-100">
                    <!-- begin::Header-->
                    <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                        <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">Quote {{$order->id}}</h4>
                    </div>
                    <div class="text-sm">
                        <h5>Billing Details</h5>
                        <!--begin::Section-->
                        <div class="d-flex flex-column mw-md-300px w-100">
                            <!--begin::Item-->
                            <div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
                                <!--begin::Accountname-->
                                <div class="fw-bold pe-5">Name:</div>
                                <!--end::Accountname-->
                                <!--begin::Label-->
                                <div class="text-end fw-norma">{{$order->fullname}}</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
                                <!--begin::Accountnumber-->
                                <div class="fw-bold pe-5">Phone:</div>
                                <!--end::Accountnumber-->
                                <!--begin::Number-->
                                <div class="text-end fw-norma">{{$order->phone}}</div>
                                <!--end::Number-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack text-gray-800 fs-6">
                                <!--begin::Code-->
                                <div class="fw-bold pe-5">Email:</div>
                                <!--end::Code-->
                                <!--begin::Label-->
                                <div class="text-end fw-norma">{{$order->email}}</div>
                                <!--end::Label-->
                            </div>
                            @if(isset($order->event_type))
                                <div class="d-flex flex-stack text-gray-800 fs-6 mt-3">
                                    <!--begin::Code-->
                                    <div class="fw-bold pe-5">Event Type:</div>
                                    <!--end::Code-->
                                    <!--begin::Label-->
                                    <div class="text-end fw-norma">{{$order->event_type}}</div>
                                    <!--end::Label-->
                                </div>
                            @endif

                            @if(isset($order->venue))
                                <div class="d-flex flex-stack text-gray-800 fs-6 mt-3">
                                    <!--begin::Code-->
                                    <div class="fw-bold pe-5">Venue:</div>
                                    <!--end::Code-->
                                    <!--begin::Label-->
                                    <div class="text-end fw-norma">{{$order->venue}}</div>
                                    <!--end::Label-->
                                </div>
                            @endif

                            @if(isset($order->heard_from))
                                <div class="d-flex flex-stack text-gray-800 fs-6 mt-3">
                                    <!--begin::Code-->
                                    <div class="fw-bold pe-5">Where did you hear about us?:</div>
                                    <!--end::Code-->
                                    <!--begin::Label-->
                                    <div class="text-end fw-norma">{{$order->heard_from}}</div>
                                    <!--end::Label-->
                                </div>
                            @endif

                            @if(isset($order->booking_time))
                                <div class="d-flex flex-stack text-gray-800 fs-6 mt-3">
                                    <!--begin::Code-->
                                    <div class="fw-bold pe-5">Booking Time:</div>
                                    <!--end::Code-->
                                    <!--begin::Label-->
                                    <div class="text-end fw-norma">{{$order->booking_time}}</div>
                                    <!--end::Label-->
                                </div>
                            @endif

                            @if(isset($order->promo_code))
                                <div class="d-flex flex-stack text-gray-800 fs-6 mt-3">
                                    <!--begin::Code-->
                                    <div class="fw-bold pe-5">Promo Code:</div>
                                    <!--end::Code-->
                                    <!--begin::Label-->
                                    <div class="text-end fw-norma"> {{$order->promo_code}}</div>
                                    <!--end::Label-->
                                </div>
                        @endif
                        <!--end::Item-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="border-bottom pb-12">
                        <p class="admin-orders__title" style="font-size:2rem;font-weight:bold;margin-top:2rem">Order
                            Summary</p>
                        <div class="input-group mb-5">
                            <span class="input-group-text" style="background-color: #4fc9da; color: whitesmoke"
                                  id="inputGroup-sizing-default">Products search</span>
                            <input type="text" class="form-control" id="search" aria-label="Sizing example input"
                                   aria-describedby="inputGroup-sizing-default" wire:model="query"
                                   placeholder="Enter product title here"/>
                            <!-- search box container ends  -->
                        </div>
                        @if($query!=="")
                            <div class="ui-widget-content" style="margin-bottom: 20px">
                                <div class="dropdown">
                                    @foreach ($searchProducts as $searchProduct)
                                        <a class="btn"
                                           wire:click="addProductToList({{$searchProduct['id']}},{{$order['id']}})">
                                            <div class="list_item_container">
                                                <div class="image"><img src="/img/products/{{$searchProduct['image']}}">
                                                </div>
                                                <div class="label"><h4><b>{{$searchProduct['title']}}</b></h4></div>
                                            </div>
                                        </a>
                                        {{--                                                                            <a class="dropdown-item" href="#">{{$product['title']}}</a>--}}
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Event Date</label><input type="text"
                                                                                       wire:model="eventDate"
                                                                                       class="form-control"
                                                                                       placeholder="Event Date"/>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Venue</label>
                                    <input type="text" class="form-control" wire:model="eventVenue"
                                           placeholder="Venue"/>
                                </div>
                            </div>
                        </div>

                        <!--begin::Wrapper-->
                        <div class="d-flex justify-content-between flex-column flex-md-row">
                            <!--begin::Content-->
                            <div class="flex-grow-1 pt-8 mb-13">
                                <!--begin::Table-->
                                <div class="table-responsive border-bottom mb-14">
                                    <table class="table">
                                        <thead>
                                        <tr class="border-bottom fs-6 fw-bolder text-muted text-uppercase">
                                            <th class="text-center"> #</th>
                                            <th class="text-center"> Product</th>
                                            <th class="text-center"> Qty</th>
                                            <th class="text-center"> Unit price</th>
                                            <th class="text-center"> Unit price after discount</th>
                                            <th class="text-center"> Total</th>
                                            <th class="text-center"> Info</th>
                                            <th class="text-center"> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->cartproducts as $productKey=>$products)
                                            <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                <td class="d-flex align-items-center pt-11">{{$productKey+1}}</td>
                                                <td class="pt-11">
                                                    <p class="align-items-start">{{$products->title}}</p>
                                                    @foreach($productImages[$productKey] as $key=>$productImage)
                                                        @if($products->product_id===$productImage['product_id'] && $key==0)
                                                            <a href="/img/productimg/{{$productImage["image"]}}"
                                                               id="test"
                                                               data-toggle="lightbox" data-gallery="hidden-images"
                                                               class="col-4">
                                                                <img src="/img/productimg/{{$productImage['image']}}"
                                                                     style="width: 100px"
                                                                     class="img-fluid">
                                                                <input type="hidden" id="key" value="{{$key}}">
                                                            @else
                                                                <!-- elements not showing, use data-remote -->
                                                                    @if(isset($productImage->image))
                                                                        <div data-toggle="lightbox"
                                                                             data-gallery="hidden-images"
                                                                             data-remote="/img/productimg/{{$productImage->image}}"
                                                                             data-title="Hidden item 1">

                                                                        </div>
                                                        @endif
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="pt-11">
                                                    <input type="number" name='qty[]'
                                                           placeholder='Enter Qty'
                                                           wire:model="productQty.{{ $productKey }}"
                                                           wire:change="updateQty({{$productKey}},{{$products->product_id}})"
                                                           class="form-control qty" step="0"
                                                           min="0"/>
                                                </td>
                                                <td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest">
                                                    <input type="number" name='price[]' placeholder='Enter Unit Price'
                                                           class="form-control price" step="0.00" min="0"
                                                           wire:model="productUnitPrice.{{$productKey}}"
                                                           wire:change="updateUnitPrice({{$productKey}},{{$products->product_id}})"/>
                                                </td>
                                                <td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest">
                                                    <input type="number" name='discountedPrice[]'
                                                           placeholder='Enter Discounted Unit Price'
                                                           class="form-control discountedPrice"
                                                           wire:model="discounted_quote_price.{{$productKey}}"
                                                           wire:change="updateUnitPriceAfterDiscount({{$productKey}},{{$products->product_id}})"
                                                           step="0.00"
                                                           min="0"/>
                                                </td>
                                                <td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest">
                                                    <input type="number" name='total[]'
                                                           wire:model="product_total.{{$productKey}}"
                                                           placeholder='0.00'
                                                           class="form-control total"
                                                           readonly/>
                                                </td>
                                                <td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest"><a
                                                        href="/wbpa/quotes/viewInfo/{{$order->id}}/{{$products->product_id}}"
                                                        class="btn btn-primary btn-sm">
                                                        <span class="fa fa-info-circle"></span>
                                                    </a>
                                                </td>
                                                <td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest">
                                                    <button class="btn btn-danger btn-sm" id="deleteProduct"
                                                            wire:click="deleteProduct({{$order->id}},{{$products->product_id}})"><span
                                                            class="fa fa-trash"></span></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column mw-md-300px w-100">
                                    <!--begin::Label-->
                                    <table class="table table-bordered table-hover" id="tab_logic_total">
                                        <tbody>
                                        <tr>
                                            <th class="text-start">Set-up Fee</th>
                                            <td class="text-center">
                                                <div class="input-group mb-2 mb-sm-0">
                                                    <input type="number"
                                                           class="form-control"
                                                           wire:model="setupFee" wire:change="updateSetupFee"
                                                           id="setupFee"
                                                           placeholder="0">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Travel Cost</th>
                                            <td class="text-center">
                                                <div class="input-group mb-2 mb-sm-0">
                                                    <input type="number"
                                                           class="form-control"
                                                           wire:model="travelCost" wire:change="updateTravelCost"
                                                           id="travelCost"
                                                           placeholder="0">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Damage deposit</th>
                                            <td class="text-center">
                                                <div class="input-group mb-2 mb-sm-0">
                                                    <input type="number"
                                                           class="form-control"
                                                           wire:model="damageDeposit" wire:change="updateDamageDeposit"
                                                           id="damageDeposit"
                                                           placeholder="0">
                                                </div>
                                            </td>
                                        </tr>
                                        {{--                    <tr>--}}
                                        {{--                        <th class="text-center">VAT</th>--}}
                                        {{--                        <td class="text-center">--}}
                                        {{--                            <div class="input-group mb-2 mb-sm-0">--}}
                                        {{--                                @if($order->travelCost=="")--}}
                                        {{--                                    <input type="number" onchange="DefaultValueChange()" class="form-control"--}}
                                        {{--                                           value="{{$fees->vat}}" id="vat" placeholder="0">--}}
                                        {{--                                    <div class="input-group-addon">%</div>--}}
                                        {{--                                @else--}}
                                        {{--                                    <input type="number" onchange="DefaultValueChange()" class="form-control"--}}
                                        {{--                                           value="{{$order->vat}}" id="vat" placeholder="0">--}}
                                        {{--                                    <div class="input-group-addon">%</div>--}}
                                        {{--                                @endif--}}
                                        {{--                            </div>--}}
                                        {{--                        </td>--}}
                                        {{--                    </tr>--}}
                                        </tbody>
                                    </table>
                                    <!--end::Item-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Separator-->
                            <div class="border-end d-none d-md-block mh-450px mx-9"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="text-end pt-10">
                                <!--begin::Total Amount-->
                                <table class="table table-bordered">
                                    <tbody>
{{--                                    @foreach($discounts as $discount)--}}
{{--                                        @if(isset($discount) && $discount->id===$appliedDiscountId)--}}
{{--                                            <tr>--}}
{{--                                                <td class="">--}}
{{--                                                    <h4 style="text-weight:bold">{{$discount->title}}</h4>--}}
{{--                                                    <p>You have to spend {{$discount->minimum_req}} for the discount to--}}
{{--                                                        be--}}
{{--                                                        applied.</p>--}}
{{--                                                    <span id="discountApplied{{$discount->id}}" style="display: none"--}}
{{--                                                          class="label label-success w-25">Applied</span>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
                                    </tbody>
                                </table>
                                <!--end::Total Amount-->
                                <div class="border-bottom w-100 my-7 my-lg-16"></div>
                                <!--begin::Invoice To-->
                                <table class="table table-bordered table-hover"
                                       id="tab_logic_total">
                                    <tbody>
                                    <tr>
                                        <th class="text-start">Sub Total Of Products</th>
                                        <td class="text-center"><input type="number" name='sub_total_products'
                                                                       wire:model="sub_total_products"
                                                                       placeholder='0.00'
                                                                       class="form-control" id="sub_total" readonly/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">VAT</th>
                                        <td class="text-center">
                                            <div class="input-group mb-5">
                                                <input type="number"
                                                       class="form-control"
                                                       wire:model="vat"
                                                       wire:change="calculateVatAmount"
                                                       id="vat" placeholder="0"/>
                                                <span class="input-group-text">%</span>
                                            </div>
                                            {{--                                            <div class="input-group mb-2 mb-sm-0">--}}
                                            {{--                                                @if($order->vat=="")--}}
                                            {{--                                                    <input type="number" onchange="DefaultValueChange()"--}}
                                            {{--                                                           class="form-control"--}}
                                            {{--                                                           value="{{$fees->vat}}" id="vat" placeholder="0">--}}
                                            {{--                                                    <div class="input-group-addon">%</div>--}}
                                            {{--                                                @else--}}

                                            {{--                                                    <input type="number" onchange="DefaultValueChange()"--}}
                                            {{--                                                           class="form-control"--}}
                                            {{--                                                           value="{{$order->vat}}" id="vat" placeholder="0">--}}
                                            {{--                                                    <div class="input-group-addon">%</div>--}}
                                            {{--                                                @endif--}}
                                            {{--                                            </div>--}}
                                            {{--                            <div class="input-group mb-2 mb-sm-0">--}}
                                            {{--                                <input type="number" class="form-control" id="vat" placeholder="0">--}}
                                            {{--                                <div class="input-group-addon">%</div>--}}
                                            {{--                            </div>--}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">VAT Amount</th>
                                        <td class="text-center"><input type="number" wire:model="vat_amount"
                                                                       name='vat_amount'
                                                                       placeholder='0.00' class="form-control"
                                                                       readonly/></td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Total Extra Charges</th>
                                        <td class="text-center">
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input type="text" class="form-control"
                                                       placeholder='0.00' id="totalExtraCharge"
                                                       wire:model="total_extra_charges"
                                                       name="total_extra_charges" placeholder="0" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Sub Total</th>
                                        <td class="text-center"><input type="number" name='sub_total_amount'
                                                                       wire:model="sub_total" id="total_amount"
                                                                       placeholder='0.00' class="form-control"
                                                                       readonly/></td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Provide overall discount</th>
                                        <td class="text-center">
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input type="number"
                                                       class="form-control"
                                                       wire:model="overall_discount"
                                                       wire:change="provideOverallDiscount" id="vat" placeholder="0"/>
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Grand Total</th>
                                        <td class="text-center"><input type="number" name='grand_total_amount'
                                                                       id="grand_total_amount"
                                                                       placeholder='0.00' class="form-control"
                                                                       wire:model="final_grand_total" readonly/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--end::Invoice Date-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Body-->
                </div>
                <!-- end::Wrapper-->
            </div>
            <!-- end::Body-->
        </div>
        <!-- end::Invoice 1-->
    </div>
    <!--end::Container-->
</div>
