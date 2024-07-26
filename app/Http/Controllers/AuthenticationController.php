<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; //Authentication

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function postLogin(Request $req)
    {
        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password // plain text
        ];
        $remember = $req->has('remember');
        if (Auth::attempt($dataUserLogin, $remember)) {
            //Logout all account from other browser
            Session::where('user_id',Auth::id())->delete();
            //Create new session login
            session()->put('user_id',Auth::id());
            if (Auth::user()->role == '1') {
                return redirect()->route('admin.products.listProducts')->with( // được sử dụng để trả về method get
                    [
                        'message' => 'Đăng nhập thành công'
                    ]
                );
            } else {
                echo 'User';
            }
        } else {
            return redirect()->route('login')->with( // được sử dụng để trả về method get
                [
                    'message' => 'Email hoặc password không chính xác'
                ]
            );
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with( // được sử dụng để trả về method get
            [
                'message' => 'Đăng xuất thành công'
            ]);
    }
    public function register(){
        return view('register');
    }
    public function postRegister(Request $req){
        $check = User::where('email', $req->email)->exists();
        if($check){
            return redirect()->back()->with([
                'message' => 'Email đã tồn tại'
            ]);
        }else{
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password)
            ];
            $newUser = User::create($data);
            // Auth::login($newUser);
            // return =>trang chủ
            return redirect()->route('login')->with([
                'message' => 'Đăng ký thành công'
            ]);
        }
    }
}
