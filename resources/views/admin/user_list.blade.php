@extends('master_admin')
@section('content_admin')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    @if($u->id % 2 == 1)
                    <tr class="odd gradeX" align="center">
                    @else
                    <tr class="even gradeC" align="center">
                    @endif
                        <td>{{$u->id}}</td>
                        <td>{{$u->full_name}}</td>
                        <td>{{$u->email}}</td>
                        <td style="word-break: break-all;">{{$u->password}}</td>
                        <td>{{$u->phone}}</td>
                        <td>{{$u->address}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin/user/delete', $u->id)}}" onclick="return confirm('Are you sure ?')"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin/user/edit', $u->id)}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection