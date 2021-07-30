@extends('master_admin')
@section('content_admin')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Type Product
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin/type-product/edit', $type_product->id)}}" method="POST" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" id="name" value="{{$type_product->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description">{{$type_product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="clear-fix"></div>
                        <img width="500px" src="source/images/products/{{$type_product->image}}" alt="">
                        <input type="file" name="image" id="image">
                    </div>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-default">Type Product Edit</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection