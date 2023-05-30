<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class RegisterController extends Controller
{ 
    //register get
    public function index(){
        return view('admin.register');
    }
    //register post
    public function postregister(Request $request){
        $request->validate([
                'password' =>'required|min:6',

        ],
    [
        'password.min'=>'mat khau phai nhap lon hon 6 ky tu',
    ]);
        $name = request("name");
        $email = request("email");
        $password = request("password");
        DB::table("users")->insert(["name"=>$name,"email"=>$email,"password"=>Hash::make($password)]);
        return redirect('login');

    }
   
}
