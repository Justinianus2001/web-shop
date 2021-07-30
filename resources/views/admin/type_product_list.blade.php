@extends('master_admin')
@section('content_admin')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Type Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($type_product as $tp)
                    @if($tp->id % 2 == 1)
                    <tr class="odd gradeX" align="center">
                    @else
                    <tr class="even gradeC" align="center">
                    @endif
                        <td>{{$tp->id}}</td>
                        <td>{{$tp->name}}</td>
                        <td>{{$tp->description}}</td>
                        <td><img width="250px" src="source/images/products/{{$tp->image}}" alt=""></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin/type-product/delete', $tp->id)}}" onclick="return confirm('Are you sure ?')"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin/type-product/edit', $tp->id)}}">Edit</a></td>
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