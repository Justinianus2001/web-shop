@extends('master')
@section('content')
<div class="container_fullwidth">
    <div class="container">
        <div class="row">
        <div class="col-md-3">
            <div class="category leftbar">
                <h3 class="title">
                    Products
                </h3>
                <ul>
                    @foreach($type_product as $product)
                    <li><a href="{{route('product-grid', $product->id)}}">{{$product->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="fbl-box leftbar">
            <h3 class="title">
                Facebook
            </h3>
            <span class="likebutton">
                <a href="#">
                <img src="source/images/fblike.png" alt="">
                </a>
            </span>
            <p>
                12k people like Flat Shop.
            </p>
            <ul>
                <li>
                <a href="#">
                </a>
                </li>
                <li>
                <a href="#">
                </a>
                </li>
                <li>
                <a href="#">
                </a>
                </li>
                <li>
                <a href="#">
                </a>
                </li>
                <li>
                <a href="#">
                </a>
                </li>
                <li>
                <a href="#">
                </a>
                </li>
                <li>
                <a href="#">
                </a>
                </li>
                <li>
                <a href="#">
                </a>
                </li>
            </ul>
            <div class="fbplug">
                <a href="#">
                <span>
                    <img src="source/images/fbicon.png" alt="">
                </span>
                Facebook social plugin
                </a>
            </div>
            </div>
            <div class="leftbanner">
            <img src="source/images/banner-small-01.png" alt="">
            </div>
        </div>
        <div class="col-md-9">
            <div class="banner">
            <div class="bannerslide" id="bannerslide">
                <ul class="slides">
                <li>
                    <a href="#">
                    <img src="source/images/banner-01.jpg" alt=""/>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <img src="source/images/banner-02.jpg" alt=""/>
                    </a>
                </li>
                </ul>
            </div>
            </div>
            <div class="clearfix">
            </div>
            <div class="products-grid">
            <div class="toolbar">
                <div class="sorter">
                <div class="view-mode">
                    <a href="{{route('product-list', $type)}}" class="list">
                    List
                    </a>
                    <a href="{{route('product-grid', $type)}}" class="grid active">
                    Grid
                    </a>
                </div>
                <div class="sort-by">
                    Sort by: 
                    <select name="" >
                    <option value="Default" selected>
                        Default
                    </option>
                    <option value="Name">
                        Name
                    </option>
                    <option value="Price">
                        Price
                    </option>
                    </select>
                </div>
                <div class="limiter">
                    Show: 
                    <select name="" >
                    <option value="6" selected>
                        6
                    </option>
                    <option value="9">
                        9
                    </option>
                    <option value="12">
                        12
                    </option>
                    </select>
                </div>
                </div>
                <div class="pager">
                <a href="#" class="prev-page">
                    <i class="fa fa-angle-left">
                    </i>
                </a>
                <a href="#" class="active">
                    1
                </a>
                <a href="#">
                    2
                </a>
                <a href="#">
                    3
                </a>
                <a href="#" class="next-page">
                    <i class="fa fa-angle-right">
                    </i>
                </a>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <p>Found {{count($list_product)}} product(s)</p>
            <div class="row">
                @foreach($list_product as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="products">
                        @if($product->new != 0)
                        <div class="offer">New</div>
                        @endif
                        <div class="thumbnail">
                            <a href="{{route('product', $product->id)}}">
                                <img style="width: 150px; height: 220px;" src="source/images/products/{{$product->image}}" alt="Product Name">
                            </a>
                        </div>
                        <div class="productname">
                        {{$product->name}}
                        </div>
                        @if($product->promotion_price == 0)
                        <p class="price">{{number_format($product->unit_price)}} VNĐ</p>
                        @else
                        <p class="price">{{number_format($product->promotion_price)}} VNĐ <strike style="color: gray;">{{number_format($product->unit_price)}} VNĐ</strike></p>
                        @endif
                        <div class="button_group">
                        <a href="{{route('add-to-cart', $product->id)}}" class="button add-cart">
                            Add To Cart
                        </a>
                        <button class="button compare" type="button">
                            <i class="fa fa-exchange">
                            </i>
                        </button>
                        <button class="button wishlist" type="button">
                            <i class="fa fa-heart-o">
                            </i>
                        </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="clearfix">
            </div>
            <div class="toolbar">
                <div class="sorter bottom">
                <div class="view-mode">
                    <a href="{{route('product-list', $type)}}" class="list">
                    List
                    </a>
                    <a href="{{route('product-grid', $type)}}" class="grid active">
                    Grid
                    </a>
                </div>
                <div class="sort-by">
                    Sort by: 
                    <select name="" >
                    <option value="Default" selected>
                        Default
                    </option>
                    <option value="Name">
                        Name
                    </option>
                    <option value="Price">
                        Price
                    </option>
                    </select>
                </div>
                <div class="limiter">
                    Show: 
                    <select name="" >
                    <option value="6" selected>
                        6
                    </option>
                    <option value="9">
                        9
                    </option>
                    <option value="12">
                        12
                    </option>
                    </select>
                </div>
                </div>
                <div class="pager">
                <a href="#" class="prev-page">
                    <i class="fa fa-angle-left">
                    </i>
                </a>
                <a href="#" class="active">
                    1
                </a>
                <a href="#">
                    2
                </a>
                <a href="#">
                    3
                </a>
                <a href="#" class="next-page">
                    <i class="fa fa-angle-right">
                    </i>
                </a>
                </div>
            </div>
            <div class="clearfix">
            </div>
            </div>
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