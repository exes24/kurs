<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function show_login()
    {
        return view("Auth.login");
    }
    public function show_register()
    {
        return view("Auth.register");
    }
    public function show_page(){
        $info_users = User::all();
        return view("users_page", ["login_info" => $info_users]);
    }
    public function create_users(Request $request){
        $request->validate([
            "name" => "required|max:100",
            "email" => "required|max:100",
            "password" => "required|max:255",
        ],[
            "name.required" => "Поле обязательно для заполнения",
            "email.required" => "Поле обязательно для заполнения",
            "password.required" => "Поле обязательно для заполнения",

            "name.max" => "Не более 100 символов",
            "email.max" => "Не более 100 символов",
            "password.max" => "Не более 255 символов"
        ]);
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/');
    }
    public function auth_users(Request $request){

        $formValue = [
            "email"=> $request->email,
            "password"=> $request->password
        ];

        if(Auth::attempt($formValue)){
            return redirect('/');
        }

    }
}
