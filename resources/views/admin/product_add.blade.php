@extends('master_admin')
@section('content_admin')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin/product/add')}}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="id_type">ID Type</label>
                        <select class="form-control" name="id_type">
                            @foreach($type_product as $tp)
                            <option value="{{$tp->id}}">{{$tp->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input class="form-control" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Unit Price</label>
                        <input class="form-control" name="unit_price" id="unit_price">
                    </div>
                    <div class="form-group">
                        <label for="promotion_price">Promotion Price</label>
                        <input class="form-control" name="promotion_price" id="promotion_price">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input class="form-control" name="unit" id="unit">
                    </div>
                    <div class="form-group">
                        <label for="new">New</label>
                        <input class="form-control" name="new" id="new">
                    </div>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-default" onclick="return confirm('Add product successfully !')">Product Add</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection