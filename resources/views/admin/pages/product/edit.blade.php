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
                <form action="/admin/product/edit/{{$record->id}}" method="Post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tiêu Đề</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Nhập Tiêu Đề" value='{{$record->title}}'>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Danh Mục Cha</label>
                            <select name="categoryId" class="form-control" id="parent_id">
                                <option  value=''>--Chọn Danh Mục--</option>
                                 {!! App\Helpers\CategoryHelper::MenuEdit($category,$record->categoryid) !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nhà Sản Xuất</label>
                            <select name="producersId" class="form-control">
                                <option selected disabled>--Chọn Nhà Sản Xuất--</option>
                                @foreach ($producerss as $item)
                                    <option value={{$item->id}} {{$item->id == $record->producersid ? "selected" :""}} >{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- categoryid --}}
                        <div class="form-group">
                            <label for="">Đơn Vị</label>
                            <select name="unitId" class="form-control">
                                <option selected disabled>--Chọn Nhà Đơn Vị--</option>
                                @foreach ($units as $item)
                                    <option value={{$item->id}} {{$item->id == $record->unitid ? "selected" :""}}>{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="desc">Mô Tả</label>
                            <textarea name="descriptions" id="desc" class="form-control textarea-timymce" rows ="5">{{$record->descriptions}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" class="form-control" name='price' id="price" value={{$record->price}} min="0">
                        </div>
                        <div class="form-group">
                            <label for="discountpercent">% Giảm Giá</label>
                            <input type="number" class="form-control" name='discountPercentage' id="discountpercent" value={{$record->discountpercentage}} min="0">
                        </div>
                        <div class="form-group">
                            <label for="stock">Số Lượng</label>
                            <input type="number" class="form-control" name='stock' id="stock" value={{$record->stock}} min="0">
                        </div>
                        <div class="form-group" uploads-image>
                            <label for="thumbnail">Ảnh</label>
                            <input type="file" id="thumbnail" name="file" class="form-control-file" accept="image/*" uploads-image-input>
                            <img src={{$record->thumbnail}}  alt="" uploads-image-previews class="imguploads">
                            <button type="button" class="btn btn-secondary btn-sm ml-3 btn-delete-uploads" button-delete-uploads>Xóa</button>
                        </div> 
                        <div class="form-group">
                            <label for="position">Vị Trí</label>
                            <input type="number" class="form-control" name="positions" id="position"  placeholder="Tự Động Tăng" min='1' value={{$record->positions }}>
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