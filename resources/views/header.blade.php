<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="logo"><a href="index"><img src="source/images/logo.png" alt="FlatShop"></a></div>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="header_top">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="option_nav">
                            <li class="dorpdown">
                            <a href="#">Eng</a>
                            <ul class="subnav">
                                <li><a href="#">Eng</a></li>
                                <li><a href="#">Vns</a></li>
                                <li><a href="#">Fer</a></li>
                                <li><a href="#">Gem</a></li>
                            </ul>
                            </li>
                            <li class="dorpdown">
                            <a href="#">USD</a>
                            <ul class="subnav">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">UKD</a></li>
                                <li><a href="#">FER</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <ul class="topmenu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Recruiment</a></li>
                            <li><a href="#">Media</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="usermenu">
                            @if(Auth::check())
                            <li><a href="{{route('index')}}" class="log">Hello, {{Auth::user()->full_name}}</a></li>
                            <li><a href="{{route('logout')}}" class="reg">Logout</a></li>
                            @else
                            <li><a href="{{route('login')}}" class="log">Login</a></li>
                            <li><a href="{{route('signup')}}" class="reg">Register</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                </div>
                <div class="clearfix"></div>
                <div class="header_bottom">
                <ul class="option">
                    <li id="search" class="search">
                        <form action="{{route('search')}}" method="GET">
                            <input class="search-submit" type="submit" value="">
                            <input class="search-input" placeholder="Enter your search key" type="text" name="key">
                        </form>
                    </li>
                    <li class="option-cart">
                        <a href="#" class="cart-icon">cart <span class="cart_no">@if(Session::has('cart')) {{Session('cart')->totalQty}} @else Empty @endif</span></a>
                        <ul class="option-cart-item">
                            @if(Session::has('cart'))
                            @foreach($product_cart as $product)
                            <li>
                                <div class="cart-item">
                                    <a href="{{route('product', $product['item']['id'])}}" class="image"><img src="source/images/products/{{$product['item']['image']}}" alt=""></a>
                                    <div class="item-description">
                                        <p class="name">{{$product['item']['name']}}</p>
                                        <p>Quantity: <span class="light-red">{{$product['qty']}}</span></p>
                                    </div>
                                    <div class="right">
                                        <p class="price">@if($product['item']['promotion_price'] != 0) {{number_format($product['item']['promotion_price'])}} @else {{number_format($product['item']['unit_price'])}} @endif</p>
                                        <a href="{{route('del-cart', $product['item']['id'])}}" class="remove"><img src="source/images/remove.png" alt="remove"></a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                            <li><span class="total">Total <strong>@if(Session::has('cart')) {{number_format(Session('cart')->totalPrice)}} @else 0 @endif VNĐ</strong></span>
                            <a href="{{route('checkout')}}"><button class="checkout">CheckOut</button></a></li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active dropdown">
                            <a href="{{route('index')}}">Home</a>
                        </li>
                        <li>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Products</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu-links">
                                    @foreach($type_product as $product)
                                    <li><a href="{{route('product-list', $product->id)}}">{{$product->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{route('contact')}}">Contact us</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>