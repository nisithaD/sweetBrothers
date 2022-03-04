<style>p{padding: 0px;margin:0;} .clear{clear: both;}</style>
<div style="width: 49%;display: inline-block;padding-bottom: 5px;text-align: right;color: #dd1d80;font-weight: bold;">

</div>
<h1>Order {{$order->id}} - Invoice</h1>
<hr/>
<div class="clear"></div>

<div class="">
    <h4 style="font-size:1.2rem;margin-bottom:0px;">Customer Details</h4>
    <p class="bg-info">First Name: {{$order->firstname}}</p>
    <p class="bg-info" style="margin: 0;">Last Name: {{$order->lastname}}</p>
    <p class="bg-info">Email: {{$order->email}}</p>
    <p class="bg-info">Phone:{{$order->telephone}}</p>
</div>

<div style="width: 50%;float:left;">
    <h4 style="font-size:1rem;font-weight:bold;margin-bottom:0px;">Billing Details:</h4>
    <p class="bg-info">Address: {{$order->address}}</p>
    <p class="bg-info">Address: {{$order->addressline2}}</p>
    <p class="bg-info">City: {{$order->city}}</p>
    <p class="bg-info">Postcode: {{$order->postalcode}}</p>
</div>
<div style="width: 50%;float:left;">
    <h4 style="font-size:1rem;font-weight:bold;margin-bottom:0px;">Shiping Details:</h4>
    <p class="bg-info">Address: {{$order->addressshipping}}</p>
    <p class="bg-info">Address: {{$order->addressline2shipping}}</p>
    <p class="bg-info">City: {{$order->cityshipping}}</p>
    <p class="bg-info">Postcode: {{$order->postalcodeshipping}}</p>
</div>

<div class="clear"></div>
<br/>
<hr/>



</div>
@php
    $total="0";
@endphp
<table style="width: 100%;">
    <thead>
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($order->cartproducts as $products)
        <tr>
            <td style="text-align: center;">{{$products->title}}</td>
            <td style="text-align: center;">{{$products->quantity}}</td>
            <td style="text-align: center;">£{{number_format($products->price,2)}}</td>
            <td style="text-align: center;">£{{number_format($products->total,2)}}</td>
        </tr>
        @php
            $total=$total+$products->total;
        @endphp
    @endforeach
    </tbody>
</table>
<hr/>
<div style="float: right;padding-bottom: 10px;">

    <p class="bg-info">
        Postage: £{{$order->postage_price}}
    </p>
    <p class="bg-info">
        Total: £{{number_format($order->total,2)}}
    </p>
</div>
<br/>
<div class="clear"></div>
<hr/>
<br/>
