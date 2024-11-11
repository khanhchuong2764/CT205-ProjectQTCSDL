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
                <form action="/admin/category/create" method="Post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tiêu Đề</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Nhập Tiêu Đề">
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Danh Mục Cha</label>
                            <select name="parent_id" class="form-control" id="parent_id">
                                <option selected value=>--Chọn Danh Mục--</option>
                                 {!! App\Helpers\CategoryHelper::Menu($record) !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Mô Tả</label>
                            <textarea name="description" id="content" class="form-control tinymece" rows ="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="position">Vị Trí</label>
                            <input type="number" class="form-control" name="positions" id="position"  placeholder="Tự Động Tăng" min='1'>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input type="radio" id="statusActive" name="status" class="form-check-input" checked value="active">
                            <label for="statusActive" class="form-check-lable">Hoạt Động</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input type="radio" id="statusInactive" name="status" class="form-check-input" value="inactive">
                            <label for="statusInactive" class="form-check-lable">Dừng Hoạt Động</label>
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