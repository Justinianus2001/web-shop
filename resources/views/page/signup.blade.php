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
                    Sign up
                </p>
                <div class="step-description">
                    <form action="{{route('signup')}}" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
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
                                <div class="your-details">
                                    <h5>
                                    Your Persional Details
                                    </h5>
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
                                            Full Name 
                                            <strong class="red">
                                            *
                                            </strong>
                                        </label>
                                        <input type="text" class="input namefild" name="name">
                                    </div>
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Address 
                                            <strong class="red">
                                            *
                                            </strong>
                                        </label>
                                        <input type="text" class="input namefild" name="address">
                                    </div>
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Telephone 
                                            <strong class="red">
                                            *
                                            </strong>
                                        </label>
                                        <input type="text" class="input namefild" name="phone">
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
                                        <div class="form-row">
                                            <label class="lebel-abs">
                                            Confirm Password 
                                            <strong class="red">
                                                *
                                            </strong>
                                            </label>
                                            <input type="password" class="input cpass" name="re_password">
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="your-details">
                                    <p>
                                    <span class="input-radio">
                                        <input type="radio" name="user">
                                    </span>
                                    <span class="text">
                                        I wish to subscribe to the Herbal Store newsletter.
                                    </span>
                                    </p>
                                    <p>
                                    <span class="input-radio">
                                        <input type="radio" name="user">
                                    </span>
                                    <span class="text">
                                        My delivery and billing addresses are the same.
                                    </span>
                                    </p>
                                    <p class="privacy">
                                    <span class="input-radio">
                                        <input type="radio" name="user">
                                    </span>
                                    <span class="text">
                                        I have read and agree to the 
                                        <a href="#" class="red">
                                        Privacy Policy
                                        </a>
                                    </span>
                                    </p>
                                    <button type="submit">
                                    Register
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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