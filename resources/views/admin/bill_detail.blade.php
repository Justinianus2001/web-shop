@extends('master_admin')
@section('content_admin')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row" style="margin-top: 25px;">
            <a href="{{route('admin/bill/list')}}">
                <button class="btn btn-default">
                    Return List
                </button>
            </a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Info</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td>{{$user->full_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer
                    <small>Info</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->gender}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->phone_number}}</td>
                        <td style="word-break: break-all;">{{$customer->note}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Info</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill_detail as $product)
                    @if($product->id_product % 2 == 1)
                    <tr class="odd gradeX" align="center">
                    @else
                    <tr class="even gradeC" align="center">
                    @endif
                        <td>{{$product->id_product}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->unit_price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->

        <div class="row">
            <h4>Status: 
                @if($bill->status == -1)
                Rejected
                @elseif($bill->status == 0)
                In Queue
                @elseif($bill->status == 1)
                Accepted
                @else
                Finished
                @endif
            </h4>
            @if($bill->status == 0)
            <a href="{{route('admin/bill/reject', $id)}}">
                <button class="btn btn-default">
                    Reject
                </button>
            </a>
            @else
            <a href="{{route('admin/bill/reject', $id)}}">
                <button class="btn btn-default" style="color: gray;">
                    Reject
                </button>
            </a>
            @endif
            @if($bill->status == 0)
            <a href="{{route('admin/bill/accept', $id)}}">
                <button class="btn btn-default">
                    Accept
                </button>
            </a>
            @else
            <a href="{{route('admin/bill/accept', $id)}}">
                <button class="btn btn-default" style="color: gray;">
                    Accept
                </button>
            </a>
            @endif
            @if($bill->status == 1)
            <a href="{{route('admin/bill/finish', $id)}}">
                <button class="btn btn-default">
                    Finish
                </button>
            </a>
            @else
            <a href="{{route('admin/bill/finish', $id)}}">
                <button class="btn btn-default" style="color: gray;">
                    Finish
                </button>
            </a>
            @endif
        </div>
        <!-- /.row -->
    </div>

    <div style="margin-bottom: 25px;"></div>
    <!-- /.container-fluid -->
</div>
@endsection