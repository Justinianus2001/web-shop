@extends('master')
@section('content')
<div class="container_fullwidth">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="checkout-page">
            <ol class="checkout-steps">
                <li class="steps active">
                <p class="step-title">
                    Login
                </p>
                <div class="step-description">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="new-customer">
                                <h5>
                                    New Customer
                                </h5>
                                <p class="requir">
                                    By creating an account you will be able to shop faste be up to date on an order's status, and keep track of the orders you have previously made.
                                </p>
                                <a href="{{route('signup')}}"><button>Sign Up</button></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="run-customer">
                                <h5>
                                    Rerunning Customer
                                </h5>
                                <form href="{{route('login')}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Email 
                                            <strong class="red">
                                            *
                                            </strong>
                                        </label>
                                        <input type="text" class="input namefild" name="email">
                                    </div>
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Password 
                                            <strong class="red">
                                            *
                                            </strong>
                                        </label>
                                        <input type="password" class="input namefild" name="password">
                                    </div>
                                    <button type="submit">
                                    Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
            </ol>
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