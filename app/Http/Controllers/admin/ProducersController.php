<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\producers;
class ProducersController
{
    public function index(Request $request) {

        $record = producers::paginate(10);
        return view('admin/pages/producers/index',[
            'titlePage' => 'Danh Sách Nhà Sản Xuất',
            'record' => $record
        ]);
    }


    public function create() {
        return view('admin/pages/producers/create',[
            'titlePage' => 'Thêm Mới Nhà Sản Xuất'
        ]);
    }

    public function createPost(Request $request) {   
        try {
            $newIdResult = DB::select("SELECT producers_id_seq.NEXTVAL AS id FROM dual");
            $newId = 'NXS' . str_pad($newIdResult[0]->id, 2, '0', STR_PAD_LEFT); 
            $request['id'] = $newId;
            producers::create($request->all());
            session()->flash('success', 'Thêm Nhà Sản Xuất Thành Công');
            return redirect("/admin/producers");
        } catch (\Exception $th) {
            return redirect()->back();
        }
    }

    public function edit(Request $request,string $id) {   
        $record = producers::find($id);
        return view('admin.pages.producers.edit',[
            'titlePage' => 'Chỉnh Sửa Nhà Sản Xuất',
            'record' => $record
        ]); 
    }

    public function editPatch(Request $request ,string $id) {   
        producers::find($id)->update($request->all());
        session()->flash('success', 'Đã Cập Nhật Nhà Sản Xuất Thành Công');
        return redirect()->back();
    }

    public function Delete(Request $request,string $id) {
        producers::find($id)->delete();
        session()->flash('success', 'Đã Xóa Nhà Sản Xuất Thành Công');
        return redirect()->back();
    }
}
