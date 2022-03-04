<style>p{padding: 0px;margin:0;} .clear{clear: both;}</style>
<div style="width: 49%;display: inline-block;">
    <img src="{{url('')}}/img/logo-alt.png" style="width:200px;">
</div>
<div style="width: 49%;display: inline-block;padding-bottom: 5px;text-align: right;color: #dd1d80;font-weight: bold;">

</div>
<h1>Quote {{$order->id}}</h1>
<hr/>
<div class="clear"></div>

<div class="">
    <h4 style="font-size:1.2rem;margin-bottom:0px;">Customer Details</h4>
    <p class="bg-info">Name: {{$order->fullname}}</p>
    <p class="bg-info">Email: {{$order->email}}</p>
    <p class="bg-info">Phone:{{$order->phone}}</p>
    <p class="bg-info">Date:{{$order->date}}</p>
    <p class="bg-info">Event Type:{{$order->event_type}}</p>
    <p class="bg-info">Venue:{{$order->venue}}</p>
    <p class="bg-info">Heard about Sweet Brothers From:{{$order->heard_from}}</p>
    <p class="bg-info">Booking Time:{{$order->booking_time}}</p>
    <p class="bg-info">Promo Code:{{$order->promo_code}}</p>

</div>

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

    </tr>
    </thead>
    <tbody>
    @foreach ($order->cartproducts as $products)
        <tr>
            <td style="text-align: center;">{{$products->title}}</td>
            <td style="text-align: center;">{{$products->quantity}}</td>
        </tr>
        @php
            $total=$total+$products->total;
        @endphp
    @endforeach
    </tbody>
</table>
<hr/>

<br/>
