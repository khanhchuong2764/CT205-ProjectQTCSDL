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
                <!-- /.card -->
                </div>
                <div class="card-body">
                    @if ($record->title)
                        <h1 class="mb-4">{{$record->title}}</h1>
                    @endif
                    @if ($record->category->title)
                        <div class="mb-4">Danh Mục: <b>{{$record->category->title}}</b></div>
                    @endif
                    @if ($record->unit->title)
                        <div class="mb-4">Đơn Vị: <b>{{$record->unit->title}}</b></div>
                    @endif
                    @if ($record->producers->name)
                        <div class="mb-4">Nhà Sản Xuất: <b>{{$record->producers->name}}</b></div>
                    @endif
                    @if ($record->producers->place)
                        <div class="mb-4">Nơi Sản Xuất: <b>{{$record->producers->place}}</b></div>
                    @endif
                    @if ($record->price)
                        <div class="mb-4">Giá: <b>{{$record->price}}$</b></div>
                    @endif
                    @if ($record->discountpercentage)
                        <div class="mb-4">Giảm Giá: <b>{{$record->discountpercentage}}%</b></div>
                    @endif
                    @if ($record->stock)
                        <div class="mb-4">Số Lượng: <b>{{$record->stock}}</b></div>
                    @endif
                    @if ($record->thumbnail)
                        <div class="mb-4">
                            <img src='{{$record->thumbnail}}', alt="" style="width:200px">
                        </div>
                    @endif
                    @if ($record->status)
                        <div class="mb-4">
                            <span class="status-detail">Trạng Thái:</span>
                            @if ($record->status =='active')
                                <span class="badge badge-success">Hoạt Động</span>
                            @else
                            <span class="badge badge-danger"> Dừng Hoạt Động</span>
                            @endif
                        </div>
                    @endif
                    @if ($record->positions)
                        <div class="mb-4">Vị Trí: <b>{{$record->positions}}</b></div>
                    @endif
                    @if ($record->descriptions)
                        <div class="mb-4">Mô Tả: <b>{{$record->descriptions}}</b></div>
                    @endif
                    <a class="btn btn-warning btn-sm" href="/admin/product/edit/{{$record->id}}">Sửa</a>
                </div> 
                
                
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