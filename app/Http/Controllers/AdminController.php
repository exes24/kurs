<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Course;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(){
        $applications = Application::all();
        foreach($applications as $key => $application){
            $applications[$key] -> course_id = $this -> get_course_from_id($application -> course_id);
        }
        // dd($applications);
        return view("admin.admin",["applications"=>$applications, "categories"=>Category::all()]);
    }
    public function createCourser(Request $request){
        $request->validate([
            "image" => "required",
            "title" => "required|max:50",
            "cost" => "required|numeric",
            "description" => "required",
            "duration" => "required|numeric"

        ], [
            "image.required" => "Поле обязательно для заполнения",
            "title.required" => "Поле обязательно для заполнения",
            "cost.required" => "Поле обязательно для заполнения",
            "description.required" => "Поле обязательно для заполнения",
            "duration.required" => "Поле обязательно для заполнения",

            "title.max" => "Не более 50 символов ",
            "cost.numeric" => "Только цифры",
            "duration.numeric" => "Только цифры"
        ]);
        $application_info = $request->all();
        Course::create([
            "title"=>$application_info["title"],
            "description"=>$application_info["description"],
            "cost"=>$application_info["cost"],
            "duration"=>$application_info["duration"],
            "image"=>$application_info["image"],
            "category_id"=>$application_info["category_id"]
        ]);
        return redirect("/admin");
    }
    public function createCategory(Request $category){
        $category->validate([
            "title" => "required|max:50",
        ], [
            "title.required" => "Поле обязательно для заполнения",
            "title.max" => "Не более 50 символов "
        ]);
        $application_create = $category->all();
        Category::create([
            "title" => $application_create['title']
        ]);
        return redirect("admin");
    }
    protected function get_course_from_id($id_course){
        return Course::find($id_course)->title;
    }
}
