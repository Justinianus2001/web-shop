@extends('master')
@section('content')
<div class="container_fullwidth">
    <div class="container shopping-cart">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">
                Order History
                </h3>
                <div class="clearfix">
                </div>
                <table class="shop-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date Order</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$bill->isEmpty())
                        <?php $id = 1; ?>
                        @foreach($bill as $b)
                        <tr>
                            <td>
                                <h5><?= $id ?></h5>
                            </td>
                            <td>
                                <h5>{{$b->date_order}}</h5>
                            </td>
                            <td>
                                <h5>{{number_format($b->total)}} VNĐ</h5>
                            </td>
                            <td>
                                <h5>{{$b->payment}}</h5>
                            </td>
                            <td>
                                @if($b->status == -1)
                                <h5 style="font-weight: 400; color: red;">Rejected</h5>
                                @elseif($b->status == 0)
                                <h5 style="font-weight: 400; color: orange;">In Progress</h5>
                                @elseif($b->status == 1)
                                <h5 style="font-weight: 400; color: green;">Accepted</h5>
                                @else
                                <h5 style="font-weight: 400; color: blue;">Finished</h5>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('order-history/detail', $b->id)}}">
                                    <img src="source/images/message.png" alt="">
                                </a>
                            </td>
                        </tr>
                        <?php $id ++ ?>
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
                            <td>
                            </td>
                        </tr>
                        @endif
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