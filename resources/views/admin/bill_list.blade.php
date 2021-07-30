@extends('master_admin')
@section('content_admin')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bill
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Date Order</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Detail</th>
                        <th>Reject</th>
                        <th>Accept/Finish</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill as $b)
                    @if($b->id % 2 == 1)
                    <tr class="odd gradeX" align="center">
                    @else
                    <tr class="even gradeC" align="center">
                    @endif
                        <td>{{$b->id}}</td>
                        <td>{{$b->date_order}}</td>
                        <td>{{number_format($b->total)}}</td>
                        <td>{{$b->payment}}</td>
                        <td style="word-break: break-all;">{{$b->note}}</td>
                        <td>
                            @if($b->status == -1)
                            Rejected
                            @elseif($b->status == 0)
                            In Queue
                            @elseif($b->status == 1)
                            Accepted
                            @else
                            Finished
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin/bill/detail', $b->id)}}">Detail</a></td>
                        @if($b->status == 0)
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin/bill/reject', $b->id)}}">Reject</a></td>
                        @else
                        <td class="center" style="color: gray;"><i class="fa fa-pencil fa-fw"></i> Reject</td>
                        @endif
                        @if($b->status == 0)
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin/bill/accept', $b->id)}}">Accept</a></td>
                        @elseif($b->status == 1)
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin/bill/finish', $b->id)}}">Finish</a></td>
                        @else
                        <td class="center" style="color: gray;"><i class="fa fa-pencil fa-fw"></i> Finish</td>
                        @endif
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