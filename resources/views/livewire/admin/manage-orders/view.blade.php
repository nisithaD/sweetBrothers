<div>
    <h1>Order {{$order->id}}</h1>
    <hr/>
    <div class="row">
        <div class="col-lg-12">
            <p class="adm-orders__title">Billing Details</p>
            <div class="adm-orders__details">
                <div class="adm-orders__details--title">
                    Name:
                </div>
                <div class="adm-orders__details--info">
                    {{$order->firstname}} {{$order->lastname}}
                </div>
            </div>
            <div class="adm-orders__details">
                <div class="adm-orders__details--title">
                    Phone:
                </div>
                <div class="adm-orders__details--info">
                    {{$order->telephone}}
                </div>
            </div>
            <div class="adm-orders__details">
                <div class="adm-orders__details--title">
                    Email:
                </div>
                <div class="adm-orders__details--info">
                    {{$order->email}}
                </div>
            </div>
            <div class="adm-orders__details">
                <div class="adm-orders__details--title">
                    Address:
                </div>
                <div class="adm-orders__details--info">
                    {{$order->address}} <br> {{$order->addressline2}}
                </div>
            </div>
            <div class="adm-orders__details">
                <div class="adm-orders__details--title">
                    City:
                </div>
                <div class="adm-orders__details--info">
                    {{$order->city}}
                </div>
            </div>
            <div class="adm-orders__details">
                <div class="adm-orders__details--title">
                    Postcode:
                </div>
                <div class="adm-orders__details--info">
                    {{$order->postalcode}}
                </div>
            </div>
        </div>
    </div>

    <p class="admin-orders__title" style="font-size:2.5rem;font-weight:bold;margin-top:2rem">Order Summary</p>

    <table class="table">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        @php
            $total="0"
        @endphp

        @foreach($order->cartproducts as $products)
            <tr>
                <td>{{$products->title}}</td>
                <td>£{{number_format($products->price,2)}}</td>
                <td>{{$products->quantity}}</td>
                <td>£{{number_format($products->total,2)}}</td>
            </tr>
            @php
                $total=$total+$products->total
            @endphp
        @endforeach
    </table>
    <p>
        <strong>Postage:</strong> £{{number_format($order->postage_price,2)}} ({{$order->postage_option}})<br>
        <strong>Total:</strong> £{{number_format($order->total,2)}}
    </p>
</div>
