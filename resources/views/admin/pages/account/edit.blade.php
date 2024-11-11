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
                @include('admin/mixins/alert')
                <form action="/admin/account/edit/{{$record->id}}" method="Post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fullname">Họ Tên *</label>
                            <input type="text" name="fullname" class="form-control" id="title" value='{{$record->fullname}}' >
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" name="email" class="form-control" id="title"  value='{{$record->email}}' >
                        </div>
                        <div class="form-group">
                            <label for="password">Mật Khẩu *</label>
                            <input type="password" name="password" class="form-control" id="title" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="text" name="phone" class="form-control" id="title"  value='{{$record->phone}}' >
                        </div>
                        <div class="form-group" uploads-image>
                            <label for="thumbnail">Avatar</label>
                            <input type="file" id="thumbnail" name="file" class="form-control-file" accept="image/*" uploads-image-input>
                            <img src={{$record->avatar}}  alt="" uploads-image-previews class="imguploads" >
                            <button type="button" class="btn btn-secondary btn-sm ml-3 btn-delete-uploads" button-delete-uploads>Xóa</button>
                        </div> 
                        <div class="form-group form-check form-check-inline">
                            <input type="radio" id="statusActive" name="status" class="form-check-input" {{$record->status == 'active' ? 'checked' :""}} value="active">
                            <label for="statusActive" class="form-check-lable">Hoạt Động</label>
                        </div>
                        <div class="form-group form-check form-check-inline">
                            <input type="radio" id="statusInactive" name="status" class="form-check-input" {{$record->status == 'inactive' ? 'checked' :""}} value="inactive">
                            <label for="statusInactive" class="form-check-lable">Dừng Hoạt Động</label>
                        </div>
                    </div>
                    @csrf
                    @method('PATCH')
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
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
