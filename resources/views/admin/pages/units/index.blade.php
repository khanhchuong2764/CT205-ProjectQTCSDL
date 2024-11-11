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
                        <a href='/admin/unit/create' class="btn btn-dark btn-outline-success">+Thêm Mới</a>
                    </div>
                <!-- /.card -->
                </div>
                @include('admin/mixins/alert')
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Đơn Vị</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($record as $item)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="/admin/unit/edit/{{$item->id}}">Sửa</a>
                                        <button class="btn btn-danger btn-sm ml-1" button-delete data-id={{$item->id}}>Xóa</button>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            
                <form action="" id="formchangeStatus" method="POST" data-path='/admin/unit/ChangeStatus/'>
                    @csrf
                    @method('Patch')
                </form> 
                <form action="" id="formDelete" method="POST" data-path ='/admin/unit/delete/'>
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