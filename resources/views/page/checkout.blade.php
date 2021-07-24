@extends('master')
@section('content')
<div class="container_fullwidth">
    <div class="container shopping-cart">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">
                Checkout
                </h3>
                <div class="clearfix">
                </div>
                <table class="shop-table">
                    <thead>
                        <tr>
                            <th>
                                Image
                            </th>
                            <th>
                                Details
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Session::has('cart'))
                        @foreach($product_cart as $product)
                        <tr>
                            <td>
                                <a href="{{route('product', $product['item']['id'])}}"><img src="source/images/products/{{$product['item']['image']}}" alt=""></a>
                            </td>
                            <td>
                                <div class="shop-details">
                                    <div class="productname">
                                        {{$product['item']['name']}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>
                                    @if($product['item']['promotion_price'] != 0)
                                    {{number_format($product['item']['promotion_price'])}}
                                    @else
                                    {{number_format($product['item']['unit_price'])}}
                                    @endif
                                    VNĐ
                                </h5>
                            </td>
                            <td>
                                <h5>
                                    {{$product['qty']}}
                                </h5>
                            </td>
                            <td>
                                <h5>
                                    <strong class="red">
                                        @if($product['item']['promotion_price'] != 0)
                                        {{number_format($product['item']['promotion_price'] * $product['qty'])}}
                                        @else
                                        {{number_format($product['item']['unit_price'] * $product['qty'])}}
                                        @endif
                                        VNĐ
                                    </strong>
                                </h5>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="clearfix">
                </div>
                <form action="{{route('checkout')}}" method="POST">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="shippingbox">
                                <h5>
                                    Information
                                </h5>
                                <form>
                                    <div class="form-block">
                                        <label for="name">Name *</label>
                                        <input type="text" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-block">
                                        <label>Gender *</label>
                                        <input id="gender" type="radio" class="input-radio" name="gender" value="men" checked="checked" style="width: 10%"><p>Men</p>
                                        <div class="clearfix"></div>
                                        <input id="gender" type="radio" class="input-radio" name="gender" value="women" style="width: 10%"><p>Women</p>
                                    </div>
                                    <div class="form-block">
                                        <label for="email">Email *</label>
                                        <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                                    </div>
                                    <div class="form-block">
                                        <label for="adress">Address *</label>
                                        <input type="text" id="address" name="address" placeholder="Street Address" required>
                                    </div>
                                    <div class="form-block">
                                        <label for="phone">Phone *</label>
                                        <input type="text" id="phone" name="phone" placeholder="+84 xxx xxx xxx" required>
                                    </div>
                                    <div class="form-block">
                                        <label for="notes">Note</label>
                                        <input type="text" id="notes" name="note" placeholder="Note here">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="shippingbox">
                                <h5>
                                    Discount Code
                                </h5>
                                <form>
                                    <label>
                                    Enter your coupon code if you have one
                                    </label>
                                    <input type="text" name="">
                                    <div class="clearfix">
                                    </div>
                                </form>
                            </div>
                            <div class="shippingbox" style="text-align:center;">
                                <div class="subtotal">
                                    <h5>
                                    Sum Total
                                    </h5>
                                    <span>
                                    @if(Session::has('cart'))
                                    {{number_format(Session('cart')->totalPrice)}}
                                    @else
                                    0
                                    @endif
                                    VNĐ
                                    </span>
                                </div>
                                <div class="grandtotal">
                                    <h5>
                                    GRAND TOTAL 
                                    </h5>
                                    <span>
                                    @if(Session::has('cart'))
                                    {{number_format(Session('cart')->totalPrice)}}
                                    @else
                                    0
                                    @endif
                                    VNĐ
                                    </span>
                                </div>
                            </div>
                            <div class="shippingbox">
                                <div class="form-block">
                                    <label>Payment method</label>
                                    <input type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" style="width: 10%"><p>COD</p>
                                    <div class="clearfix"></div>
                                    <input type="radio" class="input-radio" name="payment_method" value="ATM" style="width: 10%"><p>ATM</p>
                                </div>
                            </div>
                            <button type="submit">
                                Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="our-brand">
        <h3 class="title">
            <strong>
            Our 
            </strong>
            Brands
        </h3>
        <div class="control">
            <a id="prev_brand" class="prev" href="#">
            &lt;
            </a>
            <a id="next_brand" class="next" href="#">
            &gt;
            </a>
        </div>
        <ul id="braldLogo">
            <li>
            <ul class="brand_item">
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/envato.png" alt="">
                    </div>
                </a>
                </li>
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/themeforest.png" alt="">
                    </div>
                </a>
                </li>
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/photodune.png" alt="">
                    </div>
                </a>
                </li>
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/activeden.png" alt="">
                    </div>
                </a>
                </li>
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/envato.png" alt="">
                    </div>
                </a>
                </li>
            </ul>
            </li>
            <li>
            <ul class="brand_item">
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/envato.png" alt="">
                    </div>
                </a>
                </li>
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/themeforest.png" alt="">
                    </div>
                </a>
                </li>
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/photodune.png" alt="">
                    </div>
                </a>
                </li>
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/activeden.png" alt="">
                    </div>
                </a>
                </li>
                <li>
                <a href="#">
                    <div class="brand-logo">
                    <img src="source/images/envato.png" alt="">
                    </div>
                </a>
                </li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
</div>
@endsection