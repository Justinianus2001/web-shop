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
                <form action="{{route('admin/admin/edit', $admin->id)}}" method="POST" enctype="multipart/form-data">
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
                        <label for="username">Username</label>
                        <input class="form-control" name="username" id="username" value="{{$admin->username}}">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password">
                    </div>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-default">Admin Edit</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection