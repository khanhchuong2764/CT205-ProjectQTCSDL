@extends('admin/layouts/default')


@section('content')
<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary mt-3">
            <div class="card-header">
                <h3 class="card-title">{{$titlePage}}</h3>
                <div>
                    <a href='/admin/account/create' class="btn btn-dark btn-outline-success">+Thêm Mới</a>
                </div>
            <!-- /.card -->
            </div>
            @include('admin/mixins/alert')
            <table class="table table-hover" checkbox-multi>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Avatar</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($record as $item)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>
                                    <img src='{{$item->avatar}}', width="120px" height="auto">
                                </td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    @if ($item->status == 'active')
                                        <a href="#" class="badge badge-success" button-change-status data-id={{$item->id}}  data-status={{$item->status}}>Hoạt Động</a>
                                    @else
                                        <a href="#" class="badge badge-danger"  button-change-status data-id={{$item->id}} data-status={{$item->status}} >Dừng Hoạt Động</a>
                                    @endif
                                </td>
                                <td>
                                    {{-- <a class="btn btn-secondary btn-sm btn-detail" href="/admin/account/detail/{{$item->id}}">Chi Tiết</a> --}}
                                    <a class="btn btn-warning btn-sm" href="/admin/account/edit/{{$item->id}}">Sửa</a>
                                    <button class="btn btn-danger btn-sm ml-1" button-delete data-id={{$item->id}}>Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table> 
            <form action="" id="formDelete" method="POST" data-path ='/admin/account/delete/'>
                @csrf
                @method('Delete')
            </form>
        <!--/.col (left) -->    
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection




