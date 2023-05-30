<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('admin');
        }
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
            // return redirect()->route('register');
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email hoặc Password không chính xác');
        return redirect()->back();
    }
    public function logout(){
        Auth::logout();//Auth là đối tượng có sẵn của laravel
	    return redirect(url("login"));
    }
}
