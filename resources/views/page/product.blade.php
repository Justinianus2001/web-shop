@extends('master')
@section('content')
<div class="container_fullwidth">
    <div class="container">
        <div class="row">
        <div class="col-md-9">
            <div class="products-details">
            <div class="preview_image">
                <div class="preview-small">
                    <img style="width: 328px; height: 311px;" src="source/images/products/{{$product->image}}" alt="">
                </div>
            </div>
            <div class="products-description">
                <h5 class="name">
                    {{$product->name}}
                </h5>
                <p>
                    Availability: 
                    <span class=" light-red">
                        In Stock
                    </span>
                </p>
                <p>
                    {{$product->description}}
                </p>
                <hr class="border">
                @if($product->promotion_price != 0)
                <div class="price">
                    Price: 
                    <span class="new_price">
                        {{number_format($product->promotion_price)}}
                        <sup>VNĐ</sup>
                    </span>
                    <span class="old_price">
                        {{number_format($product->unit_price)}}
                        <sup>VNĐ</sup>
                    </span>
                </div>
                @else
                <div class="price">
                    Price: 
                    <span class="new_price">
                        {{number_format($product->unit_price)}}
                        <sup>VNĐ</sup>
                    </span>
                </div>
                @endif
                <hr class="border">
                <div class="wided">
                <form action="{{route('add-to-cart', $product->id)}}" method="GET" class="qty">
                    <input type="number" id="quantity" name="quantity" min="1" max="1000" value="1">
                    <input type="submit" class="button" value="Add To Cart">
                </form>
                <div class="button_group">
                    <button class="button compare">
                    <i class="fa fa-exchange">
                    </i>
                    </button>
                    <button class="button favorite">
                    <i class="fa fa-heart-o">
                    </i>
                    </button>
                    <button class="button favorite">
                    <i class="fa fa-envelope-o">
                    </i>
                    </button>
                </div>
                </div>
                <div class="clearfix">
                </div>
                <hr class="border">
                <img src="source/images/share.png" alt="" class="pull-right">
            </div>
            </div>
            <div class="clearfix">
            </div>
            <div class="tab-box">
            <div id="tabnav">
                <ul>
                    <li>
                        <a href="#Descraption">
                        DESCRIPTION
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content-wrap">
                <div class="tab-content" id="Descraption">
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus et eos aliquid id
                    excepturi cum fugit, repellendus consectetur vero optio tenetur facilis cupiditate error
                    expedita ipsa asperiores pariatur quis quos. Quae, consequatur eum. Maiores quisquam,
                    illum inventore totam neque architecto excepturi, perspiciatis, nihil vitae expedita
                    necessitatibus assumenda. Repellat, ea est sequi animi necessitatibus accusamus,
                    consequuntur tempore eum quisquam officiis magni esse ipsa possimus expedita sunt? Totam
                    amet, quos libero excepturi voluptas aliquam ab magnam vitae sapiente tempore dolorem
                    harum nemo labore veniam. Odit consectetur, velit fuga, saepe sed sit rerum temporibus
                    quam eum sunt laborum, delectus quo animi corrupti. Dolor!
                </p>
                </div>
                <div class="tab-content" id="Reviews">
                <form>
                    <table>
                    <thead>
                        <tr>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                            1 star
                        </th>
                        <th>
                            2 stars
                        </th>
                        <th>
                            3 stars
                        </th>
                        <th>
                            4 stars
                        </th>
                        <th>
                            5 stars
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            Quality
                        </td>
                        <td>
                            <input type="radio" name="quality" value="Blue"/>
                        </td>
                        <td>
                            <input type="radio" name="quality" value="">
                        </td>
                        <td>
                            <input type="radio" name="quality" value="">
                        </td>
                        <td>
                            <input type="radio" name="quality" value="">
                        </td>
                        <td>
                            <input type="radio" name="quality" value="">
                        </td>
                        </tr>
                        <tr>
                        <td>
                            Price
                        </td>
                        <td>
                            <input type="radio" name="price" value="">
                        </td>
                        <td>
                            <input type="radio" name="price" value="">
                        </td>
                        <td>
                            <input type="radio" name="price" value="">
                        </td>
                        <td>
                            <input type="radio" name="price" value="">
                        </td>
                        <td>
                            <input type="radio" name="price" value="">
                        </td>
                        </tr>
                        <tr>
                        <td>
                            Value
                        </td>
                        <td>
                            <input type="radio" name="value" value="">
                        </td>
                        <td>
                            <input type="radio" name="value" value="">
                        </td>
                        <td>
                            <input type="radio" name="value" value="">
                        </td>
                        <td>
                            <input type="radio" name="value" value="">
                        </td>
                        <td>
                            <input type="radio" name="value" value="">
                        </td>
                        </tr>
                    </tbody>
                    </table>
                    <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-row">
                        <label class="lebel-abs">
                            Your Name 
                            <strong class="red">
                            *
                            </strong>
                        </label>
                        <input type="text" name="" class="input namefild">
                        </div>
                        <div class="form-row">
                        <label class="lebel-abs">
                            Your Email 
                            <strong class="red">
                            *
                            </strong>
                        </label>
                        <input type="email" name="" class="input emailfild">
                        </div>
                        <div class="form-row">
                        <label class="lebel-abs">
                            Summary of You Review 
                            <strong class="red">
                            *
                            </strong>
                        </label>
                        <input type="text" name="" class="input summeryfild">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-row">
                        <label class="lebel-abs">
                            Your Name 
                            <strong class="red">
                            *
                            </strong>
                        </label>
                        <textarea class="input textareafild" name="" rows="7" >
                        </textarea>
                        </div>
                        <div class="form-row">
                        <input type="submit" value="Submit" class="button">
                        </div>
                    </div>
                    </div>
                </form>
                </div>
                <div class="tab-content" >
                <div class="review">
                    <p class="rating">
                    <i class="fa fa-star light-red">
                    </i>
                    <i class="fa fa-star light-red">
                    </i>
                    <i class="fa fa-star light-red">
                    </i>
                    <i class="fa fa-star-half-o gray">
                    </i>
                    <i class="fa fa-star-o gray">
                    </i>
                    </p>
                    <h5 class="reviewer">
                    Reviewer name
                    </h5>
                    <p class="review-date">
                    Date: 01-01-2014
                    </p>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a eros neque. In sapien est, malesuada non interdum id, cursus vel neque.
                    </p>
                </div>
                <div class="review">
                    <p class="rating">
                    <i class="fa fa-star light-red">
                    </i>
                    <i class="fa fa-star light-red">
                    </i>
                    <i class="fa fa-star light-red">
                    </i>
                    <i class="fa fa-star-half-o gray">
                    </i>
                    <i class="fa fa-star-o gray">
                    </i>
                    </p>
                    <h5 class="reviewer">
                    Reviewer name
                    </h5>
                    <p class="review-date">
                    Date: 01-01-2014
                    </p>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a eros neque. In sapien est, malesuada non interdum id, cursus vel neque.
                    </p>
                </div>
                </div>
                <div class="tab-content" id="tags">
                <div class="tag">
                    Add Tags : 
                    <input type="text" name="">
                    <input type="submit" value="Tag">
                </div>
                </div>
            </div>
            </div>
            <div class="clearfix">
            </div>
            <div id="productsDetails" class="hot-products">
                <h3 class="title">
                    Other
                    <strong>
                    Same
                    </strong>
                    Type Products
                </h3>
                <div class="control">
                    <a id="prev_hot" class="prev" href="#">&lt;</a>
                    <a id="next_hot" class="next" href="#">&gt;</a>
                </div>
                <ul id="hot">
                    <?php $cnt = 0; ?>
                    @foreach($other_same_product as $product)
                    @if($cnt == 0)
                    <li>
                        <div class="row">
                    @endif
                            <div class="col-md-4 col-sm-4">
                                <div class="products">
                                    @if($product->promotion_price != 0)
                                    <div class="offer">Sale</div>
                                    @endif
                                    <div class="thumbnail">
                                        <a href="{{route('product', $product->id)}}"><img style="width: 150px; height: 220px;" src="source/images/products/{{$product->image}}" alt="Product Name"></a>
                                    </div>
                                    <div class="productname">
                                    {{$product->name}}
                                    </div>
                                    @if($product->promotion_price == 0)
                                    <p class="price">{{number_format($product->unit_price)}} VNĐ</p>
                                    @else
                                    <p class="price">{{number_format($product->promotion_price)}} VNĐ  <strike style="display: inline-block; font-size: 12px; color: black;">{{number_format($product->unit_price)}} VNĐ</strike></p>
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
                    <?php $cnt = ($cnt + 1) % 3; ?>
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
            <div class="clearfix">
            </div>
        </div>
        <div class="col-md-3">
            <div class="special-deal leftbar">
                <h4 class="title">
                    Maybe you
                    <strong>
                    Like
                    </strong>
                </h4>
                @foreach($other_diff_product as $product)
                <div class="special-item">
                    <div class="product-image">
                        <a href="{{route('product', $product->id)}}">
                            <img src="source/images/products/{{$product->image}}" alt="">
                        </a>
                    </div>
                    <div class="product-info">
                        <p>
                            {{$product->name}}
                        </p>
                        @if($product->promotion_price)
                        <h5 class="price">
                            {{number_format($product->promotion_price)}}
                            <strike style="color: gray;">{{number_format($product->unit_price)}}</strike>
                        </h5>
                        @else
                        <h5 class="price">
                            {{number_format($product->unit_price)}}
                        </h5>
                        @endif
                    </div>
                </div>
                @endforeach
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
            <div class="clearfix">
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