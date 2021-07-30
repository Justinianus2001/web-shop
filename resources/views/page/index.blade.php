@extends('master')
@section('content')
<div class="hom-slider">
    <div class="container">
        <div id="sequence">
            <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
            <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
            <ul class="sequence-canvas">
                @foreach($slide as $sl)
                <li class="animate-in">
                    <div class="flat-caption caption2 formLeft delay400">
                        <h1>Collection For Winter</h1>
                    </div>
                    <div class="flat-caption caption3 formLeft delay500">
                        <h2>Etiam velit purus, luctus vitae velit sedauctor<br>egestas diam, Etiam velit purus.</h2>
                    </div>
                    <div class="flat-button caption5 formLeft delay600"><a class="more" href="#">More Details</a></div>
                    <div class="flat-image formBottom delay200" data-bottom="true"><a href="{{$sl->link}}"><img src="source/images/{{$sl->image}}" alt=""></div></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="promotion-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="promo-box"><img src="source/images/promotion-01.png" alt=""></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="promo-box"><img src="source/images/promotion-02.png" alt=""></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="promo-box"><img src="source/images/promotion-03.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="container_fullwidth">
    <div class="container">
        <div class="hot-products">
            <a href="{{route('product-list', 0)}}"><h3 class="title"><strong>New</strong> Products</h3></a>
            <p>Found {{count($new_product)}} product(s)</p>
            <div class="control"><a id="prev_hot" class="prev" href="#">&lt;</a><a id="next_hot" class="next" href="#">&gt;</a></div>
            <ul id="hot">
                <?php $cnt = 0; ?>
                @foreach($new_product as $new)
                @if($cnt == 0)
                <li>
                    <div class="row">
                @endif
                        <div class="col-md-3 col-sm-6">
                            <div class="products">
                                <div class="offer">New</div>
                                <div class="thumbnail"><a href="{{route('product', $new->id)}}"><img style="width: 150px; height: 220px;" src="source/images/products/{{$new->image}}" alt="Product Name"></a></div>
                                <div class="productname">{{$new->name}}</div>
                                @if($new->promotion_price == 0)
                                <p class="price">{{number_format($new->unit_price)}} VNĐ</p>
                                @else
                                <p class="price">{{number_format($new->promotion_price)}} VNĐ  <strike style="display: inline-block; font-size: 12px; color: black;">{{number_format($new->unit_price)}} VNĐ</strike></p>
                                @endif
                                <div class="button_group"><a href="{{route('add-to-cart', $new->id)}}" class="button add-cart">Add To Cart</a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                            </div>
                        </div>
                <?php $cnt = ($cnt + 1) % 4; ?>
                @if($cnt == 0)
                    </div>
                </li>
                @endif
                @endforeach
                @if($cnt != 0)
                    </div>
                </li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="featured-products">
            <a href="{{route('product-list', -1)}}"><h3 class="title"><strong>Sale</strong> Products</h3></a>
            <p>Found {{count($sale_product)}} product</p>
            <div class="control"><a id="prev_featured" class="prev" href="#">&lt;</a><a id="next_featured" class="next" href="#">&gt;</a></div>
            <ul id="featured">
                <?php $cnt = 0; ?>
                @foreach($sale_product as $sale)
                @if($cnt == 0)
                <li>
                    <div class="row">
                @endif
                        <div class="col-md-3 col-sm-6">
                            <div class="products">
                                <div class="offer">Sale</div>
                                <div class="thumbnail"><a href="{{route('product', $sale->id)}}"><img style="width: 150px; height: 220px;" src="source/images/products/{{$sale->image}}" alt="Product Name"></a></div>
                                <div class="productname">{{$sale->name}}</div>
                                @if($sale->promotion_price == 0)
                                <p class="price">{{number_format($sale->unit_price)}} VNĐ</p>
                                @else
                                <p class="price">{{number_format($sale->promotion_price)}} VNĐ  <strike style="display: inline-block; font-size: 12px; color: black;">{{number_format($sale->unit_price)}} VNĐ</strike></p>
                                @endif
                                <div class="button_group"><a href="{{route('add-to-cart', $sale->id)}}" class="button add-cart">Add To Cart</a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                            </div>
                        </div>
                <?php $cnt = ($cnt + 1) % 4; ?>
                @if($cnt == 0)
                    </div>
                </li>
                @endif
                @endforeach
                @if($cnt != 0)
                    </div>
                </li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="our-brand">
            <h3 class="title"><strong>Our </strong> Brands</h3>
            <div class="control"><a id="prev_brand" class="prev" href="#">&lt;</a><a id="next_brand" class="next" href="#">&gt;</a></div>
            <ul id="braldLogo">
                <li>
                <ul class="brand_item">
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/envato.png" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/themeforest.png" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/photodune.png" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/activeden.png" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/envato.png" alt=""></div>
                        </a>
                    </li>
                </ul>
                </li>
                <li>
                <ul class="brand_item">
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/envato.png" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/themeforest.png" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/photodune.png" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/activeden.png" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="source/images/envato.png" alt=""></div>
                        </a>
                    </li>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection