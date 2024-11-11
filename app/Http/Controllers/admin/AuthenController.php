<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Cookie;

class AuthenController
{
    public function login(Request $request) {  
        if (Cookie::get('token')) {
            $find = [
                'tokenacc' => Cookie::get('token')
            ];
            $user = Account::where($find)->first();
            if (!$user) {
                return redirect('/admin/auth/login');
            }else {
                return redirect('/admin/dashboard');
            }
        }else {
            return view('admin/pages/auth/login',[
                'titlePage' => 'Trang Đăng Nhập',
            ]);
        }
    }

    public function loginPost(Request $request) {  
        // $password= md5($request->input('password'));
        $find = [
            'deleted' => false,
            'email' => $request->input('email')
        ];
        $EmailExist = Account::where($find)->exists();
        $user = Account::where($find)->first();
        if (!$EmailExist) {
            session()->flash('error', "Email Không Tồn Tại Tồn Tại");
            return redirect()->back();
            return;
        }
        if ($user->password != md5($request->input('password'))) {
            session()->flash('error', "Mật Khẩu Không Đúng Vui Lòng Nhập Lại");
            return redirect()->back();
            return;
        }

        if ($user->status != 'active') {
            session()->flash('error', "Tài Khoản Đã Bị Khóa");
            return redirect()->back();
            return; 
        }
        Cookie::queue('token',$user->tokenacc);
        return redirect('/admin/product');

    }


    public function logout(Request $request) { 
        Cookie::queue(Cookie::forget('token')); 
        return redirect('/admin/auth/login');
    }
}
