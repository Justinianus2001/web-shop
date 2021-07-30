@extends('master')
@section('content')
<div class="container_fullwidth">
    <div class="container shopping-cart">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">
                Order History Detail
                </h3>
                <div class="clearfix">
                </div>
                <table class="shop-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_product as $product)
                        <tr>
                            <td>
                                <a href="{{route('product', $product->id)}}"><img src="source/images/products/{{$product->image}}" alt=""></a>
                            </td>
                            <td>
                                <div class="shop-details">
                                    <div class="productname">
                                        {{$product->name}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>
                                    @if($product->promotion_price != 0)
                                    {{number_format($product->promotion_price)}}
                                    @else
                                    {{number_format($product->unit_price)}}
                                    @endif
                                    VNĐ
                                </h5>
                            </td>
                            <td>
                                <h5>
                                    {{$product->quantity}}
                                </h5>
                            </td>
                            <td>
                                <h5>
                                    <strong>
                                        @if($product->promotion_price != 0)
                                        {{number_format($product->promotion_price * $product->quantity)}}
                                        @else
                                        {{number_format($product->unit_price * $product->quantity)}}
                                        @endif
                                        VNĐ
                                    </strong>
                                </h5>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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