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
                @include('admin/mixins/alert')
                <form action="/admin/producers/create" method="Post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tên Nhà Sản Xuất</label>
                            <input type="text" name="name" class="form-control" id="title" placeholder="Nhập Tên Nhà Sản Xuất">
                        </div>
                        <div class="form-group">
                            <label for="title">Nơi Sản Xuất</label>
                            <input type="text" name="place" class="form-control" id="title"  placeholder="Nhập Nơi Sản Xuất">
                        </div>
                    </div>
                    @csrf
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tạo Mới</button>
                    </div>
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