<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create_application(Request $request){
        $request->validate([
            "email" => "required|email",
            "name" => "required|max:50"
        ],[
            "email.required"=>"Поле обязательно для заполнения",
            "name.required"=>"Поле обязательно для заполнения",
            "name.max"=>"Не более 50 символов ",
            "email.email"=>"Поле обязательно для заполнения",
        ]);
        $application_info = $request->all();
        Application::create([
            "email"=>$application_info["email"],
            "name"=>$application_info["name"],
            "course_id"=>$application_info["course"]
        ]);
        return redirect("/");
    }
    public function confirm($id_application){
        $application = Application::find($id_application);
        $application->is_confirm = 1;
        $application->save();
        return redirect("/admin");
    }

}
