<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class AccountController
{
    public function index(Request $request) {
        $find = [
            'deleted' => false
        ];
        $record = Account::where($find)->select('id','email','tokenacc','fullname','phone','avatar','status','deleted')->get();
       
        return view('admin/pages/account/index',[
            'titlePage' => 'Danh Sách Tài Khoản',
            'record' => $record
        ]);
    }
    public function ChangeStatus(Request $request,string $id,string $status) {   
        Account::find($id)->update(['status' => $status]);
        session()->flash('success', 'Cập nhật Trạng Thái thành công');
        return redirect()->back();
    }
    public function create(Request $request) {  
        return view('admin/pages/account/create',[
            'titlePage' => 'Thêm Tài Khoản'
        ]);
    }

    public function createPost(Request $request) {
        $newIdResult = DB::select("SELECT unit_id_seq.NEXTVAL AS id FROM dual");
        $newId = 'TK' . str_pad($newIdResult[0]->id, 3, '0', STR_PAD_LEFT); 
        $request['id'] = $newId;
        $tokenacc = (string) Str::uuid();
        $request['tokenacc'] = $tokenacc;
        $find = [
            'deleted' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = Account::where($find)->exists();
        if ($EmailExist) {
            session()->flash('error', "Email " .  $request->input('email') .  " Đã Tồn Tại");
            return redirect()->back();
        }else {
            if ($request->file('file')) {
                $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
                $request['avatar']= $uploadedFileUrl;
            }
            $request['password']= md5($request->input('password'));
            Account::create($request->all());
            session()->flash('success', 'Tạo Tài Khoản Thành Công');
            return redirect("/admin/account");
        }
    }

    public function Delete(Request $request,string $id) {
        Account::find($id)->update(
            [
                'deleted' => true
            ]
        );
        session()->flash('success', 'Đã Xóa Tài Khoản Thành Công');
        return redirect()->back();
    }   


    public function edit(Request $request,string $id) { 
        $find = [
            'deleted' => false,
            'id' => $id
        ];
        try {
            $record = Account::where($find)->first();
            return view('admin.pages.account.edit',[
                'titlePage' => 'Chỉnh Sửa Tài Khoản',
                'record' => $record
            ]);
        } catch (\Throwable $th) {
            return redirect("/admin/account");
        }
    }

    public function editPatch(Request $request ,string $id) {   
        $find = [
            'deleted' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = Account::where($find)->where('id', '<>', $id)->exists();
        if ($EmailExist) {
            session()->flash('error', "Email " .  $request->input('email') .  " Đã Tồn Tại");
        }else {
            if ($request->input('password')) {
                $request['password']= md5($request->input('password'));
            }else {
                $request->request->remove('password');
            }
            if ($request->file('file')) {
                $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
                $request['avatar']= $uploadedFileUrl;
            }
            Account::find($id)->update($request->all());
            session()->flash('success', 'Tài Khoản Đã Cập Nhật Thành Công');
        }
        return redirect()->back();
    }

    public function detail(Request $request,string $id) {   
        $record = Account::find($id);
        return view('admin.pages.account.detail',[
            'titlePage' => 'Chi Tiết Tài Khoản',
            'record' => $record
        ]);
    }
}
    