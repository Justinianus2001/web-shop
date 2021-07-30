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
                <form action="{{route('admin/user/edit', $user->id)}}" method="POST" enctype="multipart/form-data">
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
                        <label for="full_name">Full Name</label>
                        <input class="form-control" name="full_name" id="full_name" value="{{$user->full_name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" id="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" name="address" id="address" value="{{$user->address}}">
                    </div>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-default">User Edit</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection