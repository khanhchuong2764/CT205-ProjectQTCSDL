<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
class CategoryController
{
    public function index(Request $request) {
        $find = [
            'deleted' => false
        ];
        $FillterStatus = [
            [
                'name' => 'Tất Cả',
                'status' => '',
                'class' => ''
            ],
            [
                'name' => 'Hoạt Động',
                'status' => 'active',
                'class' => ''
            ],
            [
                'name' => 'Dừng Hoạt Động',
                'status' => 'inactive',
                'class' => ''
            ]
        ];
        $status = $request->input('status');
        if ($status) {
            foreach ($FillterStatus as $key => $value) {
                if($value['status'] == $status) {
                    $FillterStatus[$key]['class']='active';
                }
            }
            $find['status'] = $status;
        }else {
            $FillterStatus[0]['class']='active';
        }
        $productsQuery = CategoryProduct::where($find);
       
        // Search
        $keyword = $request->input('keyword');
        if ($keyword) {
            $productsQuery->whereRaw('REGEXP_LIKE(title, ?, \'i\')', [$keyword]);
        }
        $ObjectPagination = [   
            'currentPage' => 1,
            'limitItemt' => 5
        ];
        $count = $productsQuery->count();
        $ObjectPagination['totalPage'] = ceil($count / ($ObjectPagination['limitItemt']) );
        $ObjectPagination['currentPage'] =  $request->input('page');    
        $ObjectPagination['skip'] = (($ObjectPagination['currentPage'] - 1 ) * ($ObjectPagination['limitItemt']));
        $record = $productsQuery->skip($ObjectPagination['skip'])->take($ObjectPagination['limitItemt'])->orderBy('positions', 'desc')->get();
        return view('admin/pages/category/index',[
            'titlePage' => 'Danh Mục Sản Phẩm',
            'record' => $record,
            'keyword' => $keyword,
            'FillterStatus' => $FillterStatus,
            'objectPagi' => $ObjectPagination
        ]);
    }

    public function create() {
        $find = [
            'deleted' => false
        ];
        $record = CategoryProduct::where($find)->get();
        return view('admin/pages/category/create',[
            'titlePage' => 'Thêm Mới Danh Mục',
            'record' => $record
        ]);
    }

    public function createPost(Request $request) {   
        $newIdResult = DB::select("SELECT category_id_seq.NEXTVAL AS id FROM dual");
        $newId = 'DM' . str_pad($newIdResult[0]->id, 3, '0', STR_PAD_LEFT); 
        $request['id'] = $newId;
        $positions = $request->input('positions');
        $find = [
            'deleted' => false
        ];
        if ($positions) {
            $positions = (int)$positions;
        }else {
            $positions =CategoryProduct::where($find)->count() + 1;   
        }
        $request['positions'] = $positions;
        CategoryProduct::create($request->all());
        session()->flash('success', 'Thêm Danh Mục Thành Công');
        return redirect("/admin/category");
    }

    public function ChangeStatus(Request $request,string $id,string $status) {   
        CategoryProduct::find($id)->update(['status' => $status]);
        session()->flash('success', 'Cập nhật Trạng Thái thành công');
        return redirect()->back();
    }

    public function delete(Request $request,string $id) {
        CategoryProduct::find($id)->update(['deleted' => true]);
        session()->flash('success', 'Đã Xóa Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function edit(Request $request,string $id) {   
        $record = CategoryProduct::find($id);
        $recordcategory = CategoryProduct::where('deleted', false)
                                     ->where('id', '!=', $record->id)
                                     ->get();
        return view('admin.pages.category.edit',[
            'titlePage' => 'Chỉnh Sửa Sản Phẩm',
            'record' => $record, 
            'recordcategory' => $recordcategory
        ]);
    }

    public function editPatch(Request $request ,string $id) {   
        $positions = $request->input('positions');
        $find = [
            'deleted' => false
        ];
        if ($positions) {
            $positions = (int)$positions;
        }else {
            $positions =CategoryProduct::where($find)->count() + 1;   
        }   
        $request['positions'] = $positions;
        CategoryProduct::find($id)->update($request->all());
        session()->flash('success', 'Đã Cập Nhật Thành Công Sản Phẩm');
        return redirect()->back();
    }

    public function changeMulti(Request $request) { 
        $ids = explode(',',$request->input('ids'));
        $type = $request->input('type');
        switch ($type) {
            case 'active':
                CategoryProduct::whereIn('id', $ids)->update(['status' => 'active']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " sản phẩm thành công");
                break;
            case 'inactive':
                CategoryProduct::whereIn('id', $ids)->update(['status' => 'inactive']);
                session()->flash('success', "Cập nhật trạng thái của " . count($ids) .  " sản phẩm thành công");
                break;
            case 'delete':
                CategoryProduct::whereIn('id', $ids)->update(['deleted' => true]);
                session()->flash('success', "Đã Xóa Thành Công " . count($ids) .  " Sản Phẩm");
                break;
            case 'positions':
                foreach ($ids as $key => $value) {
                    [$id,$positions] = explode('/',$value); 
                    $positions = (int)$positions;
                    CategoryProduct::find($id)->update(['positions' => $positions]);
                    session()->flash('success', 'Cập nhật vị trí sản phẩm thành công');
                }
                break;
        }
        return redirect()->back();
    }
}
