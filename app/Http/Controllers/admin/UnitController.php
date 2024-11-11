<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\unit;


class UnitController
{
    public function index(Request $request) {

        $record = Unit::paginate(10);
        return view('admin/pages/units/index',[
            'titlePage' => 'Danh Sách Đơn Vị',
            'record' => $record
        ]);
    }


    public function create() {
        return view('admin/pages/units/create',[
            'titlePage' => 'Thêm Mới Đơn Vị'
        ]);
    }

    public function createPost(Request $request) {   
        $newIdResult = DB::select("SELECT unit_id_seq.NEXTVAL AS id FROM dual");
        $newId = 'DV' . str_pad($newIdResult[0]->id, 3, '0', STR_PAD_LEFT); 
        $request['id'] = $newId;
        unit::create($request->all());
        session()->flash('success', 'Thêm Đơn Vị Thành Công');
        return redirect('/admin/unit');
    }

    public function edit(Request $request,string $id) {   
        $record = unit::find($id);
        return view('admin.pages.units.edit',[
            'titlePage' => 'Chỉnh Sửa Đơn Vị',
            'record' => $record
        ]); 
    }

    public function editPatch(Request $request ,string $id) {   
        try {
            unit::find($id)->update($request->all());
            session()->flash('success', 'Đã Cập Nhật Đơn Vị Thành Công');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect('/admin/unit');
        }
    }

    public function Delete(Request $request,string $id) {
        try {
            unit::find($id)->delete();
            session()->flash('success', 'Đã Xóa Đơn Vị Thành Công');
            return redirect()->back();  
        } catch (\Throwable $th) {
            return redirect()->back();  
        }
    }   
}
