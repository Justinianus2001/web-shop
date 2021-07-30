@extends('master_admin')
@section('content_admin')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>ID Type</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Promotion Price</th>
                        <th>Image</th>
                        <th>Unit</th>
                        <th>New</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $p)
                    @if($p->id % 2 == 1)
                    <tr class="odd gradeX" align="center">
                    @else
                    <tr class="even gradeC" align="center">
                    @endif
                        <td>{{$p->id}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->id_type}}</td>
                        <td>{{$p->description}}</td>
                        <td>{{number_format($p->unit_price)}}</td>
                        <td>{{number_format($p->promotion_price)}}</td>
                        <td><img width="250px" src="source/images/products/{{$p->image}}" alt=""></td>
                        <td>{{$p->unit}}</td>
                        <td>{{$p->new}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin/product/delete', $p->id)}}" onclick="return confirm('Are you sure ?')"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin/product/edit', $p->id)}}">Edit</a></td>
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