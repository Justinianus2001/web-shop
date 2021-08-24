@extends('master_admin')
@section('content_admin')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin/product/edit', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" id="name" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label for="id_type">ID Type</label>
                        <select class="form-control" name="id_type">
                            @foreach($type_product as $tp)
                            @if($product->id_type == $tp->id)
                            <option value="{{$tp->id}}" selected>{{$tp->id}}</option>
                            @else
                            <option value="{{$tp->id}}">{{$tp->id}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Unit Price</label>
                        <input class="form-control" name="unit_price" id="unit_price" value="{{$product->unit_price}}">
                    </div>
                    <div class="form-group">
                        <label for="promotion_price">Promotion Price</label>
                        <input class="form-control" name="promotion_price" id="promotion_price" value="{{$product->promotion_price}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="clear-fix"></div>
                        <img width="500px" src="source/images/products/{{$product->image}}" alt="">
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input class="form-control" name="unit" id="unit" value="{{$product->unit}}">
                    </div>
                    <div class="form-group">
                        <label for="new">New</label>
                        <input class="form-control" name="new" id="new" value="{{$product->new}}">
                    </div>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection